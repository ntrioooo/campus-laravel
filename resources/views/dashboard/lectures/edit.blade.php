@extends('dashboard.layouts.main')

@section('container')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Edit Dosen</h1>
    </div>

    <div class="col-lg-8">
        <form method="POST" action="/dashboard/lectures/{{ $lecture->slug }}" class="mb-5" enctype="multipart/form-data">
            @method('put')
            @csrf
            <div class="mb-3">
                <label for="name_lecture" class="form-label">Nama Dosen</label>
                <input type="text" class="form-control @error('name_lecture') is-invalid @enderror" id="name_lecture" name="name_lecture" required autofocus value="{{ old('name_lecture', $lecture->name_lecture) }}">
                @error('name_lecture')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="slug" class="form-label">Slug</label>
                <input type="text" class="form-control @error('slug') is-invalid @enderror" id="slug" name="slug" required value="{{ old('slug', $lecture->slug) }}">
                @error('slug')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="title" class="form-label">Mata Kuliah</label>
                <select class="form-select" name="title">
                    @foreach ($lectures as $lecture)
                    @if (old('title', $lecture->id) == $lecture->id)
                        <option value="{{ $lecture->title }}" selected>{{ $lecture->title }}</option>
                    @else
                        <option value="{{ $lecture->title }}">{{ $lecture->title }}</option>
                    @endif
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label for="image" class="form-label">Lecture Image</label>
                <input type="hidden" name="oldImage" value="{{ $lecture->image }}">
                @if ($lecture->image)
                    <img src="{{ asset('storage/' . $lecture->image) }}" class="img-preview img-fluid mb-3 col-sm-5 d-block">
                @else
                    <img class="img-preview img-fluid mb-3 col-sm-5">
                @endif
                <input class="form-control @error('image') is-invalid @enderror" type="file" id="image" name="image" onchange="previewImage()">
                @error('image')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
              </div>
            <button type="submit" class="btn btn-primary">Update Dosen</button>
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

        function previewImage() {
            const image = document.querySelector('#image');
            const imagePreview = document.querySelector('.img-preview');

            imagePreview.style.display = 'block';

            const oFReader = new FileReader();
            oFReader.readAsDataURL(image.files[0]);

            oFReader.onload = function(oFREvent) {
                imagePreview.src = oFREvent.target.result;
            }
        }
    </script>
@endsection