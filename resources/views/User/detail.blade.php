@extends('layout')

@section('section_menu')
    @parent

@endsection

@section('content')
    <h1 class="h1">Detail user</h1>

    <table class="table">
        <tr>
            <td>Nama</td>
            <td>:</td>
            <td>{{ $user->name }}</td>
        </tr>

        <tr>
            <td>Email</td>
            <td>:</td>
            <td>{{ $user->email }}</td>
        </tr>

        <tr>
            <td>Role</td>
            <td>:</td>
            <td>{{ $user->role }}</td>
        </tr>

        <tr>
            <td>Alamat</td>
            <td>:</td>
            <td>{{ $user->alamat }}</td>
        </tr>

        <tr>
            <td>NIP</td>
            <td>:</td>
            <td>{{ $user->nip }}</td>
        </tr>

        <tr>
            <td>Nomor Telepon</td>
            <td>:</td>
            <td>{{ $user->no_telepon }}</td>
        </tr>
    </table>
@endsection