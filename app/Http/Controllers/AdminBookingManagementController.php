<?php

namespace App\Http\Controllers;

use App\Booking;
use App\Housing;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use SebastianBergmann\Comparator\Book;

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
    public function store(Request $request)
    {
        $bookingData = $request->all();



        $bookingData['check_in_date'] = Carbon::parse($bookingData['check_in_date'])->format('Y-m-d');
        $bookingData['check_out_date'] = Carbon::parse($bookingData['check_out_date'])->format('Y-m-d');

        $bookingData['check_in_time'] = str_replace('AM','',$bookingData['check_in_time']);
        $bookingData['check_out_time'] = str_replace('AM','',$bookingData['check_out_time']);
        $bookingData['check_in_time'] = str_replace('PM','',$bookingData['check_in_time']);
        $bookingData['check_out_time'] = str_replace('PM','',$bookingData['check_out_time']);


        

        Booking::create($bookingData);
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
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
