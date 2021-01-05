<?php

namespace App\Http\Controllers;

use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Spatie\Permission\Models\Role;
use Yajra\DataTables\DataTables;
use Throwable;
class AdminUserManagementController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.users.list_users');

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = Role::all();
        return view('admin.users.create', compact('roles'));
    }



    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $userData = $request->all();
        $userData+= ['user' => 'test'];
        bcrypt($userData['password']);
        $user = User::create($userData);

        $userRol = Role::findOrFail($request->rol);
        $user->assignRole($userRol->name);



        return redirect(route('users.index'));



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


    public function listUsers(Request  $request)
    {
        $userData = User::all();

       $dataTableUsers = DataTables::of($userData)->addColumn('rol', function($user){

           if(is_null($user->roles->first())){
               return '';
           }else {
               return $user->roles->first()->name;

           }

        })->addColumn('actions',function($user){

            return '<a  class="btn btn-success" href='. route('users.edit', $user->id) . '><i class="fas fa-pencil-alt"></i></a>'
                    .'<a  class="btn btn-danger btnDeleteUser" href='. route('users.destroy', $user) . '><i class="fas fa-eraser"></i></a>';

       })->editColumn('created_at',function ($user){

           return Carbon::parse($user->created_at)->format('d/m/Y h:i:s');

       })->rawColumns(['actions'])->make(true);

       return $dataTableUsers;

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        $roles = Role::all();
        return view('admin.users.update', compact('user','roles'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $user->name = $request->name;
        $user->dni = $request->dni;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);

        $user->save();

        $userRol = Role::findOrFail($request->rol);
        $user->syncRoles([$userRol->name]);

        return redirect(route('users.index'));

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy(User $user)
    {
        try{
            $user->delete();

            return response()->json([

            ],200);

        }catch(Throwable $ex){
            Log::error($ex);
            return response()->json([

            ],500);
        }
    }
}
