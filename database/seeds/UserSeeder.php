<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('admins')->insert([
            [ 'name' => 'Aoun Hassan',
            'email' => 'admin1@mail.com',
            'password' => Hash::make('1234'),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()],
            ['name' => 'Aoun Hassan 2',
            'email' => 'admin2@mail.com',
            'password' => Hash::make('1234'),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()],
        ]);
        DB::table('users')->insert([
            [ 'name' => 'User 1',
            'email' => 'user1@mail.com',
            'password' => Hash::make('1234'),
            'image' => '/profile/311639246735.jpg',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()],
            [ 'name' => 'User 2',
            'email' => 'user2@mail.com',
            'password' => Hash::make('1234'),
            'image' => '/profile/311639246735.jpg',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()],
        ]);
        DB::table('categories')->insert([
            [ 'name' => 'Toyota'],
            [ 'name' => 'Suzuki'],
            [ 'name' => 'Mitsubishi'],
            [ 'name' => 'Nissan'],
        ]);
        DB::table('car_models')->insert([
            [ 'name' => 'Pardo',
            'category_id' => '1'],
            [ 'name' => 'Alto',
            'category_id' => '2'],
            [ 'name' => 'Lancer',
            'category_id' => '3'],
            [ 'name' => 'Sunny',
            'category_id' => '4'],
        ]);
        DB::table('types')->insert([
            [ 'name' => 'Sedans'],
            [ 'name' => 'Hatchbacks'],
        ]);
        DB::table('countries')->insert([
            [ 'name' => 'STC Jamaica'],
            [ 'name' => 'STC Uganda'],
            [ 'name' => 'STC United Kingdom'],
        ]);
        DB::table('settings')->insert([
            [ 
                'name' => 'Car Dealers',
                'owner_name' => 'Haider Zeeshan',
                'email' => 'dummy@mail.com',
                'phone' => '+8190 5121 1888',
                'address' => '529-2 Iwasegawacho , Ota , Gunma 373-0841, Japan',
                'instagram_link' => 'https://www.instagram.com/yamaguchimotors/',
                'twitter_link' => 'https://www.twitter.com/',
                'facebook_link' => 'https://www.facebook.com/yamaguchicomp514',
                'youtube_link' => 'https://www.youtube.com/channel/UCuEKfng_zs32puAL53AtR5g',
                'tiktok_link' => 'tiktok.com/@yamaguchimotors',
                'whatsapp_link' => 'https://wa.me/message/ZDTHQ6SXM6HBD1',
                'sales_terms_title' => 'Sales Term',
                'sales_terms' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.',
                'about_us_title' => 'About Us',
                'about_us' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.',
            ],
        ]);
        DB::table('reviews')->insert([
            [ 
                'name' => 'Car Dealers',                
                'description' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.',
            ],
        ]);
        DB::table('faqs')->insert([
            [ 
                'question' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit',                
                'answer' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.',
            ],
            [ 
                'question' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit',                
                'answer' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.',
            ],
        ]);
        DB::table('banks')->insert([
            [ 
                'payee_name' => 'Payee Name',                
                'bank_name' => 'Bank Name',                
                'account_number' => 'Account Number',                
                'bank_address' => 'Bank Address',                
                'swift_code' => 'Swift Code',                
            ],
        ]);
        DB::table('blog_categories')->insert([
            [ 'name' => 'Happiness'],
            [ 'name' => 'Sad'],
        ]);
    }
}
