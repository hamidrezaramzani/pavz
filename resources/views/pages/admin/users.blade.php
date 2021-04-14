@extends('layout.panel' , ["title" => "تمامی کاربران | پاوز"])
@section('dashboard')
    <div class="container-fluid">
        <div class="row justify-content-center py-3">
            <div class="col-12 col-md-12 dashboard-info-item-content is-checking p-5">
                <h3>تمامی کاربران</h3>
                <br>
                <br>

                <div class="table-resposive">
                    <table class="table text-center table-striped table-hover">
                        <thead>
                            <tr>
                                <th width="10%">کد</th>
                                <th width="40%">نام و نام خانوادگی</th>
                                <th width="20%">پروفایل</th>
                                <th width="30%">مقام</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if (count($users))
                                @foreach ($users as $user)

                                    <tr>
                                        <td width="10%">{{ $user->id }}</td>
                                        <td width="40%">{{ $user->profile->fullname }}</td>
                                        <td width="20%">
                                            @if ($user->profile->image)
                                                <button class="btn btn-warning btn-sm show-area-pic"
                                                    src="{{ asset('upload/' . $user->profile->image) }}">نمایش
                                                    تصویر</button>
                                            @else
                                                <span class="text-danger">پروفایل ندارد</span>
                                            @endif
                                        </td>
                                        <td>{{$user->level == 'admin' ? "مدیر" : "کاربر عادی"}}</td>

                                    </tr>
                                @endforeach
                            @else
                                <td colspan="6" class="text-center text-danger is">آگهی ثبت نشده است</td>
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </div>
@endsection


<div class="modal fade" id="area-modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title is">تصویر پروفایل کاربر</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <img src="" id="area-cover" alt="" width="100%" height="300">
            </div>
        </div>
    </div>
</div>
@push('scripts')
    <script>
        $(".show-area-pic").click(function() {
            const src = $(this).attr("src");
            $("#area-cover").attr("src", src);
            $("#area-modal").modal("show");
        });

        $(".close").click(function() {
            $("#area-modal").modal("hide");
        })
    </script>
@endpush
