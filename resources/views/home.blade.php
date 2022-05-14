@extends('layouts.main')

@section('container')
  <div class="row">
      <div class="col-md-6 mt-3">
        <p class="home-title mb-3"><i class="fa-solid fa-school-flag"></i> Universitas Singaperbangsa Karawang</p>
        <h1 class="home-text mb-3">Pendidikan Kampus<br>Lebih Maju</h1>
        <p class="home-text-body">Sukseskan pendidikan kampus UNSIKA untuk menghadapi <br>
            era industri 4.0 secara hebat dengan Website Campus.
        </p>
        <a href="/register" class="text-decoration-none btn button-home my-4">Register</a>
        <div class="row mt-2">
          <div class="col-md-5">
            <div class="card text-end">
              <div class="card-body">
                <h5 class="card-title fs-1 fw-bolder">99%</h5>
                <p class="card-text">Kepuasan Pengguna</p>
              </div>
            </div>
          </div>
          <div class="col-md-5">
            <div class="card text-end">
              <div class="card-body">
                <h5 class="card-title fs-1 fw-bolder">99%</h5>
                <p class="card-text">Keberhasilan Implementasi</p>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-6 mt-3">
        <img src="images/{{ $image }}" alt="{{ $image }}">
      </div>
  </div>
@endsection