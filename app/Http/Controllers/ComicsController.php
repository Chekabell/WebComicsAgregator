<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\Comics\StoreRequest;
use App\Http\Requests\Comics\UpdateRequest;
use App\Models\Comics;
use App\Models\Tag;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Arr;

class ComicsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $perpage = $request->perpage ?? 2;
        return view ('comics.index',[
            'comics' => Comics::orderBy('id')->paginate($perpage)->withQueryString(),
            'message' => $request->message
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('comics.create', [
            'tags' => Tag::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRequest $request)
    {
        $validated = $request->validated();

        $path = "covers-comics/default.jpg";

        $comics = Comics::create([
            'title' => $validated['title'],
            'description' => $validated['description'],
            'year' => $validated['year'],
            'type_comics' => $validated['type_comics'],
            'image' => $path,
            'link' => $validated['link'],
        ]);

        if(Arr::has($validated, ('tags'))){
            $comics->tags()->attach($validated['tags']);
        }

        return redirect()->route('comics.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Comics $comics)
    {
        return view ('comics.show',[
            'comics' => $comics,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Comics $comics)
    {
        return view ('comics.edit',[
            'comics' => $comics,
            'tags' => Tag::all(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRequest $request, Comics $comics)
    {
        $validated = $request->validated();
        $path = $comics->image;

        if ($request->hasFile('image')) {

            if($comics->image
            && Storage::disk('public')->exists($comics->image)
            && $comics->image != "covers-comics/default.jpg"){
                 Storage::disk('public')->delete($comics->image);
            }

            $path = $request->file('image')->store('covers-comics', 'public');
        }

        $comics->fill([
            'title' => $validated['title'],
            'description' => $validated['description'],
            'image' => $path,
            'link' => $validated['link'],
        ]);

        if($comics->isDirty()){
            $comics->save();
        }

        if(Arr::has($validated, 'tags')){
            $validatedTags = array_unique($validated['tags']);
            $comics->tags()->syncWithoutDetaching($validatedTags);
        }

        return redirect()->route('comics.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Comics $comics)
    {
        if(!Gate::allows('destroy-comics', $comics)){
            return redirect('/error')->with('message',
                'У вас нет разрешения на удаление комикса ' . $comics->title);
        }

        $comics->tags()->detach();

        if ($comics->image
        && Storage::disk('public')->exists($comics->image)
        && $comics->image != "covers-comics/default.jpg") {
            Storage::disk('public')->delete($comics->image);
        }

        $comics->delete();
        return redirect()->route('comics.index')->with('message', 'Комикс "' . $comics->title . '" успешно удалён');
    }
}
