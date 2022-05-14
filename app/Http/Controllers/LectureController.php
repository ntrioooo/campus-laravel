<?php

namespace App\Http\Controllers;

use App\Models\Lecture;
use App\Models\Post;
use App\Http\Requests\StoreLectureRequest;
use App\Http\Requests\UpdateLectureRequest;
use Illuminate\Support\Facades\Storage;

class LectureController extends Controller
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
     * @param  \App\Http\Requests\StoreLectureRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreLectureRequest $request)
    {
        $validateData = $request->validate([
            'title' => 'required',
            'name_lecture' => 'required',
            'image' => 'image|file|max:2048',
        ]);

        if($request->file('image')) {
            $validateData['image'] = $request->file('image')->store('post-images');
        }

        $validateData['user_id'] = auth()->user()->id;
        
        Lecture::create($validateData);

        return redirect('/dashboard/lectures')->with('success', 'New lecture han been added!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Lecture  $lecture
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
     * @param  \App\Models\Lecture  $lecture
     * @return \Illuminate\Http\Response
     */
    public function edit(Lecture $lecture)
    {
        return view('dashboard.lectures.edit', [
            'lecture' => $lecture,
            'posts' => Post::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateLectureRequest  $request
     * @param  \App\Models\Lecture  $lecture
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateLectureRequest $request, Lecture $lecture)
    {
        $rules = [
            'title' => 'required',
            'image' => 'image|file|max:2048',
            'name_lecture' => 'required'
        ];

        $validateData = $request->validate($rules);

        if($request->file('image')) {
            if($request->oldImage) {
                Storage::delete($request->oldImage);
            }
            $validateData['image'] = $request->file('image')->store('post-images');

            $validateData['user_id'] = auth()->user()->id;

            Lecture::where('id', $lecture->id)
            ->update($validateData);

        return redirect('/dashboard/lectures')->with('success', 'lecture han been updated!');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Lecture  $lecture
     * @return \Illuminate\Http\Response
     */
    public function destroy(Lecture $lecture)
    {
        if($lecture->image) {
            Storage::delete($lecture->image);
        }
        Lecture::destroy($lecture->id);

        return redirect('/dashboard/lectures')->with('success', 'lecture has been deleted!');
    }
}
