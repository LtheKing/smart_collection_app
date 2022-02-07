@extends('layout')

@section('section_menu')
    @parent

@endsection

@section('content')

    <h1>Distribusi Pekerjaan</h1>

    {{-- MAIN TABLE --}}
    <table class="display table mb-3 mt-3" id="table_nasabah">
        <thead class="table-borderless">
            <th><input name="select_all" value="1" type="checkbox"></th>
            <th class="text-center">Nama</th>
            <th class="text-center">No Rekening</th>
            <th class="text-center">NIK</th>
            <th class="text-center">Nomor Telepon</th>
            <th class="text-center">Alamat</th>
            <th class="text-center">Email</th>
        </thead>
        <tfoot>
            <tr>
                <th></th>
                <th class="text-center">Nama</th>
                <th class="text-center">No Rekening</th>
                <th class="text-center">NIK</th>
                <th class="text-center">Nomor Telepon</th>
                <th class="text-center">Alamat</th>
                <th class="text-center">Email</th>
            </tr>
        </tfoot>
    </table>

<script>
    var localhost = window.origin + '/';
    $(document).ready(function() {
            var table = $('#table_nasabah').DataTable({
                "ajax": 'array',
                "columns": [
                    { "data": "Nama" },
                    { "data": "NoRekening"},
                    { "data": "NIK"},
                    { "data": "NoTelepon"},
                    { "data": "Alamat"},
                    { "data": "Email"}
                ],
                columnDefs: [{
                    "defaultContent": "-",
                    "targets": "_all"
                }]
            });
    });
</script>
@endsection