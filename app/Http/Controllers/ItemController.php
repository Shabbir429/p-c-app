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
        $list->id=Auth::user()->id;
        $list->title=$request->title;
        $list->date=now()->format('d-M-Y');
        $list->time=now()->format('H:i A');
        $list->save();
        return response()->json('List Store Sucessfully');
    }
    public function getlist(){
        $id=Auth::user()->id;
        $data = Listdata::where('id', $id)->get();
        // Log::debug($data);
        return response()->json($data);
    }
}
