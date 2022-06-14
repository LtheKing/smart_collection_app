@extends('layout')

@section('section_menu')
    @parent
@endsection

@section('content')
    <h1>Bulk Delete</h1>

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

    <form action="{{ route('customer_bd_func') }}" id="form1" method="post" onsubmit="setSelection();">
        @csrf
        <div class="row">
            <div class="col-9">

                {{-- MAIN TABLE --}}
                <table class="display table mb-3 mt-3" id="table_customer">
                    <thead class="table-borderless">
                        <th class="text-center">Nama</th>
                        <th class="text-center">Bank</th>
                        <th class="text-center">PIC</th>
                        <th class="text-center">Supervisor</th>
                        <th class="text-center">Action</th>
                        <th class="text-center">OSBalance</th>
                        <th class="text-center col-action">#</th>
                    </thead>
                    <tfoot>
                        <tr>
                            <th class="text-center">Nama</th>
                            <th class="text-center">Bank</th>
                            <th class="text-center">PIC</th>
                            <th class="text-center">Supervisor</th>
                            <th class="text-center">Action</th>
                            <th class="text-center">OSBalance</th>
                            <th class="text-center col-action">#</th>
                        </tr>
                    </tfoot>
                </table>
            </div>

            {{-- PILIH CUSTOMER --}}
            <div class="col-3 style="margin-top: 3cm;">
                <button type="button" class="btn btn-danger mb-3" onclick="remove();">Hapus</button>
                <select id="input_selected" class="form-control" size="15" onchange="setSelection();"></select>
                <input type="hidden" name="customerId" id="customerId">
                <button class="btn btn-success mt-3">Simpan</button>
            </div>
        </div>
    </form>

    <script>
        $(document).ready(function() {
            var table = $('#table_customer').DataTable({
                "ajax": 'array',
                "columns": [{
                        "data": "NameCustomer"
                    },
                    {
                        "data": "Bank"
                    },
                    {
                        "data": "PIC"
                    },
                    {
                        "data": "Supervisor"
                    },
                    {
                        "data": "Action"
                    },
                    {
                        "data": "OSBalance"
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

            $('#table_customer tbody').on('click', 'button', function() {
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
            option.text = data.NameCustomer;
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
            var customerId = document.getElementById('customerId');
            if (arr.length > 0) {
                // inputSelect[0].selected = true;
                arr.forEach(function(x) {
                    customerId.value += x.value + ','
                });
            } else {
                customerId.value = '';
            }

            var jadi = customerId.value.substr(0, customerId.value.length - 1);
            customerId.value = jadi;
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
