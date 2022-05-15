@extends('dashboard.layouts.main')

@section('container')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Data dosen, {{ auth()->user()->name }}</h1>
    </div>

    @if (session()->has('success'))
    <div class="alert alert-success col-lg-8" role="alert">
      {{ session('success') }}
    </div>
        
    @endif

    <div class="table-responsive col-lg-8">
        <a href="/dashboard/lectures/create" class="btn btn-primary mb-3">Tambah Dosen</a>
        <table class="table table-striped table-sm">
          <thead>
            <tr>
              <th scope="col">No</th>
              <th scope="col">Nama Dosen</th>
              <th scope="col">Mata Kuliah</th>
              <th scope="col">Action</th>
            </tr>
          </thead>
          <tbody>
              @foreach ($lectures as $lecture)
              <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $lecture->name_lecture }}</td>
                <td>{{ $lecture->title }}</td>
                <td>
                    <a href="/dashboard/lectures/{{ $lecture->slug }}" class="badge bg-primary"><span data-feather="eye"></span></a>
                    <a href="/dashboard/lectures/{{ $lecture->slug }}/edit" class="badge bg-warning"><span data-feather="edit"></span></a>
                    <form action="/dashboard/lectures/{{ $lecture->slug }}" method="POST" class="d-inline">
                    @method('delete')
                    @csrf
                    <button class="badge bg-danger border-0" onclick="return confirm('Are you sure?')">
                      <span data-feather="x-circle"></span>
                    </button>
                    </form>
                </td>
              </tr>
              @endforeach
          </tbody>
        </table>
      </div>

@endsection