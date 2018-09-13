<?php

namespace App\Policies\Backend;

use App\Models\Admin;
use App\Models\Tag;
use Illuminate\Auth\Access\HandlesAuthorization;
use Auth;

class TagPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the tag.
     *
     * @param  \App\Models\Admin $admin
     * @param  \App\Models\Tag  $tag
     * @return mixed
     */
    public function view(Admin $admin, Tag $tag)
    {
        foreach (Auth::guard('admin')->user()->roles as $role) {
            if ($role->slug === 'quan-ly-cac-danh-muc-khac') {
                return true;
            }
        }
    }

    /**
     * Determine whether the user can create tags.
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
     * Determine whether the user can update the tag.
     *
     * @param  \App\Models\Admin $admin
     * @param  \App\Models\Tag  $tag
     * @return mixed
     */
    public function update(Admin $admin, Tag $tag)
    {
        foreach (Auth::guard('admin')->user()->roles as $role) {
            if ($role->slug === 'quan-ly-cac-danh-muc-khac') {
                return true;
            }
        }
    }

    /**
     * Determine whether the user can delete the tag.
     *
     * @param  \App\Models\Admin $admin
     * @param  \App\Models\Tag  $tag
     * @return mixed
     */
    public function delete(Admin $admin, Tag $tag)
    {
        foreach (Auth::guard('admin')->user()->roles as $role) {
            if ($role->slug === 'quan-ly-cac-danh-muc-khac') {
                return true;
            }
        }
    }

    public function index(Admin $admin)
    {
        foreach (Auth::guard('admin')->user()->roles as $role) {
            if ($role->slug === 'quan-ly-cac-danh-muc-khac') {
                return true;
            }
        }
    }
}
