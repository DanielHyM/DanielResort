<?php

namespace App\Http\Controllers;

use App\Booking;
use App\Housing;
use App\Services\HousingService;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Mockery\Exception;
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

        $housing
            ->addMediaFromRequest('image')
            ->toMediaCollection('housingImages');


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

                    if($bookings->where('check_in_date',$today)->count() > 0){
                        return '<label> No Disponible</label>';
                    }else{
                        return '<label> Disponible</label>';
                    }


                })->addColumn('available_date', function ($housing){

                    $bookings = Booking::where('housing_id',$housing->id)->orderBy('check_in_date','DESC')->first();
                    $tomorrow = Carbon::now()->addDays(1)->format('Y-m-d');
                    $tomorrowFormatted = Carbon::parse($tomorrow)->format('d-m-Y');
                    if($bookings['check_in_date'] > $tomorrow){
                        return "<label> Disponible el dia  $tomorrowFormatted  </label>";
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
