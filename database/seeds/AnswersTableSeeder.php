<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AnswersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('answers')->insert([
            'user_id' => 1,
            'question_id' =>1,
            'answer' => 'Buggy'
        ]);
        DB::table('answers')->insert([
            'user_id' => 1,
            'question_id' =>1,
            'answer' => 'Fine'
        ]);
        DB::table('answers')->insert([
            'user_id' => 1,
            'question_id' =>1,
            'answer' => 'Great'
        ]);
        DB::table('answers')->insert([
            'user_id' => 1,
            'question_id' =>1,
            'answer' => 'Life Saving'
        ]);
        //Second
        DB::table('answers')->insert([
            'user_id' => 1,
            'question_id' =>2,
            'answer' => 'Badly'
        ]);
        DB::table('answers')->insert([
            'user_id' => 1,
            'question_id' =>2,
            'answer' => 'Fine'
        ]);
        DB::table('answers')->insert([
            'user_id' => 1,
            'question_id' =>2,
            'answer' => 'Well'
        ]);
        DB::table('answers')->insert([
            'user_id' => 1,
            'question_id' =>2,
            'answer' => 'Very Well'
        ]);
        //Third
        DB::table('answers')->insert([
            'user_id' => 1,
            'question_id' =>3,
            'answer' => 'Custom Responses'
        ]);
        DB::table('answers')->insert([
            'user_id' => 1,
            'question_id' =>3,
            'answer' => 'Design'
        ]);
        DB::table('answers')->insert([
            'user_id' => 1,
            'question_id' =>3,
            'answer' => 'Great Html Code'
        ]);
        DB::table('answers')->insert([
            'user_id' => 1,
            'question_id' =>3,
            'answer' => 'Easy Navigation'
        ]);
        //Fourth
        DB::table('answers')->insert([
            'user_id' => 1,
            'question_id' =>4,
            'answer' => 'Custom Integrations'
        ]);
        DB::table('answers')->insert([
            'user_id' => 1,
            'question_id' =>4,
            'answer' => 'Design'
        ]);
        DB::table('answers')->insert([
            'user_id' => 1,
            'question_id' =>4,
            'answer' => 'Great Html Code'
        ]);
        DB::table('answers')->insert([
            'user_id' => 1,
            'question_id' =>4,
            'answer' => 'Easy Navigation'
        ]);
        //Fifth
        DB::table('answers')->insert([
            'user_id' => 1,
            'question_id' =>5,
            'answer' => 'Custom'
        ]);
        DB::table('answers')->insert([
            'user_id' => 1,
            'question_id' =>5,
            'answer' => 'Lorem'
        ]);
        DB::table('answers')->insert([
            'user_id' => 1,
            'question_id' =>5,
            'answer' => 'ipsum'
        ]);
        DB::table('answers')->insert([
            'user_id' => 1,
            'question_id' =>5,
            'answer' => 'Both'
        ]);
    }
}
