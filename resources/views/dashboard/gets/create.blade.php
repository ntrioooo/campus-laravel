@extends('dashboard.layouts.main')

@section('container')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Ambil Kelas {{ auth()->user()->name }}</h1>
    </div>

    <div class="col-lg-8">
        <form method="POST" action="/dashboard/gets" class="mb-5" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label">Nama Mahasiswa</label>
                <select class="form-select" name="name">
                    @foreach ($users as $user)
                        <option value="{{ $user->name }}">{{ $user->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label for="title" class="form-label">Mata Kuliah</label>
                <select class="form-select" name="title">
                    @foreach ($gets as $get)
                        <option value="{{ $get->title }}">{{ $get->title }}</option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Ambil Kelas</button>
        </form>
    </div>

    <script>    
        const title = document.querySelector('#name_lecture');
        const slug = document.querySelector('#slug');

        title.addEventListener('change', function() {
            fetch('/dashboard/lectures/checkSlug?name_lecture=' + title.value)
            .then(response => response.json())
            .then(data => slug.value = data.slug)
        });
    </script>
@endsection