<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Companie;
use App\Emplyoeelog;
use App\Emplyoeeprofile;
use App\User;
use App\Http\Controllers\Controller;
use DB;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class EmplyoeeprofileController extends Controller
{
     public $successStatus = 200;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


     function __construct() {
          $this->middleware('permission:employee-profile-list|employee-profile-create|employee-profile-edit|employee-profile-delete', ['only' => ['index', 'store']]);
          $this->middleware('permission:employee-profile-create', ['only' => ['create', 'store']]);
          $this->middleware('permission:employee-profile-edit', ['only' => ['edit', 'update']]);
          $this->middleware('permission:employee-profile-delete', ['only' => ['destroy']]);
     }

    public function index()
    {
        $list=Emplyoeelog::paginate(10);
        return view('emplyoee.index',['page_name'=>"Emplyoee List",'list'=>$list,'checked'=>'checked','unchecked'=>'']);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user= Emplyoeelog::all();
        return view('emplyoee.profile',['page_name'=>'Emplyoee Profile Registration','emp_id'=>$user]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $fileName='select.png';
        if($request->file('emplyoee_photo')){
            $file=$request->file('emplyoee_photo');
            $fileName=$request->emplyoee_id.'_'.$file->getClientOriginalName();
            $fileName=str_replace("","_",$fileName);
            $file->move('images/emp_profile',$fileName);
        }
        $input = $request->all();
        $input['emplyoee_photo'] = $fileName;
        Emplyoeeprofile::create($input);

        $user = User::where('email', $request->emplyoee_email)->first();
        $user->name = $request->emplyoee_name;
        $user->save();

        $request->session()->flash('data','Data Inserted Successfully!');

        return redirect('emplyoee_profile');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

         $data=Emplyoeeprofile::find($id);
         return response()->json(['success' => 'Success','data'=>$data], $this-> successStatus);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user= Emplyoeelog::all();
        $emplyoee=Emplyoeeprofile::find($id);
        return view('emplyoee.emplyoee_profile',['page_name'=>'Emplyoee Profile Edit','emp_id'=>$user,'edit_data'=>$emplyoee]);
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
        if($request->file('emplyoee_photo')){
            $file=$request->file('emplyoee_photo');
            $fileName=$request->emplyoee_id.'_'.$file->getClientOriginalName();
            $fileName=str_replace("","_",$fileName);
            $file->move('images/emp_profile',$fileName);
        }
        $input = $request->all();
        if(!empty($fileName)){
            $input['emplyoee_photo'] = $fileName;
        }
        Emplyoeeprofile::find($id)->update($input);

        $user = User::where('email', $request->emplyoee_email)->first();
        $user->name = $request->emplyoee_name;
        $user->save();

         if($request->sp=='ajax'){

              $status=Emplyoeeprofile::find($id);
              return response()->json(array('msg'=>$status), 200);
          }
          else{
         $request->session()->flash('data','Data Updated Successfully!');
         return redirect('emplyoee_profile');
          }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request,$id)
    {
         Emplyoeeprofile::find($id)-> delete();
       $request->session()->flash('data','Data Deleted Successfully!');
       return redirect('emplyoee_profile');
    }

    public function get_emp_details(Request $request)
    {
         $employee_id=$request->emp_id;
        $emp=Emplyoeelog::where('emplyoee_id',$employee_id)->get();
         return response()->json(array('msg'=> $emp), 200);
    }
}
