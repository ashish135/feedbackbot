<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class QuestionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('questions')->insert([
            'user_id' => 1,
            'question' => 'Which of the following words would you use to describe our product?',
        ]);

        DB::table('questions')->insert([
            'user_id' => 1,
            'question' => 'How well does our product meet your needs?',
        ]);

        DB::table('questions')->insert([
            'user_id' => 1,
            'question' => 'Which 3 features are the most valuable to you?',
        ]);

        DB::table('questions')->insert([
            'user_id' => 1,
            'question' => 'What are the 3 more important features we’re missing?',
        ]);

        DB::table('questions')->insert([
            'user_id' => 1,
            'question' => 'If you could change just one thing about our product, what would it be?',
        ]);

        DB::table('questions')->insert([
            'user_id' => 1,
            'question' => 'If you have any other comment on how we can improve our services, please let us know.',
        ]);
    }
}
