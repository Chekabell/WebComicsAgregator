<div class="container">
    <h2>Оставь свой комментарий</h2>
    <form action="{{ route("comments.store") }}" method="post">
        @csrf
        <input type="hidden" name="comics_id" id="comics_id" value="{{ $comics_id }}">
        <input type="hidden" name="user_id" id="user_id" value="{{ $user_id }}">
        <div>
            <textarea
                class="form-control"
                name="content"
                id="content"
                placeholder="Content"
            ></textarea>
        </div>
        <button type="submit">Submit</button>
    </form>
</div>
