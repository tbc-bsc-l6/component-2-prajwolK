<!DOCTYPE html>
<html>
  <head> 
    <base href="/public">
    @include('admin.css')

    <style>
        .div_deg{
            padding: 10px;
        }

        label{
            display: inline-block;
            width: 25%;
            color: white;
        }
    </style>
  </head>
  <body>
    @include('admin.header')
    @include('admin.sidebar')
      <div class="page-content">
        <div class="page-header">
        <div class="container-fluid">
            <h1>Update Food</h1>
            <form action="{{url('foodedit',$food->id)}}" method="post" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="div_deg">
                    <label for="">Name</label>
                    <input type="text" name="name" value="{{$food->name}}">
                </div>
                <div class="div_deg">
                    <label for="">Details</label>
                    <textarea name="details" id="">{{$food->detail}}</textarea>
                </div>
                <div class="div_deg">
                    <label for="">Price</label>
                    <input type="text" name="price" value="{{$food->price}}">
                </div>

                <div class="div_deg">
                    <label for="">Current Image</label>
                    <img width="150px" height="150px" src="food_image/{{$food->image}}" alt="">
                </div>

                <div class="div_deg">
                    <label for="">Change Image</label>
                    <input type="file" name="image">
                </div>

                <div class="div_deg">
                    <input class="btn btn-warning" type="submit" value="Update">
                </div>
            </form>
        </div>
      </div>
    </div>
    <!-- JavaScript files-->
    @include('admin.js')
  </body>
</html>