<div class="container">
    <form action="{{ route("comments.store") }}" method="post">
        @csrf
        <input type="hidden" name="comics_id" id="comics_id" value="{{ $comics_id }}">
        <input type="hidden" name="user_id" id="user_id" value="{{ $user_id }}">
        <div class="card d-flex flex-row rounded-4 overflow-hidden">
            <textarea
                style="border:0; width:100%"
                class="form-control"
                name="content"
                id="content"
                placeholder="Оставь свой комментарий"
            ></textarea>
            <div class="d-flex align-self-center pe-2">
                <button
                style="width: 50px; height: 50px;"
                class="btn btn-primary rounded-5" type="submit">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-send" viewBox="0 0 16 16">
                        <path d="M15.854.146a.5.5 0 0 1 .11.54l-5.819 14.547a.75.75 0 0 1-1.329.124l-3.178-4.995L.643 7.184a.75.75 0 0 1 .124-1.33L15.314.037a.5.5 0 0 1 .54.11ZM6.636 10.07l2.761 4.338L14.13 2.576 6.636 10.07Zm6.787-8.201L1.591 6.602l4.339 2.76 7.494-7.493Z"/>
                    </svg>
                </button>
            </div>
        </div>
    </form>
</div>
