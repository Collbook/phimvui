<?php

namespace App\Policies\Backend;

use App\Models\Admin;
use App\Models\Actor;
use Illuminate\Auth\Access\HandlesAuthorization;
use Auth;

class ActorPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the actor.
     *
     * @param  \App\Models\Admin $admin
     * @param  \App\Models\Actor  $actor
     * @return mixed
     */
    public function view(Admin $admin, Actor $actor)
    {
        foreach (Auth::guard('admin')->user()->roles as $role) {
            if ($role->slug === 'quan-ly-cac-danh-muc-khac') {
                return true;
            }
        }
    }

    /**
     * Determine whether the user can create actors.
     *
     * @param  \App\Models\Admin $admin
     * @return mixed
     */
    public function create(Admin $admin)
    {
        foreach (Auth::guard('admin')->user()->roles as $role) {
            if ($role->slug === 'quan-ly-cac-danh-muc-khac') {
                return true;
            }
        }
    }

    /**
     * Determine whether the user can update the actor.
     *
     * @param  \App\Models\Admin $admin
     * @param  \App\Models\Actor  $actor
     * @return mixed
     */
    public function update(Admin $admin, Actor $actor)
    {
        foreach (Auth::guard('admin')->user()->roles as $role) {
            if ($role->slug === 'quan-ly-cac-danh-muc-khac') {
                return true;
            }
        }
    }

    /**
     * Determine whether the user can delete the actor.
     *
     * @param  \App\Models\Admin $admin
     * @param  \App\Models\Actor  $actor
     * @return mixed
     */
    public function delete(Admin $admin, Actor $actor)
    {
        foreach (Auth::guard('admin')->user()->roles as $role) {
            if ($role->slug === 'quan-ly-cac-danh-muc-khac') {
                return true;
            }
        }
    }

    public function index(Admin $admin)
    {
        // return false;
        foreach (Auth::guard('admin')->user()->roles as $role) {
            if ($role->slug === 'quan-ly-cac-danh-muc-khac') {
                return true;
            }
        }
    }
}
