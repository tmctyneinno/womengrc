
<div class="comments-wrap">
    <h3 class="title">Reply </h3>
    <ul>
        <li>
            {{-- <img src="assets/img/blog/comment-profile1.png" alt="Image"> --}}
            <h3>{{ $reply->author_name }}</h3>
            <span>{{    \Carbon\Carbon::parse($reply->created_at)->setTimezone('Africa/Lagos')->format('F d, Y \a\t h:i a') }}</span>
            <p>{{ $reply->content }}</p>
        </li>

    </ul>
</div>

