<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\DebitVoucher;
use App\RateChart;
use App\Truck;
use App\VechileOwner;

use App\Http\Controllers\Controller;
use DB;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class DebitVoucherController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    function __construct() {
		$this->middleware('permission:debit-voucher-list|debit-voucher-create|debit-voucher-edit|debit-voucher-delete', ['only' => ['index', 'store']]);
		$this->middleware('permission:debit-voucher-create', ['only' => ['create', 'store']]);
		$this->middleware('permission:debit-voucher-edit', ['only' => ['edit', 'update']]);
		$this->middleware('permission:debit-voucher-delete', ['only' => ['destroy']]);
	}

    public function index()
    {
        $data=DebitVoucher::whereDate('created_at', '=', date('Y-m-d'))->get();
        return view('debit_voucher.viewdebit_voucher',['page_name'=>"Debit Voucher",'data'=>$data,'checked'=>'checked','unchecked'=>'']);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $rate_chart = RateChart::all();
        return view('debit_voucher.debit_voucher',['page_name'=>'Debit Voucher','rate'=>$rate_chart,]);
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
        
        DebitVoucher::create($input);

        $request->session()->flash('data','Data Inserted Successfully!');

        return redirect('debit_voucher');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data=DebitVoucher::find($id);
        return view('debit_voucher.debit_voucher_detail',['page_name'=>'Debit Voucher', 'data'=>$data,]);
       
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        
        $data=DebitVoucher::find($id);
        $rate_chart = RateChart::all();
        $truck = Truck::all();
        return view('debit_voucher.debit_voucher',['page_name'=>'Debit Voucher', 'edit_data'=>$data, 'rate'=>$rate_chart,'truck'=>$truck,]);
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
    
        DebitVoucher::find($id)-> update($input);
       
        $request->session()->flash('data','Data Updated Successfully!');
         return redirect('debit_voucher');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        DebitVoucher::find($id)-> delete();
        $request->session()->flash('data','Data Deleted Successfully!');
        return redirect('debit_voucher');
    }
    
    public function allvoucher($vechile_no)
    {
        $truck=Truck::where('id', $vechile_no)->first();
        return view('debit_voucher.all_voucher',['page_name'=>'Debit Voucher', 'data'=>$truck,]);
        //return $truck;
        
    }
    
    
}
