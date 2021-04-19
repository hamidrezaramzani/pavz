@extends('layout.panel' , ["title" => "پاسخ های این تیکت | پاوز"])
@section('dashboard')
    <div class="container-fluid">
        <div class="row justify-content-center py-3">
            <div class="col-12 col-md-12 dashboard-info-item-content is-checking p-5">
                <h3>تیکت</h3>
                <br>
                <br>

                <div class="alert alert-info is">
                    <h5 class="is">{{ $ticket->title }}</h5>
                    <br>
                    <p class="text-dark text-right">{{ $ticket->description }}</p>
                    <br>
                    @if ($ticket->attach)
                        <a href="{{ asset('tickets/' . $ticket->attach) }}">دانلود پیوست</a>
                    @else
                        پیوست ندارد
                    @endif
                </div>

                <br>
                <h3>پاسخ های این تیکت</h3>
                <br>
                
                @foreach ($data as $item)

                    <div class="alert alert-warning is">
                        <br>
                        <p class="text-dark text-right">{{ $item->description }}</p>
                        <br>
                    </div>

                @endforeach
            </div>

        </div>
    </div>
@endsection
