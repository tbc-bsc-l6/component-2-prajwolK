<div class="d-flex align-items-stretch">
      <nav id="sidebar">
        <div class="sidebar-header d-flex align-items-center">
          <div class="title">
            <h1 class="h5">Admin</h1>
          </div>
        </div>
        <span class="heading">Main</span>
        <ul class="list-unstyled">
                <li class="active"><a href="index.html"> Home </a></li>
                <li><a href="#foodDropdown" aria-expanded="false" data-toggle="collapse"> Food </a>
                  <ul id="foodDropdown" class="collapse list-unstyled ">
                    <li><a href="{{url('addfood')}}">Add Food</a></li>
                    <li><a href="{{url('viewfood')}}">View Food</a></li>
                  </ul>
                </li>
                <li><a href="{{url('orders')}}">Orders </a></li>
        </ul><span class="heading">Extras</span>
        <ul class="list-unstyled">
          <li> <a href="#"> <i class="icon-settings"></i>Demo </a></li>
          <li> <a href="#"> <i class="icon-writing-whiteboard"></i>Demo </a></li>
          <li> <a href="#"> <i class="icon-chart"></i>Demo </a></li>
        </ul>
      </nav>
