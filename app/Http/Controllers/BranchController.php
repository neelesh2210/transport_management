<?php

namespace App\Http\Controllers;

use App\Branch;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BranchController extends Controller
{

    function __construct()
    {
		$this->middleware('permission:companies-list|companies-create|companies-edit|companies-delete', ['only' => ['index', 'store']]);
		$this->middleware('permission:companies-create', ['only' => ['create', 'store']]);
		$this->middleware('permission:companies-edit', ['only' => ['edit', 'update']]);
		$this->middleware('permission:companies-delete', ['only' => ['destroy']]);
	}

    public function index(Request $request)
    {
        $list=Branch::where('delete_status',0)->orderBy('branch_name','asc');

        $search=$request->key;
        $company=$request->company_id;
        $materials=$request->material_id;
        if(!empty($company))
        {
            $list=$list->whereIn('company_id',$company);
        }
        if(!empty($materials))
        {
            $list=$list->where(function($query) use($materials) {
                foreach($materials as $material) {
                    $query->orWhereRaw("find_in_set('".$material."',material_id)");
                }
            });
        }
        if(!empty($search))
        {
            $list=$list->where(function ($query) use ($search)
            {
                $query->where('branch_name', 'like', '%'.$search.'%')
                ->orWhere('branch_code', 'like', '%'.$search.'%');
            });
        }

        $list=$list->paginate(10);

        return view('branch.index',['list'=>$list,'page_name'=>'Branch Registration','search'=>$search,'companies'=>$company,'materials'=>$materials]);
    }

    public function create()
    {
        return view('branch.create',['page_name'=>'Branch Registration']);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'company_id'=>'required',
			'branch_name' => 'required',
			'branch_code' => 'required|string|unique:branches,branch_code',
			'branch_address' => 'required',
            'material' => 'required',
		]);

        $branch=new Branch;

        $branch->company_id=$request->company_id;
        $branch->branch_name=$request->branch_name;
        $branch->branch_code=$request->branch_code;
        $branch->branch_address=$request->branch_address;
        $branch->material_id=implode(',',$request->material);
        $branch->add_by=Auth::user()->id;

        $branch->save();

        return redirect()->route('branch.index')->with('success','Brnach Added Successfully!');
    }

    public function show(Branch $branch)
    {
        //
    }

    public function edit($id)
    {
        $data=branch::find($id);
        return view('branch.edit',['page_name'=>'Branch Registration','data'=>$data]);
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'company_id'=>'required',
			'branch_name' => 'required',
			'branch_code' => 'required|string|unique:branches,branch_code,'.$id,
			'branch_address' => 'required',
            'material' => 'required',
		]);

        $branch=Branch::find($id);

        $branch->company_id=$request->company_id;
        $branch->branch_name=$request->branch_name;
        $branch->branch_code=$request->branch_code;
        $branch->branch_address=$request->branch_address;
        $branch->material_id=implode(',',$request->material);
        $branch->add_by=Auth::user()->id;

        $branch->save();

        return redirect()->route('branch.index')->with('success','Brnach Updated Successfully!');
    }

    public function destroy($id)
    {
        Branch::where('id',$id)->update(['delete_status'=>1]);

        return redirect()->route('branch.index')->with('error','Branch Delete Successfully!');
    }

    public function update_status($id,$status)
    {
        Branch::where('id',$id)->update(['status'=>$status]);

        if($status == 0)
        {
            return redirect()->route('branch.index')->with('error','Branch Inactive Successfully!');
        }
        else
        {
            return redirect()->route('branch.index')->with('success','Branch Active Successfully!');
        }
    }
}
