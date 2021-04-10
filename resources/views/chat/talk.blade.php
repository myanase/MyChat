<x-app-layout>
    @include('chat.comment')

    <form method="POST" action="{{route('send')}}">
        @csrf
        <div class="comment-container row justify-content-center">
            <div class="input-group comment-area">
                <textarea class="form-control" placeholder="input massage" aria-label="With textarea" name="comment"></textarea>
                <button type="input-group-prepend button" class="btn btn-outline-primary comment-btn">Submit</button>
            </div>
        </div>
    </form>

</x-app-layout>