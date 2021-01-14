<?php

namespace App\Http\Controllers;

use App\Booking;
use App\Housing;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\DataTables;

class UserController extends Controller
{

    public function index(){

        $housings = Housing::paginate(10);
        return view('user.housings.list_housings',compact('housings'));
    }

    public function createBooking(Request $request,Housing $housing){

        return view('user.bookings.create',compact('housing'));
    }

    public function listing(){
        return view('user.bookings.list_bookings');
    }


    public function listBookings(){

        $userId = Auth::id();
       // $bookingData = DB::table('bookings')->where('user_id',$userId)->get();
        $bookingData = Booking::where('user_id',$userId);
        $bookingDataTable = DataTables::of($bookingData)
            ->editColumn('housing_id',function($booking){

                $housing = Housing::find($booking)->first();

                return  $housing->room_number;

            })->editColumn('user_id',function($booking){

                $user = User::find($booking)->first();

                return  $user->name;

            })->editColumn('created_at',function($booking){

                return Carbon::parse($booking->created_at)->format('d/m/Y h:i:s');
            })->make(true);

        return $bookingDataTable;



    }






}
