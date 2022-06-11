<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\TruckHisab;
use App\RateChart;
use App\Truck;
use App\DebitVoucher;

use App\Http\Controllers\Controller;
use DB;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class TruckHisabController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


    function __construct() {
		$this->middleware('permission:truck-hisab-list|truck-hisab-create|truck-hisab-edit|truck-hisab-delete', ['only' => ['index', 'store']]);
		$this->middleware('permission:truck-hisab-create', ['only' => ['create', 'store']]);
		$this->middleware('permission:truck-hisab-edit', ['only' => ['edit', 'update']]);
		$this->middleware('permission:truck-hisab-delete', ['only' => ['destroy']]);
	}

    public function index()
    {
        $data=TruckHisab::all();
       // $data=TruckHisab::whereDate('created_at', '=', date('Y-m-d'))->get();
        return view('truck_hisab.viewtruck_hisab',['page_name'=>"Truck Hisab",'data'=>$data,'checked'=>'checked','unchecked'=>'']);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $rate= RateChart::all();
        $truck = Truck::all();
        return view('truck_hisab.truck_hisab',['page_name'=>'Truck Hisab','rate'=>$rate, 'truck'=>$truck,]);
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
        
       $truck_hisab_id= TruckHisab::create($input);
 
        $request->session()->flash('data','Data Inserted Successfully!');

        return redirect('truck_hisab');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data=TruckHisab::find($id);
        return view('truck_hisab.truck_hisab_details',['page_name'=>'Truck Hisab', 'data'=>$data,]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $rate= RateChart::all();
        $truck = Truck::all();
        $truck_hisab=TruckHisab::find($id);
        return view('truck_hisab.truck_hisab',['page_name'=>'Truck Hisab','edit_data'=>$truck_hisab, 'rate'=>$rate, 'truck'=>$truck,]);
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
    
        TruckHisab::find($id)-> update($input);
       $truck_hisab = TruckHisab::find($id);
       if($request->verify=='verify'){
      $inputee['truck_hisab_id']=$truck_hisab->id;  
      $inputee['loding_slip_id']=$truck_hisab->loding_slip_id;
      $inputee['truck_placement_id']=$truck_hisab->truck_placement_id;
      $inputee['tax_invoice_id']=$truck_hisab->tax_invoice_id;
      $inputee['vechile_no']=$truck_hisab->vechile_no;
       $inputee['transporter_percent']=$truck_hisab->transporter_percent;
        $inputee['tac']=$truck_hisab->tac;
         $inputee['total']=$truck_hisab->total;
      $inputee['quantity']=$truck_hisab->quantity;
      $inputee['rate']=$truck_hisab->rate;
      $inputee['unloding']=$truck_hisab->unloding;
      $inputee['cash_advance']=$truck_hisab->cash_advance;
      $inputee['diesel']=$truck_hisab->diesel;
      $inputee['destination']=$truck_hisab->destination;
      $inputee['material']=$truck_hisab->material;
      $inputee['add_by']=$truck_hisab->add_by;
       
      DebitVoucher::updateOrCreate($inputee);
       }
        $request->session()->flash('data','Data Updated Successfully!');
         return redirect('truck_hisab');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request,$id)
    {
        TruckHisab::find($id)-> delete();
        $request->session()->flash('data','Data Deleted Successfully!');
        return redirect('truck_hisab');
    }
}
