<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Collection;
use App\Models\Listdata;
use App\Models\Proscons;

use function Psy\debug;

class ItemController extends Controller
{
    public function storetital(Request $request){
        $list= new Listdata;
        $list->u_id=Auth::user()->id;
        $list->title=$request->title;
        $list->date=now()->format('d-M-Y');
        $list->time=now()->format('H:i A');
        $list->save();
        return response()->json('List Store Sucessfully');
    }
    public function getlist(){
        $id=Auth::user()->id;
        $data = Listdata::where('u_id', $id)->get();
        // Log::debug($data);
        return response()->json($data);
    }
    public function edit(Request $request,$id) {
        $list= Listdata::find($id);
        $list->title=$request->title;
        $list->save();
        return response()->json('Title Updated Sucessfully');
    }
    public function findtitle($id) {
        $data = Listdata::find($id);
        // Log::debug($data);
        return response()->json($data);
    }
    public function proscons(Request $request) {
        $list= new Proscons;
        $list->t_id=$request->id;
        $list->argument=$request->argument;
        $list->importance=$request->importance;
        $list->proscons=$request->prco;
        $list->save();
        return response()->json('Argument Stored Sucessfully');
    }
    public function findpros($id) {
        $fatch = Proscons::where('proscons', 'pros')->where('t_id', $id)->get();   
        $sum = Proscons::where('proscons', 'pros')->where('t_id', $id)->sum('importance'); 
        $data=[
            'data' => $fatch,
            'sum' => $sum
        ];
        // Log::debug($all);
        return response()->json($data);
    }
    public function findcons($id) {
        $fatch = Proscons::where('proscons', 'cons')->where('t_id', $id)->get();  
        $sum = Proscons::where('proscons', 'cons')->where('t_id', $id)->sum('importance'); 
        $data=[
            'data' => $fatch,
            'sum' => $sum
        ];
        // Log::debug($sum);
        return response()->json($data);
    }
}
