<!DOCTYPE html>
<html>
  <head> 
    @include('admin.css')
    <style>
        table{
            border: 1px solid #DB6572;
            margin: auto;
            width: 75%;
        }

        th{
            background-color: #DB6572;
            color: white;
            padding: 10px;
            margin: 10px;
        }

        td{
            color:white;
            padding: 10px;
        }
    </style>
  </head>
  <body>
    @include('admin.header')
    @include('admin.sidebar')
      <div class="page-content">
        <div class="page-header">
        <div class="container-fluid">
            <h1>All Foods</h1>
            <div>
                <table>
                    <tr>
                        <th>Food</th>
                        <th>Details</th>
                        <th>Price</th>
                        <th>Image</th>
                    </tr>
                    @foreach($data as $data)
                    <tr>
                        <td>{{$data->name}}</td>
                        <td>{{$data->detail}}</td>
                        <td>{{$data->price}}</td>
                        <td>
                            <img width="150" src="food_image/{{$data->image}}" alt="">
                        </td>
                    </tr>
                    @endforeach
                </table>
            </div>
        </div>
      </div>
    </div>
    <!-- JavaScript files-->
    @include('admin.js')
  </body>
</html>