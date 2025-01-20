<!DOCTYPE html>
<html>
  <head> 
    @include('admin.css')
    <style>
        table {
            border: 1px solid #DB6572;
            margin: auto;
            width: 75%;
        }

        th {
            background-color: #DB6572;
            color: white;
            padding: 10px;
            margin: 10px;
        }

        td {
            color: white;
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
          <!-- Search and Sort -->
          <div style="margin-bottom: 20px;">
            <form action="{{ url('viewfood') }}" method="GET" style="display: flex; gap: 10px;">
              <!-- Search Bar -->
              <input type="text" name="search" placeholder="Search Food..." value="{{ request('search') }}" style="padding: 5px;">

              <!-- Sorting -->
              <select name="sort" style="padding: 5px;">
                <option value="" disabled selected>Sort By</option>
                <option value="name" {{ request('sort') == 'name' ? 'selected' : '' }}>Name</option>
                <option value="price" {{ request('sort') == 'price' ? 'selected' : '' }}>Price</option>
              </select>

              <select name="order" style="padding: 5px;">
                <option value="asc" {{ request('order') == 'asc' ? 'selected' : '' }}>Ascending</option>
                <option value="desc" {{ request('order') == 'desc' ? 'selected' : '' }}>Descending</option>
              </select>

              <!-- Submit Button -->
              <button type="submit" class="btn btn-primary">Apply</button>
            </form>
          </div>

          <table>
            <tr>
              <th>Food</th>
              <th>Details</th>
              <th>Price</th>
              <th>Image</th>
              <th>Edit</th>
              <th>Delete</th>
            </tr>
            @foreach($data as $item)
            <tr>
              <td>{{ $item->name }}</td>
              <td>{{ $item->detail }}</td>
              <td>{{ $item->price }}</td>
              <td>
                <img width="150" height="150px" src="food_image/{{ $item->image }}" alt="">
              </td>
              <td>
                <a class="btn btn-secondary" href="{{ url('editfood', $item->id) }}">Edit</a>
              </td>
              <td>
                <!-- DELETE FORM -->
                <form action="{{ url('deletefood', $item->id) }}" method="POST" onsubmit="return confirm('Do you want to delete?');" style="display: inline;">
                  @csrf
                  @method('DELETE')
                  <button type="submit" class="btn btn-danger">Delete</button>
                </form>
              </td>
            </tr>
            @endforeach
          </table>
          <div style="margin-top: 20px; text-align: center">
            {{$data->links('pagination::bootstrap-4')}}
          </div>
        </div>
      </div>
    </div>

  </body>
</html>
