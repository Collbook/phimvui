<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Customer;
use App\Models\Film;
use App\Models\Comment;
use Carbon\Carbon;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Tính lượt đăng ký trong ngày
        $today    = Carbon::today();
        $count_register = Customer::where('created_at', '>=', $today)->count();
        // echo $count_register;die();

        // Tính lượt phim post lên trong ngày
        $count_post_film = Film::where('status', 0)->count();

        // Tính lượt kháck truy cập
        $count_visited_day = (int)Film::all()->sum('view_count');

        // Tính lượt comments post mới
        $count_comment = Comment::where('status', 0)->count();

        // Vẽ đồ thị lượt bình luận
        $current_year = Carbon::now()->year;
        $year = 2018;

        for($i = 1; $i< 13; $i++){
            $count_comment_months[] = Comment::whereYear('created_at', '=', $year)
                                        ->whereMonth('created_at', '=', $i)
                                        ->count();
            $count_register_months[] = Customer::whereYear('created_at', '=', $year)
                                        ->whereMonth('created_at', '=', $i)
                                        ->count();
            $count_filmpost_months[] = Film::whereYear('created_at', '=', $year)
                                        ->whereMonth('created_at', '=', $i)
                                        ->count();
            $count_visited_months[] = (int)Film::whereYear('created_at', '=', $year)
                                        ->whereMonth('created_at', '=', $i)
                                        ->sum('view_count');                                                      
        }

        return view('admin.dashboard.index',   ['count_register' => $count_register,
                                                'count_post_film' => $count_post_film,
                                                'count_comment' => $count_comment,
                                                'count_visited_day' => $count_visited_day,
                                                'count_comment_months' => $count_comment_months,
                                                'count_register_months' => $count_register_months,
                                                'count_filmpost_months' => $count_filmpost_months,
                                                'count_visited_months' => $count_visited_months,
                                                'current_year' => $current_year,
                                            ]);
    }

    public function chart(Request $request)
    {
        // Vẽ đồ thị lượt bình luận
        $year = $request->current_year;

        for($i = 1; $i< 13; $i++){
            $count_comment_months[] = Comment::whereYear('created_at', '=', $year)
                                        ->whereMonth('created_at', '=', $i)
                                        ->count();
            $count_register_months[] = Customer::whereYear('created_at', '=', $year)
                                        ->whereMonth('created_at', '=', $i)
                                        ->count();
            $count_filmpost_months[] = Film::whereYear('created_at', '=', $year)
                                        ->whereMonth('created_at', '=', $i)
                                        ->count();
            $count_visited_months[] = (int)Film::whereYear('created_at', '=', $year)
                                        ->whereMonth('created_at', '=', $i)
                                        ->sum('view_count');                                                      
        }

        return view('admin.dashboard.change-chart-year',   ['count_comment_months' => $count_comment_months,
                                                'count_register_months' => $count_register_months,
                                                'count_filmpost_months' => $count_filmpost_months,
                                                'count_visited_months' => $count_visited_months,
                                                'year' => $year
                                            ]);
    }

    // List New Register
    public function newRegister()
    {
        $this->authorize('index', Customer::class);

        $today     = Carbon::today();
        $customers = Customer::where('created_at', '>=', $today)->get();

        return view('admin.dashboard.list_new_register', ['customers' => $customers]);
    }

    // List Visited
    public function visited()
    {
        $this->authorize('index', Film::class);

        $films = Film::orderBy('view_count', 'DESC')->get();

        return view('admin.dashboard.list_visited_film', ['films' => $films]);
    }

    // Ajax for list New Register when selected date
    public function newRegisterAjax(Request $request)
    {
        $days       = $request->date;

        switch ($days) {
            case 1:
                $start_date = Carbon::today();
                break;
            case 7:
                $start_date = Carbon::today()->subWeek();
                break;
            case 30:
                $start_date = Carbon::today()->subMonth();
                break;    
            default:
                $start_date = Carbon::today()->subYear();
                break;
        };

        $customers = Customer::where('created_at', '>=', $start_date)->get();
        
        return view('admin.customers.list-user', ['customers' => $customers]);
    }

    // List New Post Film
    public function newPostFilm()
    {
        $this->authorize('index', Film::class);
        $today    = Carbon::today();

        $films   = Film::where('status', 0)->get();

        return view('admin.dashboard.list_new_post_film', ['films' => $films]);
    }

    // Ajax for list New Post Film
    public function newPostFilmAjax(Request $request)
    {
        $days       = $request->date;

        switch ($days) {
            case 1:
                $start_date = Carbon::today();
                break;
            case 7:
                $start_date = Carbon::today()->subWeek();
                break;
            case 30:
                $start_date = Carbon::today()->subMonth();
                break;
            default:
                $start_date = Carbon::today()->subYear();
                break;
        };

        $films = Film::where('created_at', '>=', $start_date)->where('status', 0)->get();
        
        return view('admin.dashboard.table_post_film', ['films' => $films]);
    }


    

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
