<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Input;
use Illuminate\Http\Request;
use App\Billing;
use App\DebitVoucher;
use App\Invoice;

use App\Http\Controllers\Controller;
use DB;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class BillingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    function __construct() {
		$this->middleware('permission:billing-list|billing-create|billing-edit|billing-delete', ['only' => ['index', 'store']]);
		$this->middleware('permission:billing-create', ['only' => ['create', 'store']]);
		$this->middleware('permission:billing-edit', ['only' => ['edit', 'update']]);
		$this->middleware('permission:billing-delete', ['only' => ['destroy']]);
	}

    public function index()
    {
        $data=Billing::all();
        // foreach($data as $item){
        //     $str = $item->tax_invoice;
        //     $array = explode(',', $str);
        //     return $array;
        // }
        //return $data;
        return view('billing.viewbilling',['page_name'=>"Bill List",'data'=>$data,'checked'=>'checked','unchecked'=>'']);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $invoice= DebitVoucher::where('billing_created',0)->get();
        return view('billing.billing',['page_name'=>'Billing', 'data'=>$invoice]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         foreach($request->debite_voucher as $debite_voucher){
              
             
              
               $debit_voucher= DebitVoucher::find($debite_voucher);
               $debit_voucher->billing_created=1;
               $debit_voucher->save();
          }
        
        
        
         $request->merge([ 
           'debite_voucher' => implode(',', (array) $request->get('debite_voucher'))
            
        ]);
        
        
    
        $input = $request->all();
        
        Billing::create($input);
      
      
         
      
        $request->session()->flash('data','Data Inserted Successfully!');

        return redirect('bill');
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
        $debit_voucher_ids=array();
        $bill=Billing::find($id);
        foreach(explode(",",$bill->debite_voucher) as $billing){
            
            array_push($debit_voucher_ids,$billing);
        }
        $invoice= DebitVoucher::whereIn('id',$debit_voucher_ids)->get();
        return view('billing.billing',['page_name'=>'Billing','edit_data'=>$bill, 'data'=>$invoice,'debit_voucher_ids'=>$debit_voucher_ids]);
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
       
       $bill= Billing::find($id);
       
      $exiting_array= explode(",",$bill->debite_voucher);
      $new_array=array();
       
       
       if(!empty($request->debite_voucher)){
       
        foreach($request->debite_voucher as $debite_voucher){
              
             
              
               $debit_voucher= DebitVoucher::find($debite_voucher);
               $debit_voucher->billing_created=0;
               $debit_voucher->save();
               
               array_push($new_array,$debite_voucher);
          }
      }
   $result=array_diff($exiting_array,$new_array);
   
   
        
         $request->merge([ 
           'debite_voucher' => implode(',', (array) $result)
            
        ]);
        
        
        
        $input = $request->all();
    
        Billing::find($id)-> update($input);
       
        $request->session()->flash('data','Data Updated Successfully!');
         return redirect('bill');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        Billing::find($id)-> delete();
        $request->session()->flash('data','Data Deleted Successfully!');
        return redirect('bill');
    }
}
