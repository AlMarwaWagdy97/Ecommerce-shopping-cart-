
@extends('admin.index')

@section('title', 'Edit details for ' . $category->name)


@section('content')


<div class="row">
    <div class="col-12">
        <h1>Edit details for {{$category->name}}</h1>
    </div>
</div>

<div class="row">
    <div class="col-12">
        <form action="/admin/category/{{$category->id}}" method="POST" enctype="multipart/form-data">
            @method('PATCH')
            @include('admin.Categories.form', compact($category))
            <button type="submit" class="btn btn-primary"> Save Customer</button>
        </form>
    </div>
</div>

   
@endsection

