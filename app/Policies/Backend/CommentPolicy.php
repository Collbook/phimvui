<?php

namespace App\Policies\Backend;

use App\Models\Admin;
use App\Models\Comment;
use Illuminate\Auth\Access\HandlesAuthorization;

class CommentPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the Admin can view the comment.
     *
     * @param  \App\Models\Admin  $admin
     * @param  \App\Models\Comment  $comment
     * @return mixed
     */
    public function view(Admin $admin, Comment $comment)
    {
        foreach ($admin->roles as $role) {
            if ($role->slug == 'quan-ly-binh-luan') {
                return true;
            }
        }
    }

    /**
     * Determine whether the Admin can create comments.
     *
     * @param  \App\Models\Admin  $admin
     * @return mixed
     */
    public function create(Admin $admin)
    {
        //
    }

    /**
     * Determine whether the Admin can update the comment.
     *
     * @param  \App\Models\Admin  $admin
     * @param  \App\Models\Comment  $comment
     * @return mixed
     */
    public function update(Admin $admin, Comment $comment)
    {
        foreach ($admin->roles as $role) {
            if ($role->slug == 'quan-ly-binh-luan') {
                return true;
            }
        }
    }

    /**
     * Determine whether the Admin can delete the comment.
     *
     * @param  \App\Models\Admin  $admin
     * @param  \App\Models\Comment  $comment
     * @return mixed
     */
    public function delete(Admin $admin, Comment $comment)
    {
        foreach ($admin->roles as $role) {
            if ($role->slug == 'quan-ly-binh-luan') {
                return true;
            }
        }
    }

    public function index(Admin $admin)
    {
        // return false;
        foreach ($admin->roles as $role) {
            if ($role->slug == 'quan-ly-binh-luan') {
                return true;
            }
        }
    }

}
