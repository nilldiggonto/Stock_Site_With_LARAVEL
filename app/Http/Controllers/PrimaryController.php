<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use DB;
class PrimaryController extends Controller
{
    //
    //
    //
    //homepage
    public function home()
    {
        return view('pages.home');
    }
    //
    //
    //
    //Load json to sql server
    public function load()
    {
        return view('pages.json_load');
    }
    //
    //
    //
    //Store Json to Sql Server
    public function store(Request $request)
    {
        //validate file
        $request->validate([
            'file' => 'required'
        ]);
        //file path & extensions    
        $file = file($request->file->getRealPath());
        $extension = $request->file('file')->extension();
  
        //Checking extensions & saving to sql server
        if($extension="json"){
            // return 'everything is okay';
            $file = implode($file);
        
            $parts = json_decode($file,true);
            $objs = (array_chunk($parts,5000));
            foreach ($objs as $obj)  {
                foreach ($obj as $key => $value) {
                    $insertArr[Str::slug($key,'_')] = $value;
                }
                DB::table('json_models')->insert($insertArr);
            }
            return redirect('/')->with('success','Database Created Go to Stock Chart');
        }
        else{ 
            return redirect('/load')->with('error','File should be Json Formatted ');
        }

    }
    //
    //
    //

     
    
 

}
