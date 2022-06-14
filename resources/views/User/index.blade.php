@extends('layout')

@section('section_menu')
    @parent
@endsection

@section('content')
    <h1>Data User</h1>
    <a href="{{ route('user_create') }}" class="btn btn-info mb-3" id="btn_create">User Baru</a>

    {{-- MAIN TABLE --}}
    <table class="display table mb-3 mt-3" id="table_User">
        <thead class="table-borderless">
            <th class="text-center">ID</th>
            <th class="text-center">Nama</th>
            <th class="text-center">Role</th>
            <th class="text-center">Username</th>
            <th class="text-center">Email</th>
            <th class="text-center col-action">Action</th>
        </thead>
        <tfoot>
            <tr>
                <th class="text-center">ID</th>
                <th class="text-center">Nama</th>
                <th class="text-center">Role</th>
                <th class="text-center">Username</th>
                <th class="text-center">Email</th>
                <th class="text-center col-action">Action</th>
            </tr>
        </tfoot>
    </table>

    {{-- MODAL --}}
    <div id="id01" class="modal">
        <span onclick="document.getElementById('id01').style.display='none'" class="close"
            title="Close Modal">×</span>
        <form class="modal-content" action="/action_page.php">
            <div class="container">
                <h1>Hapus Data User</h1>
                <p>Anda Yakin Menghapus Data User ini ?</p>

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
        var localhost = window.origin + '/';
        $(document).ready(function() {
            var table = $('#table_User').DataTable({
                "ajax": 'array',
                "columns": [{
                        "data": "id",
                    }, {
                        "data": "name"
                    },
                    {
                        "data": "role"
                    },
                    {
                        "data": "username"
                    },
                    {
                        "data": "email"
                    },
                    {
                        "defaultContent": "<button class='btn btn-warning btnEdit btnTable btn-sm' type='button'>Edit</button>" +
                            "&nbsp;&nbsp;" +
                            "<button class='btn btn-secondary btnDetail btnTable btn-sm' type='button'>Detail</button>" +
                            "&nbsp;&nbsp;" +
                            "<button class='btn btn-danger btnDelete btnTable btn-sm' type='button'>Delete</button>"
                    }
                ],
                columnDefs: [{
                    "defaultContent": "-",
                    "targets": "_all"
                }],
            });

            // if (!table.data().any()) {
            //     alert('Data Tidak Ditemukan !');
            // }

            $('#table_User tbody').on('click', 'button', function() {
                //debugger;
                var action = this.className;
                var data = table.row($(this).parents('tr')).data();

                if (action.includes('btnEdit')) {
                    window.location.href = localhost + 'user/edit/' + data.id;
                }

                if (action.includes('btnDelete')) {
                    document.getElementById('id01').style.display = 'block'
                    $('#btnYes').on('click', function() {
                        deleteRecord(data.id);
                        alert('Data User Berhasil Dihapus');
                    })
                }

                if (action.includes('btnDetail')) {
                    window.location.href = localhost + 'user/detail/' + data.id;
                }
            });
        });

        async function deleteRecord(id) {
            token = await getToken();
            const response = await fetch(localhost + "api/user/delete/" + id, {
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

        /* Change styles for cancel button and delete button on extra small screens */
        @media screen and (max-width: 300px) {

            .cancelbtn,
            .deletebtn {
                width: 100%;
            }
        }
    </style>
@endsection
