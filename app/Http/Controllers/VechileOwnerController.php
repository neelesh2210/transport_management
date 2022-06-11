<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\VechileOwner;
use App\Http\Controllers\Controller;
use DB;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use App\VechileOwnerBankDetail;

class VechileOwnerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    
    function __construct() {
		$this->middleware('permission:vehicle-owner-list|vehicle-owner-create|vehicle-owner-edit|vehicle-owner-delete', ['only' => ['index', 'store']]);
		$this->middleware('permission:vehicle-owner-create', ['only' => ['create', 'store']]);
		$this->middleware('permission:vehicle-owner-edit', ['only' => ['edit', 'update']]);
		$this->middleware('permission:vehicle-owner-delete', ['only' => ['destroy']]);
	}
    
    public function index()
    {
         $data=VechileOwner::all();
       return view('vechileowner.viewvechileowner',['page_name'=>"Vechile Owner List",'data'=>$data,'checked'=>'checked','unchecked'=>'']);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('vechileowner.vechileowner',['page_name'=>'Vechile Owner Registration']);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if($request->aadhar_front_photo !== null){
            $aadhar_front_photo=$request->file('aadhar_front_photo');
            $aadhar_front = time()."-".rand(1, 100).".".$aadhar_front_photo->getClientOriginalExtension();
            $input['aadhar_front_photo'] = $aadhar_front;
            $aadhar_front_photo->move(public_path('/vechile_owner/aadhar/'), $aadhar_front);
        }
        
        if($request->aadhar_back_photo !== null){
            $aadhar_back_photo=$request->file('aadhar_back_photo');
            $aadhar_back = time()."-".rand(1, 100).".".$aadhar_back_photo->getClientOriginalExtension();
            $input['aadhar_back_photo'] = $aadhar_back;
            $aadhar_back_photo->move(public_path('/vechile_owner/aadhar/'), $aadhar_back);
        }
        
        if($request->pan_card_front_photo !== null){
            $pan_card_front_photo=$request->file('pan_card_front_photo');
            $pan_card_front = time()."-".rand(1, 100).".".$pan_card_front_photo->getClientOriginalExtension();
            $input['pan_card_front_photo'] = $pan_card_front;
            $pan_card_front_photo->move(public_path('/vechile_owner/pan_card/'), $pan_card_front);
        }
        
        if($request->pan_card_back_photo !== null){
            $pan_card_back_photo=$request->file('pan_card_back_photo');
            $pan_card_back = time()."-".rand(1, 100).".".$pan_card_back_photo->getClientOriginalExtension();
            $input['pan_card_back_photo'] = $pan_card_back;
            $pan_card_back_photo->move(public_path('/vechile_owner/pan_card/'), $pan_card_back);
        }
        
        $input = $request->all();
        
        $vechile_owner =  VechileOwner::create($input);
         
        foreach($input['account_holder_name'] as $key=>$value){
        
            $bank_detail =new VechileOwnerBankDetail;
            $bank_detail->vechile_owner_id=$vechile_owner->id;
            $bank_detail->account_holder_name=$value;
            $bank_detail->account_number=$input['account_number'][$key];
            $bank_detail->ifsc_code=$input['ifsc_code'][$key];
            $bank_detail->save();
        
        }
         
         $request->session()->flash('data','Data Inserted Successfully!');

         return redirect('vechile_owner');
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
         $vechileowner=VechileOwner::find($id);
          $bank_details=VechileOwnerBankDetail::where('vechile_owner_id',$id)->get();
     
      return view('vechileowner.vechileowner',['page_name'=>'Vechile Owner Registration','edit_data'=>$vechileowner,'bank_details'=>$bank_details]);
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
   
         VechileOwner::find($id)-> update($input);
         
         VechileOwnerBankDetail::where('vechile_owner_id',$id)->delete();
         
          foreach($input['account_holder_name'] as $key=>$value){
         
         $bank_detail =new VechileOwnerBankDetail;
         $bank_detail->vechile_owner_id=$id;
         $bank_detail->account_holder_name=$value;
         $bank_detail->account_number=$input['account_number'][$key];
         $bank_detail->ifsc_code=$input['ifsc_code'][$key];
         $bank_detail->save();
         
         }
         
         
       
        $request->session()->flash('data','Data Updated Successfully!');
         return redirect('vechile_owner');
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
         VechileOwner::find($id)-> delete();
         $request->session()->flash('data','Data Deleted Successfully!');
         return redirect('vechile_owner');
        // }
    }
    
    public function update_status(Request $request){
 
        VechileOwner::where('id',$request->c_id)->update(['status'=>$request->stat]);
        $status=VechileOwner::find($request->c_id);
        return response()->json(array('msg'=>$status), 200);

    }
    
    public function OwnerDetail(Request $request){
        
        $owner=VechileOwner::find($request->owner_id);
        
        return response()->json(array('data'=>$owner), 200);

    }
}
