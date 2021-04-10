<section class="p-3"  style="display: {{ $show ? 'block' : 'none' }};">
    <form action="" class="form" id="possibilities-form">
        <h3>امکانات مغازه</h3>
        <br>
        <div class="form-group">
            <label>امکانات:</label>
            <div id="possibilities" class="checkeds-box">
                @if ($data->possibilities)
                    @foreach (json_decode($data->possibilities) as $item)
                        @include('partials.panel.villa.new-villa.checkbox' , ["title" => $item->text ,
                        "name"
                        => $item->name , "checked" => $item->checked , "new" => $item->new] )
                    @endforeach

                @else

                    @include('partials.panel.villa.new-villa.checkbox' , ["title" => "اتاق" , "name"
                    =>
                    "room"])
                    @include('partials.panel.villa.new-villa.checkbox' , ["title" => "وای فای رایگان" ,
                    "name" => "free-wifi"])
                    @include('partials.panel.villa.new-villa.checkbox' , ["title" => "پارکینگ" , "name"
                    =>
                    "parking"])
                    @include('partials.panel.villa.new-villa.checkbox' , ["title" => "دوربین مدار بسته"
                    ,
                    "name" => "camera"])
                    @include('partials.panel.villa.new-villa.checkbox' , ["title" => "کرکره برقی"
                    ,
                    "name" => "kerkere"])

                    @include('partials.panel.villa.new-villa.checkbox' , ["title" => "دزدگیر"
                    ,
                    "name" => "dozdgir"])

                @endif

            </div>
            <br>

            <input type="text" name="new_possibilities_input" id="new_possibilities_input" class="form-control"
                placeholder="اضافه کردن مورد جدید">
            <br>
            <button class="btn btn-sm btn-warning is new-item" box="#possibilities" input="#new_possibilities_input"
                type="button">ثبت مورد جدید +</button>

        </div>

        <br>
        <br>
        <br>
        <div class="form-group">
            <button class="btn btn-sm btn-primary is" type="submit">ادامه

                <div id="pb-loading" class="spinner-border spinner-border-sm" role="status" style="display: none">
                    <span class="sr-only">Loading...</span>
                </div>
            </button>
        </div>

    </form>
</section>
