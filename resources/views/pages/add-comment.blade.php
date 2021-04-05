<br>
<div class="villa-info-item my-4 float-right w-100">
    @auth
        <h2>
            <i class="fa fa-circle fa-xs text-warning"></i>
            درج نظر
        </h2>

        <br>

        <form action="" class="form" id="comment-form">
            <div class="form-group">
                <label for="description">توضیحات:</label>
                <textarea name="description" style="height: 200px" id="description" class="form-control bg-white"
                    placeholder="نظر خود را وارد نمایید"></textarea>
            </div>
            <br>
            <button id="btn-comment" class="btn btn-sm btn-primary is">ثبت نظر
                <div id="comment-loading" class="spinner-border spinner-border-sm" role="status" style="display: none">
                    <span class="sr-only">Loading...</span>
                </div>
            </button>
        </form>
    @else
        <div class="text-center d-block">
            <h2>
                <i class="fa fa-circle fa-xs text-warning"></i>
                درج نظر
            </h2>
            <br>
            <img src="{{ asset('images/icons/warning.png') }}" alt="Warning Icon">
            <br>
            <h2 class="text-center">خطا.</h2>
            <p class="text-center">برای نظر دادن باید وارد حساب خود شوید</p>
            <br>
            <br>
            <a href="/login" class="btn btn-sm btn-primary is">
            ورود به حساب    
            </a>
        </div>
    @endauth

</div>
