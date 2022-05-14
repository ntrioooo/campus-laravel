<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    {{-- bootstrap icons --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
    {{-- style css --}}
    <link rel="stylesheet" href="css/style.css">
    {{-- font --}}
    <link href='https://fonts.googleapis.com/css?family=Poppins' rel='stylesheet'>
    {{-- fontawesome --}}
    <script src="https://kit.fontawesome.com/cc4dc7c7cc.js" crossorigin="anonymous"></script>
    <title>UNSIKA | {{ $title }}</title>
  </head>
  <body>
    
    @include('partials.navbar')

      <div class="container mt-4">
          @yield('container')
      </div>
      
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

  </body>
</html>

