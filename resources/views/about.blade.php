@extends('layouts.main')

@section('container')

<div class="row">
    <div class="col-md-4 mt-4">
        <div class="card">
            <img src="images/{{ $image1 }}" class="card-img-top" style="max-height: 18rem" alt="...">
            <div class="card-body">
              <h5 class="card-title">Trio Nugroho</h5>
              <p class="card-text">2010631170123</p>
            </div>
        </div>
    </div>
    <div class="col-md-4 mt-4">
        <div class="card">
            <img src="images/{{ $image2 }}" class="card-img-top" style="max-height: 18rem" alt="...">
            <div class="card-body">
              <h5 class="card-title">Salsabilla Innayah Medhiani</h5>
              <p class="card-text">2010631170118</p>
            </div>
        </div>
    </div>
    <div class="col-md-4 mt-4">
        <div class="card">
            <img src="images/{{ $image3 }}" class="card-img-top" style="max-height: 18rem" alt="...">
            <div class="card-body">
              <h5 class="card-title">Tegar Wisnukurnia Aji</h5>
              <p class="card-text">2010631170035</p>
            </div>
        </div>
    </div>
</div>

@endsection


