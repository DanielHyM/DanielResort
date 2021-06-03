<?php

namespace App\Http\Controllers;

use App\Booking;
use App\Housing;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StatisticsController extends Controller
{
    /**
     * Display the charts in statistics view.
     * This function get all the bookings and iterates one by one taking the number of bookings per month
     * and calculating the profit per each booking, then sends the information to booking_statistics view and draws the charts.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        //
        $bookingsByMonth = DB::table('bookings')->whereNull('deleted_at')->get();
        $arrMonthCount = [
            'Jan' => 0,
            'Feb' => 0,
            'Mar' => 0,
            'Apr' => 0,
            'May' => 0,
            'Jun' => 0,
            'Jul' => 0,
            'Aug' => 0,
            'Sep' => 0,
            'Oct' => 0,
            'Nov' => 0,
            'Dec' => 0,
        ];

        $arrMonthProfit = [
            'Jan' => 0,
            'Feb' => 0,
            'Mar' => 0,
            'Apr' => 0,
            'May' => 0,
            'Jun' => 0,
            'Jul' => 0,
            'Aug' => 0,
            'Sep' => 0,
            'Oct' => 0,
            'Nov' => 0,
            'Dec' => 0,
        ];


        foreach ($bookingsByMonth as $item){
            $item->check_in_date = str_replace('-','/',$item->check_in_date);
            $month =  Carbon::createFromFormat('Y/m/d',  $item->check_in_date)->format('M');

            foreach ($arrMonthCount as $arrMonthItem => $value){
                if($arrMonthItem == $month){
                    $arrMonthCount[$arrMonthItem]++;
                }
            }

            foreach ($arrMonthProfit as $arrMonthProfitItem => $value){
                $housing = Housing::where('id','=', $item->housing_id)->first();
                $price = $housing->price_per_night;
                $days = Carbon::parse($item->check_in_date)->diffInDays(Carbon::parse($item->check_out_date));

                if($arrMonthProfitItem == $month){
                    $arrMonthProfit[$arrMonthProfitItem]+= $price * $days;
                }
            }
        }

        return view('statistics.booking_statistics' ,compact('arrMonthCount', 'arrMonthProfit'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
