<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <title>Scooter-rent</title>
</head>
<body>
    <header class="p-3 bg-dark text-white">
        <div class="container">
            <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
                <a href="/" class="d-flex align-items-center mb-2 mb-lg-0 text-white text-decoration-none nav-logo">
                    <img src="{{ asset('images/electro-scooters-logo.png') }}" alt="logo">
                </a>

                <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
                    <li><a href="{{ url('/user/scooters') }}" class="nav-link px-2 @yield('scooters-active')">Scooters</a></li>
                    <li><a href="{{ url('/user/rent-places') }}" class="nav-link px-2 @yield('rent-active')">Rent places</a></li>
                    <li><a href="{{ url('/user/reviews') }}" class="nav-link px-2 @yield('reviews-active')">Reviews</a></li>
                </ul>

                <div class="text-end">
                    <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"class="btn btn-warning">Log out</a>
                </div>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>
            </div>
        </div>
    </header>

    <main>
        @yield('content')
    </main>

</body>
</html>