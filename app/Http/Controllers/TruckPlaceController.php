<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\TruckPlace;
use App\Driver;
use App\RateChart;
use App\Truck;
use Carbon\Carbon;

use App\Http\Controllers\Controller;
use DB;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class TruckPlaceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    function __construct() {
		$this->middleware('permission:truck-place-list|truck-place-create|truck-place-edit|truck-place-delete', ['only' => ['index', 'store']]);
		$this->middleware('permission:truck-place-create', ['only' => ['create', 'store']]);
		$this->middleware('permission:truck-place-edit', ['only' => ['edit', 'update']]);
		$this->middleware('permission:truck-place-delete', ['only' => ['destroy']]);
	}

    public function index()
    {   
        $data=TruckPlace::all();
        //$data=TruckPlace::whereDate('created_at', '=', date('Y-m-d'))->get();
        return view('truck_place.viewtruck_place',['page_name'=>"Truck Place List",'data'=>$data,'checked'=>'checked','unchecked'=>'']);
       
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $truck = Truck::all();
        $driver= Driver::all();
        $rate_chart = RateChart::all();
        return view('truck_place.truck_place',['page_name'=>'Truck Place','data'=>$driver, 'rate'=>$rate_chart, 'truck'=>$truck,]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $input = $request->all();
        
        TruckPlace::create($input);

        $request->session()->flash('data','Data Inserted Successfully!');

        return redirect('truck_placement');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = TruckPlace::find($id);
        return view('truck_place.truck_placement_details',['page_name'=>'Truck Placement ', 'data'=>$data,]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {   
        $truck = Truck::all();
        $truck_place=TruckPlace::find($id);
        $user=Driver::all();
        $rate_chart = RateChart::all();
        return view('truck_place.truck_place',['page_name'=>'Truck Place', 'data'=>$user, 'edit_data'=>$truck_place, 'rate'=>$rate_chart, 'truck'=>$truck]);
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
    
        TruckPlace::find($id)-> update($input);
       
        $request->session()->flash('data','Data Updated Successfully!');
         return redirect('truck_placement');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request,$id)
    {
        TruckPlace::find($id)-> delete();
        $request->session()->flash('data','Data Deleted Successfully!');
        return redirect('truck_placement');
    }
    
    public function update_status(Request $request){
 
        TruckPlace::where('id',$request->c_id)->update(['status'=>$request->stat]);
        $status=TruckPlace::find($request->c_id);
        return response()->json(array('msg'=>$status), 200);

    }
}
