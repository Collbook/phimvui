<?php

namespace App\Http\Controllers\Backend;

use App\Models\Role;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Auth;
use Illuminate\Support\Facades\Hash;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->authorize('index', Role::class);
        $roles = Role::all();

        return view('admin.roles.list', compact('roles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->authorize('create', Role::class);
        return view('admin.roles.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->authorize('index', Role::class);
        $role              = new Role;
        $role->name        = $request->name;
        $role->slug        = str_slug($request->name);
        $role->description = $request->description;
        $role->created_at  = Carbon::now();
        $role->updated_at  = Carbon::now();
        $role->save();

        $roles = Role::all();
        return view('admin.roles.list-role', ['roles' => $roles]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function show(Role $role)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function edit(Role $role, $id)
    {
        $role = Role::findOrFail($id);
        $this->authorize('update', $role);
        return view('admin.roles.edit', compact('role'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Role $role, $id)
    {
        // return $id;
        $role = Role::findOrFail($id);
        $this->authorize('update', $role);

        $role->name        = $request->name;
        $role->description = $request->description;
        $role->slug        = str_slug($request->name);
        
        $role->save();
        
        $roles = Role::all();

        return view('admin.roles.list-role', ['roles' => $roles]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Role $role, $id)
    {
        $role = Role::findOrFail($id);
        $this->authorize('delete', $role);

        $password = $request->password;
        $admin    = Auth::guard('admin')->user();

        if (Hash::check($password, $admin->password)) {
            $role->delete();

            $roles = Role::all();

            return view('admin.roles.list-role', ['roles' => $roles]);
        } else {
            return 0;
        }
    }
}
