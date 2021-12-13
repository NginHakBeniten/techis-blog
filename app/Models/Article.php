<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title', 'slug', 'main_image', 'body'
    ];

    protected $casts = [
        'title' => 'string',
        'slug' => 'string',
        'main_image' => 'string',
        'body' => 'string'
    ];

    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }
}
