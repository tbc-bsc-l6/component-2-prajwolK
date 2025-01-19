<!DOCTYPE html>
<html>
  <head> 
    @include('admin.css')
    <style>
        table{
            border: 1px solid #DB6572;
            margin: auto;
            width: 90%;
            margin-top:50px;
        }
        th{
            background-color: #DB6572;
            padding: 20px;
            text-align: center;
            color: white;
        }
        td{
            padding: 10px;
            text-align:center;
            color:white;
            font-weight:bold;
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
                        <th>Phone Number</th>
                        <th>No. of Guests</th>
                        <th>Date</th>
                        <th>Time</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($book as $item)
                    <tr>
                        <td>{{ $item->phone }}</td>
                        <td>{{ $item->guest }}</td>
                        <td>{{ $item->date }}</td>
                        <td>{{ $item->time }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
      </div>
    </div>
    <!-- JavaScript files-->
    @include('admin.js')
  </body>
</html>