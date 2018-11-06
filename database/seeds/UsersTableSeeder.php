<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Ben
        DB::table('users')->insert([
            'name' => 'Ben Patterson',
            'email' => 'bmizepatterson@gmail.com',
            'password' => bcrypt('benpatterson'),
            'email_verified_at' => now()->subHours(rand(1, 4)),
            'created_at' => now()->subHours(rand(5, 100)),
            'updated_at' => now(),
        ]);

        // Bobby Bob
        DB::table('users')->insert([
            'name' => 'Bobby Bob',
            'email' => 'bobbybob@gmail.com',
            'password' => bcrypt('secret'),
            'email_verified_at' => now()->subHours(rand(1, 4)),
            'created_at' => now()->subHours(rand(5, 100)),
            'updated_at' => now(),
        ]);

        // Bobbert Bob
        DB::table('users')->insert([
            'name' => 'Bobbert Bob',
            'email' => 'bobbertbob@gmail.com',
            'password' => bcrypt('secret'),
            'email_verified_at' => now()->subHours(rand(1, 4)),
            'created_at' => now()->subHours(rand(5, 100)),
            'updated_at' => now(),
        ]);

        // Boris Bobford
        DB::table('users')->insert([
            'name' => 'Boris Bobford',
            'email' => 'borisbobford@gmail.com',
            'password' => bcrypt('secret'),
            'email_verified_at' => now()->subHours(rand(1, 4)),
            'created_at' => now()->subHours(rand(5, 100)),
            'updated_at' => now(),
        ]);

        // Bonnie Bobbington
        DB::table('users')->insert([
            'name' => 'Bonnie Bobbington',
            'email' => 'bonniebobbington@gmail.com',
            'password' => bcrypt('secret'),
            'email_verified_at' => now()->subHours(rand(1, 4)),
            'created_at' => now()->subHours(rand(5, 100)),
            'updated_at' => now(),
        ]);

        // Billy Bobbly
        DB::table('users')->insert([
            'name' => 'Billy Bobbly',
            'email' => 'billybobbly@gmail.com',
            'password' => bcrypt('secret'),
            'email_verified_at' => now()->subHours(rand(1, 4)),
            'created_at' => now()->subHours(rand(5, 100)),
            'updated_at' => now(),
        ]);

        // Bongo Bor
        DB::table('users')->insert([
            'name' => 'Bongo Bor',
            'email' => 'bongobor@gmail.com',
            'password' => bcrypt('secret'),
            'email_verified_at' => now()->subHours(rand(1, 4)),
            'created_at' => now()->subHours(rand(5, 100)),
            'updated_at' => now(),
        ]);
    }
}
