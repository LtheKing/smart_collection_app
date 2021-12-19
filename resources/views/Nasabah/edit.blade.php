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

    <h1 class="h1">Edit Data Nasabah</h1>
    <a class="btn btn-secondary mb-3 mt-3" href="{{ route('nasabah_index') }}"> Kembali </a>

    <form action="{{ route('nasabah_update', $nasabah->id) }}" method="post" enctype="multipart/form-data">
      @csrf
      @method('PUT')
        <div class="mb-3" id="div_Nama">
            <label for="inputNama" class="form-label">Nama</label>
            <input type="text" class="form-control" id="inputNama" name="Nama" value="{{ old('Nama', $nasabah->Nama) }}">
        </div>

        <div class="mb-3" id="div_NoRekening">
            <label for="inputNoRekening" class="form-label">Nomor Rekening</label>
            <input type="text" class="form-control" id="inputNoRekening" name="NoRekening" value="{{ old('NoRekening', $nasabah->NoRekening) }}">
        </div>

        <div class="mb-3" id="div_NIK">
            <label for="inputNIK" class="form-label">NIK</label>
            <input type="text" class="form-control" id="inputNIK" name="NIK" value="{{ old('NIK', $nasabah->NIK) }}">
        </div>

        <div class="mb-3" id="div_NoTelepon">
            <label for="inputNoTelepon" class="form-label">Nomor Telepon</label>
            <input type="text" class="form-control" id="inputNoTelepon" name="NoTelepon" value="{{ old('NoTelepon', $nasabah->NoTelepon) }}">
        </div>

        <div class="mb-3" id="div_Alamat">
            <label for="inputAlamat" class="form-label">Alamat</label>
            <textarea class="form-control" id="inputAlamat" name="Alamat"> {{ old('Alamat', $nasabah->Alamat) }} </textarea>
        </div>

        <div class="mb-3" id="div_Email">
            <label for="inputEmail" class="form-label">Email</label>
            <input type="email" class="form-control" id="inputEmail" name="Email" value="{{ old('Email', $nasabah->Email) }}">
        </div>

        <button type="submit" class="btn btn-primary mt-2 mb-3">Submit</button>
    </form>
@endsection