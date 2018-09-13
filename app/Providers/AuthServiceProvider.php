<?php

namespace App\Providers;

use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use App\Policies\Backend\ActorPolicy;
use App\Policies\Backend\AdminPolicy;
use App\Policies\Backend\FilmPolicy;
use App\Policies\Backend\CommentPolicy;
use App\Policies\Backend\RolePolicy;
use App\Policies\Backend\CategoryPolicy;
use App\Policies\Backend\LinkFilmPolicy;
use App\Policies\Backend\TagPolicy;
use App\Policies\Backend\CountryPolicy;
use App\Policies\Backend\LanguagePolicy;
use App\Policies\Backend\DirectorPolicy;
use App\Policies\Backend\CustomerPolicy;
use App\Models\Actor;
use App\Models\Admin;
use App\Models\Film;
use App\Models\Comment;
use App\Models\Role;
use App\Models\Category;
use App\Models\LinkFilm;
use App\Models\Tag;
use App\Models\Country;
use App\Models\Language;
use App\Models\Director;
use App\Models\Customer;
use Auth;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        'App\Model' => 'App\Policies\ModelPolicy',
        'App\Models\Actor' => 'App\Policies\Backend\ActorPolicy',
        'App\Models\Admin' => 'App\Policies\Backend\AdminPolicy',
        'App\Models\Film' => 'App\Policies\Backend\FilmPolicy',
        'App\Models\Comment' => 'App\Policies\Backend\CommentPolicy',
        'App\Models\Role' => 'App\Policies\Backend\RolePolicy',
        'App\Models\Category' => 'App\Policies\Backend\CategoryPolicy',
        'App\Models\LinkFilm' => 'App\Policies\Backend\LinkFilmPolicy',
        'App\Models\Tag' => 'App\Policies\Backend\TagPolicy',
        'App\Models\Country' => 'App\Policies\Backend\CountryPolicy',
        'App\Models\Language' => 'App\Policies\Backend\LanguagePolicy',
        'App\Models\Director' => 'App\Policies\Backend\DirectorPolicy',
        'App\Models\Customer' => 'App\Policies\Backend\CustomerPolicy',
    ];
    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        $admin = Auth::guard('admin')->user();

        // Them phim moi
        Gate::define('them-phim-moi', function (Admin $admin) {
            foreach (Auth::guard('admin')->user()->roles as $role) {
                if ($role->slug === 'them-phim-moi') {
                    return true;
                }
            }
        });

        // Sua phim
        Gate::define('sua-phim', function (Admin $admin) {
            foreach (Auth::guard('admin')->user()->roles as $role) {
                if ($role->slug === 'sua-phim') {
                    return true;
                }
            }
        });

        // Xoa phim
        Gate::define('xoa-phim', function (Admin $admin) {
            foreach (Auth::guard('admin')->user()->roles as $role) {
                if ($role->slug === 'xoa-phim') {
                    return true;
                }
            }
        });

        // Xem thong tin phim
        Gate::define('xem-thong-tin-phim', function (Admin $admin) {
            foreach (Auth::guard('admin')->user()->roles as $role) {
                if ($role->slug === 'xem-thong-tin-phim') {
                    return true;
                }
            }
        });

        // Quan ly thanh vien quan tri
        Gate::define('quan-ly-thanh-vien-quan-tri', function (Admin $admin) {
            foreach (Auth::guard('admin')->user()->roles as $role) {
                if ($role->slug === 'quan-ly-thanh-vien-quan-tri') {
                    return true;
                }
            }
        });

        // Quản lý khách đăng nhập
        Gate::define('quan-ly-khach-dang-nhap', function (Admin $admin) {
            foreach (Auth::guard('admin')->user()->roles as $role) {
                if ($role->slug === 'quan-ly-khach-dang-nhap') {
                    return true;
                }
            }
        });

        // Quản lý bình luận
        Gate::define('quan-ly-binh-luan', function (Admin $admin) {
            foreach (Auth::guard('admin')->user()->roles as $role) {
                if ($role->slug === 'quan-ly-binh-luan') {
                    return true;
                }
            }
        });

        // Duyệt phim
        Gate::define('duyet-phim', function (Admin $admin) {
            foreach (Auth::guard('admin')->user()->roles as $role) {
                if ($role->slug === 'duyet-phim') {
                    return true;
                }
            }
        });

        // Quản lý danh mục phim
        Gate::define('quan-ly-danh-muc-phim', function (Admin $admin) {
            foreach (Auth::guard('admin')->user()->roles as $role) {
                if ($role->slug === 'quan-ly-danh-muc-phim') {
                    return true;
                }
            }
        });

        // Quản lý phân quyền quản trị
        Gate::define('quan-ly-phan-quyen-quan-tri', function (Admin $admin) {
            foreach (Auth::guard('admin')->user()->roles as $role) {
                if ($role->slug === 'quan-ly-phan-quyen-quan-tri') {
                    return true;
                }
            }
        });

        // Quản lý các danh mục khác
        Gate::define('quan-ly-cac-danh-muc-khac', function (Admin $admin) {
            foreach (Auth::guard('admin')->user()->roles as $role) {
                if ($role->slug === 'quan-ly-cac-danh-muc-khac') {
                    return true;
                }
            }
        });

        // Xac thực tài khoản thành viên quản trị
        Gate::define('xac-thuc-tai-khoan', function (Admin $admin) {
            if(Auth::guard('admin')->user()->level == 0 && Auth::guard('admin')->user()->active == 0)
            {
                return true;
            }
        });
    }
}
