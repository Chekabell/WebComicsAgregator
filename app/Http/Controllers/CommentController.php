<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\Comments\StoreRequest;
use App\Models\Comics;
use App\Models\Comment;
use App\Models\User;
use Illuminate\Support\Facades\Gate;

class CommentController extends Controller
{


    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRequest $request)
    {
        $validated = $request->validated();

        Comment::create([
            'comics_id' => $validated['comics_id'],
            'user_id' => $validated['user_id'],
            'text' => $validated['content']
        ]);

        return redirect()->route('comics.show', $validated['comics_id']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Comment $comment)
    {
        if(!Gate::allows('destroy-comment', $comment)){
            return redirect('/error')->with('message',
                'У вас нет разрешения на удаление комментария пользователя ' . User::find($comment->user_id)->name . ' - "' . $comment->text . '"');
        }

        $comment->delete();

        return redirect()->route('comics.show', $comment->comics_id);
    }
}
