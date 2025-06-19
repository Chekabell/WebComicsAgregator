<div>
    <h2>Комментарии:</h2>
    @if ($comics->comments->isEmpty())
        Комментариев пока нет
    @else
        @foreach ( $comics->comments as $comment )
            <div class="card d-flex flex-row justify-content-between">
                {{App\Models\User::find($comment->user_id)->name}}:
                <div class="card-body">
                    {{$comment->text}}
                </div>
                <form action="{{ route('comments.destroy', $comment) }}" method="post">
                    @csrf
                    @method('delete')
                    <button type="submit">Delete</button>
                </form>
            </div>
        @endforeach
    @endif
</div>
