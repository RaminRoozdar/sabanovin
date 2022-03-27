<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = [
        'title','slug','status', 'type','category_id','link'
    ];
    public function children()
    {
        return $this->hasMany(Category::class , 'category_id')->orderBy('id','desc');
    }
    public function parent()
    {
        return $this->belongsTo(Category::class , 'category_id');
    }
}
