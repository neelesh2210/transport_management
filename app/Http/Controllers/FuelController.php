<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Fuel;
use App\PetrolPump;
use App\Truck;
use Carbon\Carbon;

use App\Http\Controllers\Controller;
use DB;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class FuelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


    function __construct() {
		$this->middleware('permission:fuel-list|fuel-create|fuel-edit|fuel-delete', ['only' => ['index', 'store']]);
		$this->middleware('permission:fuel-create', ['only' => ['create', 'store']]);
		$this->middleware('permission:fuel-edit', ['only' => ['edit', 'update']]);
		$this->middleware('permission:fuel-delete', ['only' => ['destroy']]);
	}

    public function index()
    {
        $data=Fuel::where('date', Carbon::now()->format('Y-m-d'))->get();
        //$data=Fuel::whereDate('created_at', '=', date('Y-m-d'))->get();
        //return $data;
        return view('fuel.viewfuel',['page_name'=>"Fuel",'data'=>$data,'checked'=>'checked','unchecked'=>'']);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $petrol_pump= PetrolPump::all();
        $truck = Truck::all();
        return view('fuel.fuel',['page_name'=>'Fuel', 'petrol_pump'=>$petrol_pump, 'truck'=>$truck,]);
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
        
        Fuel::create($input);

        $request->session()->flash('data','Data Inserted Successfully!');

        return redirect('fuel');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
         $data = Fuel::find($id);
         return view('fuel.fueldetails',['page_name'=>'Fuel', 'data'=>$data,]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Fuel::find($id);
        $petrol_pump= PetrolPump::all();
        $truck = Truck::all();
        return view('fuel.fuel',['page_name'=>'Fuel', 'edit_data'=>$data, 'petrol_pump'=>$petrol_pump, 'truck'=>$truck]);
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
    
        Fuel::find($id)-> update($input);
       
        $request->session()->flash('data','Data Updated Successfully!');
         return redirect('fuel');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        Fuel::find($id)-> delete();
        $request->session()->flash('data','Data Deleted Successfully!');
        return redirect('fuel');
    }
}
