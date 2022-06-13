<?php

namespace App\Http\Controllers;

use DB;
use App\Branch;
use App\Companie;
use App\Material;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Permission;

class CompanyController extends Controller
{

    function __construct()
    {
		$this->middleware('permission:companies-list|companies-create|companies-edit|companies-delete', ['only' => ['index', 'store']]);
		$this->middleware('permission:companies-create', ['only' => ['create', 'store']]);
		$this->middleware('permission:companies-edit', ['only' => ['edit', 'update']]);
		$this->middleware('permission:companies-delete', ['only' => ['destroy']]);
	}

    public function index()
    {
        $list=Companie::where('delete_status',0)->orderBy('company_name','asc');

        $key=request()->key;
        if(!empty($key))
        {
            $list=$list->where(function ($query) use ($key){
                $query->where('company_name', 'like', '%'.$key.'%')
                      ->orWhere('company_code', 'like', '%'.$key.'%')->orWhere('company_gstin', 'like', '%'.$key.'%');
            });
        }

        $list=$list->paginate(10);

        $page_name='Company Registration';
        return view('company.index',compact('list','page_name','key'));
    }

    public function create()
    {
        return view('company.create',['page_name'=>'Company Registration']);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
			'company_name' => 'required',
			'company_code' => 'required|string|unique:companies,company_code',
			'company_address' => 'required',
		]);

        $company=new Companie;

        $company->company_name=$request->company_name;
        $company->company_code=$request->company_code;
        if($request->file('company_logo'))
        {
            $company_logo=$request->file('company_logo');
            $company_logo_name = time().rand(1, 100).".".$company_logo->getClientOriginalExtension();
            $company_logo->move(public_path('company_logos'), $company_logo_name);
            $company->company_logo = $company_logo_name;
        }
        $company->company_address=$request->company_address;
        $company->company_gstin=$request->company_gstin;
        $company->add_by=Auth::user()->id;

        $company->save();

        return redirect()->route('company.index')->with('success','Company Added Successfully!');

    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $data=Companie::find($id);
        return view('company.edit',['page_name'=>'Company Registration','data'=>$data]);
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
			'company_name' => 'required',
			'company_code' => 'required|string|unique:companies,company_code,'.$id,
			'company_address' => 'required',
		]);

        $company=Companie::find($id);

        $company->company_name=$request->company_name;
        $company->company_code=$request->company_code;
        $company->company_code=$request->company_code;
        if($request->file('company_logo'))
        {
            $company_logo=$request->file('company_logo');
            $company_logo_name = time().rand(1, 100).".".$company_logo->getClientOriginalExtension();
            $company_logo->move(public_path('company_logos'), $company_logo_name);
            $company->company_logo = $company_logo_name;
        }
        $company->company_address=$request->company_address;
        $company->company_gstin=$request->company_gstin;
        $company->add_by=Auth::user()->id;
        $company->save();

        return redirect()->route('company.index')->with('success','Company Updated Successfully!');

    }

    public function destroy($id)
    {
        Companie::where('id',$id)->update(['delete_status'=>1]);

        return redirect()->route('company.index')->with('error','Company Delete Successfully!');
    }

    public function update_status($id,$status)
    {
        Companie::where('id',$id)->update(['status'=>$status]);

        if($status == 0)
        {
            return redirect()->route('company.index')->with('error','Company Inactive Successfully!');
        }
        else
        {
            return redirect()->route('company.index')->with('success','Company Active Successfully!');
        }
    }

    public function material_store(Request $request)
    {
        $material=new Material;
        $material->name=$request->material;
        $material->save();

        return Material::where('delete_status',0)->where('status',1)->orderBy('name','asc')->get();

    }

    public function getBranch(Request $request)
    {
        return Branch::where('delete_status',0)->where('status',1)->where('company_id',$request->company_id)->get();
    }

}
