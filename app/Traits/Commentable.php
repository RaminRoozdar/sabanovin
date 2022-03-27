<?php
/**
 * Created by PhpStorm.
 * User: ramin
 * Date: 8/21/2019
 * Time: 4:46 PM
 */

namespace App\Traits;


use App\Models\Comment;

trait Commentable
{
    public function comments()
    {
        return $this->morphMany(Comment::class , 'commentable');
    }
}