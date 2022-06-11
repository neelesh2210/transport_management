<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Invoice;
use App\RateChart;
use App\Truck;
use App\Companie;
use App\LoadingSlip;
use App\DebitVoucher;
use App\TruckPlace;
use App\TruckHisab;
use Carbon\Carbon;

use App\Http\Controllers\Controller;
use DB;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class InvoiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    function __construct() {
		$this->middleware('permission:invoice-list|invoice-create|invoice-edit|invoice-delete', ['only' => ['index', 'store']]);
		$this->middleware('permission:invoice-create', ['only' => ['create', 'store']]);
		$this->middleware('permission:invoice-edit', ['only' => ['edit', 'update']]);
		$this->middleware('permission:invoice-delete', ['only' => ['destroy']]);
	}
    
    public function index()
    {
        $data=Invoice::all();
       // $data=Invoice::where('invoice_number_date', Carbon::now()->format('Y-m-d'))->get();
        return view('invoice.viewinvoice',['page_name'=>"Invoice",'data'=>$data,'checked'=>'checked','unchecked'=>'']);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $truck_place=TruckPlace::find($request->tp_id);
        $rate_chart = RateChart::all();
        $truck = Truck::all();
        $comp = Companie::all();
        return view('invoice.invoice',['page_name'=>'Invoice', 'rate'=>$rate_chart, 'truck'=>$truck, 'comp'=>$comp,'truck_place'=>$truck_place]);
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
       
          $i = Invoice::create($input);
          
       $tp=TruckPlace::where('id', $request->tp_id)->orderBy('id','desc')->first();
       
       $ls=LoadingSlip::where('id', $tp->loading_id)->first();
        
        //return $ls->diesel_case_advance;
        
    
       
      $inputee['loding_slip_id']=$ls->id;
      $inputee['truck_placement_id']=$tp->id;
      $inputee['tax_invoice_id']=$i->id;
      $inputee['vechile_no']=$request->vechile_no;
      $inputee['quantity']=$request->quantitiy;
      $inputee['rate']=$request->rate_pmt;
      $inputee['unloding']=$request->unloading;
      $inputee['cash_advance']=$ls->case_advance;
      $inputee['diesel']=$ls->diesel_case_advance;
      $inputee['destination']=$request->destination;
      $inputee['material']=$ls->material_name;
      $inputee['status']=$request->status;
      $inputee['add_by']=$request->add_by;
       
      TruckHisab::create($inputee);
       
       

       
       
    //   $list=invoice::select('invoices.*','loading_slips.diesel_case_advance')->leftjoin('loading_slips','invoices.vechile_no','loading_slips.truck_no')->get();
    //   //return $list[0]['diesel_case_advance'];die;
    //   $inputee['lr_no']=$request->lorry_receipt_no;
    //   $inputee['lr_date']=$request->lorry_recepit_date;
    //   $inputee['rate']=$request->rate_pmt;
    //   $inputee['fright']=$request->destination;
    //   $inputee['status']=$request->status;
    //   $inputee['add_by']=$request->add_by;
    //   $inputee['advance_diesel']=$list[0]['diesel_case_advance'];
       
    //   DebitVoucher::create($inputee);
       

        $request->session()->flash('data','Data Inserted Successfully!');

        return redirect('invoice');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data=Invoice::find($id);
        return view('invoice.invoice_details',['page_name'=>'Tax Invoice', 'data'=>$data,]);
        //return response()->json(array('data'=>$data), 200);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Invoice::find($id);
        $rate_chart = RateChart::all();
        $truck = Truck::all();
        $comp = Companie::all();
        return view('invoice.invoice',['page_name'=>'Invoice', 'edit_data'=>$data, 'rate'=>$rate_chart, 'truck'=>$truck, 'comp'=>$comp]);
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
    
        Invoice::find($id)-> update($input);
        
        $tp=TruckPlace::where('id', $request->tp_id)->orderBy('id','desc')->first();
       
       $ls=LoadingSlip::where('id', $tp->loading_id)->first();
        
        //return $ls->diesel_case_advance;
        
    
       
      $inputee['loding_slip_id']=$ls->id;
      $inputee['truck_placement_id']=$tp->id;
      $inputee['tax_invoice_id']=$id;
      $inputee['vechile_no']=$request->vechile_no;
      $inputee['quantity']=$request->quantitiy;
      $inputee['rate']=$request->rate_pmt;
      $inputee['unloding']=$request->unloading;
      $inputee['cash_advance']=$ls->case_advance;
      $inputee['diesel']=$ls->diesel_case_advance;
      $inputee['destination']=$request->destination;
      $inputee['material']=$ls->material_name;
      $inputee['status']=$request->status;
      $inputee['add_by']=$request->add_by;
       
      TruckHisab::where('tax_invoice_id',$id)->update($inputee);
        
       
        $request->session()->flash('data','Data Updated Successfully!');
         return redirect('invoice');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        Invoice::find($id)-> delete();
        $request->session()->flash('data','Data Deleted Successfully!');
        return redirect('invoice');
    }
}
