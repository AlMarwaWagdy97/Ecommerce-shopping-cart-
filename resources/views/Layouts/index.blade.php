@include('Layouts.header')
@include('Layouts.nav')


<div class="container">
    @if(session()->has('message'))
        <div class="alert alert-success" role="alert">
            <strong>Success...</strong> {{session()->get('message')}}
        </div>
    @endif
    {{-- Welcom To Our Shoping Cart --}}

    @yield('content')
</div>

@include('layouts.footer')