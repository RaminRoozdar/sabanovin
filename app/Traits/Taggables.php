<?php

namespace App\Traits;


use App\Models\Tag;

trait Taggables
{
    public function tags()
    {
        return $this->morphToMany(Tag::class , 'taggable');
    }
}