<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Json_model;
use DateTime;
use DB;
class JsonController extends Controller
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
        $full_list = Json_model::all();

        //stock data list
        $data_list = Json_model::orderBy('created_at','desc')->paginate(100);
       
        //creating a json format for shwoing chart
        $month_pluck = Json_model::orderBy('date','asc')->take(15)->get();
        $month_json = json_decode($month_pluck,true);
     
        return view('stocks.show')->with('data_list',$data_list)->with('month_json',$month_json)->with('full_list',$full_list);
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
        
        $data = new Json_model;
        $data->date = $request->input('date');
        $data->trade_code = $request->input('trade_code');
        $data->high = $request->input('high');
        $data->low = $request->input('low');
        $data->open = $request->input('open');
        $data->close = $request->input('close');
        $data->volume = $request->input('volume');
        $data->save();

        return redirect('/stocks')->with('success','Item Added');
    }


    //
    //
    // Details page & Update Page
    public function show($trade_code)
    {   
        $full_list = Json_model::all();
        $data_list = DB::table('json_models')->where('trade_code', '=', $trade_code)->get();
        $month_json = json_decode($data_list,true);
        return view('stocks.show')->with('data_list',$data_list)->with('month_json',$month_json)->with('full_list',$full_list);
    }


    //
    //
    //
    // Filter By Trade_code
    public function filter(Request $request)
    {   
        $full_list = Json_model::all();
        $trade_code = $request->get('filter');
       
        $data_list = DB::table('json_models')->where('trade_code', '=', $trade_code)->get();
        
        $month_json = json_decode($data_list,true);
        return view('stocks.show')->with('data_list',$data_list)->with('month_json',$month_json)->with('full_list',$full_list);;

    }

    //
    //
    //
    //Entry Edit Link
    public function edit($id)
    {
        $edit = Json_model::find($id);
        return view('stocks.detail')->with('edit',$edit);
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
        
        $data = Json_model::find($id);
        $data->date = $request->input('date');
        $data->trade_code = $request->input('trade_code');
        $data->high = $request->input('high');
        $data->low = $request->input('low');
        $data->open = $request->input('open');
        $data->close = $request->input('close');
        $data->volume = $request->input('volume');
        $data->save();

        return redirect('/stocks')->with('success','Item Updated');
    }

  
    //
    //
    //
    // Delete Entry
    public function destroy($id)
    {
        $data = Json_model::find($id);
        if ($data) {
            $data->delete();
        }
        return redirect('/stocks')->with('success','Item Removed');
    }
}
