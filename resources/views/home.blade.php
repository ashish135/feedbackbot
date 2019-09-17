@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <div class="panel panel-default">
                <div class="panel-heading grnbg">LAB 1</div>

                <div class="panel-body chat-bg">
                    <div class="default-msg">
                        <div class="you active">
                        Welcome <b>{{ auth()->user()->name }},</b> thanks for giving us the opportunity to serve you. We value your feedback.
                        </div>
                        <div class="you active">
                        How likely are you to recommend Lab1 to your friends?
                        </div>
                    </div>
                    <div id="rating-data">
                        @if(count($rating) > 0)
                            @foreach($rating as $r)
                                <div class="me active"> {{ $r->rating }} </div>
                                @endforeach
                            @endif
                        @if(count($feed) > 0)
                            @foreach($feed as $f)
                                <div class="you active"> {{ $f->question }} </div>
                                @if($f->answer)<div class="me active"> {{ $f->answer }} </div> @endif
                                @endforeach
                            @endif    
                    </div>
                    <div id="dynamic-data">
                        
                    </div>
                </div>
                <div id="answers">

                    @if($cans)
                            @foreach($cans as $a)
                                <a href="#" data-id="{{ $a->question_id }}" data-q="{{ $a->question_id+1 }}" data-value="{{ $a->answer }}"> {{ $a->answer }} </a>
                                @endforeach

                                @elseif(count($qusno) > 0)
                                <textarea class="form-control" id="message"></textarea>
                                <button type="submit" data-id="{{ $lastqno }}" id="btn-submit" class="btn btn-submit">Submit Feedback</button>
                            @endif
                    
                </div>
                @if(count($rating) == 0)
                <div class="ratings">
                    <p class="rating-placeholder">Tap on rating...</p>
                        <a href="#" data-id="0" class="btn btn-danger">0</a>
                        <a href="#" data-id="1" class="btn btn-danger">1</a>
                        <a href="#" data-id="2" class="btn btn-danger">2</a>
                        <a href="#" data-id="3" class="btn btn-danger">3</a>
                        <a href="#" data-id="4" class="btn btn-danger">4</a>
                        <a href="#" data-id="5" class="btn btn-danger">5</a>
                        <a href="#" data-id="6" class="btn btn-danger">6</a>
                        <a href="#" data-id="7" class="btn btn-warning">7</a>
                        <a href="#" data-id="8" class="btn btn-warning">8</a>
                        <a href="#" data-id="9" class="btn btn-success">9</a>
                        <a href="#" data-id="10" class="btn btn-success">10</a>
                        <div class="rating-text"><span class="pull-left">Poor</span><span class="pull-right">Good</span></div>
                    </div>
                @endif  
            </div>
        </div>
    </div>
</div>
@endsection
