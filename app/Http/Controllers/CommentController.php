<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\Comments\StoreRequest;
use App\Models\Comics;
use App\Models\Comment;
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

        return redirect()->route('comics.show', Comics::whereId($validated['comics_id'])->get());
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request)
    {
        dd(Comment::with('user')->find($request->comics_id));
        return view('comments.show', [
            'comments' => Comment::with('user')->find($request->comics_id)
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Comment $comment)
    {
        if(!Gate::allows('destroy-comment', $comment)){
            return redirect('/error')->with('message',
                'У вас нет разрешения на удаление комментария - ' . $comment->text);
        }

        $comment->delete();
        return redirect()->route('comics.show', Comics::whereId($comment->comics_id)->get());
    }
}
