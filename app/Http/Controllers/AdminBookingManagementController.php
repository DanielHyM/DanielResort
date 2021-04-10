<?php

namespace App\Http\Controllers;

use App\Booking;
use App\Housing;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use SebastianBergmann\Comparator\Book;
use Yajra\DataTables\DataTables;

class AdminBookingManagementController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        return view('admin.bookings.list_bookings');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Http\Response|\Illuminate\View\View
     */
    public function create()
    {
        $users = User::all();
        $housings = Housing::all();

        return view('admin.bookings.create', compact('users','housings'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request , Housing $housing)
    {
        $bookingData = $request->all();


        $user = Auth::user();

        $requestUserId = User::where('id',$request->user_id)->first();


        $bookingData['check_in_date'] = Carbon::parse($bookingData['check_in_date'])->format('Y-m-d');
        $bookingData['check_out_date'] = Carbon::parse($bookingData['check_out_date'])->format('Y-m-d');

        $bookingData['check_in_date'] = str_replace('/','-',$bookingData['check_in_date']);
        $bookingData['check_out_date'] = str_replace('/','-',$bookingData['check_out_date']);
        $bookingData['check_in_time'] = str_replace('PM','',$bookingData['check_in_time']);
        $bookingData['check_in_time'] = str_replace('AM','',$bookingData['check_in_time']);
        $bookingData['check_out_time'] = str_replace('PM','',$bookingData['check_out_time']);
        $bookingData['check_out_time'] = str_replace('AM','',$bookingData['check_out_time']);

        if($user->roles->first()->name != 'admin'){
            $bookingData['user_id'] = $user->id;
            $bookingData['housing_id'] = $housing->id;

        }


        Booking::create($bookingData);

        if($user->roles->first()->name == 'admin'){
            return redirect(route('bookings.index'));
        }else{
            return redirect(route('user.booking.list'));
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Http\Response|\Illuminate\View\View
     */
    public function edit(Booking $booking)
    {
        $housing = $booking->housing;
        $user = $booking->user;

        $booking->check_in_date = Carbon::parse($booking->check_in_date)->format('d-m-Y');
        $booking->check_out_date = Carbon::parse($booking->check_out_date)->format('d-m-Y');

        return view('admin.bookings.update',compact('booking','housing','user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param Booking $booking
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,Booking $booking)
    {


      $requestUser=  User::where('name',$request->user)->first();
      $requestHousing = Housing::where('room_number',$request->room_number)->first();
      $user = Auth::user();

        if($user->roles->first()->name == 'admin') {
            $booking->user_id = $requestUser->id;
            $booking->housing_id = $requestHousing->id;

        }else{
            $booking->user_id = Auth::id();

        }


        $booking->check_in_date = $request->check_in_date;
        $booking->check_in_time = $request->check_in_time;
        $booking->check_out_date = $request->check_out_date;
        $booking->check_out_time = $request->check_out_time;


        $booking['check_in_date'] = Carbon::createFromFormat('d-m-Y', $request->check_in_date)->format('Y-m-d');
        $booking['check_out_date'] = Carbon::createFromFormat('d-m-Y', $request->check_out_date)->format('Y-m-d');


        $booking['check_in_time'] = str_replace('PM','',$booking['check_in_time']);
        $booking['check_in_time'] = str_replace('AM','',$booking['check_in_time']);
        $booking['check_out_time'] = str_replace('PM','',$booking['check_out_time']);
        $booking['check_out_time'] = str_replace('AM','',$booking['check_out_time']);




        $booking->save();

        if($user->roles->first()->name == 'admin') {
            return redirect(route('bookings.index'));
        }else{
            return redirect(route('user.booking.list'));
        }



    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Booking $booking)
    {

        $booking->delete();


    }

    public function listBookings(Request $request){

        $bookingData = Booking::all();

        $bookingDataTable = DataTables::of($bookingData)
            ->editColumn('housing_id',function($booking){

                $housing = $booking->housing;

                return  $housing->room_number;

            })->editColumn('user_id',function($booking){

                $user = User::where('id',$booking->user_id)->first();

                return  $user->name;

            })->editColumn('created_at',function($booking){

                return Carbon::parse($booking->created_at)->format('d/m/Y h:i:s');
            })->editColumn('check_in_date',function($booking){

            return Carbon::parse($booking->check_in_date)->format('d/m/Y');
            })->editColumn('check_out_date',function($booking){

            return Carbon::parse($booking->check_out_date)->format('d/m/Y');
            })->editColumn('check_out_time',function($booking){

                return Carbon::parse($booking->check_out_time)->format(' h:i:s');
            })->addColumn('actions',function($booking){

                return '<a  class="btn btn-success" href='. route('bookings.edit', $booking) . '><i class="fas fa-pencil-alt"></i></a>'
                    .'<a  class="btn btn-danger btnDeleteBooking" href='. route('bookings.destroy', $booking) . '><i class="fas fa-eraser"></i></a>';

            })->rawColumns(['actions'])->make(true);

        return $bookingDataTable;




    }
}
