<?php

namespace App\Http\Controllers\Backend;
use DateTime;
use App\Models\Country;
use Illuminate\Http\Request;
use App\Http\Requests\addCountryRequest;
use App\Http\Controllers\Controller;

class CountryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $this->authorize('index', Country::class);

        $data['countries']=Country::paginate(5);
        return view("admin.countries.list",$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->authorize('create', Country::class);

        return view("admin.countries.add");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(addCountryRequest $request)
    {
        $this->authorize('create', Country::class);

        $country = new Country();
        $country ->name = $request->txtcountry;
        $country ->slug = str_slug($request->txtcountry);
        $country ->created_at = new DateTime();
        $country ->save();
        return redirect()->route('admin.country.index')->with('mess','Thêm thành công!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Country  $country
     * @return \Illuminate\Http\Response
     */
    public function show(Country $country)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Country  $country
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data['countries'] = Country::findOrFail($id);
        $this->authorize('update', $data['countries']);

        return view("admin.countries.edit",$data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Country  $country
     * @return \Illuminate\Http\Response
     */
    public function update(addCountryRequest $request, $id)
    {
        $country=Country::findOrFail($id);
        $this->authorize('update', $country);

        $country ->name =$request->input('txtcountry');
        $country->save();
        return redirect()->route('admin.country.index')->with('mess','cập nhật thành công !');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Country  $country
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        $data=Country::findOrFail($id);
        $this->authorize('delete', $data);

        if($data !==null)
        {
            $data->delete();
            return redirect()->route('admin.country.index')->with('mess','xóa thành công ');
        }else{
            return redirect()->route('admin.country.index')->with('mess','quốc gia này không tồn tại !');
        }
    }
}
