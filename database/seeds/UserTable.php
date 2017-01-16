<?php

use Illuminate\Database\Seeder;

class UserTable extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            [
                'name' => 'Admin',
                'email' => 'admin@admin.com',
                'password' => '$2y$10$4LHC/ultuuu1ndXH6rD6b.jbRdO5gW9AKJbf7fPxZQb1wL.djPHGa',
                'gender'=> 'male',
                'age' => 24,
                'role'=> 1
            ]
        ]);
    }
}
