@extends('layout.panel' , ["title" => "راهنمای کامل پاوز"])
@section('dashboard')
    <div class="container-fluid">
        <div class="row justify-content-center py-3">
            <div class="col-12 col-md-12 dashboard-info-item-content p-5">
                <div class="row justify-content-center py-3">
                    @include('pages.help.sidebar')
                    @include('pages.help.content')
                </div>
            </div>
        </div>
    </div>
@endsection
@push('scripts')
    <script>
        $(".help-sidebar-top-link").click(function(e) {
            e.preventDefault();
            const show = $(this).attr("data-show");
            if (show == "true") {
                $(this).parent().find("ul").slideUp(150);
                $(this).attr("data-show", false);
                $(this).find("i").removeClass("fa-angle-right");
                $(this).find("i").addClass("fa-angle-left");
            } else {
                $(this).parent().find("ul").slideDown(150);
                $(this).attr("data-show", true);
                $(this).find("i").removeClass("fa-angle-left");
                $(this).find("i").addClass("fa-angle-right");
                $(this).parents("li").siblings().find("ul").slideUp();
                $(this).parents("li").siblings().find("i").removeClass("fa-angle-right");
                $(this).parents("li").siblings().find("i").addClass("fa-angle-left");
            }
        })

        $(".help-main-link").click(function(e) {
            e.preventDefault();
            const id = $(this).attr("data-id");
            location.hash = "#" + id
            $(`.help-content section`).slideUp(20);
            $(`#${id}`).slideDown(20);
        })

        function loadByHash() {
            const hash = location.hash;
            if (!hash) {
                $("#first-help").slideDown();
            } else {
                if ($(hash).length) {
                    $(`.help-content section`).slideUp(20);
                    $(hash).slideDown(20);
                } else {
                    $("#first-help").slideDown();

                }


            }
        }

        loadByHash();


        window.addEventListener("hashchange", loadByHash)

    </script>
@endpush
