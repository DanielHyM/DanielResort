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
        $bookingData = Booking::where('user_id',$userId);

        $bookingDataTable = DataTables::of($bookingData)
            ->editColumn('housing_id',function($booking){
                //$housing = Housing::find($booking->housing_id);
                $housing = $booking->housing;
                return  $housing->room_number;

            })->editColumn('user_id',function($booking){
                $user = User::find($booking)->first();
                return  $user->name;

            })->editColumn('created_at',function($booking){
                return Carbon::parse($booking->created_at)->format('d/m/Y h:i:s');

            })->addColumn('actions',function($booking){

                return '<a  class="btn btn-success" href='. route('user.booking.edit', $booking) . '><i class="fas fa-pencil-alt"></i></a>'
                    .'<a  class="btn btn-danger btnDeleteBookingUser" href='. route('user.booking.destroy', $booking) . '><i class="fas fa-eraser"></i></a>';

            })->editColumn('check_in_date',function($booking){

                 return Carbon::parse($booking->check_in_date)->format('d/m/Y');

            })->editColumn('check_out_date',function($booking){

                return Carbon::parse($booking->check_out_date)->format('d/m/Y');

            })->rawColumns(['actions'])->make(true);

        return $bookingDataTable;



    }

    public function edit(Booking $booking){

        $booking->check_in_date = Carbon::createFromFormat('Y-m-d',$booking->check_in_date)->format('d-m-Y');
        $booking->check_out_date = Carbon::createFromFormat('Y-m-d',$booking->check_out_date)->format('d-m-Y');

        return view('user.bookings.update',compact('booking'));
    }






}
