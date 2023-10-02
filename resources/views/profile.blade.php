@extends('layout')
@section('content')
    <!-- Main -->
    <div class="content-wrapper">
        <h2>Profile</h2>
        <div class="content-header">
            <div class="container-fluid">
                <i class="fa fa-pen fa-xs edit"></i>
                <table>
                    <tbody>
                        <tr>
                            <td>Name</td>
                            <td>:</td>
                            <td >{{ $users->account_name }}</td>
                        </tr>
                        <tr>
                            <td>Email</td>
                            <td>:</td>
                            <td >{{ $users->email }}</td>
                        </tr>
                        <tr>
                            <td>Address</td>
                            <td>:</td>
                            <td>{{ $users->account_address }}</td>
                        </tr>
                        <tr>
                            <td>Phone Number</td>
                            <td>:</td>
                            <td>{{ $users->phone_number }}</td>
                        </tr>
                        
                    </tbody>
                </table>
                <button type="button"><a  href="{{ url('/profile-edit/'.$users->id) }}">Edit</a>
                    
                </button>
            </div>
        </div>
    </div>
    
@endsection