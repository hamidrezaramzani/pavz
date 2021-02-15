@extends('layout.panel' , ["title" => "پیشخوان | پاوز"])
@section('dashboard')
<div class="container-fluid">
    @include('partials.panel.statistics.statistics')
    <br>
    <br>
    <div class="row justify-content-center dashboard-info">
        @include('partials.panel.dashboard.last-comments')
        @include('partials.panel.dashboard.last-reserves')
        @include('partials.panel.dashboard.last-tickets')
        @include('partials.panel.dashboard.vip')
        @include('partials.panel.dashboard.last-at')                                       
    </div>
</div>    
@endsection