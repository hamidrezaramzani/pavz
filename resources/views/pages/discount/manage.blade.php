@extends('layout.panel' , ["title" => "مدیریت تخفیف ها | پاوز"])
@section('dashboard')
    <div class="container-fluid">
        <div class="row justify-content-center py-3">
            <div class="col-12 col-md-12 dashboard-info-item-content is-checking p-5">
                <h3>مدیریت تخفیف ها</h3>
                <br>
                <br>

                <a href="/discount/new" class="btn btn-sm btn-primary is m-3">+ ثبت تخفیف جدید</a>
                <div class="table-responsive">
                    <table class="table text-center table-striped table-hover">
                        <thead>
                            <tr>
                                <th width="25%">شناسه</th>
                                <th width="25%">کد</th>
                                <th width="25%">درصد تخفیف</th>
                                <th width="25%">مدیریت</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($discounts as $item)
                                <tr>
                                    <td width="25%">{{ $item->id }}</td>
                                    <td width="25%">{{ $item->code }}</td>
                                    <td width="25%">{{ $item->percent }}%</td>
                                    <td width="25%">
                                        <button class="btn btn-sm btn-danger btn-delete" 
                                            data-id="{{ $item->id }}"><i class="fa fa-trash"></i>
                                            <div id="discount-item-{{ $item->id }}"
                                                class="spinner-border spinner-border-sm" role="status"
                                                style="display: none">
                                                <span class="sr-only">Loading...</span>
                                            </div>
                                        </button>
                                    </td>
                                </tr>
                            @endforeach

                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </div>
@endsection
@push('scripts')
    <script>        


        $(".btn-delete").click(function() {
            const id = $(this).attr("data-id");
            const thisBtn = $(this);
            Swal.fire({
                title: "حذف تخفیف",
                text: "آیا واقعا میخواهید این تخفیف را حذف کنید؟",
                icon: "question",
                confirmButtonText: "بله",
                cancelButtonText: "خیر",
                showCancelButton: true

            }).then(({
                isConfirmed
            }) => {
                if (isConfirmed) {
                    $.ajax({
                        method: "GET",
                        url: "/discount/delete/" + id,
                        beforeSend: () => {
                            $("#discount-item-" + id).show()
                        },
                        success: () => {
                            $("#discount-item-" + id).hide()

                            thisBtn.parents("tr").remove();
                        },
                        error: () => {
                            $("#discount-item-" + id).hide()

                            Swal.fire({
                                title: "خطا",
                                text: "مشکلی در سرور وجود دارد",
                                icon: "error",
                                confirmButtonText: "بله",

                            })
                        }
                    });
                }

            })

        });

    </script>
@endpush
