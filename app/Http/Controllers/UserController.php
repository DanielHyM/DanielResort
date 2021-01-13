<?php

namespace App\Http\Controllers;

use App\Housing;
use Illuminate\Http\Request;

class UserController extends Controller
{

    public function index(){

        $housings = Housing::paginate(10);
        return view('user.housings.list_housings',compact('housings'));
    }





}
