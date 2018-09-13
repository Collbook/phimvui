<?php

namespace App\Policies\Backend;

use App\Models\Admin;
use App\Models\Country;
use Illuminate\Auth\Access\HandlesAuthorization;
use Auth;

class CountryPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the country.
     *
     * @param  \App\Models\Admin $admin
     * @param  \App\Models\Country  $country
     * @return mixed
     */
    public function view( Admin $admin, Country $country)
    {
        foreach (Auth::guard('admin')->user()->roles as $role) {
            if ($role->slug === 'quan-ly-cac-danh-muc-khac') {
                return true;
            }
        }
    }

    /**
     * Determine whether the user can create countries.
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
     * Determine whether the user can update the country.
     *
     * @param  \App\Models\Admin $admin
     * @param  \App\Models\Country  $country
     * @return mixed
     */
    public function update( Admin $admin, Country $country)
    {
        // return false;
        foreach (Auth::guard('admin')->user()->roles as $role) {
            if ($role->slug === 'quan-ly-cac-danh-muc-khac') {
                return true;
            }
        }
    }

    /**
     * Determine whether the user can delete the country.
     *
     * @param  \App\Models\Admin $admin
     * @param  \App\Models\Country  $country
     * @return mixed
     */
    public function delete( Admin $admin, Country $country)
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
