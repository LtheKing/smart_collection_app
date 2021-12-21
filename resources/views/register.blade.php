@extends('layout')

@section('section_menu')
    @parent

@endsection

@section('content')

<h1>User Baru</h1>
<a href="{{ route('nasabah_index') }}" class="btn btn-warning mb-3 mt-3">Cancel</a>

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

<form action="{{ route('user_store') }}" method="post" enctype="multipart/form-data">
  @csrf
        <div class="mb-3" id="div_nama">
          <label for="inputNama" class="form-label">Nama</label>
          <input type="text" class="form-control" id="inputNama" name="name" value="{{ old('name') }}">
        </div>

        <div class="mb-3" id="div_username">
            <label for="inputusername" class="form-label">Username</label>
            <input type="text" class="form-control" id="inputusername" name="username" value="{{ old('username') }}">
        </div>

        <div class="mb-3" id="div_Email">
            <label for="inputEmail" class="form-label">Email</label>
            <input type="email" class="form-control" id="inputEmail" name="email" value="{{ old('email') }}">
        </div>

        <div class="mb-3" id="div_password">
            <label for="inputpassword" class="form-label">Password</label>
            <input type="password" class="form-control" id="inputpassword" name="password" value="{{ old('password') }}">
        </div>

        <div class="mb-3" id="div_Role">
            <label for="input_jenis_kelamin" class="form-label">Jenis Kelamin</label>
            <select name="role" id="input_jenis_kelamin" class="form-control" value="{{ old('Role') }}" onchange="onJKChange();">
                <option value="Admin">Admin</option>
                <option value="Staff">Staff</option>
            </select>
        </div>

        <button type="submit" class="btn btn-primary mt-2 mb-3">Submit</button>
</form>

@endsection