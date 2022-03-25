@extends('layout')

@section('section_menu')
    @parent
@endsection

@section('content')
    <h1>Pemilihan User</h1>

    @if (session('Success'))
        <div class="alert alert-success">
            <button type="button" class="close" data-dismiss="alert">×</button>
            {{ session('Success') }}
        </div>
    @endif

    @if (session('error'))
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

    <form action="{{ route('tl_update_supervisor_id') }}" id="form1" method="post" onsubmit="setSelection();">
        @csrf
        <div class="mb-3" id="div_supervisor">
            <span for="input_supervisor_id" class="label mr-2">Supervisor :</span>
            <select name="Supervisor_id" id="input_supervisor_id" class="form-control-sm mb-3 mt-3">
                @foreach ($dc as $item)
                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="row">
            <div class="col-9">
                <table class="display table mb-3 mt-3" id="table_deskcoll">
                    <thead class="table-borderless">
                        <th class="text-center">Nama</th>
                        <th class="text-center">NoTelepon</th>
                        <th class="text-center">Alamat</th>
                        <th class="text-center">Email</th>
                        <th class="text-center">NIP</th>
                        <th class="text-center col-action">Action</th>
                    </thead>
                    <tfoot>
                        <tr>
                            <th class="text-center">Nama</th>
                            <th class="text-center">NoTelepon</th>
                            <th class="text-center">Alamat</th>
                            <th class="text-center">Email</th>
                            <th class="text-center">NIP</th>
                            <th class="text-center col-action">Action</th>
                        </tr>
                    </tfoot>
                </table>
            </div>

            {{-- PILIH deskcoll --}}
            <div class="col-3" style="margin-top: 3cm;">
                <button type="button" class="btn btn-danger mb-3" onclick="remove();">Hapus</button>
                <select id="input_selected" class="form-control" size="15"></select>
                <input type="hidden" name="Deskcoll_id" id="input_deskcoll_id">
                <button class="btn btn-success mt-3">Simpan</button>
            </div>
        </div>
    </form>

    <script>
        $(document).ready(function() {
            var table = $('#table_deskcoll').DataTable({
                "ajax": 'deskcoll/array',
                "columns": [{
                        "data": "name"
                    },
                    {
                        "data": "no_telepon"
                    },
                    {
                        "data": "alamat"
                    },
                    {
                        "data": "email"
                    },
                    {
                        "data": "nip"
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

            $('#table_deskcoll tbody').on('click', 'button', function() {
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
            option.text = data.name;
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

        function setSelection() {
            // debugger;
            const inputSelect = document.getElementById('input_selected');
            var arr = Array.apply(null, inputSelect);
            var deskcollId = document.getElementById('input_deskcoll_id');
            if (arr.length > 0) {
                // inputSelect[0].selected = true;
                arr.forEach(function(x) {
                    deskcollId.value += x.value + ','
                });
            } else {
                deskcollId.value = '';
            }

            var jadi = deskcollId.value.substr(0, deskcollId.value.length - 1);
            deskcollId.value = jadi;
        }

        function validate(e) {
            e.preventDefault();
            const inputSelect = document.getElementById('input_selected');
            var arr = Array.apply(null, inputSelect);
            if (arr.length == 0) {
                alert('Pilih Data Terlebih Dahulu !');
                return;
            }
        }
    </script>
@endsection
