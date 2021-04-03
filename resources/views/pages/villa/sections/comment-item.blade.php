<li>
    <div class="user-img">
        <img src="{{ asset('upload/' . $comment->user->profile->image) }}" alt="User Logo">
    </div>
    <div class="user-title">
        <h4>
            {{$comment->user->profile->fullname}}

            @if (Auth::id() == $data->user->id)
                <button class="btn btn-sm  float-left text-secondary">
                    <i class="fa fa-share"></i>
                </button>
            @endif

        </h4>
        <span>4 روز پیش</span>
    </div>
    <div class="comment-text">
        <p>
            {{$comment->description}}
        </p>
    </div>
</li>