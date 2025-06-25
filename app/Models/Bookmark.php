<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bookmark extends Model
{
        use HasFactory;

    protected $fillable = [
        'user_id',
        'title',
        'description',
        'url',
        'tags',
        'folder_id',
    ];

    // Define relationship to User
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function folder()
    {
        return $this->belongsTo(Folder::class);
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class, 'bookmark_tag');
    }
}
