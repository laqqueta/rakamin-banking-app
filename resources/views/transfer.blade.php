<!DOCTYPE html>
<html>
<head>
    <title>Internet Banking - Login</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

</head>
<body>
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">Transfer</div>
                <div class="card-body">
                    <form method="POST" action="{{ route('transfer') }}">
                        @csrf

                        <div class="form-group">
                            <label for="email">Transfer to</label>
                            <input type="email" class="form-control" id="email" name="email" required autofocus placeholder="Email address">
                        </div>

                        <div class="form-group">
                            <label for="amount">Amount</label>
                            <input type="text" class="form-control" id="amount" name="transferAmount" placeholder="Transfer amount" required>
                        </div>

                        <div class="form-group">
                            <label for="pin">Account Pin</label>
                            <input type="text" class="form-control" id="pin" name="pin" placeholder="Pin" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Transfer</button>
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
            'Done',
            'Transfer to account <b>{{ Session::get('success') }}</b> success!',
            'success'
        );
    </script>
@endif

@if (Session::get('error') === '505')
    <script>
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: 'Something went wrong!'
        });
    </script>
@endif

@if ($errors->any())
    <script>
        @foreach ($errors->all() as $error)
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: '{!! $error !!}'
        });
        @endforeach
    </script>
@endif
</body>
</html>
