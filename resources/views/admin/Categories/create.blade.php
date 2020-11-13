
@extends('admin.index')

@section('title', 'Add Category')


@section('content')


<div class="row">
        <div class="col-12">
            <h1>Add Category :</h1>
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <form action="{{ url('admin/category') }}" method="POST" enctype="multipart/form-data">
                @csrf
                @include('admin.Categories.form')
                <button type="submit" class="btn btn-primary"> Add Category</button>
            </form>

        </div>
    </div>

   
@endsection

