<?php

namespace App\Policies\Backend;

use App\Models\Admin;
use App\Models\Customer;
use Illuminate\Auth\Access\HandlesAuthorization;
use Auth;

class CustomerPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the customer.
     *
     * @param  \App\Models\Admin $admin
     * @param  \App\Models\Customer  $customer
     * @return mixed
     */
    public function view(Admin $admin, Customer $customer)
    {
        foreach (Auth::guard('admin')->user()->roles as $role) {
            if ($role->slug === 'quan-ly-khach-dang-nhap') {
                return true;
            }
        }
    }

    /**
     * Determine whether the user can create customers.
     *
     * @param  \App\Models\Admin $admin
     * @return mixed
     */
    public function create(Admin $admin)
    {
        //
    }

    /**
     * Determine whether the user can update the customer.
     *
     * @param  \App\Models\Admin $admin
     * @param  \App\Models\Customer  $customer
     * @return mixed
     */
    public function update(Admin $admin, Customer $customer)
    {
        foreach (Auth::guard('admin')->user()->roles as $role) {
            if ($role->slug === 'quan-ly-khach-dang-nhap') {
                return true;
            }
        }
    }

    /**
     * Determine whether the user can delete the customer.
     *
     * @param  \App\Models\Admin $admin
     * @param  \App\Models\Customer  $customer
     * @return mixed
     */
    public function delete(Admin $admin, Customer $customer)
    {
        foreach (Auth::guard('admin')->user()->roles as $role) {
            if ($role->slug === 'quan-ly-khach-dang-nhap') {
                return true;
            }
        }
    }

    public function index(Admin $admin)
    {
        foreach (Auth::guard('admin')->user()->roles as $role) {
            if ($role->slug === 'quan-ly-khach-dang-nhap') {
                return true;
            }
        }
    }
}
