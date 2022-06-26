<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Lbs extends Model
{
    public $fillable = ['location','scenario','message','start_date','end_date','strat_time','end_time','days','count','status','amount','message_count','language'];
}
