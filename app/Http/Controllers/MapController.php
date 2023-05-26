<?php

namespace App\Http\Controllers;

use App\Events\mapp;
use App\Models\email;
use App\Models\Map;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Rap2hpoutre\FastExcel\FastExcel;
use Stevebauman\Location\Facades\Location;

class MapController extends Controller
{
    public function map(){
        $map= Map::all();
        return view('admin.map',compact('map'));
    }

    public function postmap(Request $request){

//        return request()->ip(); //Dynamic IP address get
//        $data= Location::get('172.159.24.227');

        $request->validate([
            'lat'=>'required',
            'lon'=>'required'
        ]);
        $map= Map::create($request->all());
        event(new mapp($map));
        if ($map){
            return $map;
        }
    }


    public function postjop(Request $request){
        $request->validate([
            'message'=>'required'
        ]);

       $d= \App\Jobs\email::dispatch($request->message)->delay(Carbon::now()->second);


//        event(new mapp($map));
//        if ($map){
//            return $map;
//        }
    }

    public function exsel(){
        // Load users
        $users = User::all();

// Export all users

        return   (new FastExcel($users))->export('file.xlsx');;
    }

}
