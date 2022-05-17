@extends('layout')

@section('section_menu')
    @parent
@endsection

@section('content')
    <h1>Data Customer</h1>

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

    {{-- <a href="" class="btn btn-info" id="btn_create">Customer Baru</a> --}}

    <div id="div_role_value" hidden=true>
        <input type="text" id="role_value" value="{{ session('role') }}">
    </div>

    {{-- EXPORT IMPORT SELECTION --}}
    <div class="mt-3 div-import">
        <label for="action">Import / Export :</label>
        <select name="action" class="form-control" id="select_action" onchange="actionChange(this)">
            <option value="Import" selected>Import</option>
            <option value="Export">Export</option>
        </select>
    </div>

    {{-- IMPORT --}}
    <div class="card mt-3 mb-3 div-import" id="container_import">
        <div class="card-header">
            Import Section
        </div>

        <div class="card-body">
            <form action="{{ route('customer_import') }}" method="POST" enctype="multipart/form-data"
                class="mb-3">
                @csrf
                <div class="input-group mb-3 mt-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="inputGroupFileAddon01">Import File</span>
                    </div>
                    <div class="custom-file">
                        <input type="file" class="custom-file-input" id="input_file"
                            aria-describedby="inputGroupFileAddon01" name="file" onchange="loadFile()">
                        <label class="custom-file-label" for="input_file" id="input_file_label">Choose file</label>
                    </div>
                </div>

                <button type="submit" class="btn btn-success">Submit</button>
            </form>
        </div>
    </div>

    {{-- EXPORT --}}
    <div class="card mt-3 mb-3 div-export" id="container_export" hidden=true>
        <div class="card-header">
            Export Section
        </div>

        <div class="card-body">
            <form action="{{ route('customer_export') }}" method="post" class="mb-3" onsubmit="setSelection();">
                @csrf
                <input type="text" class="form-control mb-3 mt-3  " id="input_filter_bank_export" placeholder="Bank"
                    name="Bank">

                {{-- PILIH FIELD --}}
                <div class="content-export">
                    <div class="content-export-item">
                        <label for="select-field">Pilih Field</label>
                        <select name="select_field" id="select-field" class="form-control">
                            @foreach ($columns as $item)
                                <option value="{{ $item }}">{{ $item }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="content-export-item" style="text-align: center;">
                        <button type="button" id="btn-select" class="btn btn-success" style="margin-bottom: 0.5cm;"
                            onclick="selectData()">Pilih</button> <br />
                        <button type="button" id="btn-remove" class="btn btn-danger" onclick="remove()">Hapus</button>
                    </div>

                    <div class="content-export-item">
                        <label for="selected-field">Field Yang Dipilih</label>
                        <select id="selected-field" class="form-control" size="15" onchange="setSelection()"></select>
                        <input type="hidden" name="Field" id="Field">
                    </div>
                </div>

                <button class="btn btn-warning mt-3">Export</button>
            </form>
        </div>

    </div>

    {{-- MAIN TABLE --}}
    <table class="display table mb-3 mt-3" id="table_customer">
        <thead class="table-borderless">
            <th class="text-center">Nama</th>
            <th class="text-center">Bank</th>
            <th class="text-center">Action</th>
            <th class="text-center">PTP Date</th>
            <th class="text-center" width="15%">PTP Amount</th>
            <th class="text-center">Paid Amount</th>
            <th class="text-center">Paid Date</th>
            <th class="text-center">Report Date</th>
            <th class="text-center">Report</th>
            <th class="text-center col-action">#</th>
        </thead>
        <tfoot>
            <tr>
            <th class="text-center">Nama</th>
            <th class="text-center">Bank</th>
            <th class="text-center">Action</th>
            <th class="text-center">PTP Date</th>
            <th class="text-center" width="15%">PTP Amount</th>
            <th class="text-center">Paid Amount</th>
            <th class="text-center">Paid Date</th>
            <th class="text-center">Report Date</th>
            <th class="text-center">Report Amount</th>
                <th class="text-center col-action">#</th>
            </tr>
        </tfoot>
    </table>

    {{-- MODAL --}}
    <div id="id01" class="modal">
        <span onclick="document.getElementById('id01').style.display='none'" class="close"
            title="Close Modal">×</span>
        <form class="modal-content" action="/action_page.php">
            <div class="container">
                <h1>Hapus Data customer</h1>
                <p>Anda Yakin Menghapus Data customer ini ?</p>

                <div class="clearfix">
                    <button type="button" onclick="document.getElementById('id01').style.display='none'"
                        class="cancelbtn btnModal" id="btnCancel">Cancel</button>
                    <button type="button" onclick="document.getElementById('id01').style.display='none'"
                        class="deletebtn btnModal" id="btnYes">Delete</button>
                </div>
            </div>
        </form>
    </div>

    <script>
        window.onload = roleSetting();
        var localhost = window.origin + '/';

        function renderTableAdmin() {
            $(document).ready(function() {
                var table = $('#table_customer').DataTable({
                    "ajax": 'index/array',
                    "columns": [{
                            "data": "NameCustomer"
                        },
                        {
                            "data": "Bank"
                        },
                        {
                            "data": "Action"
                        },
                        {
                            "data": "PTPDate"
                        },
                        {
                            "data": "PTPAmount"
                        },
                        {
                            "data": "PaidDate"
                        },
                        {
                            "data": "PaidAmount"
                        },
                        {
                            "data": "ReportDate"
                        },
                        {
                            "data": "ReportAmount"
                        },
                        // {
                        //     "defaultContent": "<button class='btn btn-warning btnEdit btnTable btn-sm' type='button'>Edit</button>" +
                        //         "&nbsp;&nbsp;" +
                        //         "<button class='btn btn-secondary btnDetail btnTable btn-sm' type='button'>Detail</button>" +
                        //         "&nbsp;&nbsp;" +
                        //         "<button class='btn btn-danger btnDelete btnTable btn-sm' type='button'>Delete</button>"
                        // }
                        {
                            "defaultContent": "<button class='btn btn-warning btnEdit btnTable btn-sm' type='button'>Edit / Report</button>" +
                                "&nbsp;&nbsp;" +
                                "<button class='btn btn-danger btnDelete btnTable btn-sm' type='button'>Delete</button>"
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

                    if (action.includes('btnEdit')) {
                        window.location.href = localhost + 'customer/edit/' + data.id;
                    }

                    if (action.includes('btnDelete')) {
                        document.getElementById('id01').style.display = 'block'
                        $('#btnYes').on('click', function() {
                            deleteRecord(data.id);
                            alert('Data customer Berhasil Dihapus');
                        })
                    }

                    if (action.includes('btnDetail')) {
                        window.location.href = localhost + 'customer/detail/' + data.id;
                    }
                });
            });
        }

        function renderTableUser() {
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
                            "data": "Action"
                        },
                        {
                            "data": "PTPDate"
                        },
                        {
                            "data": "PTPAmount"
                        },
                        {
                            "data": "PaidDate"
                        },
                        {
                            "data": "PaidAmount"
                        },
                        {
                            "data": "ReportDate"
                        },
                        {
                            "data": "Report"
                        },
                        {
                            "defaultContent": "<button class='btn btn-warning btnEdit btnTable btn-sm' type='button'>Edit</button>" +
                                "&nbsp;&nbsp;" +
                                "<button class='btn btn-secondary btnDetail btnTable btn-sm' type='button'>Detail</button>" +
                                "&nbsp;&nbsp;" +
                                "<button class='btn btn-danger btnDelete btnTable btn-sm' type='button' hidden=true>Delete</button>"
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

                    if (action.includes('btnEdit')) {
                        window.location.href = localhost + 'customer/edit/' + data.id;
                    }

                    if (action.includes('btnDelete')) {
                        document.getElementById('id01').style.display = 'block'
                        $('#btnYes').on('click', function() {
                            deleteRecord(data.id);
                            alert('Data customer Berhasil Dihapus');
                        })
                    }

                    if (action.includes('btnDetail')) {
                        window.location.href = localhost + 'customer/detail/' + data.id;
                    }
                });
            });
        }

        async function deleteRecord(id) {
            let role = document.getElementById('role_value').value;
            if (role == 'Supervisor' || role == 'User') {
                alert('Anda tidak bisa menghapus data customer !');
                return;
            }

            token = await getToken();
            const response = await fetch(localhost + "api/customer/delete/" + id, {
                method: 'DELETE',
                headers: {
                    'Content-type': 'application/json',
                    'X-CSRF-Token': token
                }
            });

            if (response.status != 200) {
                alert('Gagal Menghapus data');
                console.log(response.text());
                return;
            }

            // Awaiting for the resource to be deleted
            const resData = 'resource deleted...';

            location.reload();
            // Return response data 
            return resData;
        }

        async function getToken() {
            const response = await fetch(localhost + 'api/token');
            const token = await response.text();
            return token;
        }

        function actionChange(e) {
            if (e.value == 'Import') {
                document.getElementById('container_export').hidden = true;
                document.getElementById('container_import').hidden = false;
            } else {
                document.getElementById('container_export').hidden = false;
                document.getElementById('container_import').hidden = true;
            }
        }

        function loadFile() {
            var fullPath = document.getElementById('input_file').value;
            if (fullPath) {
                var startIndex = (fullPath.indexOf('\\') >= 0 ? fullPath.lastIndexOf('\\') : fullPath.lastIndexOf('/'));
                var filename = fullPath.substring(startIndex);
                if (filename.indexOf('\\') === 0 || filename.indexOf('/') === 0) {
                    filename = filename.substring(1);
                }
                document.getElementById('input_file_label').innerHTML = filename
            }
        }

        function selectData() {
            // debugger;
            value = document.getElementById('select-field').value;
            const inputSelect = document.getElementById('selected-field');
            var option = document.createElement("option");
            option.text = value;
            option.value = value;

            var arr = Array.apply(null, inputSelect);
            var exist = arr.filter(x => x.value == value);

            if (arr.length > 0 && exist.length > 0) {
                alert('Data Sudah Dipilih !');
                return;
            }

            inputSelect.appendChild(option);
        }

        function remove() {
            // debugger;
            const inputSelect = document.getElementById('selected-field');

            if (inputSelect.selectedIndex == -1) {
                alert('Pilih Data Terlebih Dahulu !');
                return;
            }

            inputSelect.remove(inputSelect.selectedIndex);
        }

        function setSelection() {
            // debugger;
            const inputSelect = document.getElementById('selected-field');
            var arr = Array.apply(null, inputSelect);
            var Field = document.getElementById('Field');
            if (arr.length > 0) {
                // inputSelect[0].selected = true;
                arr.forEach(function(x) {
                    Field.value += x.value + ','
                });
            } else {
                Field.value = '';
            }

            var jadi = Field.value.substr(0, Field.value.length - 1);
            Field.value = jadi;
        }

        function roleSetting() {
            let role = document.getElementById('role_value').value;
            let div_import = document.getElementsByClassName('div-import');
            let div_export = document.getElementsByClassName('div-export');

            if (role == 'Supervisor' || role == 'User') {
                div_export.hidden = true;
                div_import[0].hidden = true;
                div_import[1].hidden = true;

                renderTableUser();
            } else {
                renderTableAdmin();
            }
        }
    </script>

    <style>
        td {
            text-align: center;
        }

        /* Set a style for all buttons */
        .btnModal {
            background-color: #04aa6d;
            color: white;
            padding: 14px 20px;
            margin: 8px 0;
            border: none;
            cursor: pointer;
            width: 100%;
            opacity: 0.9;
        }

        .btnModal:hover {
            opacity: 1;
        }

        /* Float cancel and delete buttons and add an equal width */
        .cancelbtn,
        .deletebtn {
            float: left;
            width: 50%;
        }

        /* Add a color to the cancel button */
        .cancelbtn {
            background-color: #ccc;
            color: black;
        }

        /* Add a color to the delete button */
        .deletebtn {
            background-color: #f44336;
        }

        /* Add padding and center-align text to the container */
        .container {
            padding: 16px;
            /* text-align: center; */
        }

        /* The Modal (background) */
        .modal {
            display: none;
            /* Hidden by default */
            position: fixed;
            /* Stay in place */
            z-index: 1;
            /* Sit on top */
            left: 0;
            top: 0;
            width: 100%;
            /* Full width */
            height: 100%;
            /* Full height */
            overflow: auto;
            /* Enable scroll if needed */
            background-color: #474e5d;
            padding-top: 50px;
        }

        /* Modal Content/Box */
        .modal-content {
            background-color: #fefefe;
            margin: 5% auto 15% auto;
            /* 5% from the top, 15% from the bottom and centered */
            border: 1px solid #888;
            width: 80%;
            /* Could be more or less, depending on screen size */
        }

        /* Style the horizontal ruler */
        hr {
            border: 1px solid #f1f1f1;
            margin-bottom: 25px;
        }

        /* The Modal Close Button (x) */
        .close {
            position: absolute;
            right: 35px;
            top: 15px;
            font-size: 40px;
            font-weight: bold;
            color: #f1f1f1;
        }

        .close:hover,
        .close:focus {
            color: #f44336;
            cursor: pointer;
        }

        /* Clear floats */
        .clearfix::after {
            content: "";
            clear: both;
            display: table;
        }

        .btnTable {
            /* display: block;
                              margin: auto; */
            width: auto;
            display: inline-block;
            font-size: 12px;
        }

        .col-action {
            width: 15%;
        }

        .content-export {
            display: grid;
            grid-template-columns: auto 5cm auto;
            padding: 10px;
        }

        /* Change styles for cancel button and delete button on extra small screens */
        @media screen and (max-width: 300px) {

            .cancelbtn,
            .deletebtn {
                width: 100%;
            }
        }

    </style>
@endsection
