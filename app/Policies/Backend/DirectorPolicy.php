<?php

namespace App\Policies\Backend;

use App\Models\Admin;
use App\Models\Director;
use Illuminate\Auth\Access\HandlesAuthorization;
use Auth;

class DirectorPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the director.
     *
     * @param  \App\Models\Admin $admin
     * @param  \App\Models\Director  $director
     * @return mixed
     */
    public function view( Admin $admin, Director $director)
    {
        foreach (Auth::guard('admin')->user()->roles as $role) {
            if ($role->slug === 'quan-ly-cac-danh-muc-khac') {
                return true;
            }
        }
    }

    /**
     * Determine whether the user can create directors.
     *
     * @param  \App\Models\Admin $admin
     * @return mixed
     */
    public function create( Admin $admin)
    {
        foreach (Auth::guard('admin')->user()->roles as $role) {
            if ($role->slug === 'quan-ly-cac-danh-muc-khac') {
                return true;
            }
        }
    }

    /**
     * Determine whether the user can update the director.
     *
     * @param  \App\Models\Admin $admin
     * @param  \App\Models\Director  $director
     * @return mixed
     */
    public function update( Admin $admin, Director $director)
    {
        foreach (Auth::guard('admin')->user()->roles as $role) {
            if ($role->slug === 'quan-ly-cac-danh-muc-khac') {
                return true;
            }
        }
    }

    /**
     * Determine whether the user can delete the director.
     *
     * @param  \App\Models\Admin $admin
     * @param  \App\Models\Director  $director
     * @return mixed
     */
    public function delete( Admin $admin, Director $director)
    {
        foreach (Auth::guard('admin')->user()->roles as $role) {
            if ($role->slug === 'quan-ly-cac-danh-muc-khac') {
                return true;
            }
        }
    }

    public function index( Admin $admin)
    {
        foreach (Auth::guard('admin')->user()->roles as $role) {
            if ($role->slug === 'quan-ly-cac-danh-muc-khac') {
                return true;
            }
        }
    }
}
