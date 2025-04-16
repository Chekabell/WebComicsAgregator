<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comics;
use App\Models\Tag;

class ComicsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view ('comics',[
            'comics' => Comics::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return view ('comics',[
            'comics' => Comics::where("id", $id)->get()
        ]);
    }

    public function showWithTags(string $id)
    {
        $comics = Comics::where("id", $id)->first();
        return view ('comicsWithTags',[
            'comics' => $comics,
            'tags' => $comics->tags
        ]);
    }

    public function showComicsByTags(string $id)
    {
        $tag = Tag::where("id", $id)->first();
        return view ('comicsByTags',[
            'tag' => $tag,
            'comics' => $tag->comics,
        ]);
    }
    
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
