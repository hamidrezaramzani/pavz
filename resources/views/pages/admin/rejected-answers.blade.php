@extends('layout.panel' , ["title" => "جواب های رد شده | پاوز"])
@section('dashboard')
    <div class="container-fluid">
        <div class="row justify-content-center py-3">
            <div class="col-12 col-md-12 dashboard-info-item-content is-checking p-5">
                <h3>جواب های رد شده</h3>
                <br>
                <br>

                <div class="table-resposive">
                    <table class="table text-center table-striped table-hover">
                        <thead>
                            <tr>
                                <th width="10%">کد</th>
                                <th width="40%">توضیحات</th>
                                <th width="20%">کاربر</th>
                                <th width="30%">مدیریت</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if (count($answers))
                                @foreach ($answers as $answer)

                                    <tr>
                                        <td width="10%">{{ $answer->id }}</td>
                                        <td width="40%">{{ $answer->description }}</td>
                                        <td width="20%">
                                            {{ $answer->user->profile->fullname }}
                                        </td>
                                        <td>
                                            <a href="/admin/reject-answer/{{ $answer->id }}" class="btn btn-sm btn-danger">رد</a>                                            
                                        </td>
                                    </tr>
                                @endforeach
                            @else
                                <td colspan="6" class="text-center text-danger is">جواب رد شده ای وجود ندارد</td>
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </div>
@endsection
