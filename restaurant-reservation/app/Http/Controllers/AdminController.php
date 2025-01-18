<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Food;

class AdminController extends Controller
{
    public function addfood()
    {
        return view('admin.addfood');
    }

    public function uploadfood(Request $request)
    {
        $data=new Food;
        $data->name=$request->name;
        $data->detail=$request->detail;
        $data->price=$request->price;
        $image=$request->image;
        $imagename=time().'.'.$image->getClientOriginalExtension();
        $request->image->move('food_image',$imagename);
        $data->image=$imagename;
        $data->save();
        return redirect()->back();
    }

    public function viewfood()
    {
        $data=Food::all();
        return view('admin.showfood',compact('data'));
    }
}
