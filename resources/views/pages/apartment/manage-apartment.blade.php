@extends('layout.panel' , ["title" => "مدیریت آپارتمان ها | پاوز"])
@section('dashboard')
    <div class="container-fluid">
        <div class="row justify-content-center py-3">
            <div class="col-12 col-md-12 dashboard-info-item-content is-checking">
                <br>
                <br>


                <a href="/new-villa" class="btn btn-sm btn-primary is m-3">+ ثبت آگهی رایگان</a>
                <div class="table-resposive">
                    <table class="table text-center table-striped table-hover">
                        <thead>
                            <tr>
                                <th width="10%">کد</th>
                                <th width="20%">عنوان</th>
                                <th width="20%">کاور</th>
                                <th width="20%">نوع آگهی</th>
                                <th width="15%">وضعیت</th>
                                <th width="15%">مدیریت</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if (count($apartments))
                                @foreach ($apartments as $apartment)

                                    <tr>
                                        <td width="10%">{{ $apartment->id }}</td>
                                        <td width="20%">{{ $apartment->title }}</td>
                                        <td width="20%">
                                            @if ($apartment->cover)
                                                <button class="btn btn-warning btn-sm show-villa-pic"
                                                    src="{{ asset('covers/' . $apartment->cover) }}">نمایش تصویر</button>
                                            @else
                                                <span class="text-danger">کاور ندارد</span>
                                            @endif
                                        </td>
                                        <td width="20%">{{ $apartment->ads_type == '1' ? 'اجاره ویلا' : 'فروش ویلا' }}</td>
                                        <td width="15%">
                                            @switch($apartment->status)
                                                @case("not-completed")
                                                <span class="text-dark">پیش نویس</span>
                                                @break
                                                @case("checking")
                                                <span class="text-warning">در حال بررسی</span>
                                                @break
                                                @case("published")
                                                <span class="text-warning">انتشار یافت</span>
                                                @break
                                            @endswitch
                                        </td>
                                        <td width="15%">
                                            <a href="/edit-apartment/{{ $apartment->id }}" style="font-size: 11px"
                                                class="btn btn-sm btn-warning is">ویرایش</a>
                                            &nbsp;
                                            <button class="btn btn-sm btn-danger is btn-apartment-delete"
                                                id="{{ $apartment->id }}">حذف
                                                <span id="ap-{{ $apartment->id }}" class="spinner-grow spinner-grow-sm"
                                                    role="status" aria-hidden="true" style="display: none"></span>
                                            </button>
                                        </td>
                                    </tr>
                                    </thead>
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


<div class="modal fade" id="villa_pic_modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title is">تصویر آپارتمان</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <img src="" id="modal_villa_pic_dom" alt="" width="100%" height="300">
            </div>
        </div>
    </div>
</div>
@push('scripts')
    <script>
        $(".show-villa-pic").click(function () {
           const src = $(this).attr("src"); 
        });
    </script>
@endpush
