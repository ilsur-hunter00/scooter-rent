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

                <div class="text-end">
                    <a href="/login" class="btn btn-outline-light me-2">Authorization</a>
                    <a href="/register" class="btn btn-warning">Registration</a>
                </div>
            </div>
        </div>
    </header>

    <main>
        @yield('content')
    </main>

</body>
</html>