<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PrimaryController extends Controller
{
    //homepage
    public function home()
    {
        return view('pages.home');
    }

    //Load json to sql server
    public function load()
    {
        return view('pages.json_load');
    }

    //Store Json to Sql Server

}
