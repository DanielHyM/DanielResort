<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Housing extends Model
{
    //
    public $table = "housing";


    protected $fillable = [
        'floor',
        'room_number',
        'description',
        'price_per_night'

        ];
}
