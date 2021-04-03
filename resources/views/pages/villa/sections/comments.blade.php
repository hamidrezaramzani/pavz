<div class="comments w-100 d-block">
    <ul>
        @foreach ($comments as $comment)
            @include('pages.villa.sections.comment-item' , ["comment" => $comment])            
        @endforeach
    </ul>
</div>
