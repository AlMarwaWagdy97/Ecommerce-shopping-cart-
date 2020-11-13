{{-- Here is Categories --}}

@extends('admin.index')

@section('title', 'Details for '.$category ->name)


@section('content')

<h1>Details for {{$category->name}}</h1><br>    <br>
<div class="row">

    <div class="col-sm-2">
        <p style="background-color: cadetblue;width: 60px; height: 30px;padding: 7px"><a href="{{$category->id}}/edit"><B style="color:white">Edit</B></a></p>
    </div>

    <div class="col-sm-2">
        <form action="/admin/category/{{$category->id}}" method="POST">
            @method('DELETE')
            @csrf
            <button class="btn btn-danger" type="submit">Delete</button>
        </form>
    </div>
    <br>
    <hr>

</div>
{{-------------------------------------------------------------------------------------}}
<div class="row">
    <div class="col-12">
        <p><strong>Id:</strong> {{$category->id}}</p>
        <p><strong>Name:</strong> {{$category->name}}</p>
        <p><strong>Ske:</strong> {{$category->ske}}</p>
        <p><strong>Price:</strong> {{$category->price}}</p>
        <p><strong>Amount:</strong> {{$category->amount}}</p>

    </div>
</div>
@if ($category->image)
<div class="row">
    <div class="col-12">
        <img src="{{ asset('storage/'. $category->image) }}" alt="" class="img-thumbnail">
    </div>
</div>
@endif

@endsection

