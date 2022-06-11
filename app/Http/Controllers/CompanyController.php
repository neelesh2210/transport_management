<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Companie;
use App\Http\Controllers\Controller;
use DB;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use App\Material;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    function __construct() {
		$this->middleware('permission:companies-list|companies-create|companies-edit|companies-delete', ['only' => ['index', 'store']]);
		$this->middleware('permission:companies-create', ['only' => ['create', 'store']]);
		$this->middleware('permission:companies-edit', ['only' => ['edit', 'update']]);
		$this->middleware('permission:companies-delete', ['only' => ['destroy']]);
	}

    public function index()
    {
       $data=Companie::all();
       return view('company.viewcompany',['page_name'=>"Company List",'data'=>$data,'checked'=>'checked','unchecked'=>'']);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         return view('company.company',['page_name'=>'Company Registration']);
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
         if($request->file('company_logo')){
         $file=$request->file('company_logo');
         $fileName=$request->company_code.'_'.$file->getClientOriginalName();
         $fileName=str_replace(" ","_",$fileName);
         $file->move('images',$fileName);
          }
         $input = $request->all();
         $input['company_logo'] = $fileName;
         Companie::create($input);

         $request->session()->flash('data','Data Inserted Successfully!');

         return redirect('company');
        
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
      $company=Companie::find($id);
      return view('company.company',['page_name'=>'Company Registration','data'=>$company]);
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


        
        if($request->file('company_logo')){
         $file=$request->file('company_logo');
         $fileName=$request->company_code.'_'.$file->getClientOriginalName();
         $fileName=str_replace(" ","_",$fileName);
         $file->move('images',$fileName);
         }
        $input = $request->all();
        if(!empty($fileName)){
        $input['company_logo'] = $fileName;
          }
        // $company= Companie::find($id);
         Companie::find($id)-> update($input);
        //$company->fill($input)->save();
        $request->session()->flash('data','Data Updated Successfully!');
         return redirect('company');
      
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request,$id)
    {
        if($id=='bulk_delete'){
            $request->validate([
    	"bulk_delete"=>"required"]);
       
            $input = $request->all();
            $ids=$input['bulk_delete'];
            Companie::destroy($ids);
            $request->session()->flash('data','Data Deleted Successfully!');
            return redirect('company');
         
        }
        else{
         Companie::find($id)-> delete();
         $request->session()->flash('data','Data Deleted Successfully!');
         return redirect('company');
        }

    }

    public function update_status(Request $request){
 
     Companie::where('id',$request->c_id)->update(['status'=>$request->stat]);
     $status=Companie::find($request->c_id);
     return response()->json(array('msg'=>$status), 200);

    }
    
     public function material_store(Request $request){
 
       $material=new Material;
       $material->name=$request->material;
       $material->save();
        return response()->json(array('msg'=>'1'), 200);

    }
    
}
