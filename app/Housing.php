<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia\HasMedia;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;

class Housing extends Model implements hasMedia
{
    use HasMediaTrait;

    //
    public $table = "housing";


    protected $fillable = [
        'floor',
        'room_number',
        'description',
        'price_per_night'

        ];


    public function registerMediaCollections()
    {
        $this->addMediaCollection('housingImages')->useDisk('housingImages');
    }
}
