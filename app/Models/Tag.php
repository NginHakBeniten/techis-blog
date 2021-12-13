<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'slug'
    ];

    protected $casts = [
        'name' => 'string',
        'slug' => 'string',
    ];

    public function articles()
    {
        return $this->belongsToMany(Article::class);
    }
}
