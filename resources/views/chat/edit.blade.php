<x-app-layout>
    @include('chat.comment')

    <form method="POST" action="/update/comment{{ $comment[0]->comment_id }}">
        @csrf
        <div class="comment-container row justify-content-center">
            <p>{{ $comment[0]->created_at }}　送信メッセージ編集中</p>
            <br>
            <div class="input-group comment-area">
                <textarea class="form-control" placeholder="input massage" aria-label="With textarea" name="comment">{{ $comment[0]->comment }}</textarea>
                <a href="{{ route('talk') }}" class="btn btn-outline-primary comment-btn">Cancel</a>
                <button type="input-group-prepend button" class="btn btn-outline-primary comment-btn">Update</button>
            </div>
        </div>
    </form>

</x-app-layout>