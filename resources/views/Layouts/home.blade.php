@extends('Layouts.index')

@section('title', 'Blue Development');

@section('content')
{{Request::session()->put('appear', 1)}}

      <h1>Welcome ..</h1>
@endsection