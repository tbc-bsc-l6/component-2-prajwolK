<h2 class="h5 no-margin-bottom">Dashboard</h2>
          </div>
        </div>
        <section class="no-padding-top no-padding-bottom">
          <div class="container-fluid">
            <div class="row">
              <div class="col-md-3 col-sm-6">
                <div class="statistic-block block">
                  <div class="progress-details d-flex align-items-end justify-content-between">
                    <div class="title">
                      <div class="icon"></div><strong>Total Users</strong>
                    </div>
                    <div class="number dashtext-1">{{$totaluser}}</div>
                  </div>
                  <div class="progress progress-template">
                    <div role="progressbar" style="width: 3%" aria-valuenow="30" aria-valuemin="0" aria-valuemax="100" class="progress-bar progress-bar-template dashbg-1"></div>
                  </div>
                </div>
              </div>
              <div class="col-md-3 col-sm-6">
                <div class="statistic-block block">
                  <div class="progress-details d-flex align-items-end justify-content-between">
                    <div class="title">
                      <div class="icon"></div><strong>Total Foods</strong>
                    </div>
                    <div class="number dashtext-2">{{$totalfood}}</div>
                  </div>
                  <div class="progress progress-template">
                    <div role="progressbar" style="width: 10%" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100" class="progress-bar progress-bar-template dashbg-2"></div>
                  </div>
                </div>
              </div>
              <div class="col-md-3 col-sm-6">
                <div class="statistic-block block">
                  <div class="progress-details d-flex align-items-end justify-content-between">
                    <div class="title">
                      <div class="icon"></div><strong>Total Orders</strong>
                    </div>
                    <div class="number dashtext-3">{{$totalorder}}</div>
                  </div>
                  <div class="progress progress-template">
                    <div role="progressbar" style="width: 5%" aria-valuenow="55" aria-valuemin="0" aria-valuemax="100" class="progress-bar progress-bar-template dashbg-3"></div>
                  </div>
                </div>
              </div>
              <div class="col-md-3 col-sm-6">
                <div class="statistic-block block">
                  <div class="progress-details d-flex align-items-end justify-content-between">
                    <div class="title">
                      <div class="icon"></div><strong>Total Delivered</strong>
                    </div>
                    <div class="number dashtext-4">{{$totaldelivered}}</div>
                  </div>
                  <div class="progress progress-template">
                    <div role="progressbar" style="width: 5%" aria-valuenow="35" aria-valuemin="0" aria-valuemax="100" class="progress-bar progress-bar-template dashbg-4"></div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </section>
        