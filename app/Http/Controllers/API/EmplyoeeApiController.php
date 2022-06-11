<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Companie;
use App\Emplyoeelog;
use Validator;
use URL;

class EmplyoeeApiController extends Controller
{
    
    public $successStatus = 200;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         $data=Emplyoeelog::all();
         return response()->json(['success' => 'Success','data'=>$data], $this-> successStatus); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data= Companie::all();
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
         "emplyoee_id"=>"required",
         "emplyoee_password"=>"required",
         "status"=>"required"

        ]);
        if($valid->fails()){

        	return response()->json(['error'=>$valid->errors()],401);
        }
        else{
         $input = $request->all();
         Emplyoeelog::create($input);
         
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
         $data=Emplyoeelog::find($id);
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
         $data=Emplyoeelog::find($id);
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
         "emplyoee_id"=>"required",
         "emplyoee_password"=>"required",
         "status"=>"required"

        ]);
        if($valid->fails()){

        	return response()->json(['error'=>$valid->errors()],401);
        }
        else{
         $input = $request->all();
         Emplyoeelog::find($id)-> update($input);
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
        Emplyoeelog::find($id)-> delete();
        return response()->json(['success' => 'Success','msg'=>'Data Deleted Successfully'], $this-> successStatus); 
    }
    
    public function login(Request $request){ 
     
        $emplyoee_id=$request->emplyoee_id;
        $emplyoee_password=$request->emplyoee_password;

    //  $details=Emplyoeelog::select('emplyoeelogs.emplyoee_id as emplyoee_id','emplyoeelogs.emplyoee_password as emplyoee_password','emplyoeeprofiles.emplyoee_name as emplyoee_name')->leftJoin('emplyoeeprofiles', function($join) {
    //   $join->on('emplyoeelogs.emplyoee_id', '=', 'emplyoeeprofiles.emplyoee_id');
    // })->where('emplyoeelogs.emplyoee_id',$emplyoee_id)->first();
    $details=Emplyoeelog::select('emplyoeelogs.emplyoee_id as emplyoee_id','emplyoeelogs.emplyoee_password as emplyoee_password','emplyoeeprofiles.emplyoee_name as emplyoee_name','emplyoeeprofiles.emplyoee_photo as emplyoee_photo','companies.company_logo as company_logo')->leftJoin('emplyoeeprofiles', 'emplyoeeprofiles.emplyoee_id', '=', 'emplyoeelogs.emplyoee_id')->leftJoin('companies', 'companies.company_code', '=', 'emplyoeelogs.company_code')
 ->where('emplyoeelogs.emplyoee_id',$emplyoee_id)->first();
   
   
        if(!empty($details) && isset($details)){
              
             if($details['emplyoee_password']==$emplyoee_password)
             {
                 unset($details['emplyoee_password']);
                 $details['emplyoee_photo']=URL::to('/images/emp_profile/'. $details['emplyoee_photo']);
            return response()->json(['Status' => 'Success','data'=>$details], $this-> successStatus); 
             }
             else{
                 return response()->json(['Status' => 'Error','msg'=>'Password Wrong'], $this-> successStatus); 
             }
        } 
        else{ 
            return response()->json(['Status' => 'Error','msg'=>'Unauthorised User'], $this-> successStatus); 
        } 
    
    }
    
}
