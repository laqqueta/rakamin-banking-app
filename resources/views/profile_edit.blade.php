@extends('layouts.template')

@section('content')
    <!-- Main -->
    <div class="container mt-4">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <h2 class="text-center">Edit Profile</h2>
                    </div>
                    <div class="card-body">
    <form method="POST" action="{{ url('/profile-editsuccess/'.$edited->id) }}"  id='prfl-edit'> 
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="account_name">Name</label>
            <input type="text" name="account_name" id="account_name" class="form-control" value="{{ $edited->account_name }}" required>
        </div>

        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" name="email" id="email" class="form-control" value="{{ $edited->email }}" required readonly>
        </div>

        <div class="form-group">
            <label for="phone_number">Phone Number</label>
            <input type="tel" name="phone_number" id="phone_number" class="form-control" value="{{ $edited->phone_number }}" required>
        </div>

        <div class="form-group">
            <label for="account_address">Address</label>
            <textarea name="account_address" id="account_address" class="form-control" cols="40" rows="5" required>{{ $edited->account_address }}</textarea>
        </div>

        <button type="submit" class="btn btn-primary">Save Changes</button>
    </form>

    </div>
        </div>
    </div>
    </div>
    </div>
@endsection
