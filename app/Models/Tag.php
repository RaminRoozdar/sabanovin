<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    protected $fillable = ['name'];

    public function articles()
    {
        return $this->morphedByMany(Article::class , 'taggable');
    }

        public function items()
    {
        return $this->morphedByMany(Item::class , 'taggable');
    }
    public function products()
    {
        return $this->morphedByMany(Product::class , 'taggable');
    }
}
