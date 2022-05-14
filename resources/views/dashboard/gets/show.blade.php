@extends('dashboard.layouts.main')

@section('container')
    <div class="container">
        <div class="row my-3">
            <div class="col-lg-8">
                <h1 class="mb-3">{{ $get->name }}</h1>
                <a href="/dashboard/gets" class="btn btn-success"><span data-feather="arrow-left"></span> Back to dashboard</a>
                <a href="/dashboard/gets/{{ $get->id }}/edit" class="btn btn-warning"><span data-feather="edit"></span> Edit</a>
                <form action="/dashboard/gets/{{ $get->id }}" method="POST" class="d-inline">
                    @method('delete')
                    @csrf
                    <button class="btn btn-danger" onclick="return confirm('Are you sure?')">
                      <span data-feather="x-circle"></span> Delete
                    </button>
                    </form>
                
                @if ($get->image)
                    <div style="max-height: 350px; overflow:hidden">
                        <img src="{{ asset('storage/' . $get->image) }}" alt="{{ $get->title }}" class="img-fluid mt-3">
                    </div>
                @else
                    <img src="https://source.unsplash.com/1200x400?{{ $get->title }}" alt="{{ $get->title }}" class="img-fluid mt-3">
                @endif
                
                <article class="my-3 fs-5">
                    <h2 class="mt-3">{{ $get->title }}</h2>
                </article>
            </div>
        </div>
    </div>
@endsection