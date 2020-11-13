@extends('Layouts.index')

@section('title', 'Cart');

@section('content')
{{Request::session()->put('appear', 0)}}

    @if (Session::has('cart'))
        <div class="row d-flex justify-content-center mt-4">
            <div class="col-sm-6 col-md-6 col-md-offset-3 col-sm-offset-3 ">
                <ul class="list-group">
                    @foreach ($products as $product)
                        <li class="list-group-item ">
                            <span>
                                @if ($product['item']->image)
                                    <img src="{{ asset('storage/'. $product['item']->image) }}" alt="" class="img-thumbnail" style="width: 40px; height: 40px;">
                                @endif
                            </span>
                            <strong class="ml-2">{{  $product['item']['name'] }}</strong>
                            <span class="badge badge-secondary ml-2"  style="background-color: green">{{ $product['price'] }}</span>
                         <div class="dropdown btn-group">
                            <button type="button" class="btn btn-primary dropdown-toggle ml-2 btn-xs" data-toggle="dropdown">
                                Action
                            </button>
                            <div class="dropdown-menu">
                                <a class="dropdown-item" href="{{ route('ReduceOne',$product['item']['id']) }}">Reduce by 1</a>
                                <a class="dropdown-item" href="{{ route('DeleteItem',$product['item']['id']) }}">Delete</a>
                            </div>
                          </div>
                        <span class="badge badge-secondary " style="float: right; background-color: mediumturquoise">{{$product['Quantity']}}</span>
                    </li>
                    @endforeach
                </ul>
            </div>
        </div>
        <div class="row d-flex justify-content-center mt-3">
            <div class="col-sm-6 col-md-6 col-md-offset-3 col-sm-offset-3">
                <Strong>Total Quantity = {{$TotalQul}}</Strong>
            </div>
        </div>

        <div class="row d-flex justify-content-center mt-3">
            <div class="col-sm-6 col-md-6 col-md-offset-3 col-sm-offset-3">
                <Strong>Total Price = {{$TotalPrice}}</Strong>
            </div>
        </div>
        <div class="row d-flex justify-content-center mt-3">
            <div class="col-sm-6 col-md-6 col-md-offset-3 col-sm-offset-3">
                <a href="{{route('checkout')}}" type="button" class="btn btn-success">Check out </a>
            </div>
        </div>
    @else 

    <div class="row d-flex justify-content-center">
        <div class="col-sm-6 col-md-6 col-md-offset-3 col-sm-offset-3">
            <h2>No Items in Cart !</h2>
        </div>
    </div>

    @endif
      
@endsection