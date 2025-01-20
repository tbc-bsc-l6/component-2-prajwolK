<!DOCTYPE html>
<html>
  <head> 
    @include('admin.css')
    <style>
        table {
            border: 1px solid #DB6572;
            margin: auto;
            width: 90%;
        }
        th {
            background-color: #DB6572;
            color: white;
            text-align: center;
            font-weight: bold;
            font-size: 18px;
            padding: 10px;
        }
        td {
            color: white;
            text-align: center;
            font-weight: bold;
            padding: 10px;
        }
        a{
            color: white;
            text-decoration: none;
        }
        .search-form {
            text-align: center;
            margin: 20px;
        }
        .search-form input[type="text"] {
            width: 300px;
            padding: 10px;
            border: 1px solid #DB6572;
        }
        .search-form button {
            padding: 10px 20px;
            background-color: #DB6572;
            color: white;
            border: none;
            cursor: pointer;
        }
    </style>
  </head>
  <body>
    @include('admin.header')
    @include('admin.sidebar')

    <div class="page-content">
      <div class="page-header">
        <div class="container-fluid">
          <h1>Orders</h1>
          <!-- Search Form -->
          <div class="search-form">
            <form method="GET" action="{{ url('orders') }}">
              <input type="text" name="search" placeholder="Search orders..." value="{{ request('search') }}">
              <button type="submit">Search</button>
              <a href="{{ url('orders') }}" class="btn btn-secondary">Reset</a>
            </form>
          </div>
          <!-- Orders Table -->
          <table>
            <thead>
              <tr>
                <th>
                  <a href="{{ url('orders?search=' . request('search') . '&sort=name&order=' . (request('order') === 'asc' ? 'desc' : 'asc')) }}">
                    Customer Name
                    @if(request('sort') === 'name')
                      @if(request('order') === 'asc') ↑ @else ↓ @endif
                    @endif
                  </a>
                </th>
                <th>Email</th>
                <th>Phone</th>
                <th>Address</th>
                <th>
                  <a href="{{ url('orders?search=' . request('search') . '&sort=title&order=' . (request('order') === 'asc' ? 'desc' : 'asc')) }}">
                    Food
                    @if(request('sort') === 'title')
                      @if(request('order') === 'asc') ↑ @else ↓ @endif
                    @endif
                  </a>
                </th>
                <th>Quantity</th>
                <th>
                  <a href="{{ url('orders?search=' . request('search') . '&sort=price&order=' . (request('order') === 'asc' ? 'desc' : 'asc')) }}">
                    Price
                    @if(request('sort') === 'price')
                      @if(request('order') === 'asc') ↑ @else ↓ @endif
                    @endif
                  </a>
                </th>
                <th>Image</th>
                <th>
                  <a href="{{ url('orders?search=' . request('search') . '&sort=delivery_status&order=' . (request('order') === 'asc' ? 'desc' : 'asc')) }}">
                    Status
                    @if(request('sort') === 'delivery_status')
                      @if(request('order') === 'asc') ↑ @else ↓ @endif
                    @endif
                  </a>
                </th>
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
                  <a onclick="return confirm('Confirm action?')" class="btn btn-info" href="{{ url('ontheway', $item->id) }}">On the way</a>
                  <a onclick="return confirm('Confirm action?')" class="btn btn-warning" href="{{ url('delivered', $item->id) }}">Delivered</a>
                  <a onclick="return confirm('Confirm action?')" class="btn btn-danger" href="{{ url('cancel', $item->id) }}">Cancel</a>
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
