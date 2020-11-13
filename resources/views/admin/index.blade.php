@include('Layouts.header')
@include('admin.nav')


<div class="container">
    @if(session()->has('message'))
        <div class="alert alert-success" role="alert">
            <strong>Success...</strong> {{session()->get('message')}}
        </div>
    @endif
    @yield('content')
</div>

@include('layouts.footer')