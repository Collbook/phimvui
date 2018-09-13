<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::prefix('admin')->name('admin.')->namespace('Auth')->group(function() {
   	Route::get('/login', 'AdminLoginController@showLoginForm')->name('login');
   	Route::post('/login', 'AdminLoginController@login')->name('login.submit');
   	Route::get('/logout', 'AdminLoginController@logout')->name('logout');

   	//Admin User password reset routes
    Route::post('/password/email','AdminForgotPasswordController@sendResetLinkEmail')->name('password.email');
    Route::get('/password/reset','AdminForgotPasswordController@showLinkRequestForm')->name('password.request');
    Route::post('/password/reset','AdminResetPasswordController@reset');
    Route::get('/password/reset/{token}','AdminResetPasswordController@showResetForm')->name('password.reset');

    // Profile
	Route::middleware('admin')->prefix('profile')->group(function (){
		Route::get('/', 'ProfileController@profile')->name('profile.index')->middleware('checklevel0.active');
		Route::post('/edit', 'ProfileController@updateProfile')->name('profile.update');
		Route::post('/change-password', 'ProfileController@changePassword')->name('profile.changepassword')->middleware('checklevel0.active');
		Route::post('/change-email', 'ProfileController@changeEmail')->name('profile.change.email')->middleware('checklevel0.active');
		Route::get('/check-username', 'ProfileController@checkUserName')->name('profile.checkusername');
		Route::get('/check-email', 'ProfileController@checkEmail')->name('profile.checkemail');
		Route::post('/change-avatar', 'ProfileController@changeAvatar')->name('profile.change.avatar')->middleware('checklevel0.active');
		Route::get('/delete-user', 'ProfileController@destroy')->name('profile.destroy');
	});
});

