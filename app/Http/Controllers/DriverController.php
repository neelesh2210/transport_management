<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Driver;

use App\Http\Controllers\Controller;
use DB;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class DriverController extends Controller
{

    function __construct()
    {
		$this->middleware('permission:driver-list|driver-create|driver-edit|driver-delete', ['only' => ['index', 'store']]);
		$this->middleware('permission:driver-create', ['only' => ['create', 'store']]);
		$this->middleware('permission:driver-edit', ['only' => ['edit', 'update']]);
		$this->middleware('permission:driver-delete', ['only' => ['destroy']]);
	}

    public function index()
    {
        $list=Driver::where('delete_status',0)->paginate(10);

        return view('driver.index',['page_name'=>"Driver List",'list'=>$list,'checked'=>'checked','unchecked'=>'']);
    }

    public function create()
    {
        return view('driver.create',['page_name'=>'Driver Registration']);
    }

    public function store(Request $request)
    {

        $input = $request->all();

        Driver::create($input);

        $request->session()->flash('data','Data Inserted Successfully!');

        return redirect('driver');
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
        $driver=Driver::find($id);
        return view('driver.create',['page_name'=>'Driver Registration','edit_data'=>$driver]);
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

        $input = $request->all();

         Driver::find($id)-> update($input);

        $request->session()->flash('data','Data Updated Successfully!');
         return redirect('driver');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Driver::find($id)->update(['delete_status'=>1]);

        return redirect()->route('driver.index')->with('error','Driver Delete Successfull!');
    }

    public function update_status($id,$status){

        Driver::where('id',$id)->update(['status'=>$status]);

        if($status == 0)
        {
            return redirect()->route('driver.index')->with('error','Driver Inactive Successfull!');
        }
        else
        {
            return redirect()->route('driver.index')->with('success','Driver Active Successfull!');
        }

    }

    public function DriverDetail(Request $request){

        //Driver::where('id', $request->driver_id);
        $driver=Driver::find($request->driver_id);
        //return $driver;
        return response()->json(array('data'=>$driver), 200);

    }
}
