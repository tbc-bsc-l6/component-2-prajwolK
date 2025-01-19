<!DOCTYPE html>
<html lang="en">
<head>
    @include('home.css')
    <style>
        table{
            margin: auto;
            border: 1px solid  #DB6572;
            padding: 40px
        }
        th{
            padding:10px;
            text-align: center;
            background-color: #DB6572;
            color:white;
            font-weight:bold;
        }
        td{
            padding:10px;
            color:white;
        }
    </style>
</head>
<body data-spy="scroll" data-target=".navbar" data-offset="40" id="home">
    
<nav class="custom-navbar navbar navbar-expand-lg navbar-dark fixed-top" data-spy="affix" data-offset-top="10">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="#home">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#about">About</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#gallary">Gallary</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#book-table">Book-Table</a>
                </li>
            </ul>
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="#blog">Blog<span class="sr-only">(current)</span></a>
                </li>

                @if (Route::has('login'))
                @auth
                <li class="nav-item">
                    <a class="nav-link" href="{{url('mycart')}}">Cart</a>
                </li>
                <form action="{{route('logout')}}" method="POST">
                    @csrf
                <input class="btn btn-primary ml-xl-4" type="submit" value="Logout">
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
                <!-- <li class="nav-item">
                    <a href="components.html" class="">Components</a>
                </li> -->
            </ul>
        </div>
    </nav>
        <br><br><br><br>
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
        <?php
        $totalprice = 0;
        ?>
        @foreach($data as $item)
        <tr>
            <td>{{ $item->name }}</td>
            <td>Rs. {{ $item->price }}</td>
            <td>{{ $item->quantity }}</td>
            <td>
                <img width="150" src="food_image/{{ $item->image }}" alt="{{ $item->name }}">
            </td>
            <td>
                <a onclick="return confirm('Remove item form cart?')" class="btn btn-danger" href="{{url('removecart',$item->id)}}">Remove</a>
            </td>
        </tr>
        <?php
        $totalprice = $totalprice + $item->price;
        ?>
        @endforeach
    </tbody>
</table>
<br><br>
    <h2>Total Price: Rs. {{ $totalprice }}</h2>
    </div>
</body>
</html>
