<div class="col-12 gallery">
    <div class="row">        
        <div class="col-6 p-1 gallery-item position-relative">
            <a style="position: absolute; top: 0" href="برای دیدن تمامی عکس ها کلیک کنید"></a>
            <img src="{{ asset($folder . '/' . $images[0]->url) }}" width="100%" height="550" alt="image">
        
        </div>
        <div class="col-3 p-1 gallery-item">
            <img src="{{ asset($folder . '/' . $images[1]->url) }}" width="100%" height="275" alt="image">
            <img src="{{ asset($folder . '/' . $images[2]->url) }}" width="100%" height="275" alt="image">

        </div>
        <div class="col-3 p-1 gallery-item">
            <img src="{{ asset($folder . '/' . $images[3]->url) }}" width="100%" height="275" alt="image">
            <img src="{{ asset($folder . '/' . $images[4]->url) }}" width="100%" height="275" alt="image">
        </div>
    </div>
    <a href="" class="is show-more-images" style="font-size: 13px">برای دیدن  عکس های بیشتر کلیک کنید</a>
    <br>
    <br>
</div>