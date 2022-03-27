<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    public $fillable = ['title','slug','description','image'];

    public function tags()
    {
        return $this->morphToMany(Tag::class , 'taggable');
    }
}