Route::middleware('admin')->name('admin.')->prefix('admin')->namespace('Backend')->group(function () {

	// Verification
	Route::get('/add-account/{email_token}', 'AdminController@addAccount')->name('add.account')->middleware('checklevel0.notactive');
	Route::post('/add-account/{email_token}', 'AdminController@postAccount')->name('post.account')->middleware('checklevel0.notactive');

	// Dashboard
	Route::middleware('checklevel0.active')->group(function () {
		Route::get('/', 'DashboardController@index')->name('dashboard');
		Route::get('dashboard/new-register', 'DashboardController@newRegister')->name('dashboard.new.register');
		Route::get('dashboard/new-register-get', 'DashboardController@newRegisterAjax')->name('dashboard.new.registerGet');

		Route::get('dashboard/new-post-film', 'DashboardController@newPostFilm')->name('dashboard.new.postfilm');
		Route::get('dashboard/new-post-film-get', 'DashboardController@newPostFilmAjax')->name('dashboard.new.postfilmGet');
		Route::get('dashboard/visited', 'DashboardController@visited')->name('dashboard.visited');
		Route::get('dashboard/chart', 'DashboardController@chart')->name('dashboard.chart');
	});
	// Admin User
	Route::middleware('checklevel0.active')->prefix('admin')->name('admin.')->group(function () {
		Route::get('/', 'AdminController@index')->name('index');
		Route::get('/show/{username}', 'AdminController@show')->name('show');
		Route::post('/create', 'AdminController@store')->name('store');
		Route::get('/verification/{email_token}', 'AdminController@verificationEmail')->name('verification');
		Route::post('/edit/{id}', 'AdminController@update')->name('update');
		Route::post('/delete/{id}', 'AdminController@destroy')->name('destroy');
		Route::post('/lock/{id}', 'AdminController@lock')->name('lock');
		Route::get('/unlock/{id}', 'AdminController@unlock')->name('unlock');
		Route::post('/multi-delete', 'AdminController@MultiDeleteAdmin')->name('multi.delete.admin');
		Route::post('/multi-unlock', 'AdminController@MultiUnlockAdmin')->name('multi.unlock.admin');
	});

	// Customer User
	Route::middleware('checklevel0.active')->prefix('customer')->group(function (){
		Route::get('/', 'CustomerController@index')->name('customer.index');
		Route::get('/show/{username}', 'CustomerController@show')->name('customer.show');
		Route::get('/edit/{username}', 'CustomerController@edit')->name('customer.edit');
		Route::post('/edit/{username}', 'CustomerController@update')->name('customer.update');
		Route::get('/delete/{id}', 'CustomerController@destroy')->name('customer.destroy');
		Route::get('/lock/{id}', 'CustomerController@lock')->name('customer.lock');
		Route::get('/unlock/{id}', 'CustomerController@unlock')->name('customer.unlock');
		Route::get('/multi-delete', 'CustomerController@MultiDeleteCustomer')->name('customer.multi.delete.customer');
		Route::get('/multi-unlock', 'CustomerController@MultiUnlockCustomer')->name('customer.multi.unlock.customer');
	});

	// Manager Comments
	Route::middleware('checklevel0.active')->prefix('comment')->group(function (){
		Route::get('/', 'CommentController@index')->name('comment.index');
		Route::get('/list-newcomment', 'CommentController@listNewComment')->name('comment.list.newcomment');
		Route::get('/show/{id}', 'CommentController@show')->name('comment.show');
		Route::get('/delete/{id}', 'CommentController@destroy')->name('comment.destroy');
		Route::get('/approve/{id}', 'CommentController@approve')->name('comment.approve');
		Route::get('/multi-action', 'CommentController@MultiCheckbox')->name('comment.multi.checkbox');
	});

	// Manager Roles
	Route::middleware('checklevel0.active')->prefix('role')->group(function (){
		Route::get('/', 'RoleController@index')->name('role.index');
		// Route::get('/create', 'RoleController@create')->name('role.create');
		Route::post('/create', 'RoleController@store')->name('role.store');
		// Route::get('/edit/{id}', 'RoleController@edit')->name('role.edit');
		Route::post('/edit/{id}', 'RoleController@update')->name('role.update');
		Route::post('/delete/{id}', 'RoleController@destroy')->name('role.destroy');
	});

	// Categories Magager
	Route::middleware('checklevel0.active')->prefix('cate')->group(function () {
		
		Route::get('list', [
			'as'    => 'cate.list', 
			'uses'  => 'CategoryController@index'
		]);

        Route::POST('addPost','CategoryController@addPost');
        Route::POST('editPost','CategoryController@editPost');
        Route::POST('deletePost','CategoryController@deletePost');
	});

	/* Định nghĩa route cho bảng Film */
	Route::group(['prefix' => 'phim',"as"=>"phim.", 'middleware' => 'checklevel0.active'], function() {
        Route::get('/','FilmController@index')->name('index');
        Route::get('/add','FilmController@create')->name('add');
        Route::post('/add','FilmController@store')->name('add');

        // Route::get('/edit','FilmController@edit')->name('edit');
        // Route::put('/update','FilmController@update')->name('update');

        Route::get('/edit/{id}','FilmController@edit')->name('edit');
        Route::put('/update/{id}','FilmController@update')->name('update');
        Route::get('/delete/{id}','FilmController@delete')->name('delete');
        Route::get('/destroy/{id}','FilmController@destroy')->name('destroy');
        Route::get('/show/{slug}','FilmController@show')->name('show');
        Route::get('/approve/{id}','FilmController@approve')->name('approve');
        Route::get('/un-approve/{id}','FilmController@unApprove')->name('un.approve');
        Route::post('/active-slide','FilmController@multislide')->name('multi.slide');
        Route::get('/dashboard/multi-approve-delete', 'FilmController@MultiCheckbox')->name('multi.checkbox.postfilm');

	});

	/* Định nghĩa route cho bảng Link_Films */
	Route::group(['prefix' => 'link',"as"=>"link.", 'middleware' => 'checklevel0.active'], function() {
		Route::get('/','LinkFilmController@index')->name('index');
		Route::get('/add','LinkFilmController@create')->name('add');
		Route::post('/add','LinkFilmController@store')->name('add');
		Route::get('/edit/{id}','LinkFilmController@edit')->name('edit');
		Route::put('/update/{id}','LinkFilmController@update')->name('update');
        Route::get('/delete/{id}','LinkFilmController@delete')->name('delete');

	});

	/* Định nghĩa route cho bảng Tags */
	Route::group(['prefix' => 'tags',"as"=>"tags.", 'middleware' => 'checklevel0.active'], function() {
		Route::get('/','TagController@index')->name('index');
		Route::get('/add','TagController@create')->name('add');
        Route::post('/add','TagController@store')->name('add');
		Route::get('/edit/{id}','TagController@edit')->name('edit');
		Route::put('/update/{id}','TagController@update')->name('update');
		Route::get('delete/{id}','TagController@delete')->name('delete');

	});
	/* Định nghĩa route cho bảng Country */
	Route::group(['prefix' => 'country',"as"=>"country."], function() {
		Route::get('/','CountryController@index')->name('index');
		Route::get('/add','CountryController@create')->name('add');
        Route::post('/add','CountryController@store')->name('add');
		Route::get('/edit/{id}','CountryController@edit')->name('edit');
		Route::put('/update/{id}','CountryController@update')->name('update');
		Route::get('/delete/{id}','CountryController@delete')->name('delete');
	});
	
});


