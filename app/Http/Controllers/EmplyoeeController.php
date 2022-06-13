<?php

namespace App\Http\Controllers;

use DB;
use Hash;
use App\User;
use App\Companie;
use App\Emplyoeelog;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Permission;

class EmplyoeeController extends Controller
{

    function __construct()
    {
		$this->middleware('permission:employee-list|employee-create|employee-edit|employee-delete', ['only' => ['index', 'store']]);
		$this->middleware('permission:employee-create', ['only' => ['create', 'store']]);
		$this->middleware('permission:employee-edit', ['only' => ['edit', 'update']]);
		$this->middleware('permission:employee-delete', ['only' => ['destroy']]);
	}

    public function index()
    {
        $list=Emplyoeelog::paginate(10);
        return view('emplyoee.index',['page_name'=>"Emplyoee List",'list'=>$list,'checked'=>'checked','unchecked'=>'']);
    }

    public function create()
    {
        $roles = Role::pluck('name', 'name')->all();
        return view('emplyoee.create',['page_name'=>'Emplyoee Registration', 'roles'=>$roles]);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'company_id'=>'required',
            'branch_id'=>'required',
            'emplyoee_type'=>'required',
			'emplyoee_id' => 'required|email|unique:users,email',
			'emplyoee_password' => 'required',
			'roles' => 'required',
		]);

        $user = new User;
        $user->user_type = "employee";
        $user->name = $request->emplyoee_id;
        $user->email = $request->emplyoee_id;
        $user->password = Hash::make($request->emplyoee_password);
        $user->add_by = Auth::user()->id;
        $user->save();
		$user->assignRole($request->input('roles'));

        $emplyoee_log = new Emplyoeelog;
        $emplyoee_log->user_id = $user->id;
        $emplyoee_log->companies_id = $request->company_id;
        $emplyoee_log->branch_id = $request->branch_id;
        $emplyoee_log->emplyoee_type = $request->emplyoee_type;
        $emplyoee_log->add_by = Auth::user()->id;
        $emplyoee_log->save();

        return redirect()->route('emplyoee.index')->with('success','Employee Register Successfully!');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $data=Emplyoeelog::find($id);
        $roles = Role::pluck('name', 'name')->all();
        return view('emplyoee.edit',['page_name'=>'Emplyoee Registration Edit','data'=>$data,'roles'=>$roles]);
    }

    public function update(Request $request, $id)
    {
        $input = $request->all();
        Emplyoeelog::find($id)-> update($input);
        $request->session()->flash('data','Data Updated Successfully!');
        return redirect('emplyoee');
    }

    public function destroy(Request $request,$id)
    {
        Emplyoeelog::find($id)-> delete();
        $request->session()->flash('data','Data Deleted Successfully!');
        return redirect('emplyoee');
    }

    public function update_status($id,$status){

        Emplyoeelog::where('id',$id)->update(['status'=>$status]);

        if($status == 0)
        {
            return redirect()->route('emplyoee.index')->with('error','Employee Inactive Successfully!');
        }
        else
        {
            return redirect()->route('emplyoee.index')->with('success','Employee Active Successfully!');
        }
    }

    public function get_emplyoee($id){
        return Emplyoeelog::find($id);
    }

}
