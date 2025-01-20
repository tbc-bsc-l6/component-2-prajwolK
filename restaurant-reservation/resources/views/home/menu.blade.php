<div id="blog" class="container-fluid bg-dark text-light py-5 text-center wow fadeIn">
    <h2 class="section-title py-5">FOODS</h2>
    <div class="tab-content" id="pills-tabContent">
        <div class="tab-pane fade show active" id="foods" role="tabpanel" aria-labelledby="pills-home-tab">
            
            <div class="row">
                @if($data->count() > 0)
                    @foreach($data as $food)
                        <div class="col-md-4">
                            <div class="card bg-transparent border my-3 my-md-0">
                                <img height="300" src="food_image/{{$food->image}}" class="rounded-0 card-img-top mg-responsive">
                                <div class="card-body">
                                    <h1 class="text-center mb-4 badge badge-primary">{{$food->price}}</h1>
                                    <h4 class="pt20 pb20">{{$food->name}}</h4>
                                    <p class="text-white">{{$food->detail}}</p>
                                </div>

                                <form action="{{url('addtocart', $food->id)}}" method="post">
                                    @csrf
                                    <input value="1" type="number" min="1" name="qty" required>
                                    <input class="btn btn-info" type="submit" value="Add to Cart">
                                </form>
                                <br><br><br>
                            </div>
                        </div>
                    @endforeach
                @else
                    <p class="text-center text-white">No food items found matching your search.</p>
                @endif
            </div>

            <!-- Pagination Links -->
            <div class="d-flex justify-content-center mt-4">
                {{ $data->links('pagination::bootstrap-4') }}
            </div>
        </div>
    </div>
</div>
