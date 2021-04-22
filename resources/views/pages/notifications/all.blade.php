@extends('layout.panel' , ["title" => "تمامی اعلان ها | پاوز"])
@section('dashboard')
    <div class="container-fluid">
        <div class="row justify-content-center py-3">
            <div class="col-12 col-md-12 dashboard-info-item-content is-checking p-5">
                <h3>اعلان ها</h3>
                <br>
                <br>
                @foreach ($data as $item)
                    <a href="{{ $item->link }}" class="notification-alert-item">
                        <div class="alert text-dark" role="alert">
                            <img src="{{ asset('images/status/' . $item->icon . '.png') }}" alt="Danger icon" width="30"
                                height="30">
                            {{ jdate($item->created_at)->format('%A %d %B %Y') }} - 
                            {{ $item->text }}
                        </div>
                    </a>
                @endforeach
            </div>

        </div>
    </div>
@endsection
