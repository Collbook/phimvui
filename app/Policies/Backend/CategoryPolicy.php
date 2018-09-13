<?php

namespace App\Policies\Backend;

use App\Models\Admin;
use App\Models\Category;
use Illuminate\Auth\Access\HandlesAuthorization;
use Auth;

class CategoryPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the category.
     *
     * @param  \App\Models\Admin $admin
     * @param  \App\Models\Category  $category
     * @return mixed
     */
    public function view(Admin $admin, Category $category)
    {
        foreach (Auth::guard('admin')->user()->roles as $role) {
            if ($role->slug === 'quan-ly-danh-muc-phim') {
                return true;
            }
        }
    }

    /**
     * Determine whether the user can create categories.
     *
     * @param  \App\Models\Admin $admin
     * @return mixed
     */
    public function create(Admin $admin)
    {
        foreach (Auth::guard('admin')->user()->roles as $role) {
            if ($role->slug === 'quan-ly-danh-muc-phim') {
                return true;
            }
        }
    }

    /**
     * Determine whether the user can update the category.
     *
     * @param  \App\Models\Admin $admin
     * @param  \App\Models\Category  $category
     * @return mixed
     */
    public function update(Admin $admin, Category $category)
    {
        foreach (Auth::guard('admin')->user()->roles as $role) {
            if ($role->slug === 'quan-ly-danh-muc-phim') {
                return true;
            }
        }
    }

    /**
     * Determine whether the user can delete the category.
     *
     * @param  \App\Models\Admin $admin
     * @param  \App\Models\Category  $category
     * @return mixed
     */
    public function delete(Admin $admin, Category $category)
    {
        foreach (Auth::guard('admin')->user()->roles as $role) {
            if ($role->slug === 'quan-ly-danh-muc-phim') {
                return true;
            }
        }
    }

    public function index(Admin $admin)
    {
        foreach (Auth::guard('admin')->user()->roles as $role) {
            if ($role->slug === 'quan-ly-danh-muc-phim') {
                return true;
            }
        }
    }
}
