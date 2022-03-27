<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Traits\Tappable;
use App\User;

class Article extends Model
{
    
    public $fillable = ['title','slug','desc_short','description','image'];

    public function tags()
    {
        return $this->morphToMany(Tag::class , 'taggable');
    }
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function getArticleExcerptAttribute()
    {
        $articleWords = explode(' ', $this->attributes['text']);
        return implode(' ', array_slice($articleWords, 0, 80));
    }
}
