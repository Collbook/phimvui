<?php

namespace App\Policies\Backend;

use App\Models\Admin;
use App\Models\Language;
use Illuminate\Auth\Access\HandlesAuthorization;
use Auth;

class LanguagePolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the language.
     *
     * @param  \App\Models\Admin $admin
     * @param  \App\Models\Language  $language
     * @return mixed
     */
    public function view(Admin $admin, Language $language)
    {
        foreach (Auth::guard('admin')->user()->roles as $role) {
            if ($role->slug === 'quan-ly-cac-danh-muc-khac') {
                return true;
            }
        }
    }

    /**
     * Determine whether the user can create languages.
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
     * Determine whether the user can update the language.
     *
     * @param  \App\Models\Admin $admin
     * @param  \App\Models\Language  $language
     * @return mixed
     */
    public function update(Admin $admin, Language $language)
    {
        foreach (Auth::guard('admin')->user()->roles as $role) {
            if ($role->slug === 'quan-ly-cac-danh-muc-khac') {
                return true;
            }
        }
    }

    /**
     * Determine whether the user can delete the language.
     *
     * @param  \App\Models\Admin $admin
     * @param  \App\Models\Language  $language
     * @return mixed
     */
    public function delete(Admin $admin, Language $language)
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
