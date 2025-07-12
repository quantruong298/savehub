<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Folder;

class FolderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $folders = [
            'Work Projects',
            'Personal Ideas',
            'Reading List',
            'Design Inspirations',
            'Favorite Tools',
            'Laravel Tips',
            'Livewire Examples',
            'Learning Resources',
            'Startup Research',
            'Archived Links',
        ];

        foreach ($folders as $name) {
            Folder::create([
                'user_id' => 1,
                'name' => $name,
            ]);
        }
    }
}
