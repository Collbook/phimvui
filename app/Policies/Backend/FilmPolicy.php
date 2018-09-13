<?php

namespace App\Policies\Backend;

use App\Models\Admin;
use App\Models\Film;
use Illuminate\Auth\Access\HandlesAuthorization;
use Auth;

class FilmPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the Admin can view the film.
     *
     * @param  \App\Models\Admin  $admin
     * @param  \App\Models\Film  $film
     * @return mixed
     */
    public function view(Admin $admin, Film $film)
    {
        // dd($film->admin_id, $admin->id);
        // return true;
        foreach ($admin->roles as $role) {
            if ($admin->id === $film->admin_id OR $role->slug == 'xem-thong-tin-phim') {
                return true;
            }
        }
    }

    /**
     * Determine whether the Admin can create films.
     *
     * @param  \App\Models\Admin  $admin
     * @return mixed
     */
    public function create(Admin $admin)
    {
        foreach (Auth::guard('admin')->user()->roles as $role) {
            if ($role->slug === 'them-phim-moi') {
                return true;
            }
        }
    }

    /**
     * Determine whether the Admin can update the film.
     *
     * @param  \App\Models\Admin  $admin
     * @param  \App\Models\Film  $film
     * @return mixed
     */
    public function update(Admin $admin, Film $film)
    {
        return $admin->id === $film->admin_id;
    }

    /**
     * Determine whether the Admin can delete the film.
     *
     * @param  \App\Models\Admin  $admin
     * @param  \App\Models\Film  $film
     * @return mixed
     */
    public function delete(Admin $admin, Film $film)
    {
        foreach (Auth::guard('admin')->user()->roles as $role) {
            if ($role->slug === 'xoa-phim') {
                return true;
            }
        }
    }

    public function index(Admin $admin)
    {
        foreach (Auth::guard('admin')->user()->roles as $role) {
            if ($role->slug === 'them-phim-moi') {
                return true;
            }
        }
    }
}
