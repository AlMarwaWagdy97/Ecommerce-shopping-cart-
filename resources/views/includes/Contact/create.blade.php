@extends('Layouts.index')

@section('title', 'Contact US')

@section('content')
{{Request::session()->put('appear', 1)}}
    @if(!(session()->has('message')))
        <h1> Contact - us </h1>

        <form action="{{route('contact.store')}}" method="POST">
            @csrf
            <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" name="name" class="form-control" value="{{old('name')}}">
                <div style="color: red;">{{ $errors->first('name') }}</div>
            </div>

            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" name="email" class="form-control" value="{{old('email') }}">
                <div style="color: red;">{{ $errors->first('email') }}</div>
            </div>

            <div class="form-group">
                <label for="message">Message:</label>
                <textarea id="message" name="message" cols="30"rows="10" class="form-control"></textarea>
                <div style="color: red;">{{ $errors->first('message') }}</div>
            </div>

            <button type="submit" class="btn btn-primary">Send Message</button>
        </form>
    @endif

@endsection
