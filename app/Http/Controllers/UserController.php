<?php

namespace App\Http\Controllers;
// use GuzzleHttp\Psr7\Response;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use App\Models\User;


class UserController extends Controller
{
    public $user;
    
    public function checkLogin(Request $request)
    {
        $user = auth('sanctum')->user();
        return response()->json($user);

    }             
}
