
@extends('layout')
@section('content')
    <!-- Main -->
    <div class="content-wrapper">
        <h2>Profile</h2>
        <div class="content-header">
            <div class="container-fluid">
    <form method="POST" action="{{ url('/profile-editsuccess/'.$edited->id) }}"  id='prfl-edit'> 
        @csrf
        @method('PUT')
        Email :<br><input type="email" name="email" placeholder="E-mail" value='{{ $edited -> email }}' required readonly/> <br/><br/>
        Nama :<br><input type="name" name="account_name" placeholder="Name" value='{{ $edited -> account_name }}' required /> <br/><br/>
        Phone Number :<br><input type="number" name="phone_number" placeholder="Phone Number" value='{{ $edited -> phone_number }}' required /> <br/><br/>
        Address:<br><textarea name="address" cols="40" rows="5" placeholder="account_adress" required>{{ $edited -> account_address }}</textarea><br><br>
        <input type="submit" name="edit" value="Edit" id="edit" />
    </form>

    </div>
        </div>
            </div>
@endsection
