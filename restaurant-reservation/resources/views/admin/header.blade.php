<header class="header">   
      <nav class="navbar navbar-expand-lg">
        <div class="search-panel">
          <div class="search-inner d-flex align-items-center justify-content-center">
            <div class="close-btn">Close <i class="fa fa-close"></i></div>
            <form id="searchForm" action="#">
              <div class="form-group">
                <input type="search" name="search" placeholder="What are you searching for...">
                <button type="submit" class="submit">Search</button>
              </div>
            </form>
          </div>
        </div>
        <div class="container-fluid d-flex align-items-center justify-content-between">
            <!-- Log out               -->
            <div class="list-inline-item logout">
            <form method="POST" action="{{ route('logout') }}">
                                @csrf

                                <input class="btn btn-primary" type="submit" value="logout">
                            </form>
            </div>
          </div>
        </div>
      </nav>
    </header>