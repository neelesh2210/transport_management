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

    function __construct()
    {
		$this->middleware('permission:vehicle-owner-list|vehicle-owner-create|vehicle-owner-edit|vehicle-owner-delete', ['only' => ['index', 'store']]);
		$this->middleware('permission:vehicle-owner-create', ['only' => ['create', 'store']]);
		$this->middleware('permission:vehicle-owner-edit', ['only' => ['edit', 'update']]);
		$this->middleware('permission:vehicle-owner-delete', ['only' => ['destroy']]);
	}

    public function index()
    {
        $list=VechileOwner::where('delete_status',0)->paginate(10);
        return view('vechileowner.index',['page_name'=>"Vechile Owner List",'list'=>$list,'checked'=>'checked','unchecked'=>'']);
    }

    public function create()
    {
        return view('vechileowner.create',['page_name'=>'Vechile Owner Registration']);
    }

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

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
         $vechileowner=VechileOwner::find($id);
          $bank_details=VechileOwnerBankDetail::where('vechile_owner_id',$id)->get();

      return view('vechileowner.create',['page_name'=>'Vechile Owner Registration','edit_data'=>$vechileowner,'bank_details'=>$bank_details]);
    }

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

    public function destroy(Request $request,$id)
    {
        VechileOwner::find($id)->update(['delete_status'=>1]);

        return redirect()->route('vechile_owner.index')->with('error','Vechile Owner Deleted Successfully!');
    }

    public function updateStatusVechileOwner($id,$status){

        VechileOwner::where('id',$id)->update(['status'=>$status]);

        if($status == 0)
        {
            return redirect()->route('vechile_owner.index')->with('error','Vechile Owner Inactive Successfully!');
        }
        else
        {
            return redirect()->route('vechile_owner.index')->with('success','Vechile Owner Active Successfully!');
        }

    }

    public function OwnerDetail(Request $request){

        $owner=VechileOwner::find($request->owner_id);

        return response()->json(array('data'=>$owner), 200);

    }
}
