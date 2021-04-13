<div class="comments w-100 d-block">
    <ul>
        @foreach ($comments as $comment)
            @include('pages.comment-item' , ["comment" => $comment])
        @endforeach
    </ul>
</div>


<div class="modal fade" id="answer-comment-modal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title is" >پاسخ به نظر مهمان</h5>
        </div>
        <div class="modal-body">
            <form action="" class="form" id="answer-form">
                <br>
                <div class="accordion-title">
                    <i class="far fa-circle"></i>
                    <span id="user-comment-text"></span>
                </div>
                <br>
        
                <div class="form-group">
                    <textarea name="text" id="text" class="form-control" placeholder="پاسخ خود به مهمان را بنویسید"></textarea>
                </div>

                <br>
                <button type="submit" class="btn btn-sm is btn-primary">ثبت
                    <div id="new-answer-loading" class="spinner-border spinner-border-sm" role="status" style="display: none">
                        <span class="sr-only">Loading...</span>
                    </div>
    
                </button>
                <button type="button" class="btn btn-sm is btn-secondary" data-bs-dismiss="modal">برگشت</button>
            </form>
          
        </div>
      </div>
    </div>
  </div>
