<!DOCTYPE html>
<html>
  <head> 
    @include('admin.css')
    <style>
        table{
            border: 1px solid #DB6572;
            margin: auto;
            width: 90%;
        }
        th{
            background-color: #DB6572;
            color: white;
            text-align: center;
            font-weight:bold;
            font-size: 18px;
            padding: 10px;
        }
        td{
            color: white;
            text-align: center;
            font-weight:bold;
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
        <table>
            <thead>
                <tr>
                    <th>Customer Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Address</th>
                    <th>Food</th>
                    <th>Quantity</th>
                    <th>Price</th>
                    <th>Image</th>
                    <th>Status</th>
                    <th>Change Status</th>
                </tr>
            </thead>
            <tbody>
                @foreach($data as $item)
                <tr>
                    <td>{{ $item->name }}</td>
                    <td>{{ $item->email }}</td>
                    <td>{{ $item->phone }}</td>
                    <td>{{ $item->address }}</td>
                    <td>{{ $item->title }}</td>
                    <td>{{ $item->quantity }}</td>
                    <td>{{ $item->price }}</td>
                    <td>
                        <img width="100" src="food_image/{{ $item->image }}" alt="{{ $item->title }}">
                    </td>
                    <td>{{ $item->delivery_status }}</td>
                    <td>
                        <a onclick="return confirm('Confirm action?')" class="btn btn-info" href="{{url('ontheway',$item->id)}}">On the way</a>
                        <a onclick="return confirm('Confirm action?')" class="btn btn-warning" href="{{url('delivered',$item->id)}}">Delivered</a>
                        <a onclick="return confirm('Confirm action?')" class="btn btn-danger" href="{{url('cancel',$item->id)}}">Cancel</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>

        </div>
      </div>
    </div>

  </body>
</html>