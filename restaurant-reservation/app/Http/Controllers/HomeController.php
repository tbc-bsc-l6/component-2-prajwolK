<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Food;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index()
    {
        if(Auth::id())
        {
            $user_type = Auth()->user()->user_type;
            if($user_type=='user')
            {
                $data=Food::all();
                return view('home.index',compact('data'));
            }
            else{
                return view('admin.index');
            }
        }
    }

    public function myhome()
    {
        $data=Food::all();
        return view('home.index',compact('data'));
    }
}
