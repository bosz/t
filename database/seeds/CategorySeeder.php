<?php

use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('category')->insert([
            ['title' => 'Internet', 'slug' => 'internet'],
            ['title' => 'Web Design', 'slug' => 'web-design'],
            ['title' => 'Development', 'slug' => 'development'],
            ['title' => 'Web Artisan', 'slug' => 'web-artisan'],
            ['title' => 'Branding', 'slug' => 'branding'],
            ['title' => 'Photography', 'slug' => 'photgraphy']
        ]);
    }
}
