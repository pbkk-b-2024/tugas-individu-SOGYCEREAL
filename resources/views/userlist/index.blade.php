@extends('layout.home')

@section('title', 'Daftar Pengguna')

@section('content')
<h1 class="mb-4">Daftar Pengguna</h1>

<form method="GET" action="{{ route('userlist.index') }}">
    <input type="text" name="search" value="{{ request()->input('search') }}" placeholder="Search users...">
    <button type="submit">Search</button>
</form>

@if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}    
    </div>
@endif

<table class="table table-bordered">
    <thead>
        <tr>
            <th>Name</th>
            <th>Email</th>
            <th>User Type</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        @forelse ($users as $user)
            <tr>
                <td>{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
                <td>{{ $user->userType }}</td>
                <td>
                    <a href="{{ route('userlist.edit', $user->id) }}" class="btn btn-warning">Edit</a>
                    <form action="{{ route('userlist.destroy', $user->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Hapus</button>
                    </form>
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="4" class="text-center">No users found.</td>
            </tr>
        @endforelse
    </tbody>
</table>

<div class="d-flex justify-content-center mt-3">
    {{ $users->links() }}
</div>
@endsection
