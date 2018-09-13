<?php

namespace App\Policies\Backend;

// use App\User;
use App\Models\Admin;
use Illuminate\Auth\Access\HandlesAuthorization;
use Auth;

class AdminPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the Admin can view the admin.
     *
     * @param  \App\Models\Admin  $admin
     * @param  \App\Models\Admin  $admin
     * @return mixed
     */
    public function view(Admin $admin)
    {
        foreach (Auth::guard('admin')->user()->roles as $role) {
            if ($role->slug === 'quan-ly-thanh-vien-quan-tri') {
                return true;
            }
        }
    }

    /**
     * Determine whether the Admin can create admins.
     *
     * @param  \App\Models\Admin  $admin
     * @return mixed
     */
    public function create(Admin $admin)
    {
        foreach (Auth::guard('admin')->user()->roles as $role) {
            if ($role->slug === 'quan-ly-thanh-vien-quan-tri') {
                return true;
            }
        }
    }

    /**
     * Determine whether the Admin can update the admin.
     *
     * @param  \App\Models\Admin  $admin
     * @param  \App\Models\Admin  $admin
     * @return mixed
     */
    public function update(Admin $admin)
    {
        foreach (Auth::guard('admin')->user()->roles as $role) {
            if ($role->slug === 'quan-ly-thanh-vien-quan-tri') {
                return true;
            }
        }
    }

    /**
     * Determine whether the Admin can delete the admin.
     *
     * @param  \App\Models\Admin  $admin
     * @param  \App\Models\Admin  $admin
     * @return mixed
     */
    public function delete(Admin $admin)
    {
        foreach (Auth::guard('admin')->user()->roles as $role) {
            if ($role->slug === 'quan-ly-thanh-vien-quan-tri') {
                return true;
            }
        }
    }
}
