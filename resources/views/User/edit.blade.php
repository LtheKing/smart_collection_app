@extends('layout')

@section('section_menu')
    @parent

@endsection

@section('content')
@if(session('error'))
        <div class="alert alert-danger">
            <button type="button" class="close" data-dismiss="alert">×</button>
            {{ session('error') }}
        </div>
    @endif

    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <h1 class="h1">Edit Data User</h1>
    <a class="btn btn-secondary mb-3 mt-3" href="{{ route('user_index') }}"> Kembali </a>

    <form action="{{ route('user_update', $user->id) }}" method="post" enctype="multipart/form-data">
      @csrf
      @method('PUT')
        <div class="mb-3" id="div_Nama">
            <label for="inputNama" class="form-label">Nama</label>
            <input type="text" class="form-control" id="inputNama" name="name" value="{{ old('Nama', $user->name) }}">
        </div>
        
        <div class="mb-3" id="div_Email">
            <label for="inputEmail" class="form-label">Email</label>
            <input type="email" class="form-control" id="inputEmail" name="email" value="{{ old('email', $user->email) }}">
        </div>

        <div class="mb-3" id="div_Password">
            <label for="inputPassword" class="form-label">Password</label>
            <input type="password" class="form-control" id="inputPassword" name="password" value="{{ old('password', $user->password) }}">
        </div>

        <div class="mb-3" id="div_Role">
            <label for="inputRole" class="form-label">Role</label>
            <input type="text" class="form-control" id="inputRole" name="role" value="{{ old('role', $user->role) }}">
        </div>

        <div class="mb-3" id="div_Username">
            <label for="inputUsername" class="form-label">Username</label>
            <input type="text" class="form-control" id="inputUsername" name="username" value="{{ old('username', $user->username) }}">
        </div>

        <button type="submit" class="btn btn-primary mt-2 mb-3">Submit</button>
    </form>
@endsection