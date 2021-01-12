<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
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
