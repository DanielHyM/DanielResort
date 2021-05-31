<?php

namespace App\Http\Controllers;

use App\Booking;
use App\Housing;
use App\Services\HousingService;
use Carbon\Carbon;
use Carbon\Traits\Date;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Mockery\Exception;
use Spatie\Period\Period;
use Yajra\DataTables\DataTables;
use function Symfony\Component\Translation\t;

class AdminHousingManagementController extends Controller
{
    protected $housingService;
    public function __construct(HousingService $housingService)
    {
        $this->housingService = $housingService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.housings.list_housings');

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.housings.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {


        $housingsData = $request;
        $housing = Housing::create($housingsData->all());

        $housing
            ->addMediaFromRequest('image')
            ->toMediaCollection('housingImages');


        return redirect(route('housings.index'));

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
    public function edit(Housing $housing)
    {

        return view('admin.housings.update', compact('housing'));


    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Housing $housing)
    {
        $housing->floor = $request->floor;
        $housing->room_number = $request->room_number;
        $housing->description = $request->description;
        $housing->price_per_night = $request->price_per_night;

        if($request['image'] != null) {
            $housing
                ->addMediaFromRequest('image')
                ->toMediaCollection('housingImages');
        }

        $housing->save();

        return redirect(route('housings.index'));


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy(Housing $housing)
    {
        try{

            $housing->delete();
            return response()->json([
            ],200);

        }catch(Throwable $ex){
            Log::error($ex);
            return response()->json([

            ],500);
        }
    }


    /**
     * Returns the first avaiable date from a housing
     * @param $housingId
     * @return string
     */
    public function calcAvaiability($housingId)
    {

        $today = Carbon::now()->format('Y-m-d');
        $tomorrow = Carbon::now()->addDays(1)->format('Y-m-d');
        $bookings = Booking::where('housing_id',$housingId)->where('check_out_date','>=',$tomorrow)->orderBy('check_in_date', 'DESC')->get();

        if(count($bookings) > 0) {
            $bookingLastCheckOut = $bookings->first()->check_out_date;
            $fullPeriod = Period::make($tomorrow, $bookingLastCheckOut);
            $arrPeriods = [];


            foreach ($bookings as $booking) {
                $bookingPeriod = Period::make($booking->check_in_date, $booking->check_out_date);
                $arrPeriods[] = $bookingPeriod;
                $lastBooking = $booking;

            }


            $dateResults = $fullPeriod->diff(...$arrPeriods);


            if ($dateResults->count() == 0) {
                $date = Carbon::createFromFormat('Y-m-d', $lastBooking->check_out_date)->addDay();
            } else {
                $date = $dateResults[0]->getStart();
            }

            return Carbon::parse($date)->format('d-m-Y');
        }else{
            return '';
        }
    }


    /**
     * Shows the housings datatable to the admin panel
     * @param Request $request
     * @return mixed
     * @throws \Exception
     */
    public function listHousings(Request $request)
    {
        $housingsData = Housing::all();
        $bookingsData = Booking::all();

        $housingDataTables =
            DataTables::of($housingsData)
                ->addColumn('actions', function ($housing){

                    return '<a  class="btn btn-success" href='. route('housings.edit', $housing->id) . '><i class="fas fa-pencil-alt"></i></a>'
                             .'<a  class="btn btn-danger btnDeleteHousing" href='. route('housings.destroy', $housing) . '><i class="fas fa-eraser"></i></a>';

                })->addColumn('available', function ($housing){

                    $bookings = Booking::where('housing_id',$housing->id)->get();
                    $today = Carbon::now()->format('Y-m-d');

                    if($this->calcAvaiability($housing->id) != null){
                        return '<label> No Disponible</label>';
                    }else{
                        return '<label> Disponible</label>';
                    }


                })->addColumn('available_date', function ($housing){


                    $tomorrow = Carbon::now()->addDays(1)->format('Y-m-d');
                    $tomorrowFormatted = Carbon::parse($tomorrow)->format('d-m-Y');
                    $date = $this->calcAvaiability($housing->id);

                    if($this->calcAvaiability($housing->id) != null){

                          return "<label> Disponible el dia " .$date ." </label>";
                    }else{
                        return '<label> Disponibilidad Inmediata</label>';
                    }

                })->editColumn('created_at', function ($housing){

                    return Carbon::parse($housing->created_at)->format('d/m/Y h:i:s');

                })->rawColumns(['actions','available','dateOfAvailable','image','available_date'])->make(true);




        return $housingDataTables;


    }





    public function checkHousingAvailability(Request $request){


        $housingId = $request->housingId;
        $checkInDate = $request->checkInDate;
        $checkOutDate = $request->checkOutDate;
        $checkInTime = $request->checkInTime;
        $checkOutTime = $request->checkOutTime;

        $availability = $this->housingService->checkHousingAvailability($housingId,$checkInDate,$checkOutDate,$checkInTime,$checkOutTime);
        return response()->json(['availability'=>$availability],200);
    }
}
