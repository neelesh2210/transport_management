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
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    function __construct() {
		$this->middleware('permission:driver-list|driver-create|driver-edit|driver-delete', ['only' => ['index', 'store']]);
		$this->middleware('permission:driver-create', ['only' => ['create', 'store']]);
		$this->middleware('permission:driver-edit', ['only' => ['edit', 'update']]);
		$this->middleware('permission:driver-delete', ['only' => ['destroy']]);
	}

    public function index()
    {
         $data=Driver::all();
       return view('driver.viewdriver',['page_name'=>"Driver List",'data'=>$data,'checked'=>'checked','unchecked'=>'']);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
          return view('driver.driver',['page_name'=>'Driver Registration']);
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
        return view('driver.driver',['page_name'=>'Driver Registration','edit_data'=>$driver]);
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
    public function destroy(Request $request,$id)
    {
    //     if($id=='bulk_delete'){
    //         $request->validate([
    // 	"bulk_delete"=>"required"]);
       
    //         $input = $request->all();
    //         $ids=$input['bulk_delete'];
    //         Companie::destroy($ids);
    //         $request->session()->flash('data','Data Deleted Successfully!');
    //         return redirect('company');
         
    //     }
    //     else{
         Driver::find($id)-> delete();
         $request->session()->flash('data','Data Deleted Successfully!');
         return redirect('driver');
        // }
    }
    
    public function update_status(Request $request){
 
        Driver::where('id',$request->c_id)->update(['status'=>$request->stat]);
        $status=Driver::find($request->c_id);
        return response()->json(array('msg'=>$status), 200);

    }
    
    public function DriverDetail(Request $request){

        //Driver::where('id', $request->driver_id);
        $driver=Driver::find($request->driver_id);
        //return $driver;
        return response()->json(array('data'=>$driver), 200);

    }
}
