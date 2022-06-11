<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\VechileOwner;
use App\Truck;

use App\Http\Controllers\Controller;
use DB;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class TruckController extends Controller
{

    function __construct() {
		$this->middleware('permission:truck-list|truck-create|truck-edit|truck-delete', ['only' => ['index', 'store']]);
		$this->middleware('permission:truck-create', ['only' => ['create', 'store']]);
		$this->middleware('permission:truck-edit', ['only' => ['edit', 'update']]);
		$this->middleware('permission:truck-delete', ['only' => ['destroy']]);
	}

    public function index()
    {
        
        $data=Truck::all();
       return view('truck.viewtruck',['page_name'=>"Truck List",'data'=>$data,'checked'=>'checked','unchecked'=>'']);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user= VechileOwner::all();
        return view('truck.truck',['page_name'=>'Truck Registration','data'=>$user]);
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
        
         Truck::create($input);

         $request->session()->flash('data','Data Inserted Successfully!');

         return redirect('truck');
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
        
        $truck=Truck::find($id);
        $user=VechileOwner::all();
        return view('truck.truck',['page_name'=>'Truck Registration', 'data'=>$user, 'edit_data'=>$truck]);
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
    
        Truck::find($id)-> update($input);
       
        $request->session()->flash('data','Data Updated Successfully!');
         return redirect('truck');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request,$id)
    {
         Truck::find($id)-> delete();
         $request->session()->flash('data','Data Deleted Successfully!');
         return redirect('truck');
    }
    
    public function update_status(Request $request){
 
        Truck::where('id',$request->c_id)->update(['status'=>$request->stat]);
        $status=Truck::find($request->c_id);
        return response()->json(array('msg'=>$status), 200);

    }
    
     public function TruckDetail(Request $request){
        
        $truck=Truck::find($request->truck_id);
        $owner_id = $truck->owner_id;
    
        $v_owner=VechileOwner::where('id', $owner_id)->first();
        
        return response()->json(array('data'=>$truck, 'owner'=>$v_owner), 200);

    }
    
}
