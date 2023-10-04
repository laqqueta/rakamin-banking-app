<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login</title>
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="{{ asset("assets/style.css") }}">
</head>

<body>
    <div class="d-lg-flex half">
    <div class="bg order-2 order-md-1" style="background-image: url('{{ asset('assets/bgfix.png') }}');">
        <div class="title">
            <img class="title-ellipse" src="{{ asset("assets/rakamin-logo.png") }}" alt="rakamin-logo" style="width: 200px; height: auto;">
            {{-- <span class="title-quotes">
                <div class="mt-4">
                    <span>
                        "When you save, you're building the foundation for your dreams and goals." - Dave Ramsey
                    </span>
                </div>
            </span> --}}
        </div>
    </div>
    <div class="contents order-1 order-md-2">
        <div class="container">
            <div class="row align-items-center justify-content-center">
                <div class="col-md-7">
                    <h3 class="contents-text1 mt-5 text-center">Welcome to Rakamin Banking App</h3>
                    <div class="contents-text2 text-center">
                        <span class="contents-text3">
                            If you don't have an account for rakamin banking app, it's simple to
                        </span>
                        <span class="contents-text4">register here</span>
                    </div>
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="form-group">
                            <label for="email">Email Address:</label>
                            <input type="email" class="form-control" id="email" name="email" placeholder="email" autofocus>
                        </div>

                        <div class="form-group last mb-3">
                            <label for="password">Password:</label>
                            <input type="password" class="form-control" id="password" name="password" placeholder="password" required>
                        </div>
                        <div class="d-flex mb-5 align-items-center">
                            {{-- Tambahkan elemen checkbox atau forgot password di sini jika diperlukan --}}
                        </div>
                        <input type="submit" value="Login" class="btn btn-block btn-primary">
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    @if (Session::has('success'))
        <script>
            Swal.fire(
                'Success!!',
                '{{ Session::get('success') }}',
                'success'
            );
        </script>
    @endif

    @if ($errors->any())
        <script>
            @foreach ($errors->all() as $error)
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: '{{ $error }}'
                });
            @endforeach
        </script>
    @endif

</body>

</html>
