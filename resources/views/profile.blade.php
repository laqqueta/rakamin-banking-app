@extends('layouts/template')

@section('page-title', 'User Profile')

@section('content')
    <!-- Main Content -->
    <div class="container mt-4">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <h2 class="text-center">Profile Detail</h2>
                    </div>
                    <div class="card-body text-center">
                        <img class="profile-user-img img-fluid img-circle"
                             src=" {{ asset('assets/user.png') }} "
                             alt="user">
                        <h3 class="mt-3">{{ $users->account_name }}</h3>
                        <p class="text-muted">Nasabah</p>
                    </div>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">
                            <strong>Email :</strong> {{ $users->email }}
                        </li>
                        <li class="list-group-item">
                            <strong>Address :</strong> {{ $users->account_address }}
                        </li>
                        <li class="list-group-item">
                            <strong>Phone Number :</strong> {{ $users->phone_number }}
                        </li>
                        <li class="list-group-item">
                            <strong>Card Number :</strong> {{ $users->account_card_number }}
                        </li>
                        <li class="list-group-item">
                            <strong>Balance : </strong> <div class="d-inline" id="rupiah"></div>
                        </li>
                    </ul>
                    <div class="card-footer text-center">
                        <a href="{{ url('/profile-edit/'.$users->id) }}" class="btn btn-primary">Edit Profile</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        // Fungsi untuk mengubah angka menjadi format Rupiah
        function formatRupiah(angka) {
            var reverse = angka.toString().split('').reverse().join(''),
                ribuan = reverse.match(/\d{1,3}/g);
            ribuan = ribuan.join('.').split('').reverse().join('');
            return 'Rp. ' + ribuan;
        }

        // Angka yang ingin diubah menjadi format Rupiah
        var balance = {{ $users->balance }};

        // Mengubah angka menjadi format Rupiah dan menaruhnya pada elemen paragraf
        document.getElementById('rupiah').innerHTML = formatRupiah(balance);
    </script>

@endsection
