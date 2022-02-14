@extends('layout')

@section('section_menu')
    @parent
@endsection

@section('content')
    <h1>Distribusi Pekerjaan</h1>

    {{-- <form action="#" id="form1"> --}}
    <div class="mb-3" id="div_deskcoll">
        <select name="DeskColl" id="input_desk_coll" class="form-control-sm mb-3 mt-3">
            @foreach ($dc as $item)
                <option value="{{ $item->Nama }}">{{ $item->Nama }}</option>
            @endforeach
        </select>
    </div>

    <form action="#" id="form1">
        <div class="row">
            <div class="col-9">
                <table class="display table mb-3 mt-3" id="table_nasabah">
                    <thead class="table-borderless">
                        <th class="text-center">Nama</th>
                        <th class="text-center">No Rekening</th>
                        <th class="text-center">NIK</th>
                        <th class="text-center">Nomor Telepon</th>
                        <th class="text-center">Alamat</th>
                        <th class="text-center">Email</th>
                        <th class="text-center col-action">Action</th>
                    </thead>
                    <tfoot>
                        <tr>
                            <th class="text-center">Nama</th>
                            <th class="text-center">No Rekening</th>
                            <th class="text-center">NIK</th>
                            <th class="text-center">Nomor Telepon</th>
                            <th class="text-center">Alamat</th>
                            <th class="text-center">Email</th>
                            <th class="text-center col-action">Action</th>
                        </tr>
                    </tfoot>
                </table>
            </div>

            <div class="col-3" style="margin-top: 3cm;">
                <button type="button" class="btn btn-danger mb-3" onclick="remove();">Hapus</button>
                <select name="" id="input_selected" class="form-control" size="15"></select>
                <button class="btn btn-success mt-3">Simpan</button>
            </div>
        </div>
    </form>

    <script>

        $(document).ready(function() {
            var table = $('#table_nasabah').DataTable({
                "ajax": 'nasabah/array',
                "columns": [{
                        "data": "Nama"
                    },
                    {
                        "data": "NoRekening"
                    },
                    {
                        "data": "NIK"
                    },
                    {
                        "data": "NoTelepon"
                    },
                    {
                        "data": "Alamat"
                    },
                    {
                        "data": "Email"
                    },
                    {
                        "defaultContent": "<button class='btn btn-secondary btnSelect btnTable btn-sm' type='button'>Select</button>"
                    }
                ],
                columnDefs: [{
                    "defaultContent": "-",
                    "targets": "_all"
                }]
            });

            $('#table_nasabah tbody').on('click', 'button', function() {
                //debugger;
                var action = this.className;
                var data = table.row($(this).parents('tr')).data();

                selectData(data);
            });
        });

        function selectData(data) {
            // debugger;
            const inputSelect = document.getElementById('input_selected');
            var option = document.createElement("option");
            option.text = data.Nama;
            option.value = data.id;

            var arr = Array.apply(null, inputSelect);
            var exist = arr.filter(x => x.value == data.id);

            if (arr.length > 0 && exist.length > 0) {
                alert('Data Sudah Dipilih !');
                return;
            }

            inputSelect.appendChild(option);
        }

        function remove() {
            // debugger;
            const inputSelect = document.getElementById('input_selected');
            
            if (inputSelect.selectedIndex == -1) {
                alert('Pilih Data Terlebih Dahulu !');
                return;
            }

            inputSelect.remove(inputSelect.selectedIndex);
        }
    </script>
@endsection
