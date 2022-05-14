<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Lecture;
use App\Models\Post;
use Illuminate\Support\Facades\Storage;
use \Cviebrock\EloquentSluggable\Services\SlugService;

class DosenController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.lectures.index', [
            'lectures' => Lecture::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.lectures.create', [
            'lectures' => Post::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validateData = $request->validate([
            'name_lecture' => 'required',
            'title' => 'required',
            'image' => 'image|file|max:2048',
            'slug' => 'required|unique:lectures'
        ]);

        if($request->file('image')) {
            $validateData['image'] = $request->file('image')->store('post-images');
        }
        
        Lecture::create($validateData);

        return redirect('/dashboard/lectures')->with('success', 'New lecture han been added!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Lecture $lecture)
    {
        return view('dashboard.lectures.show', [
            'lecture' => $lecture
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Lecture $lecture)
    {
        return view('dashboard.lectures.edit', [
            'lecture' => $lecture,
            'lectures' => Post::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Lecture $lecture)
    {
        $rules = [
            'name_lecture' => 'required',
            'title' => 'required',
            'image' => 'image|file|max:2048',
            
        ];

        if($request->slug != $lecture->slug) {
            $rules['slug'] = 'required|unique:lectures';
        }

        $validateData = $request->validate($rules);

        if($request->file('image')) {
            if($request->oldImage) {
                Storage::delete($request->oldImage);  
            }
            $validateData['image'] = $request->file('image')->store('post-images');
        }
            Lecture::where('id', $lecture->id)
                    ->update($validateData);

        return redirect('/dashboard/lectures')->with('success', 'Lecture han been updated!');
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Lecture $lecture)
    {
        if($lecture->image) {
            Storage::delete($lecture->image);
        }
        Lecture::destroy($lecture->id);

        return redirect('/dashboard/lectures')->with('success', 'Lecture has been deleted!');
    }

    public function checkSlug(Request $request)
    {
        $slug = SlugService::createSlug(Post::class, 'slug', $request->name_lecture);

        return response()->json(['slug' => $slug]);
    }
}
