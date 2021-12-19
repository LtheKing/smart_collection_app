@extends('layout')

@section('section_menu')
    @parent

@endsection

@section('content')

    <h1 class="h1">Detail Nasabah</h1>

    <div class="form-group">
        <dl>
            <dt>Nama :</dt>
            <dd>{{ $nasabah->Nama }}</dd>
            
            <dt>Nomor Rekening : </dt>
            <dd>{{ $nasabah->NoRekening }}</dd>

            <dt>NIK :</dt>
            <dd>{{ $nasabah->NIK }}</dd>

            <dt>Nomor Telepon :</dt>
            <dd>{{ $nasabah->NoTelepon }} </dd>

            <dt>Alamat :</dt>
            <dd>{{ $nasabah->Alamat }}</dd>
            
            <dt>Email :</dt>
            <dd>{{ $nasabah->Email }}</dd>
        </dl>
    </div>

<style>
    dl {
  width: 100%;
  overflow: hidden;
  padding: 0;
  margin: 0
}
dt {
  float: left;
  width: 50%;
  /* adjust the width; make sure the total of both is 100% */
  padding: 0;
  margin: 0
}
dd {
  float: left;
  width: 50%;
  /* adjust the width; make sure the total of both is 100% */
  padding: 0;
  margin: 0
}
</style>

@endsection

