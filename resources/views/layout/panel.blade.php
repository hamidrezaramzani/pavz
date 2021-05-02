@extends('layout.content' , ["title" => $title])
@section('content')
    <div class="container-fluid">
        <div class="row dashboard justify-content-center panel">
            @include('partials.panel.sidebar')

            <div class="col-12 col-md-10">
                @include('partials.panel.navbar')
                @yield('dashboard')
            </div>
        </div>
    </div>

@endsection
