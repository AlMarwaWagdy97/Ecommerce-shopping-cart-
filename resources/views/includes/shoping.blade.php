@extends('Layouts.index')

@section('title', 'Shoping');

@section('content')
{{Request::session()->put('appear', 1)}}

   <div class="col-lg-3">

        <h1 class="my-4">Shop Items</h1>
        <div class="list-group">
          <a href="#" class="list-group-item">Clothes</a>
          <a href="#" class="list-group-item">perfumes</a>
          <a href="#" class="list-group-item">Mobiles</a>
        </div>

    </div>

<br>
    <div class="col-lg-9">

        <div class="row">
            @foreach ($categories as $category)
                <div class="col-lg-4 col-md-6 mb-4">

                    <div class="card h-100">

                        <a href="#">
                            @if ($category->image)
                            <div class="row">
                                <div class="col-12">
                                    <img src="{{ asset('storage/'. $category->image) }}" alt="" class="img-thumbnail">
                                </div>
                            </div>                                
                            @else
                                <img class="card-img-top" src="http://placehold.it/700x400" alt="">
                            @endif
                        </a>
                        <div class="card-body">
                            <h4 class="card-title">
                            <h3>{{$category->name}}</h3>
                            </h4>
                            <h5 class="text-primary">{{$category->price}}</h5>
                            <p class="card-text">{{$category->description}}</p>
                            <span><B>Brands:</B> </span>
                            @foreach ($category->brands as $brand)
                                <span>{{$brand->name}},  </span>    
                            @endforeach
                        </div>
                        <a href="add-to-cart/{{$category->id}}" style="color: white; text-align: center;margin-bottom: 5px"><button type="button" class="btn btn-success">Add to Cart</button></a>                        
                        <div class="card-footer">
                            <small class="text-muted">&#9733; &#9733; &#9733; &#9733; &#9734;</small>
                        </div>

                    </div>
                </div>
            @endforeach


            
        </div>
    </div>
</div>
      
@endsection