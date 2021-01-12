<?php

namespace App\Http\Controllers;

use App\Housing;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Yajra\DataTables\DataTables;

class AdminHousingManagementController extends Controller
{
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
        Housing::create($housingsData->all());

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


    public function listHousings(Request $request)
    {
        $housingsData = Housing::all();

        $housingDataTables =
            DataTables::of($housingsData)
                ->addColumn('actions', function ($housing){

                    return '<a  class="btn btn-success" href='. route('housings.edit', $housing->id) . '><i class="fas fa-pencil-alt"></i></a>'
                             .'<a  class="btn btn-danger btnDeleteHousing" href='. route('housings.destroy', $housing) . '><i class="fas fa-eraser"></i></a>';

                })->editColumn('created_at', function ($housing){

                    return Carbon::parse($housing->created_at)->format('d/m/Y h:i:s');

                })->rawColumns(['actions'])->make(true);




        return $housingDataTables;


    }
}
