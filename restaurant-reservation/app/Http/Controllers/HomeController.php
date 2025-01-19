<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Food;
use App\Models\Cart;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

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

    public function addtocart(Request $request, $id)
    {
        if(Auth::id())
        {
            $food = Food::find($id);

            $data = new Cart;
            $data->name = $food->name;
            $data->details = $food->detail;
            $data->price = Str::remove('Rs.',$food->price) * $request->qty;
            $data->image = $food->image;
            $data->quantity = $request->qty;
            $data->userid = Auth()->user()->id;
            $data->save();
            return redirect()->back()->with('message', 'Item added to cart successfully');

        }
        else
        {
            return redirect()->route('login')->with('message', 'Please login to add to cart');
        }
    }

    public function mycart()
    {
        $userid = Auth()->user()->id;
        $data=Cart::where('userid','=',$userid)->get();
        return view('home.mycart',compact('data'));
    }

    public function removecart($id)
    {
        $data = Cart::find($id);
        $data->delete();
        return redirect()->back();
    }
}
