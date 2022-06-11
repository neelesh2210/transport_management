<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\RateChart;
use App\Imports\ChartImport;
use Maatwebsite\Excel\Facades\Excel;

use App\Http\Controllers\Controller;
use DB;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RateChartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    function __construct() {
		$this->middleware('permission:rate-chart-list|rate-chart-create|rate-chart-edit|rate-chart-delete', ['only' => ['index', 'store']]);
		$this->middleware('permission:rate-chart-create', ['only' => ['create', 'store']]);
		$this->middleware('permission:rate-chart-edit', ['only' => ['edit', 'update']]);
		$this->middleware('permission:rate-chart-delete', ['only' => ['destroy']]);
	}
    
    public function index()
    {
        $data=RateChart::all();
        return view('rate_chart.viewrate_chart',['page_name'=>"Rate Chart",'data'=>$data,'checked'=>'checked','unchecked'=>'']);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         return view('rate_chart.rate_chart',['page_name'=>'Rate Chart']);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {       
        $file=$request->file('file');
        if($file){
            
            Excel::import(new ChartImport, $file);
        }else{
            $input = $request->all();
            
            RateChart::create($input);
        }
        $request->session()->flash('data','Data Inserted Successfully!');

        return redirect('rate_chart');
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
        $rate=RateChart::find($id);
        return view('rate_chart.rate_chart',['page_name'=>'Rate Chart', 'edit_data'=>$rate]);
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
    
        RateChart::find($id)-> update($input);
       
        $request->session()->flash('data','Data Updated Successfully!');
        return redirect('rate_chart');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        RateChart::find($id)-> delete();
        $request->session()->flash('data','Data Deleted Successfully!');
        return redirect('rate_chart');
    }
    
    public function update_status(Request $request){
 
        RateChart::where('id',$request->c_id)->update(['status'=>$request->stat]);
        $status=RateChart::find($request->c_id);
        return response()->json(array('msg'=>$status), 200);

    }
    public function RateDetail(Request $request){

        //Driver::where('id', $request->driver_id);
        $rate=RateChart::find($request->rate_id);
        //return $driver;
        return response()->json(array('data'=>$rate), 200);

    }
}
