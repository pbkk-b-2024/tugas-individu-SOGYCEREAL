@extends('layout.home')

@section('title', 'Edit User')

@section('content')
<h1>Edit User</h1>

@if (session('error'))
    <div class="alert alert-danger">
        {{ session('error') }}
    </div>
@endif

<form action="{{ route('userlist.update', $user->id) }}" method="POST">
    @csrf
    @method('PUT')
    
    <div class="form-group">
        <label for="name">Name</label>
        <input type="text" name="name" id="name" value="{{ old('name', $user->name) }}" required>
    </div>

    <div class="form-group">
        <label for="email">Email</label>
        <input type="email" name="email" id="email" value="{{ old('email', $user->email) }}" required>
    </div>

    <div class="form-group">
        <label for="userType">User Type</label>
        <select name="userType" id="userType" required>
            <option value="USER" {{ $user->userType === 'USER' ? 'selected' : '' }}>User</option>
            <option value="ADMIN" {{ $user->userType === 'ADMIN' ? 'selected' : '' }}>Admin</option>
        </select>
    </div>

    <button type="submit">Update User</button>
</form>

<a href="{{ route('userlist.index') }}">Back to User List</a>
@endsection
