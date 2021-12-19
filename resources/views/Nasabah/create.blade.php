@extends('layout')

@section('section_menu')
    @parent

@endsection

@section('content')

<h1>Input Nasabah Baru</h1>
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

<form action="{{ route('nasabah_store') }}" method="post" enctype="multipart/form-data">
  @csrf
        <div class="mb-3" id="div_nama">
          <label for="inputNama" class="form-label">Nama</label>
          <input type="text" class="form-control" id="inputNama" name="Nama" value="{{ old('Nama') }}">
        </div>

        <div class="mb-3" id="div_NoRekening">
            <label for="inputNoRekening" class="form-label">Nomor Rekening</label>
            <input type="text" class="form-control" id="inputNoRekening" name="NoRekening" value="{{ old('NoRekening') }}" onkeyup="separator(this)">
        </div>

        <div class="mb-3" id="div_NIK">
            <label for="inputNIK" class="form-label">NIK</label>
            <input type="text" class="form-control" id="inputNIK" name="NIK" value="{{ old('NIK') }}" onkeyup="separator(this)">
        </div>

        <div class="mb-3" id="div_NoTelepon">
            <label for="inputNoTelepon" class="form-label">Nomor Telepon</label>
            <input type="text" class="form-control" id="inputNoTelepon" name="NoTelepon" value="{{ old('NoTelepon') }}">
        </div>

        <div class="mb-3" id="div_Alamat">
            <label for="inputAlamat" class="form-label">Alamat</label>
            <textarea class="form-control" id="inputAlamat" name="Alamat"> {{ old('Alamat') }} </textarea>
        </div>

        <div class="mb-3" id="div_Email">
            <label for="inputEmail" class="form-label">Email</label>
            <input type="email" class="form-control" id="inputEmail" name="Email" value="{{ old('Email') }}">
        </div>

        <button type="submit" class="btn btn-primary mt-2 mb-3">Submit</button>
</form>

<script>
    function separator(e)
    {
        // debugger;
        var eLength = e.value.length;

        if (eLength == 4) {
            e.value = e.value + ' '
        }
        
        let arr, latest;
        if(e.value.includes(' ')) {
            arr = e.value.split(' ');
            latest = arr.at(-1);
            
            if(latest.length == 4){
                e.value += ' ';
            }
        } 
    }
</script>

@endsection