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

    {{-- <div class="mb-3">
            <table class="table">
                <tr>
                    <td>
                        <select name="leftProcess" size="15" class="form-control">
                            @foreach ($n as $item)
                                <option value="{{ $item->Nama }}">{{ $item->Nama }}</option>
                            @endforeach
                        </select>
                    </td>
                    <td class="text-center">
                        <button type="button" onclick="moveRight('leftProcess','rightProcess');" class="btn btn-secondary mb-3 mt-2">>></button>
                        <br />
                        <button type="button" onclick="moveRight('rightProcess','leftProcess')" class="btn btn-secondary mt-3"><<</button>
                    </td>
                    <td>
                        <select name="rightProcess" size="15" class="form-control">
                        </select>
                    </td>
                </tr>
            </table>
        </div> --}}
    {{-- </form> --}}

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
                <button type="button" class="btn btn-danger mb-3">Remove</button>
                <select name="" id="input_selected" class="form-control"></select>
            </div>
        </div>
    </form>

    <script>
        // function moveRight(leftValue, rightValue) {
        //     //alert("Elft value is t : "+leftValue);
        //     var leftSelect = document.forms["form1"].elements[leftValue];
        //     var rightSelect = document.forms["form1"].elements[rightValue];

        //     //alert("test : " + document.forms["form1"].elements[myLeftId].options[selItem].value);
        //     if (leftSelect.selectedIndex == -1) {
        //         window.alert("You must first select an item on the left side.")
        //     } else {
        //         var option = leftSelect.options[leftSelect.selectedIndex];
        //         rightSelect.appendChild(option);
        //     }
        // }

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
            const inputSelect = document.getElementById('input_selected');
            var option = document.createElement("option");
            option.text = data.Nama;
            option.value = data.id;
            inputSelect.appendChild(option);
        }
    </script>
@endsection
