<?php

namespace App\Http\Controllers\Backend;

use App\Models\Actor;
use App\Models\Country;
use Illuminate\Support\Facades\DB;
use App\Models\Film;
use App\Models\Language;
use App\Models\Tag;
use Auth;
use Intervention\Image\Facades\Image;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Carbon\Carbon;

class FilmController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $data['films'] = Film::all();
        return view("admin.films.list", $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->authorize('create', Film::class);

        $data['tags'] = Tag::all();
        $data['films'] = Film::all();
        $data['languages'] = Language::all();
        $data['categories'] = Category::all();
        $data['countries'] =Country::all();
        $data['actor']=Actor::all();
//        dd($data['actor']->toArray());exit();
//        dd( $data['categories']->toArray());exit();
//        $data['languages'] =Language::pluck('language','id')->all();
//        dd($data['categories']->toArray());exit();
        return view("admin.films.add", $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
//        dd($request->txthot);exit();
       // dd($request->lang);exit();
        $this->authorize('create', Film::class);
//        dd($request->input('tags'));exit();
//        dd($request->input('lang'));exit();
//        dd($languages = Language::pluck('language', 'id')->all());exit();
//        dd($request->resolution);exit();
        $valid = Validator::make($request->all(), [
            'title_vn' => 'required',
            'title_en' => 'required',
            'description' => 'required',
            'published_year' => 'required',
            // 'date_theater' => 'required',
            'resolution' => 'required',
            'img_thumbnail' => 'image|max:2048',
            'img_background' => 'image|max:2048',
            'company_production' => 'required',
            'time'=>'required',
        ], [
            'title_vn.required' => 'Vui lòng nhập tiêu đề tiếng việt!',
            'title_en.required' => 'Vui lòng nhập tiêu đề tiếng anh!',
            'description.required' => 'vui lòng nhập mô tả!',
            'published_year.required' => 'Vui lòng nhập năm xuất bản!',
            // 'date_theater.required' => 'Vui lòng nhập ngày chiếu Rạp!',
            'resolution.required' => 'vui lòng nhập độ phân giải!',
            'time.required'=>'vui lòng nhập thời lượng phim',
            //Image
            'img_thumbnail.image' => 'Sai Định Dạng',
            'img_thumbnail.max' => 'File Quá Kích Thước Cho Phép',
            'img_background.image' => 'Sai Định Dạng',
            'img_background.max' => 'File Quá Kích Thước Cho Phép',
//            'img_thumbnail.required'=>'Bạn chưa chọn ảnh đại điện!',
//            'img_background.required'=>'Bạn chưa chọn ảnh background!',
            'company_production.required' => 'Bạn chưa nhập nhà sản xuất'
        ]);
        if ($valid->fails()) {
            return redirect()->back()->withErrors($valid)->withInput();
        } else {
            $imagethumb = null;
            $imagebg = null;
            if ($request->hasFile('img_thumbnail')) {
                $imagethumb = $this->saveImage($request->file('img_thumbnail'));
            }
            if ($request->hasFile('img_background')) {
                $imagebg = $this->saveImage($request->file('img_background'));
            }
            $film                     = new Film();
            $film->parent_film_id     = $request->parentFilm;
            $film->title_vi           = $request->title_vn;
            $film->title_en           = $request->title_en;
            $film->slug               = $request->slug;
            $film->description        = $request->description;
            $film->company_production = $request->company_production;
            $film->view_count         = 0;
            $film->active_slide       = 0;
            $film->theater_status     = $request->theater_status;
            $film->total_episodes     = $request->total_episodes;
            $film->published_year     = $request->published_year;
            $film->film_hot           = $request->has('txthot');
            $film->film_cinema        = $request->has('txtrap');
            $film->quality            = $request->quality;
            $film->resolution         = $request->resolution;
            if ($request->resolution < "720") {
                $film->quality = "Trung Bình";
            } else {
                $film->quality = "HD";
            }
            $film->IMDb           = rand(5, 9);
            $film->status         = 0;
            $film->date_theater   = $request->date_theater;
            $film->film_type      = $request->txttype;
            $film->time           = $request->time;
            $film->img_thumbnail  = $imagethumb;
            $film->img_background = $imagebg;
            $film->admin_id       = Auth::guard('admin')->id();
            $film->save();
            if ($request->has('lang') && is_array($request->input('lang')) && count($request->input('lang')) > 0) {
                $film->languages()->sync($request->lang);
            }
            if ($request->has('actor') && is_array($request->input('actor')) && count($request->input('actor')) > 0) {
                $film->actors()->sync($request->actor);
            }
            if ($request->has('countries') && is_array($request->input('countries')) && count($request->input('countries')) > 0) {
                $film->countries()->sync($request->countries);
            }
            if ($request->has('categories') && is_array($request->input('categories')) && count($request->input('categories')) > 0) {
                $film->categories()->sync($request->categories);
            }
            if ($request->has('tags') && is_array($request->input('tags')) && count($request->input('tags')) > 0) {
                $tags = $request->input('tags');
                $tagsID = [];
                foreach ($tags as $tag) {
                    $tag = Tag::firstOrCreate([
                        'name' => $tag,
                        'slug' => str_slug($tag)
                    ], [
                        'name' => $tag,
                        'slug' => str_slug($tag)
                    ]);
                    $tagsID[] = $tag->id;
                }
                $film->tags()->sync($tagsID);
            }
            return redirect()->route('admin.phim.index')->with('mess', 'Nhập thành công!');
        }
    }

    public function saveImage($image)
    {
        if (!empty($image) && file_exists(public_path('assets/frontend/images'))) {
            $folderName = date('Y-m');
            $fileNameTime = md5($image->getClientOriginalName() . time());
            $fileName = $fileNameTime . '.' . $image->getClientOriginalExtension();
            $thumbName = $fileNameTime . '_thumb' . '.' . $image->getClientOriginalExtension();
            if (!file_exists(public_path('assets/frontend/images/' . $folderName))) {
                mkdir(public_path('assets/frontend/images/' . $folderName), 0755);
            }
            //chuyển vào folder uploads
            $imageName = "$folderName/$fileName";
            $image->move(public_path('assets/frontend/images/' . $folderName), $fileName);
            //tạo tỷ lệ hình ảnh
            $createImage = function ($suffix = '_thumb', $width = 250, $height = 170) use ($folderName, $fileNameTime, $image, $fileName) {
                $thumbName = $fileNameTime . $suffix . '.' . $image->getClientOriginalExtension();
                Image::make(public_path("assets/frontend/images/$folderName/$fileName"))
                    ->resize($width, $height)
                    ->save(public_path("assets/frontend/images/$folderName/$thumbName"))
                    ->destroy();
            };
//            $createImage();
            $createImage('_300x432 ', 300, 432);
            $createImage('_1270x512 ', 1270, 512);

            return $imageName;
        }
    }

    public function deleteImage($path)
    {
        if (!is_dir(public_path('assets/frontend/images/' . $path)) && file_exists(public_path('assets/frontend/images/' . $path))) {
            unlink(public_path('assets/frontend/images/' . $path));
            $deleteAllImage = function ($sizeAll) use ($path) {
                foreach ($sizeAll as $size) {
                    if (!is_dir(public_path('assets/frontend/images/' . get_thumbnail($path, $size))) && file_exists(public_path('assets/frontend/images/' . get_thumbnail($path, $size)))) {
                        unlink(public_path('assets/frontend/images/' . get_thumbnail($path, $size)));
                    }
                }

            };
            $deleteAllImage(['_thumb', '_300x432', '_1270x512']);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Film $film
     * @return \Illuminate\Http\Response
     */
    public function show(Film $film, $slug)
    {
        $film = Film::Where('slug', $slug)->first();
        $this->authorize('view', $film);

        $data['films'] = Film::Where('slug', $slug)->get();
//        dd($data['films']->toArray());
        return view('admin.films.detail', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Film $film
     * @return \Illuminate\Http\Response
     */
    public function edit(Film $film, $id)
    {
        $film = Film::findOrFail($id);
        $this->authorize('update', $film);

        $data['current'] = DB::table('film_language')
            ->where('film_language.film_id', '=', $id)->get();
        $data['current_category'] = DB::table('category_film')
            ->where('category_film.film_id', '=', $id)->get();
        $data['categories'] = Category::all();

        $data['current_country'] = DB::table('country_film')
            ->where('country_film.film_id', '=', $id)->get();
        $data['countries'] = Country::all();
        $data['current_actors'] = DB::table('actor_film')
            ->where('actor_film.film_id', '=', $id)->get();
        $data['actors'] = Actor::all();
        $data['languages'] = Language::all();
        $data['title_film'] = Film::all();
        $data['films'] = Film::findOrFail($id);
        return view("admin.films.edit", $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \App\Models\Film $film
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
//        dd($request->tags);exit();

//        dd($request->img_thumbnail);exit();
        $film = Film::findOrFail($id);
//        dd($film->tags());exit();
//        dd(count($film ->tags->toArray()));exit();
        $this->authorize('update', $film);

        $valid = Validator::make($request->all(), [
            'title_vn' => 'required',
            'title_en' => 'required',
            'description' => 'required',
            'published_year' => 'required',
            'date_theater' => 'required',
            'resolution' => 'required',
            'company_production' => 'required',
            'time'=>'required',
        ], [
            'title_vn.required' => 'Vui lòng nhập tiêu đề tiếng việt!',
            'title_en.required' => 'Vui lòng nhập tiêu đề tiếng anh!',
            'description.required' => 'vui lòng nhập mô tả!',
            'published_year.required' => 'Vui lòng nhập năm xuất bản!',
            'date_theater.required' => 'Vui lòng nhập ngày chiếu Rạp!',
            'quality.required' => 'Vui lòng nhập chất lượng!',
            'resolution.required' => 'vui lòng nhập độ phân giải!',
            //Image
            'img_thumbnail.image' => 'Sai Định Dạng',
            'img_thumbnail.max' => 'File Quá Kích Thước Cho Phép',
            'img_background.image' => 'Sai Định Dạng',
            'img_background.max' => 'File Quá Kích Thước Cho Phép',
            'company_production.required' => 'Bạn chưa nhập nhà sản xuất'
        ]);
        if ($valid->fails()) {
            return redirect()->back()->withErrors($valid)->withInput();
        } else {
            $imagethumb = null;
            $imagebg = null;
            if ($film !== null) {
                $imagethumb = $film->img_thumbnail;
                $imagebg = $film->img_background;
                if ($request->hasFile('img_thumbnail')) {
                    $this->deleteImage($film->img_thumbnail);
                    $imagethumb = $this->saveImage($request->file('img_thumbnail'));
                }
                if ($request->hasFile('img_background')) {
                    $this->deleteImage($film->img_background);
                    $imagebg = $this->saveImage($request->file('img_background'));
                }
                $film->parent_film_id = $request->parentFilm;
                $film->title_vi = $request->title_vn;
                $film->title_en = $request->title_en;
                $film->slug = $request->slug;
                $film->description = $request->description;
                $film->company_production = $request->company_production;
                $film->view_count = 0;
                $film->active_slide = 0;
                $film->total_episodes = $request->total_episodes;
                $film->published_year = $request->published_year;
                $film->film_hot = $request->has('txthot');
                $film->film_cinema = $request->has('txtrap');
                $film->theater_status=$request->has('theater_status');
                $film->resolution = $request->resolution;
                if ($request->resolution < "720") {
                    $film->quality = "Trung Bình";
                } else {
                    $film->quality = "HD";
                }
                $film->IMDb = rand(5, 9);
                $film->status = 0;
                $film->date_theater = $request->date_theater;
                $film->film_type = $request->txttype;
                $film->time = $request->time;
                $film->img_thumbnail = $imagethumb;
                $film->img_background = $imagebg;
                $film->admin_id = Auth::guard('admin')->id();
                $film->save();
                if ($request->has('lang') && is_array($request->input('lang')) && count($request->input('lang')) > 0) {
                    $film->languages()->sync($request->lang);
                }
                if ($request->has('categories') && is_array($request->input('categories')) && count($request->input('categories')) > 0) {
                    $film->categories()->sync($request->categories);
                }
                if ($request->has('actor') && is_array($request->input('actor')) && count($request->input('actor')) > 0) {
                    $film->actors()->sync($request->actor);
                }
                if ($request->has('countries') && is_array($request->input('countries')) && count($request->input('countries')) > 0) {
                    $film->countries()->sync($request->countries);
                }
                if ($request->has('tags') && is_array($request->input('tags')) && count($request->input('tags')) > 0 && (count($request->input('tags')) !== count($film->tags->toArray()))) {
                    $tags = $request->input('tags');
                    $tagsID = [];
                    foreach ($tags as $tag) {
                        $tag = Tag::firstOrCreate([
                            'name' => $tag,
                            'slug' => str_slug($tag)
                        ], [
                            'name' => $tag,
                            'slug' => str_slug($tag)
                        ]);
                        $tagsID[] = $tag->id;
                    }
                    $film->tags()->sync($tagsID);
                }
            }
            return redirect()->route('admin.phim.index')->with('mess', 'Cập Nhật thành công!');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Film $film
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        $film = Film::findOrFail($id);
        $this->authorize('delete', $film);

        $count_childfilm = Film::Where('parent_film_id', $id)->get()->count();
        if ($count_childfilm == 0) {
            $film->delete();
            return redirect()->route('admin.phim.index')->with('mess', 'xóa thành công !');
        } else {
            return redirect()->back()->with('mess', 'Xóa tập phụ trước khi xóa phim này!');
        }
    }

    public function destroy($id)
    {
        $film = Film::findOrFail($id);
        $film->delete();

        $films = Film::where('status', 0)->get();
        return view('admin.dashboard.list-new-film', ['films' => $films]);
    }

    public function approve($id)
    {
        Film::where('id', $id)
            ->update(['status' => 1]);

        $films = Film::where('status', 0)->get();
        return view('admin.dashboard.list-new-film', ['films' => $films]);
    }

    public function MultiCheckbox(Request $request)
    {
        // return $request->id;die();

        if (!empty($request->input('id'))) {
            if ($request->action == 'approve') {
                $ids = $request->id;
                Film::whereIn('id', $ids)->update(['status' => 1]);
            } else {
                $ids = $request->id;
                Film::whereIn('id', $ids)->delete();
            }

            $films = Film::where('status', 0)->get();

            return view('admin.dashboard.list-new-film', ['films' => $films]);
        } else {
            $films = Film::where('status', 0)->get();

            return view('admin.dashboard.list_new_post_film', ['films' => $films])->with('status_checkbox', 'Có lỗi. Bạn chưa chọn thao tác nào!');
        }
    }


    public function multislide(Request $request)
    {
        if ($request->id) {
            $ids = $request->id;
            Film::where('id', '>', 0)->update(['active_slide' => 0]);
            Film::whereIn('id', $ids)->update(['active_slide' => 1]);
            $films = Film::all();
            return view('admin.films.list-ajax', compact('films'));
        } else {
            return view('admin.films.list-ajax');
        }
    }
}
