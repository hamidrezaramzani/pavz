@extends('layout.panel' , ["title" => "تمامی کامنت های جدید و منتشر نشده | پاوز"])
@section('dashboard')
    <div class="container-fluid">
        <div class="row justify-content-center py-3">
            <div class="col-12 col-md-12 dashboard-info-item-content is-checking p-5">
                <h3>نظر های جدیدی که قبول نشده اند</h3>
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
                            @if (count($comments))
                                @foreach ($comments as $comment)

                                    <tr>
                                        <td width="10%">{{ $comment->id }}</td>
                                        <td width="40%">{{ $comment->description }}</td>
                                        <td width="20%">
                                            {{ $comment->user->profile->fullname }}
                                        </td>
                                        <td>
                                            <a href="/admin/publish-comment/{{ $comment->id }}" class="btn btn-sm btn-success">قبول</a>
                                            <a href="/admin/reject-comment/{{ $comment->id }}" class="btn btn-sm btn-danger">رد</a>
                                        </td>
                                    </tr>
                                @endforeach
                            @else
                                <td colspan="6" class="text-center text-danger is">نظر جدیدی که ثبت نشده باشد وجود ندارد</td>
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </div>
@endsection
