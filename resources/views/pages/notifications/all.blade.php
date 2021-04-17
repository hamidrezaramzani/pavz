@extends('layout.panel' , ["title" => "تمامی اعلان ها | پاوز"])
@section('dashboard')
    <div class="container-fluid">
        <div class="row justify-content-center py-3">
            <div class="col-12 col-md-12 dashboard-info-item-content is-checking p-5">
                <h3>اعلان ها</h3>
                <br>
                <br>
                @foreach ($data as $item)
                    @switch($item->icon)
                        @case("danger")
                            <a href="{{ $item->link }}" class="notification-alert-item">
                                <div class="alert alert-danger" role="alert">
                                    {{ $item->text }}
                                </div>
                            </a>

                        @break
                        @case("success")
                            <a href="{{ $item->link }}" class="notification-alert-item">
                                <div class="alert alert-success" role="alert">
                                    {{ $item->text }}
                                </div>
                            </a>
                        @break
                        @case("warning")
                            <a href="{{ $item->link }}" class="notification-alert-item">
                                <div class="alert alert-warning" role="alert">
                                    {{ $item->text }}
                                </div>
                            </a>
                        @break

                    @endswitch
                @endforeach
            </div>

        </div>
    </div>
@endsection
