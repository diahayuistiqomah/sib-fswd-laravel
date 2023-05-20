@extends('layout.main')

@section('content')
<div class="container">
    <div class="row justify-content-center mt-5">
        <div class="col-md-6">
            <a href="{{ url('/') }}" class="btn btn-danger mb-2">Kembali</a>
            <div class="card">
                <div class="card-header">
                    <h3 class="text-center">Halaman Login</h3>
                </div>
                <div class="card-body">
                    @if (isset($error_message))
                        <p class="text-danger text-center">{{ $error_message }}</p>
                    @endif
                    <form method="POST" action="{{ route('login.submit') }}">
                        @csrf
                        <div class="form-group">
                            <label for="email">Email:</label>
                            <input type="email" class="form-control" id="email" name="email" required>
                        </div>
                        <div class="form-group">
                            <label for="password">Password:</label>
                            <input type="password" class="form-control" id="password" name="password" required>
                        </div>
                        <div class="text-center">
                            <button type="submit" class="btn btn-primary" name="submit">Login</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
