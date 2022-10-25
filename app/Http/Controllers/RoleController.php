<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

use Spatie\Activitylog\Traits\LogsActivity;

class RoleController extends Controller
{
    public $user;
    public function __construct()
    {
       $this->authorizeResource(Role::class, 'role');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $roles = Role::all();
        $permissions = Permission::all();
        return view('auth.roles.index',
        ['roles' => $roles, 'permissions'=> $permissions]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

         $permissions = Permission::all();
         return view('auth.roles.create',
         ['permissions'=>$permissions]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|unique:roles,name',
            'permission' => 'required',
        ]);

        $role = Role::create(['name' => $request->get('name')]);
        $role->syncPermissions($request->get('permission'));
        activity()->log('new role created')
                    ->causedBy(Auth::user()->id)
                    ->performedOn(new Role)
                    ->log('created');
        return redirect()->route('access.roles.index')
                        ->with('success','Role created successfully');
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
        $role = Role::find($id);
        $rolePermissions = $role->permissions->pluck('name')->toArray();
        $permissions = Permission::all();

        return view('auth.roles.edit',
        [
            'permissions'=>$permissions,
            'rolePermissions' => $rolePermissions,
            'role'=>$role
        ]);
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
        $this->validate($request, [
            'name' => 'required',
            'permission' => 'required',
        ]);
        $role = Role::find($id);
        $role->update($request->only('name'));

        $role->syncPermissions($request->get('permission'));
        activity()
        ->causedBy(Auth::user())
        ->performedOn($role)
        ->useLog('Role Management')
        ->log('Role '.$role->name.' updated');
        return redirect()->route('access.roles.index')
                        ->with('success','Role updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if(Role::find($id)->destroy()){
            return redirect()->route('access.roles.index')
            ->with('success','Role deleted successfully');
        }
    }
}
