<?php
namespace App\Services;

use App\Booking;
use App\Housing;
use Carbon\Carbon;

class HousingService
{


    public function checkHousingAvailability($housingId,$checkInDate,$checkOutDate,$checkOutTime,$checkInTime)
    {
        $isAvailable = true;

        $checkInDate = Carbon::parse($checkInDate);
        $checkOutDate = Carbon::parse($checkOutDate);

        if($checkInDate > $checkOutDate){
            $isAvailable = false;
        }else{

            $bookingData = Housing::findOrFail($housingId)->bookings()->where(function($query) use($checkInDate,$checkOutDate){
                    $query->where('check_in_date', ">=", $checkInDate)
                    ->where('check_in_date',"<=",$checkOutDate);
            })->orWhere(function($query2) use ($checkOutDate,$checkInDate){
                $query2->where('check_out_date', ">=", $checkInDate)
                    ->where('check_out_date',"<=",$checkOutDate);

            });

            if($bookingData->count() > 0){
                $isAvailable = false;
            }

        }


        return $isAvailable;
    }

}
