<?php

namespace App\Http\Controllers\Backend;

use App\Models\Customer;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Event;
use App\Events\LockUserCustomer;
use Carbon\Carbon;
use Storage;
use Illuminate\Support\Facades\Hash;
use Auth;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->authorize('index', Customer::class);

        $customers = Customer::all();
        return view('admin.customers.list', ['customers' => $customers]);
    }

    public function list()
    {   
        return $customers = Customer::all()->toJson();
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
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function show($username)
    {
        $id = Customer::where('username', $username)->get()->first()->id;
        $customer = Customer::findOrFail($id);
        // dd($customer->id);die();
        $this->authorize('view', $customer);

        return view('admin.customers.show', ['customer' => $customer]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function edit($username)
    {
        $id = Customer::where('username', $username)->get()->first()->id;
        $customer = Customer::findOrFail($id);
        $this->authorize('update', $customer);

        return view('admin.customers.edit', ['customer' => $customer]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $username)
    {
        $id = Customer::where('username', $username)->get()->first()->id;
        $customer = Customer::findOrFail($id);
        $this->authorize('update', $customer);
        $customer->status = $request->status;
        $customer->save();

        return redirect()->back();

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        $customer = Customer::findOrFail($id);
        $this->authorize('delete', $customer);

        $password = $request->password;
        $admin    = Auth::guard('admin')->user();

        if (Hash::check($password, $admin->password)) {
            $customer->delete();

            $directory = 'public/customers/' . $id;
            Storage::deleteDirectory($directory);

            $customers = Customer::all();
            return view('admin.customers.list-user', ['customers' => $customers]);
        } else {
            return 0;
        }
    }

    public function lock(Request $request, $id)
    {
        $customer = Customer::findOrFail($id);
        $this->authorize('update', $customer);
        $customer->time_lock_end = $request->time_lock_end;
        $customer->status = 0;
        $customer->save();
        
        $customers = Customer::all();
        return view('admin.customers.list-user', ['customers' => $customers]);

    }

    public function unlock($id)
    {
        $customer = Customer::findOrFail($id);
        $this->authorize('update', $customer);
        $customer->time_lock_end = null;
        $customer->status = 1;
        $customer->save();
        
        $customers = Customer::all();
        return view('admin.customers.list-user', ['customers' => $customers]);
    }

    public function MultiDeleteCustomer (Request $request)
    {
        $this->authorize('index', Customer::class);
        // Kiem tra mat khau dung khong
        $password = $request->password;
        $admin    = Auth::guard('admin')->user();
        $ids      = $request->id;
        $type     = $request->type;
        $today    = Carbon::today();

        if (Hash::check($password, $admin->password)) {
            Customer::whereIn('id', $ids)->delete();

            // Xoa thu muc
            foreach ($ids as $id) {
                $directory = 'public/customers/' . $id;
                Storage::deleteDirectory($directory);
            }

            if ($type == 'new') {
                $customers = Customer::where('created_at', '>=', $today)->get();
            } else {
                $customers = Customer::all();
            }

            return view('admin.customers.list-user', ['customers' => $customers]);
        } else {
            return 0;
        }
    }

    public function MultiUnlockCustomer (Request $request)
    {
        $this->authorize('index', Customer::class);
        // Kiem tra mat khau dung khong
        $password = $request->password;
        $admin    = Auth::guard('admin')->user();
        $ids      = $request->id;
        $type     = $request->type;
        $today    = Carbon::today();

        if (Hash::check($password, $admin->password)) {
            Customer::whereIn('id', $ids)->update(['time_lock_end'  => null, 'status' => 1]);;           

            if ($type == 'new') {
                $customers = Customer::where('created_at', '>=', $today)->get();
            } else {
                $customers = Customer::all();
            }

            return view('admin.customers.list-user', ['customers' => $customers]);
        } else {
            return 0;
        }
    }
}
