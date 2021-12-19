@extends('layout')

@section('section_menu')
    @parent

@endsection

@section('content')

<h1>Data Nasabah</h1>
<a href="{{route('nasabah_create')}}" class="btn btn-info" id="btn_create">Nasabah Baru</a>

<form action="{{ route('nasabah_import_excel') }}" method="POST" enctype="multipart/form-data" class="mb-3">
    @csrf
    <div class="input-group mb-3 mt-3">
        <div class="input-group-prepend">
          <span class="input-group-text" id="inputGroupFileAddon01">Import File</span>
        </div>
        <div class="custom-file">
          <input type="file" class="custom-file-input" id="file" 
            aria-describedby="inputGroupFileAddon01" name="file">
          <label class="custom-file-label" for="input_file" id="input_file_label">Choose file</label>
        </div>
    </div>

    <button type="submit" class="btn btn-success">Submit</button>
</form>

<table class="display table mb-3" id="table_nasabah">
    <thead class="table-borderless">
        <th class="text-center">Nama</th>
        <th class="text-center">No Rekening</th>
        <th class="text-center">NIK</th>
        <th class="text-center">Nomor Telepon</th>
        <th class="text-center">Alamat</th>
        <th class="text-center">Email</th>
        <th class="text-center">Action</th>
    </thead>
    <tfoot>
        <tr>
            <th class="text-center">Nama</th>
            <th class="text-center">No Rekening</th>
            <th class="text-center">NIK</th>
            <th class="text-center">Nomor Telepon</th>
            <th class="text-center">Alamat</th>
            <th class="text-center">Email</th>
            <th class="text-center">Action</th>
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
                    { "data": "Email"},
                    { "defaultContent": 
                        "<button class='btn btn-warning btnEdit' type='button'>Edit</button>" +
                        "&nbsp;&nbsp;" +
                        "<button class='btn btn-secondary btnDetail' type='button'>Detail</button>" +
                        "&nbsp;&nbsp;" +
                        "<button class='btn btn-danger btnDelete' type='button'>Delete</button>"
                    }
                ],
                columnDefs: [{
                    "defaultContent": "-",
                    "targets": "_all"
                }]
            });

            $('#table_nasabah tbody').on( 'click', 'button', function () {
                //debugger;
                var action = this.className;
                var data = table.row( $(this).parents('tr') ).data();

                if (action.includes('btnEdit'))
                {
                    window.location.href = localhost + 'nasabah/edit/' + data.id;
                }

                if(action.includes('btnDelete'))
                {
                    document.getElementById('id01').style.display='block'
                    $('#btnYes').on('click', function() {
                        deleteRecord(data.id);
                        alert('Data nasabah Berhasil Dihapus');
                    })
                }

                if(action.includes('btnDetail'))
                {
                    window.location.href = localhost + 'nasabah/detail/' + data.id;
                }                
            });
        });
</script>
@endsection