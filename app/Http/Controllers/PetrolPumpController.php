<?php

namespace App\Http\Controllers;

use DB;
use App\Companie;
use App\PetrolPump;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Permission;

class PetrolPumpController extends Controller
{

    function __construct()
    {
		$this->middleware('permission:petrol-pump-list|petrol-pump-create|petrol-pump-edit|petrol-pump-delete', ['only' => ['index', 'store']]);
		$this->middleware('permission:petrol-pump-create', ['only' => ['create', 'store']]);
		$this->middleware('permission:petrol-pump-edit', ['only' => ['edit', 'update']]);
		$this->middleware('permission:petrol-pump-delete', ['only' => ['destroy']]);
	}

    public function index(Request $request)
    {
        $list=PetrolPump::where('delete_status',0)->orderBy('petrolpump_name');

        $search=$request->key;
        $branches=$request->branch_id;
        if(!empty($branches))
        {
            $list=$list->whereIn('branch',$branches);
        }
        if(!empty($search))
        {
            $list=$list->whereJsonContains('petrolpump_mobile_no',$search);
        }

        $list=$list->paginate(10);

        return view('petrolpump.index',['page_name'=>"Petrol Pump List",'list'=>$list,'search'=>$search,'branches'=>$branches]);
    }

    public function create()
    {
        $comp=Companie::all();
        return view('petrolpump.create',['page_name'=>'Petrol Pump Registration', 'comp'=>$comp]);
    }

    public function store(Request $request)
    {
        $petrol_pump=new PetrolPump;

        $petrol_pump->petrolpump_name=$request->petrolpump_name;
        $petrol_pump->petrolpump_address=$request->petrolpump_address;
        $petrol_pump->petrolpump_mobile_no=$request->petrolpump_mobile_no;
        $petrol_pump->branch=$request->branch;
        $petrol_pump->amount=$request->amount;
        $petrol_pump->amount_type=$request->amount_type;
        $petrol_pump->start_range=$request->start_range;
        $petrol_pump->end_range=$request->end_range;
        $petrol_pump->add_by=Auth::user()->id;

        $petrol_pump->save();

        return redirect()->route('petrol_pump.index')->with('success','Petrol Pump Registered Successfully!');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $data=PetrolPump::find($id);

        return view('petrolpump.edit',['page_name'=>'Petrol Pump Registration', 'data'=>$data]);
    }

    public function update(Request $request, $id)
    {

        $petrol_pump=PetrolPump::find($id);

        $petrol_pump->petrolpump_name=$request->petrolpump_name;
        $petrol_pump->petrolpump_address=$request->petrolpump_address;
        $petrol_pump->petrolpump_mobile_no=$request->petrolpump_mobile_no;
        $petrol_pump->branch=$request->branch;
        $petrol_pump->amount=$request->amount;
        $petrol_pump->amount_type=$request->amount_type;
        $petrol_pump->start_range=$request->start_range;
        $petrol_pump->end_range=$request->end_range;
        $petrol_pump->add_by=Auth::user()->id;

        $petrol_pump->save();

        return redirect()->route('petrol_pump.index')->with('success','Petrol Pump Updated Successfully!');
    }

    public function destroy(Request $request,$id)
    {
        PetrolPump::find($id)->update(['delete_status'=>1]);

        return redirect()->route('petrol_pump.index')->with('error','Petrol Pump Delete Successfully!');
    }

    public function update_status_petrol($id,$status)
    {
        PetrolPump::where('id',$id)->update(['status'=>$status]);

        if($status == 0)
        {
            return redirect()->route('petrol_pump.index')->with('error','Petrol Pump Inactive Successfully!');
        }
        else
        {
            return redirect()->route('petrol_pump.index')->with('success','Petrol Pump Active Successfully!');
        }
    }
}
