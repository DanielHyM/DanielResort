<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Booking extends Model
{
    use SoftDeletes;
    //
    protected $fillable = [

        'user_id',
        'housing_id',
        'check_in_date',
        'check_in_time',
        'check_out_time',
        'check_out_date'

        ];


}
