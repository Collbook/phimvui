<?php

namespace App\Policies\Backend;

use App\Models\Admin;
use App\Models\LinkFilm;
use Illuminate\Auth\Access\HandlesAuthorization;
use Auth;

class LinkFilmPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the linkFilm.
     *
     * @param  \App\Models\Admin $admin
     * @param  \App\Models\LinkFilm  $linkFilm
     * @return mixed
     */
    public function view(Admin $admin, LinkFilm $linkFilm)
    {
        foreach (Auth::guard('admin')->user()->roles as $role) {
            if ($role->slug === 'quan-ly-cac-danh-muc-khac') {
                return true;
            }
        }
    }

    /**
     * Determine whether the user can create linkFilms.
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
     * Determine whether the user can update the linkFilm.
     *
     * @param  \App\Models\Admin $admin
     * @param  \App\Models\LinkFilm  $linkFilm
     * @return mixed
     */
    public function update(Admin $admin, LinkFilm $linkFilm)
    {
        foreach (Auth::guard('admin')->user()->roles as $role) {
            if ($role->slug === 'quan-ly-cac-danh-muc-khac') {
                return true;
            }
        }
    }

    /**
     * Determine whether the user can delete the linkFilm.
     *
     * @param  \App\Models\Admin $admin
     * @param  \App\Models\LinkFilm  $linkFilm
     * @return mixed
     */
    public function delete(Admin $admin, LinkFilm $linkFilm)
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
