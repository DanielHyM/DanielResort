<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Booking extends Model
{
    use SoftDeletes;
    //


    /**
     * @var string[]
     */
    protected $casts = [

//        'check_out_time' => 'date',
//        'check_out_date' => 'date'

    ];

    protected $fillable = [

        'user_id',
        'housing_id',
        'check_in_date',
        'check_in_time',
        'check_out_time',
        'check_out_date'

        ];

    public function housing(){
       return  $this->belongsTo(Housing::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }






}
