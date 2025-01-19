<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Food;
use App\Models\Order;

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
        return redirect('viewfood');
    }

    public function viewfood()
    {
        $data=Food::all();
        return view('admin.showfood',compact('data'));
    }

    public function editfood($id){
        $food = Food::find($id);
        return view('admin.editfood',compact('food'));
    }

    public function foodedit(Request $request,$id)
    {
        $data=Food::find($id);
        $data->name=$request->name;
        $data->detail=$request->details;
        $data->price=$request->price;
        $image=$request->image;
        if($image)
        {
            $imagename=time().'.'.$image->getClientOriginalExtension();
            $request->image->move('food_image',$imagename);
            $data->image=$imagename;
        }
        $data->save();
        return redirect('viewfood');
    }

    public function deletefood($id)
    {
        $data=Food::find($id);
        $data->delete();
        return redirect('viewfood');
    }

    public function orders()
    {
        $data=Order::all();
        return view('admin.order',compact('data'));
    }
    
}
