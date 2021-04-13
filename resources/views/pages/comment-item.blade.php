<li class="comment-item">
    <input type="hidden" class="comment-id-input" value="{{ $comment->id }}">
    <div class="user-img">
        <img src="{{ asset('upload/' . $comment->user->profile->image) }}" alt="User Logo">
    </div>
    <div class="user-title">
        <h4>
            {{ $comment->user->profile->fullname }}

            @if (Auth::id() == $data->user->id)
                <button class="btn btn-sm  float-left text-secondary answer-comment-btn">
                    <i class="fa fa-share"></i>
                </button>
            @endif
        </h4>
    </div>
    <div class="comment-text">
        <p>
            {{ $comment->description }}
        </p>
    </div>
    @if ($comment->commentAnswers()->count())
        @foreach ($comment->commentAnswers()->get() as $item)            
            <div class="comment-answer user-title" >
                <h4>
                    <i class="fa fa-square fa-xs"></i> جواب میزبان:

                    <button class="btn btn-sm float-left ml-3 btn-danger delete-answer"  id="{{$item->id}}">
                        <i class="fa fa-trash"></i>
                        <div  class="spinner-border spinner-border-sm" role="status" style="display: none">
                            <span class="sr-only">Loading...</span>
                        </div>
                    </button>
                </h4>
                <div class="comment-text">
                    <p>
                        {{ $item->description }}
                    </p>
                </div>
            </div>
        @endforeach
    @endif

</li>
