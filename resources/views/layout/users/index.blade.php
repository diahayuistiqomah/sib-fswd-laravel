@extends('layout.users.main')
@section('content')
<div class="container">
    <h1 class="mt-4 mb-3">Data Pengguna</h1>
    <br>
    <a href="{{ route('users.create') }}" class="btn btn-sm btn-primary mr-2">Tambah Anggota</a>
    <a href="add" class="btn btn-danger mb-3">Logout</a>
    <br>
    <div class="table-responsive">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Action</th>
                    <th scope="col">Avatar</th>
                    <th scope="col">Nama</th>
                    <th scope="col">Email</th>
                    <th scope="col">Phone</th>
                    <th scope="col">Role</th>
                </tr>
            </thead>
            <tbody>
                @php
                $no = 1; // Initialize the row number variable
                @endphp
                @foreach ($data_users as $user) 
                <tr>
                    <th scope="row"> {{$no++}}</th>
                    <td>
                        <a href="{{route('users.show', $user->id) }}" class="btn btn-sm btn-primary mr-2">Detail</a>
                        {{-- <a href="{{ route('posts.edit', $user->id) }}" class="btn btn-sm btn-warning mr-2">Edit</a> --}}
                        <form action="{{ route('users.destroy', $user->id) }}" method="POST" style="display: inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger">Hapus</button>
                        </form>
                    </td>
                    <td>
                        <img src="data:image/jpeg;base64,<?= base64_encode($user->avatar) ?>" alt="Avatar" class="rounded-circle" style="width: 75px; height: 75px;">
                    </td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->phone }}</td>
                    <td>{{ $user->role }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
