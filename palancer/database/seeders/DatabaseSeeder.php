<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            'name' => 'ali',
            'email' => 'ali@ali.com',
             'password' => Hash::make("11112222")

        ]);

        DB::table('admins')->insert([
            'name' => 'mady',
            'email' => 'mady@mady.com',
             'password' => Hash::make("11112222")

        ]);
        DB::table('products')->insert([
            'name' => 'pizza',
            'slug' => 'pizza',
             'status' => "active",
             'description' => "we have amazing italian pizza ",
             'image' => "https://kauveryhospital.com/blog/wp-content/uploads/2021/04/pizza-5179939_960_720.jpg",
             "price" => 2.5
             
        ]);

        DB::table('products')->insert([
            'name' => 'shawrma',
            'slug' => 'shawrma',
             'status' => "active",
             'description' => "we have amazing  shawrma ",
             'image' => "https://thechefsignature.ca/cdn/shop/articles/shawarma_1024x1024.jpg?v=1670197002",
             "price" => 1.5

        ]);

        DB::table('products')->insert([
            'name' => 'falafel',
            'slug' => 'falafel',
             'status' => "active",
             'description' => "we have amazing arab falafel",
             'image' => "https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTMt-gUBF6xw7RvOOUlyjKkEHLkDg73Iqj1xQ&usqp=CAU ",
             "price" => 0.8

             
        ]);

        DB::table('products')->insert([
            'name' => 'kabab',
            'slug' => 'kabab',
             'status' => "active",
             'description' => "we have amazing arab kabab ",
             'image' => "https://foodiesterminal.com/wp-content/uploads/2019/11/chicken-angara-kabab-2-679x1024.jpg",
             "price" =>4.0

             
        ]);
    }
}
