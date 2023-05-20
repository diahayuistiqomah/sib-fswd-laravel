@extends('layout.users.main')
@section('content')
<div class="container">
    <div class="card">
        <div class="card-header">
            <h1 class="card-title">Detail Profil User</h1>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-4">
                    <div class="avatar-container">
                        <img src="data:image/jpeg;base64,<?= base64_encode($data_user->avatar) ?>" alt="Avatar" class="rounded-circle" style="width: 75px; height: 75px;">
                        <div class="avatar-placeholder">
                            <i class="fas fa-user"></i>
                        </div>
                    </div>
                </div>
                <div class="col-md-8">
                    <div class="form-group">
                        <h4 for="inputName">Name</h4>
                        <p>{{$data_user->name}}</p>
                    </div>
                    <div class="form-group">
                        <h4 for="inputEmail">Email</h4>
                        <p>{{$data_user->email}}</p>
                    </div>
                    <div class="form-group">
                        <h4 for="inputAddress">Address</h4>
                        <p>{{$data_user->address}}</p>
                    </div>
                    <div class="form-group">
                        <h4 for="inputPhoneNumber">Phone Number</h4>
                        <p>{{$data_user->phone}}</p>
                    </div>
                    <div class="form-group">
                        <h4 for="inputRole">Role</h4>
                        <p>{{$data_user->role}}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <a href="./" class="btn btn-primary mt-3">Kembali</a>
</div>
@endsection
