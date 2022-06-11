<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\PetrolPump;
use App\Companie;
use App\Http\Controllers\Controller;
use DB;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class PetrolPumpController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    function __construct() {
		$this->middleware('permission:petrol-pump-list|petrol-pump-create|petrol-pump-edit|petrol-pump-delete', ['only' => ['index', 'store']]);
		$this->middleware('permission:petrol-pump-create', ['only' => ['create', 'store']]);
		$this->middleware('permission:petrol-pump-edit', ['only' => ['edit', 'update']]);
		$this->middleware('permission:petrol-pump-delete', ['only' => ['destroy']]);
	}

    public function index()
    {
        $data=PetrolPump::orderBy('branch')->get();
        $comp=Companie::all(); 
        return view('petrolpump.viewpetrolpump',['page_name'=>"Petrol Pump List",'data'=>$data, 'comp'=>$comp, 'checked'=>'checked','unchecked'=>'']);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
          $comp=Companie::all(); 
          return view('petrolpump.petrolpump',['page_name'=>'Petrol Pump Registration', 'comp'=>$comp]);
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
        
         PetrolPump::create($input);

         $request->session()->flash('data','Data Inserted Successfully!');

         return redirect('petrol_pump');
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
        $petrolpump=PetrolPump::find($id);
        $comp=Companie::all();
      return view('petrolpump.petrolpump',['page_name'=>'Petrol Pump Registration', 'comp'=>$comp, 'edit_data'=>$petrolpump]);
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
    
         PetrolPump::find($id)-> update($input);
       
        $request->session()->flash('data','Data Updated Successfully!');
         return redirect('petrol_pump');
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
         PetrolPump::find($id)-> delete();
         $request->session()->flash('data','Data Deleted Successfully!');
         return redirect('petrol_pump');
        // }
    }
    
    public function update_status_petrol(Request $request){
 
        PetrolPump::where('id',$request->c_id)->update(['status'=>$request->stat]);
        $status=PetrolPump::find($request->c_id);
        return response()->json(array('msg'=>$status), 200);

    }
}
