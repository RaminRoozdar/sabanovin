<?php
/**
 * Created by PhpStorm.
 * User: ramin
 * Date: 8/11/2019
 * Time: 10:02 AM
 */

namespace App\Traits;


use App\Models\Image;

trait Imageable
{
    public function images()
    {
        return $this->morphMany(Image::class , 'imageable');
    }
}