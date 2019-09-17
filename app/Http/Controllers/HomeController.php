<?php

namespace App\Http\Controllers;

use Illuminate\Http\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Rating;
use App\Question;
use App\Answer;
use App\Feedback;
use Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cans = "";
        $rating = Rating::where('user_id',Auth::user()->id)->get();
        $qus = Question::all();
        $qusno = DB::table('feedback')
            ->where('user_id', Auth::user()->id)
            ->whereNull('answer')->get();
        $qusnoTotal = DB::table('feedback')
            ->where('user_id', Auth::user()->id)
            ->get();
           // dd(count($qusno));
        if(count($qusnoTotal) == count($qus)){
        $lastqno = count($qus);
    } else if(count($qusno) > 0){
        $cans = Answer::where('question_id', $qusno[0]->question_id )->get();
    }
        $feed = Feedback::where('user_id',Auth::user()->id)->get();
        //$ans = Answer::where('question_id',$_GET['count'])->get();
        return view('home', compact('rating','feed','qus','cans','lastqno','qusno'));
    }

    public function rating(Request $r){
        $totalQus = Question::all();
        if(isset($_GET['r'])){
        $rating = new Rating;
        $rating->user_id = Auth::user()->id;
        $rating->rating = $_GET['r'];
        $rating->save();
        $getqus = Question::where('id',$_GET['count'])->get();
        $feed = new Feedback;
        $feed->user_id = Auth::user()->id;
        $feed->question_id = $getqus[0]->id;
        $feed->question = $getqus[0]->question;
        $feed->save();
        $ans = Answer::where('question_id',$_GET['count'])->get();
         return \Response::json([
        'success' => true,
        'r' => !empty($_GET['r']) ? $_GET['r'] : $_GET['pans'],
        'qus' => $getqus[0]->question,
        'qusid' => $getqus[0]->id,
        'ans' => json_encode($ans)
        ]);
    } elseif( count($totalQus) >= $_GET['q']) {
       $getqus = Question::where('id',$_GET['q'])->get();
        $feedans = Feedback::where('question_id',$_GET['count'])
        ->update(['answer' => $_GET['pans']]);
        $feed = new Feedback;
        $feed->user_id = Auth::user()->id;
        $feed->question_id = $getqus[0]->id;
        $feed->question = $getqus[0]->question;
        $feed->save();
        $ans = Answer::where('question_id',$_GET['q'])->get();
        return \Response::json([
        'success' => true,
        'r' => !empty($_GET['r']) ? $_GET['r'] : $_GET['pans'],
        'qus' => $getqus[0]->question,
        'qusid' => $getqus[0]->id,
        'ans' => json_encode($ans)
        ]);
        }
       elseif(isset($_GET['msg'])){
        $feedans = Feedback::where('question_id',$_GET['cq'])
        ->update(['answer' => $_GET['msg']]);
        return \Response::json([
            'message' => 'Thank you for your feedbaack'
        ]);
       } 
    }
}
