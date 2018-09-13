<?php

namespace App\Policies\Backend;

use App\Models\Admin;
use App\Models\Role;
use Illuminate\Auth\Access\HandlesAuthorization;
use Auth;

class RolePolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the role.
     *
     * @param  \App\Models\Admin $admin
     * @param  \App\Models\Role  $role
     * @return mixed
     */
    public function view(Admin $admin, Role $role)
    {
        foreach (Auth::guard('admin')->user()->roles as $role) {
            if ($role->slug === 'quan-ly-phan-quyen-quan-tri') {
                return true;
            }
        }
    }

    /**
     * Determine whether the user can create roles.
     *
     * @param  \App\Models\Admin $admin
     * @return mixed
     */
    public function create(Admin $admin)
    {
        foreach (Auth::guard('admin')->user()->roles as $role) {
            if ($role->slug === 'quan-ly-phan-quyen-quan-tri') {
                return true;
            }
        }
    }

    /**
     * Determine whether the user can update the role.
     *
     * @param  \App\Models\Admin $admin
     * @param  \App\Models\Role  $role
     * @return mixed
     */
    public function update(Admin $admin, Role $role)
    {
        foreach (Auth::guard('admin')->user()->roles as $role) {
            if ($role->slug === 'quan-ly-phan-quyen-quan-tri') {
                return true;
            }
        }
    }

    /**
     * Determine whether the user can delete the role.
     *
     * @param  \App\Models\Admin $admin
     * @param  \App\Models\Role  $role
     * @return mixed
     */
    public function delete(Admin $admin, Role $role)
    {
        foreach (Auth::guard('admin')->user()->roles as $role) {
            if ($role->slug === 'quan-ly-phan-quyen-quan-tri') {
                return true;
            }
        }
    }

    public function index(Admin $admin)
    {
        foreach (Auth::guard('admin')->user()->roles as $role) {
            if ($role->slug === 'quan-ly-phan-quyen-quan-tri') {
                return true;
            }
        }
    }
}
