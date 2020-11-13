{{-- Here is Categories --}}

@extends('admin.index')

@section('title', 'Categories')


@section('content')

<h3>Categories: </h3>

<p><a href="category/create" style="float: right;"><B>Add New Category</B></a></p>
<p style="color: blueviolet">Click in name of categoy to Edit or delete</p>

    <div class="row">
        <div class="col-sm-1"><B> ID</B> </div>
        <div class="col-sm-1"><B> Name</B></div>
        <div class="col-sm-1"><B> Ske</B></div>
        <div class="col-sm-1"><B> Price </B></div>
        <div class="col-sm-1"><B> amount </B></div>
        <div class="col-sm-2"><B> brand </B></div>
        <div class="col-sm-3"><B> image </B></div>
    </div>
    <br>
    @foreach($categories as $category)
        <div class="row">
            <div class="col-sm-1"> {{$category->id}} </div>
            <div class="col-sm-1"> <a href="category/{{$category->id}}">{{$category->name}}</a> </div>
            <div class="col-sm-1"> {{$category->ske}} </div>
            <div class="col-sm-1"> {{$category->price}} </div>
            <div class="col-sm-1"> {{$category->amount}} </div>
            <div class="col-sm-2"> 
                {{-- <ul> --}}
                   
                    @foreach ($category->brands as $brand)
                    <li>{{$brand->name}}  </li>    
                    @endforeach
                {{-- </ul> --}}
                    
            </div>
            <div class="col-sm-3">
                @if ($category->image)
                    <img src="{{ asset('storage/'. $category->image) }}" alt="" class="img-thumbnail" style="width: 60px; height: 60px;  ">
                @endif
            </div>

        </div>
        <hr>
    @endforeach
@endsection

