@extends('dashboard.layouts.main')

@section('container')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Edit Kelas</h1>
    </div>

    <div class="col-lg-8">
        <form method="POST" action="/dashboard/gets/{{ $get->id }}" class="mb-5" enctype="multipart/form-data">
            @method('put')
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
                    @if (old('title', $get->id) == $get->id)
                        <option value="{{ $get->title }}" selected>{{ $get->title }}</option>
                    @else
                        <option value="{{ $get->title }}">{{ $get->title }}</option>
                    @endif
                    @endforeach
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Update Kelas</button>
        </form>
    </div>

    <script>
    </script>
@endsection