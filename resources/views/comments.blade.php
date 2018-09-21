<ul>
    @foreach($comments as $comment)
        @if($parent === (int) $comment->parent_id)
            <li>
                <h5>{{ $comment->name }}</h5>
                <p>{{ $comment->message }}</p>
                <?php if ($comment->level < 3) { ?>
                    <div style="margin-left:10px;">
                        <a>Reply</a>
                    </div>
                <?php } ?>
                @include('comments', ['comments' => $comments, 'parent' => (int) $comment->id])
            </li>
        @endif
    @endforeach
</ul>