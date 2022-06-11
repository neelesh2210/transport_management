<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Companie;
use App\Emplyoeelog;
use App\Emplyoeeprofile;
use Validator;

class EmplyoeeprofileApiController extends Controller
{
    public $successStatus = 200;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         $data=Emplyoeeprofile::all();
         return response()->json(['success' => 'Success','data'=>$data], $this-> successStatus); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
          $data = Emplyoeelog::all();
          return response()->json(['success' => 'Success','data'=>$data], $this-> successStatus); 
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        
         $valid=Validator::make($request->all(),[
             
         "company_name"=>"required",
         "company_code"=>"required",
         "company_location"=>"required",
           "company_branch_name"=>"required",
         "company_branch_code"=>"required",
         "company_branch_location"=>"required",
           "emplyoee_type"=>"required",

        ]);
        if($valid->fails()){

        	return response()->json(['error'=>$valid->errors()],401);
        }
        else{
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
         return response()->json(['success' => 'Success','msg'=>'Data Inserted Successfully'], $this-> successStatus); 
        }
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
    
    public function emplyoee_profile($id)
    {
         $data=Emplyoeeprofile::where('emplyoee_id',$id)->first();
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
        $data=Emplyoeeprofile::find($id);
        return response()->json(['success' => 'Success','data'=>$data], $this-> successStatus); 
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
         $valid=Validator::make($request->all(),[
             
         "company_name"=>"required",
         "company_code"=>"required",
         "company_location"=>"required",
           "company_branch_name"=>"required",
         "company_branch_code"=>"required",
         "company_branch_location"=>"required",
           "emplyoee_type"=>"required",

        ]);
        if($valid->fails()){

        	return response()->json(['error'=>$valid->errors()],401);
        }
        else{
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
         return response()->json(['success' => 'Success','msg'=>'Data Updated Successfully'], $this-> successStatus);
        }
         
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
         Emplyoeeprofile::find($id)-> delete();
         return response()->json(['success' => 'Success','msg'=>'Data Deleted Successfully'], $this-> successStatus);
    }
}
