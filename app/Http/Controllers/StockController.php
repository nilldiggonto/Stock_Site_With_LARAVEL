<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Stock_sql;
use DateTime;
use DB;

class StockController extends Controller
{
   //
    //
    //
    // Stock data list page
    public function index()
    {
        //
        // 
        //For Creating a filter
        $full_list = Stock_sql::all();

        //stock data list
        $data_list = Stock_sql::orderBy('created_at','desc')->paginate(100);
       
        //creating a json format for shwoing chart
        $month_pluck = Stock_sql::orderBy('date','asc')->take(15)->get();
        $month_json = json_decode($month_pluck,true);
     
        return view('og.show')->with('data_list',$data_list)->with('month_json',$month_json)->with('full_list',$full_list);
    }

    //
    //
    //
    // Store new Entry
    public function store(Request $request)
    {
        $this->validate($request,[
            'date' => 'required',
            'trade_code' => 'required',
            'high'=>'required',
            'low'=>'required',
            'open'=>'required',
            'close'=>'required',
            'volume'=>'required',
        ]);
        
        $data = new Stock_sql;
        $data->date = $request->input('date');
        $data->trade_code = $request->input('trade_code');
        $data->high = $request->input('high');
        $data->low = $request->input('low');
        $data->open = $request->input('open');
        $data->close = $request->input('close');
        $data->volume = $request->input('volume');
        $data->save();

        return redirect('og/')->with('success','Item Added');
    }


    //
    //
    // Details page & Update Page
    public function show($trade_code)
    {   
        $full_list = Stock_sql::all();
        $data_list = DB::table('json_models')->where('trade_code', '=', $trade_code)->get();
        $month_json = json_decode($data_list,true);
        return view('og.show')->with('data_list',$data_list)->with('month_json',$month_json)->with('full_list',$full_list);
    }


    //
    //
    //
    // Filter By Trade_code
    public function filter(Request $request)
    {   
        $full_list = Stock_sql::all();
        $trade_code = $request->get('filter');
       
        $data_list = DB::table('stock_sqls')->where('trade_code', '=', $trade_code)->get();
        
        $month_json = json_decode($data_list,true);
        return view('og.show')->with('data_list',$data_list)->with('month_json',$month_json)->with('full_list',$full_list);;

    }

    //
    //
    //
    //Entry Edit Link
    public function edit($id)
    {
        $edit = Stock_sql::find($id);
        return view('og.detail')->with('edit',$edit);
    }

    //
    //
    //
    // Update Entry
    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'date' => 'required',
            'trade_code' => 'required',
            'high'=>'required',
            'low'=>'required',
            'open'=>'required',
            'close'=>'required',
            'volume'=>'required',
        ]);
        
        $data = Stock_sql::find($id);
        $data->date = $request->input('date');
        $data->trade_code = $request->input('trade_code');
        $data->high = $request->input('high');
        $data->low = $request->input('low');
        $data->open = $request->input('open');
        $data->close = $request->input('close');
        $data->volume = $request->input('volume');
        $data->save();

        return redirect('og/')->with('success','Item Updated');
    }

  
    //
    //
    //
    // Delete Entry
    public function destroy($id)
    {
        $data = Stock_sql::find($id);
        if ($data) {
            $data->delete();
        }
        return redirect('og/')->with('success','Item Removed');
    }
}
