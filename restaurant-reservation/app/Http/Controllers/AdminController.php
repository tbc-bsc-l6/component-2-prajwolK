<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Food;
use App\Models\Order;
use App\Models\Book;

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

    public function viewfood(Request $request)
    {
        $query = Food::query();
        //Search
        if($request->has('search') && $request->search != ''){
            $query->where('name', 'LIKE', '%' . $request->search . '%')
                    ->orWhere('detail', 'LIKE', '%' . $request->search . '%');
        }

        //Sorting
        if ($request->has('sort') && $request->sort != '') {
            $sortField = $request->sort;
            $sortOrder = $request->order ?? 'asc';
            $query->orderBy($sortField, $sortOrder);
        }

        $data =  $query->paginate(5);

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
        $food = Food::find($id);
        if($food){
            $food->delete();
            return redirect('viewfood')->with('message', 'Food deleted successfully');
        }else{
            return redirect('viewfood')->with('message', 'Food not found');
        }
    }

    public function orders(Request $request)
    {
        $search = $request->input('search');
        $sortBy = $request->input('sort', 'name');
        $order = $request->input('order', 'asc');

        $query = Order::query();

        if ($search) {
            $query->where('name', 'LIKE', "%{$search}%")
                  ->orWhere('email', 'LIKE', "%{$search}%")
                  ->orWhere('phone', 'LIKE', "%{$search}%")
                  ->orWhere('address', 'LIKE', "%{$search}%")
                  ->orWhere('title', 'LIKE', "%{$search}%");
        }
    
        $data = $query->orderBy($sortBy, $order)->get();

        return view('admin.order',compact('data','search','sortBy','order'));
    }

    public function ontheway($id)
    {
        $data = Order::find($id);
        $data->delivery_status = "On the way";
        $data->save();
        return redirect('orders');
    }

    public function delivered($id)
    {
        $data = Order::find($id);
        $data->delivery_status = "Delivered";
        $data->save();
        return redirect('orders');
    }

    public function cancel($id)
    {
        $data = Order::find($id);
        $data->delivery_status = "Cancelled";
        $data->save();
        return redirect('orders');
    }

    public function reservation()
    {
        $book = Book::all();
        return view('admin.reservation',compact('book'));
    }
    
}
