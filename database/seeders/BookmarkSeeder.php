<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BookmarkSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        \DB::table('bookmarks')->insert([
            [
                'user_id' => 1,
                'title' => 'Laravel Official Docs',
                'url' => 'https://laravel.com/docs',
                'description' => 'The official documentation for Laravel.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'user_id' => 1,
                'title' => 'YouTube',
                'url' => 'https://youtube.com',
                'description' => 'My favorite video site.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'user_id' => 1,
                'title' => 'GitHub',
                'url' => 'https://github.com',
                'description' => 'Where I host my code.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }

}
