<?php

use Illuminate\Database\Seeder;

class TagsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tags')->insert([
            ['title' => 'Lifestyle'],
            ['title' => 'Tips'],
            ['title' => 'Tricks'],
            ['title' => 'How to'],
            ['title' => 'Code'],
            ['title' => 'Application']
        ]);
    }
}
