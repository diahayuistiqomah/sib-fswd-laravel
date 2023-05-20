@extends('layout.users.main')
@section('content')
<div class="container">
    <h1>Tambah User</h1>
    <a href="{{ route('users.index') }}" class="btn btn-danger">Kembali</a>
    <br>
    <br>
    <form method="POST" action="{{ route('users.store') }}" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="inputName">Name</label>
            <input name="name" type="text" class="form-control" id="inputName" placeholder="Please input your name">
        </div>
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="inputEmail4">Email</label>
                <input name="email" type="email" class="form-control" id="inputEmail4" placeholder="Email">
            </div>
            <div class="form-group col-md-6">
                <label for="inputPassword4">Password</label>
                <div class="input-group">
                    <input name="password" type="password" class="form-control" id="inputPassword4" placeholder="Password">
                    <div class="input-group-append">
                        <button class="btn btn-primary" type="button" id="passwordVisibilityToggle" onclick="togglePasswordVisibility()">
                            <i id="passwordVisibilityIcon" class="fas fa-eye"></i> <span id="passwordVisibilityText">Show</span>
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <div class="form-group">
            <label for="exampleFormControlFile1">Upload your avatar</label>
            <input name="avatar" type="file" class="form-control-file" id="inputFile">
        </div>
        <div class="form-group">
            <label for="inputAddress">Address</label>
            <input name="address" type="text" class="form-control" id="inputAddress" placeholder="1234 Main St">
        </div>
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="inputPhoneNumber">Phone Number</label>
                <input name="phone" type="text" class="form-control" id="inputPhoneNumber" placeholder="your number">
            </div>
            <div class="form-group col-md-4">
                <label for="inputRole">Role</label>
                <select name="role" id="inputRole" class="form-control">
                    <option selected>Choose...</option>
                    @foreach($enumOptions as $option)
                        <option value="{{ $option }}">{{ $option }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <button type="submit" name="simpan" class="btn btn-primary">Submit</button>
    </form>
</div>
@endsection
