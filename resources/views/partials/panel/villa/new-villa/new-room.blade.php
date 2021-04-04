<div class="modal fade" id="new-room-modal" data-bs-backdrop="static" data-bs-keyboard="false"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title is" id="staticBackdropLabel">اضافه کردن اتاق جدید</h5>
            </div>
            <div class="modal-body">
                <form action="" id="new-room-form" class="form">

                    <input type="hidden" id="nr_token" value="{{ csrf_token() }}">
                    <div class="form-group">
                        <label for="room_title">عنوان:</label>
                        <input type="text" id="room_title" name="room_title" class="form-control"
                            placeholder="اتاق 1 یا اتاق 2 و ...">
                    </div>



                    <div class="form-group">
                        <label for="single_bed">تخت خواب یک نفره:</label>
                        <input type="number" id="single_bed" name="single_bed" class="form-control"
                            placeholder="تعداد تخت های تک نفره را وارد نمایید">
                    </div>



                    <div class="form-group mb-3">
                        <label for="double_bed">تخت خواب دو نفره:</label>
                        <input type="number" id="double_bed" name="double_bed" class="form-control"
                            placeholder="تعداد تخت خواب های دو نفره را وارد نمایید">
                    </div>

                    <div class="accordion-title">
                        <i class="far fa-circle"></i>
                        اگر تختی اضافه نکنید کف خواب در نظر گرفته می شود
                    </div>

                    <div class="possibilities">
                        <div class="d-block float-right w-100" id="room-possibilities">

                            @include('partials.panel.villa.new-villa.checkbox' , ["title" => "رخت آویز" , "name"
                            => "clothes_hanger"])
                            @include('partials.panel.villa.new-villa.checkbox' , ["title" => "سیستم تهویه هوا" ,
                            "name" => "air_conditioning_system"])
                            @include('partials.panel.villa.new-villa.checkbox' , ["title" => "گاو صندوق" , "name"
                            => "safe"])
                            @include('partials.panel.villa.new-villa.checkbox' , ["title" => "سشوار" , "name" =>
                            "hairdryer"])
                            @include('partials.panel.villa.new-villa.checkbox' , ["title" => "نور RGB" , "name" =>
                            "rgb"])
                            @include('partials.panel.villa.new-villa.checkbox' , ["title" => "پرده" , "name" =>
                            "curtain"])
                            @include('partials.panel.villa.new-villa.checkbox' , ["title" => "فرش" , "name" =>
                            "carpet"])
                            @include('partials.panel.villa.new-villa.checkbox' , ["title" => "بخاری" , "name" =>
                            "heater"])
                            @include('partials.panel.villa.new-villa.checkbox' , ["title" => "شوفاژ" , "name" =>
                            "radiator"])
                            @include('partials.panel.villa.new-villa.checkbox' , ["title" => "کولر آبی" , "name"
                            => "air_conditioner"])
                            @include('partials.panel.villa.new-villa.checkbox' , ["title" => "پنکه" , "name" =>
                            "fan"])
                        </div>

                        <div class="w-100 float-right mt-3">
                            <input type="text" name="new-room-item" id="new-room-item" class="form-control"
                                placeholder="اضافه کردن مورد جدید">
                            <br>
                            <button class="btn btn-sm btn-warning is new-item" box="#room-possibilities"
                                input="#new-room-item" type="button">ثبت
                                مورد جدید +</button>
                        </div>

                    </div>
                    <div class="mt-2 d-block float-right w-100">
                        @include('partials.panel.villa.new-villa.checkbox' , ["title" => "این اتاق سرویس
                        بهداشتی دارد(مستر)" , "name" => "master"])
                    </div>

                    <div class="d-block my-2 float-right w-100">
                        <input type="submit" class="btn btn-sm btn-outline-primary" value="تایید">
                        <button type="button" modal="#new-room-modal" class="close-modal btn btn-danger is">لغو</button>
                    </div>

                </form>

            </div>
        </div>
    </div>
</div>
