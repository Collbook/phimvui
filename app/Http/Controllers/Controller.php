<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

use Auth;
use App\Models\Category;
use App\Models\Country;
use App\Models\Film;
use App\Models\Customer;

class Controller extends BaseController
{
    use DispatchesJobs, ValidatesRequests;
    public function __construct (){
        $this->data['categorys']=Category::select('id','name','slug')->get();
        $this->data['countries']=Country::select('id','name','slug')->get();
        //$this->data['customers']=Customer::select('id')->get();
        $this->data['years']=Film::select('published_year')->distinct()->orderBy('published_year')->get();

    }
    use AuthorizesRequests {
        authorize as protected baseAuthorize;
    }

    public function authorize($ability, $arguments = [])
    {
        if (Auth::guard('admin')->check()) {
            Auth::shouldUse('admin');
        }
        $this->baseAuthorize($ability, $arguments);
    }
}
