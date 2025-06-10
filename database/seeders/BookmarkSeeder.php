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
        $now = now();
    
        $bookmarks = [
        [
            'title' => 'Laravel Official Docs',
            'url' => 'https://laravel.com/docs',
            'description' => 'The official Laravel documentation.',
        ],
        [
            'title' => 'Stack Overflow',
            'url' => 'https://stackoverflow.com',
            'description' => 'Programming Q&A site.',
        ],
        [
            'title' => 'GitHub',
            'url' => 'https://github.com',
            'description' => 'Where the world builds software.',
        ],
        [
            'title' => 'MDN Web Docs',
            'url' => 'https://developer.mozilla.org',
            'description' => 'Resources for developers, by developers.',
        ],
        [
            'title' => 'W3Schools',
            'url' => 'https://w3schools.com',
            'description' => 'Web development tutorials and references.',
        ],
        [
            'title' => 'YouTube',
            'url' => 'https://youtube.com',
            'description' => 'Video sharing platform.',
        ],
        [
            'title' => 'Laracasts',
            'url' => 'https://laracasts.com',
            'description' => 'The best Laravel tutorials.',
        ],
        [
            'title' => 'PHP Official Site',
            'url' => 'https://php.net',
            'description' => 'PHP documentation and resources.',
        ],
        [
            'title' => 'CSS-Tricks',
            'url' => 'https://css-tricks.com',
            'description' => 'Tips, tricks, and techniques on using CSS.',
        ],
        [
            'title' => 'CodePen',
            'url' => 'https://codepen.io',
            'description' => 'Front-end code playground.',
        ],
        [
            'title' => 'Medium',
            'url' => 'https://medium.com',
            'description' => 'Read and write stories and articles.',
        ],
        [
            'title' => 'Dev.to',
            'url' => 'https://dev.to',
            'description' => 'Where programmers share ideas and help each other grow.',
        ],
        [
            'title' => 'FreeCodeCamp',
            'url' => 'https://freecodecamp.org',
            'description' => 'Learn to code for free.',
        ],
        [
            'title' => 'Smashing Magazine',
            'url' => 'https://smashingmagazine.com',
            'description' => 'For web designers and developers.',
        ],
        [
            'title' => 'Hashnode',
            'url' => 'https://hashnode.com',
            'description' => 'A blogging platform for developers.',
        ],
        [
            'title' => 'DigitalOcean Community',
            'url' => 'https://www.digitalocean.com/community',
            'description' => 'Tutorials and questions about cloud computing.',
        ],
        [
            'title' => 'Reddit Programming',
            'url' => 'https://reddit.com/r/programming',
            'description' => 'Programming news and discussions.',
        ],
        [
            'title' => 'Google',
            'url' => 'https://google.com',
            'description' => 'Search engine.',
        ],
        [
            'title' => 'Hacker News',
            'url' => 'https://news.ycombinator.com',
            'description' => 'Technology and startup news.',
        ],
        [
            'title' => 'Product Hunt',
            'url' => 'https://producthunt.com',
            'description' => 'Discover new products every day.',
        ],
    ];

        foreach ($bookmarks as $index => $bookmark) {
            \App\Models\Bookmark::create([
                'user_id'    => 1,
                'title'      => $bookmark['title'],
                'url'        => $bookmark['url'],
                'description'=> $bookmark['description'],
                'created_at' => $now->copy()->addMinutes($index * 10),
                'updated_at' => $now->copy()->addMinutes($index * 10 + 3),
            ]);
         }
    }

}
