
@extends('layouts.template')

@section('page-title', 'Transfer')

@section('content')
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
@endsection



