@extends('dashboard.layouts.main')

@section('container')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Welcome back, {{ auth()->user()->name }}</h1>
    </div>
    @can('admin')
    <div class="row">
        <div class="col-md-3">
            <div class="card">
                <div class="card-body">
                  <h5 class="card-title">Users</h5>
                  <p class="card-text fs-5">{{ $userCount }}</p>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card">
                <div class="card-body">
                  <h5 class="card-title">Kelas</h5>
                  <p class="card-text fs-5">{{ $postCount }}</p>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card">
                <div class="card-body">
                  <h5 class="card-title">Semester</h5>
                  <p class="card-text fs-5">{{ $categoryCount }}</p>
                </div>
              </div>
        </div>
        <div class="row mt-3">
            <div class="col-md-3">
                <div class="card">
                    <div class="card-body">
                      <h5 class="card-title">Dosen</h5>
                      <p class="card-text fs-5">{{ $lectureCount }}</p>
                    </div>
                  </div>
            </div>
        </div>
    </div>
    @endcan
@endsection