Route::middleware('admin', 'checklevel0.active')->prefix('admin')->namespace('Backend')->group(function () {
	// Categories Magager
	Route::prefix('cate')->group(function () {
		
		// show list all cates
		Route::get('list', [
			'as'    => 'admin.cate.list', 
			'uses'  => 'CategoryController@index'
		]);

		// add cates
        Route::get('/create', [
            'as'    => 'admin.cate.create', 
            'uses'  => 'CategoryController@create'
        ]);

        Route::post('/create', [
            'as'    => 'admin.cate.create',
            'uses'  => 'CategoryController@store'
		]);


		// upate cates
		Route::get('/edit/{id}', [
            'as'    => 'admin.cate.edit', 
            'uses'  => 'CategoryController@edit'
        ]);

        Route::post('/update/{id}', [
            'as'    => 'admin.cate.update',
            'uses'  => 'CategoryController@update'
		]);
		

		// delete cates
		Route::get('/delete/{id}', [
            'as'    => 'admin.cate.del',
            'uses'  => 'CategoryController@destroy'
		]);

	});

	
	// Languages Magager
	Route::prefix('language')->group(function () {

		// show list all languages
		Route::get('list', [
			'as'    => 'admin.language.list', 
			'uses'  => 'LanguageController@index'
		]);

		// add languages
		Route::get('/create', [
			'as'    => 'admin.language.create', 
			'uses'  => 'LanguageController@create'
		]);

		Route::post('/create', [
			'as'    => 'admin.language.create',
			'uses'  => 'LanguageController@store'
		]);


		// upate languages
		Route::get('/edit/{id}', [
			'as'    => 'admin.language.edit', 
			'uses'  => 'LanguageController@edit'
		]);

		Route::post('/update/{id}', [
			'as'    => 'admin.language.update',
			'uses'  => 'LanguageController@update'
		]);

		
		// delete languages
		Route::get('/delete/{id}', [
            'as'    => 'admin.language.del',
            'uses'  => 'LanguageController@destroy'
		]);
	});		
	// Actors Magager
	Route::prefix('actor')->group(function () {

		// show list all actor
		Route::get('list', [
			'as'    => 'admin.actor.list', 
			'uses'  => 'ActorController@index'
		]);

		// add actor
		Route::get('/create', [
			'as'    => 'admin.actor.create', 
			'uses'  => 'ActorController@create'
		]);

		Route::post('/create', [
			'as'    => 'admin.actor.create',
			'uses'  => 'ActorController@store'
		]);


		// upate actor
		Route::get('/edit/{id}', [
			'as'    => 'admin.actor.edit', 
			'uses'  => 'ActorController@edit'
		]);

		Route::post('/update/{id}', [
			'as'    => 'admin.actor.update',
			'uses'  => 'ActorController@update'
		]);

		// delete actor
		Route::get('/delete/{id}', [
            'as'    => 'admin.actor.del',
            'uses'  => 'ActorController@destroy'
		]);


	});		
	


	// Directors Magager
	Route::prefix('director')->group(function () {

		// show list all director
		Route::get('list', [
			'as'    => 'admin.director.list', 
			'uses'  => 'DirectorController@index'
		]);

		// add director
		Route::get('/create', [
			'as'    => 'admin.director.create', 
			'uses'  => 'DirectorController@create'
		]);

		Route::post('/create', [
			'as'    => 'admin.director.create',
			'uses'  => 'DirectorController@store'
		]);


		// upate director
		Route::get('/edit/{id}', [
			'as'    => 'admin.director.edit', 
			'uses'  => 'DirectorController@edit'
		]);

		Route::post('/update/{id}', [
			'as'    => 'admin.director.update',
			'uses'  => 'DirectorController@update'
		]);

		
		// delete director
		Route::get('/delete/{id}', [
            'as'    => 'admin.director.del',
            'uses'  => 'DirectorController@destroy'
		]);
	});		


	
});	


