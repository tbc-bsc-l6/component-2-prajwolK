<!DOCTYPE html>
<html lang="en">
<head>
    @include('home.css')
    <style>
        /* General Table Styling */
        table {
            margin: auto;
            border-collapse: collapse;
            width: 80%;
            background-color: #2c2f33;
            color: white;
        }

        thead th {
            padding: 15px;
            background-color: #DB6572;
            color: white;
            font-weight: bold;
            text-align: center;
        }

        tbody td {
            padding: 15px;
            text-align: center;
        }

        tbody img {
            border-radius: 8px;
        }

        /* Navbar Styling */
        .custom-navbar {
            background-color: #343a40;
            padding: 15px;
        }

        .custom-navbar .navbar-brand {
            font-size: 1.5rem;
            font-weight: bold;
            color: white;
        }

        .custom-navbar .nav-link {
            color: #ddd;
            transition: color 0.3s ease;
        }

        .custom-navbar .nav-link:hover {
            color: white;
        }

        .custom-navbar .btn-outline-light {
            transition: background-color 0.3s ease, color 0.3s ease;
        }

        .custom-navbar .btn-outline-light:hover {
            background-color: white;
            color: #343a40;
        }

        /* Form Styling */
        .div_center {
            display: flex;
            justify-content: center;
            align-items: center;
            margin: 50px 0;
        }

        .div_deg {
            margin: 10px 0;
        }

        .div_deg label {
            display: inline-block;
            width: 150px;
            color: white;
            font-weight: bold;
        }

        .div_deg input {
            padding: 8px;
            border: 1px solid #ddd;
            border-radius: 5px;
            width: 300px;
        }

        .div_deg input[type="submit"] {
            background-color: #DB6572;
            color: white;
            border: none;
            cursor: pointer;
            font-weight: bold;
        }

        .div_deg input[type="submit"]:hover {
            background-color: #c04b5c;
        }
    </style>
</head>
<body data-spy="scroll" data-target=".navbar" data-offset="40" id="home">
    
    <!-- Navbar -->
    <nav class="custom-navbar navbar navbar-expand-lg navbar-dark fixed-top">
        <div class="container">
            <a class="navbar-brand" href="{{url('/home')}}">Thistle Triangle</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="{{url('/home')}}">Home</a>
                    </li>
                    @if (Route::has('login'))
                        @auth
                        <form action="{{route('logout')}}" method="POST" class="form-inline ml-lg-3">
                            @csrf
                            <button class="btn btn-outline-light btn-sm" type="submit" style="padding: 5px 10px;">
                                Logout
                            </button>
                        </form>
                        @else
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">Login</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">Register</a>
                        </li>
                        @endauth
                    @endif
                </ul>
            </div>
        </div>
    </nav>

    <!-- Spacer for fixed navbar -->
    <div style="margin-top: 80px;"></div>

    <!-- Cart Section -->
    <div id="gallary" class="text-center bg-dark text-light has-height-md middle-items wow fadeIn">
        <table>
            <thead>
                <tr>
                    <th>Food</th>
                    <th>Price</th>
                    <th>Quantity</th>
                    <th>Image</th>
                    <th>Remove</th>
                </tr>
            </thead>
            <tbody>
                <?php $totalprice = 0; ?>
                @foreach($data as $item)
                <tr>
                    <td>{{ $item->name }}</td>
                    <td>Rs. {{ $item->price }}</td>
                    <td>{{ $item->quantity }}</td>
                    <td>
                        <img width="150" src="food_image/{{ $item->image }}" alt="{{ $item->name }}">
                    </td>
                    <td>
                        <a onclick="return confirm('Remove item from cart?')" class="btn btn-danger" href="{{url('removecart',$item->id)}}">Remove</a>
                    </td>
                </tr>
                <?php $totalprice += $item->price; ?>
                @endforeach
            </tbody>
        </table>
        <br><br>
        <h2>Total Price: Rs. {{ $totalprice }}</h2>
    </div>

    <!-- Order Form Section -->
    <div class="div_center">
        <form action="{{url('confirmorder')}}" method="post">
            @csrf
            <div class="div_deg">
                <label for="">Name</label>
                <input type="text" name="name" value="{{ Auth()->user()->name }}">
            </div>
            <div class="div_deg">
                <label for="">Email</label>
                <input type="email" name="email" value="{{ Auth()->user()->email }}">
            </div>
            <div class="div_deg">
                <label for="">Phone</label>
                <input type="number" name="phone" value="{{ Auth()->user()->phone }}">
            </div>
            <div class="div_deg">
                <label for="">Address</label>
                <input type="text" name="address" value="{{ Auth()->user()->address }}">
            </div>
            <div class="div_deg">
                <input class="btn btn-info" type="submit" value="Confirm Order">
            </div>
        </form>
    </div>
</body>
</html>
