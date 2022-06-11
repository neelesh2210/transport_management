<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Companie;
use App\Emplyoeelog;
use App\Http\Controllers\Controller;
use DB;
use Hash;
use App\User;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class EmplyoeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    function __construct() {
		$this->middleware('permission:employee-list|employee-create|employee-edit|employee-delete', ['only' => ['index', 'store']]);
		$this->middleware('permission:employee-create', ['only' => ['create', 'store']]);
		$this->middleware('permission:employee-edit', ['only' => ['edit', 'update']]);
		$this->middleware('permission:employee-delete', ['only' => ['destroy']]);
	}
    
    public function index()
    {
        $data=Emplyoeelog::all();
        return view('emplyoee.viewemplyoee',['page_name'=>"Emplyoee List",'data'=>$data,'checked'=>'checked','unchecked'=>'']);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = Role::pluck('name', 'name')->all();
        $Companie = Companie::all();
        return view('emplyoee.emplyoee_register',['page_name'=>'Emplyoee Registration','data'=>$Companie, 'roles'=>$roles]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
			'emplyoee_id' => 'required|email|unique:users,email',
			'emplyoee_password' => 'required',
			'roles' => 'required',
		]);
        
        $user = new User;
        $user->user_type = "employee";
        $user->name = $request->emplyoee_id;
        $user->email = $request->emplyoee_id;
        $user->password = Hash::make($request->emplyoee_password);
        $user->save();
		$user->assignRole($request->input('roles'));
        
        $companie = Companie::find($request->company_id);
        $emplyoee_log = new Emplyoeelog;
        $emplyoee_log->user_id = $user->id;
        $emplyoee_log->companies_id = $companie->id;
        $emplyoee_log->company_name = $companie->company_name;
        $emplyoee_log->company_code = $companie->company_code;
        $emplyoee_log->company_location = $companie->company_location;
        $emplyoee_log->company_branch_name = $companie->company_branch_name;
        $emplyoee_log->company_branch_code = $companie->company_branch_code;
        $emplyoee_log->company_branch_location = $companie->company_branch_location;
        $emplyoee_log->emplyoee_type = $request->emplyoee_type;
        $emplyoee_log->emplyoee_id = $request->emplyoee_id;
        $emplyoee_log->emplyoee_password = $request->emplyoee_password;
        $emplyoee_log->status = $request->status;
        $emplyoee_log->add_by = $request->add_by;
        $emplyoee_log->save();
        
        $request->session()->flash('data','Data Inserted Successfully!');

        return redirect('emplyoee');
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
         $emplyoee=Emplyoeelog::find($id);
         $user= Companie::all();
         return view('emplyoee.emplyoee_register',['page_name'=>'Emplyoee Registration Edit','data'=>$user,'edit_data'=>$emplyoee]);
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
         Emplyoeelog::find($id)-> update($input);
         $request->session()->flash('data','Data Updated Successfully!');
         return redirect('emplyoee');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request,$id)
    {
        Emplyoeelog::find($id)-> delete();
        $request->session()->flash('data','Data Deleted Successfully!');
        return redirect('emplyoee');
    }
    
    public function update_status(Request $request){
 
     Emplyoeelog::where('id',$request->e_id)->update(['status'=>$request->stat]);
     $status=Emplyoeelog::find($request->e_id);
     return response()->json(array('msg'=>$status), 200);

    }
    
    public function get_emplyoee($id){
        return Emplyoeelog::find($id);
    }
    
}