// ============================= FRONTEND ===============================================>
//Route of linh
Route::namespace('Frontend')->group(function () {
	Route::get('/', 'HomeController@home')->name('home');
	//route den controller xu ly ajax
	Route::group(['prefix' => '/ajax'], function () {
	    Route::get('/phim_chieu_rap', 'HomeController@phimchieurap');
	    Route::get('/phim_bo', 'HomeController@phimbo');
	    Route::get('/phim_le', 'HomeController@phimle');
	    Route::get('/phim_anime', 'HomeController@phimanime');
	    Route::get('/tvshow', 'HomeController@tvShow');
	    Route::get('/phim_sap_chieu', 'HomeController@phimsapchieu');
	    Route::get('/top_view_country_by_type', 'HomeController@top_view_country_by_type');
	});
	Route::get('/xem-phim/ajax/comment','FilmController@saveComment');
	// trang tim kiem phim khi go tim kiem
	Route::post('/search', 'HomeController@search');

	//route of phu
	// hien thi trang noi dung chi tiet phim
	Route::get('/xem-phim/{slug?}', 'FilmController@getfilms');
	//ajax top phim bo
	Route::get('/xem-phim/ajax/top_view_country_by_type', 'HomeController@top_view_country_by_type');
	//hien thi trang xem phim 
	Route::get('/phim/{slug?}/{description?}','FilmController@watchmovie');

	//route of hoai
	//route loc phim
	Route::get('/loc-phim', 'ListFilmController@locphim');
	//hien thi trang danh sach phim
	Route::get('/phim-de-cu', 'ListFilmController@view');

	//route phan loai phim theo the loai
	Route::get('/the-loai/{the_loai?}', 'ListFilmController@theloai');
	//route phan loai phim theo quoc gia
	Route::get('/quoc-gia/{quoc_gia?}', 'ListFilmController@quocgia');
	//route phan loai phim theo tag
	Route::get('/tag/{tag?}', 'ListFilmController@tag');
	//route phan loai phim theo dien vien
	Route::get('/dien-vien/{dien_vien?}', 'ListFilmController@dienvien');
	//route phan loai phim theo phim bo
	Route::get('/phim-bo', 'ListFilmController@viewphimbo');
	Route::get('/phim-bo/{quoc_gia?}', 'ListFilmController@phimbo');
	//route phan loai phim theo phim le
	Route::get('/phim-le', 'ListFilmController@viewphimle');
	Route::get('/phim-le/{nam?}', 'ListFilmController@phimle');
	//route phan loai phim chieu rap
	Route::get('/phim-chieu-rap', 'ListFilmController@phimchieurap');
	//route phim sap chieu
	Route::get('/phim-sap-chieu', 'ListFilmController@phimsapchieu');

	//route footer
	//trang dieu khoan
	Route::get('/dieu-khoan-su-dung.html', 'AboutController@dieukhoan');
	//trang chinh sach
	Route::get('/chinh-sach-rieng-tu.html', 'AboutController@chinhsach');
	//trang hoi dap
	Route::get('/hoi-dap-huong-dan.html', 'AboutController@hoidap');
	//trang nguyen tac
	Route::get('/nguyen-tac-cong-dong.html', 'AboutController@nguyentac');
	//trang lienhe
	Route::get('/lien-he.html', 'AboutController@lienhe');

});

//trang dang nhap
Route::namespace('Auth')->group(function () {
	Route::get('dang-nhap.html','LoginController@getLogin')->name('login');
	Route::post('dang-nhap.html','LoginController@postLogin');
	//route dang xuát
	Route::get('dang-xuat.html','LoginController@logout');
	//route dang ki
	Route::get('dang-ki.html','LoginController@getdangki');
	Route::post('dang-ki.html','LoginController@postdangki');
});	
