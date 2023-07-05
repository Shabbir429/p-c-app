<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use App\Models\Listdata;

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
    public function findtitle(Request $request) {
        // $id=Auth::user()->id;
        $data = Listdata::where('id', $request->id)->get();
         Log::debug($data);
         return response()->json($data);
    }
}
