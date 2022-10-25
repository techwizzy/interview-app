<?php

namespace App\Http\Controllers;

use App\Models\User;
use Spatie\Permission\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;


class UserController extends Controller
{

     public function __construct()
     {
       $this->authorizeResource(User::class, 'user');
     }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $users = User::withTrashed()->with('roles')->get();

        return view('auth.users.index', ['users' => $users]);

    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       $roles = Role::all()->pluck('name');
       return view('auth.users.create', [
        'roles'=> $roles
       ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreUserRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $input = $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|same:confirm-password',
            'roles' => 'required',
        ]);

        $input = $request->all();

        $input['password'] = Hash::make($input['password']);

        $user = User::create($input);
        $user->assignRole($request->input('roles'));

        return redirect()->route('access.users.index')->with('success','User created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {

        $userRoles = $user->getRoleNames();
        $roles = Role::all()->pluck('name');

        return view(
            'auth.users.edit',
            ['roles' => $roles,
             'user' => $user,
             'userRoles' => $userRoles
             ]
        );
    }



    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateUserRequest  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update( Request $request, User $user)
    {

        $inputData = $request->all();

        //check if password is set
        if (!empty($inputData['password'])) {
            $inputData['password'] = Hash ::make($inputData['password']);
        }else {

            $inputData = Arr::except($inputData, array('password'));
        }


        $user->update($inputData);

         DB::table('model_has_roles')->where('model_id',$user->id)->delete();

        $user->assignRole($request->input('roles'));
        return redirect('access/users')->with('success', 'User Profile updated successfully!');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function deleteUser(Request $request)
    {

       $user = $request->input('id');
       if(User::where('id', $user)->delete()){
        return redirect('access/users')->with('success', 'User Profile deactivated successfully!');
       }
    }

    public function destroy(User $user)
    {
       $user->delete();
        return redirect('access/users')->with('success', 'User Profile deactivated successfully!');
    }

    public function restore(Request $request)
    {
       $user = User::where('id', $request->id);

       $user->restore();
        return redirect('access/users')->with('success', 'User Profile  activated successfully!');
    }
}
