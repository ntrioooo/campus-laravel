<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Get;
use App\Models\Post;
use App\Models\User;
use \Cviebrock\EloquentSluggable\Services\SlugService;

class GetController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.gets.index', [
            'gets' => Get::where('name', auth()->user()->name)->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.gets.create', [
            'users' => User::where('name', auth()->user()->name)->get(),
            'gets' => Post::all(),
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
            'title' => 'required',
            'name' => 'required',
        ]);
        
        Get::create($validateData);

        return redirect('/dashboard/gets')->with('success', 'Kelas yang diambil berhasil!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Get $get)
    {
        return view('dashboard.gets.show', [
            'get' => $get
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Get $get)
    {
        return view('dashboard.gets.edit', [
            'users' => User::where('name', auth()->user()->name)->get(),
            'gets' => Post::all(),
            'get' => $get,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Get $get)
    {
        $rules = [
            'name' => 'required',
            'title' => 'required',
        ];

        $validateData = $request->validate($rules);
        $validateData['name'] = auth()->user()->name;

        Get::where('name', $get->name)
            ->update($validateData);

        return redirect('/dashboard/gets')->with('success', 'Kelas yang diambil berhasil diedit!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Get $get)
    {
        Get::destroy($get->id);

        return redirect('/dashboard/gets')->with('success', 'Kelas yang diambil berhasil dihapus!');
    }
}
