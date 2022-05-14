@extends('dashboard.layouts.main')

@section('container')
    <div class="container">
        <div class="row my-3">
            <div class="col-lg-8">
                <h1 class="mb-3">{{ $lecture->name_lecture }}</h1>
                <a href="/dashboard/lectures" class="btn btn-success"><span data-feather="arrow-left"></span> Back to dashboard</a>
                <a href="/dashboard/lectures/{{ $lecture->slug }}/edit" class="btn btn-warning"><span data-feather="edit"></span> Edit</a>
                <form action="/dashboard/lectures/{{ $lecture->slug }}" method="POST" class="d-inline">
                    @method('delete')
                    @csrf
                    <button class="btn btn-danger" onclick="return confirm('Are you sure?')">
                      <span data-feather="x-circle"></span> Delete
                    </button>
                    </form>
                
                @if ($lecture->image)
                    <div style="max-height: 350px; overflow:hidden">
                        <img src="{{ asset('storage/' . $lecture->image) }}" alt="{{ $lecture->name_lecture }}" class="img-fluid mt-3">
                    </div>
                @else
                    <img src="https://source.unsplash.com/1200x400?{{ $lecture->name_lecture }}" alt="{{ $lecture->name_lecture }}" class="img-fluid mt-3">
                @endif
                
                <article class="my-3 fs-5">
                    <h2 class="mt-3">{{ $lecture->title }}</h2>
                </article>
            </div>
        </div>
    </div>
@endsection