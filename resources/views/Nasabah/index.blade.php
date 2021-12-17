@extends('layout')

@section('section_menu')
    @parent

@endsection

@section('content')

<h1>Data Nasabah</h1>

<table class="display table" id="table_nasabah">
    <thead class="table-borderless">
        <th class="text-center">Nama</th>
        <th class="text-center">No Rekening</th>
        <th class="text-center">NIK</th>
        <th class="text-center">Nomor Telepon</th>
        <th class="text-center">Alamat</th>
        <th class="text-center">Email</th>
        <th class="text-center">Action</th>
    </thead>
    <tbody>
        @foreach ($nasabahs as $item)
            <tr>
                <td>{{ $item->Nama }}</td>
                <td>{{ $item->NoRekening }}</td>
                <td>{{ $item->NIK }}</td>
                <td>{{ $item->NoTelepon }}</td>
                <td>{{ $item->Alamat }}</td>
                <td>{{ $item->Email }}</td>
                <td></td>
            </tr>
        @endforeach
    </tbody>
</table>
@endsection