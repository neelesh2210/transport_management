<?php

namespace App\Http\Controllers;
use App\LoadingSlip;
use App\Driver;
use App\VechileOwner;
use App\Truck;
use App\TruckPlace;
use App\DieselInfo;
use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use DB;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class LoadingSlipController extends Controller
{

    function __construct()
    {
		$this->middleware('permission:loading-slip-list|loading-slip-create|loading-slip-edit|loading-slip-delete', ['only' => ['index', 'store']]);
		$this->middleware('permission:loading-slip-create', ['only' => ['create', 'store']]);
		$this->middleware('permission:loading-slip-edit', ['only' => ['edit', 'update']]);
		$this->middleware('permission:loading-slip-delete', ['only' => ['destroy']]);
	}

    public function index()
    {
        $data=LoadingSlip::all();

        return view('loading_slip.viewloading_slip',['page_name'=>"Loading Slip",'data'=>$data,'checked'=>'checked','unchecked'=>'']);
    }

    public function create()
    {
        $driver= Driver::all();
        $own=VechileOwner::all();
        $truck = Truck::all();
        return view('loading_slip.loading_slip',['page_name'=>'Loading Slip','data'=>$driver, 'owner'=>$own, 'truck'=>$truck,]);
    }

    public function store(Request $request)
    {
        $input = $request->all();

        $var=LoadingSlip::create($input);
        $loading=$var->id;
        $inputee['loading_id']=$loading;
        $inputee['vechile_no']=$request->truck_no;
        $inputee['driver_name']=$request->driver_name;
        $inputee['driver_id']=$request->driver_id;
        $inputee['driver_mobile']=$request->driver_mobile;
        $inputee['status']=$request->status;
        $inputee['add_by']=$request->add_by;

        TruckPlace::create($inputee);

        $dieselinfo['loading_id']=$loading;
        $dieselinfo['diesel_slip_no']=$request->diesel_slip_no;
        $dieselinfo['diesel_quantity']=$request->diesel_quantity;

        DieselInfo::create($dieselinfo);

        $request->session()->flash('data','Data Inserted Successfully!');

        return redirect('loading_slip');
    }

    public function show($id)
    {
         $data = LoadingSlip::find($id);
         return view('loading_slip.loading_details',['page_name'=>'Loading Slip', 'data'=>$data,]);
    }

    public function edit($id)
    {
        $slip=LoadingSlip::find($id);
        $user=Driver::all();
        $own=VechileOwner::all();
        $truck = Truck::all();
        return view('loading_slip.loading_slip',['page_name'=>'Loading Slip', 'data'=>$user, 'owner'=>$own, 'truck'=>$truck, 'edit_data'=>$slip]);
    }

    public function update(Request $request, $id)
    {
        $input = $request->all();

        LoadingSlip::find($id)-> update($input);

        $inputee['loading_id']=$id;
        $inputee['vechile_no']=$request->truck_no;
        $inputee['driver_name']=$request->driver_name;
        $inputee['driver_id']=$request->driver_id;
        $inputee['driver_mobile']=$request->driver_mobile;
        $inputee['status']=$request->status;
        $inputee['add_by']=$request->add_by;

        TruckPlace::where('loading_id',$id)->update($inputee);
        $request->session()->flash('data','Data Updated Successfully!');
         return redirect('loading_slip');
    }

    public function destroy(Request $request,$id)
    {
        LoadingSlip::find($id)-> delete();
        $request->session()->flash('data','Data Deleted Successfully!');
        return redirect('loading_slip');
    }

    public function update_status(Request $request){

        LoadingSlip::where('id',$request->c_id)->update(['status'=>$request->stat]);
        $status=LoadingSlip::find($request->c_id);
        return response()->json(array('msg'=>$status), 200);

    }
}
