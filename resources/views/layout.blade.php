<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css"
        integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous">
    </script>

    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>

    <script src="{{ asset('js/render.js') }}"></script>

    <style>
        .main_container {
            width: 90%;
            margin: auto;
        }

        /* Change styles for cancel button and delete button on extra small screens */
        @media screen and (max-width: 300px) {

            .cancelbtn,
            .deletebtn {
                width: 100%;
            }
        }

    </style>

    <title>Tobadihon Mandiri</title>
</head>

<body>

    @section('section_menu')
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown"
                aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavDropdown">
                <ul class="navbar-nav">
                    <li class="nav-item active">
                        <a class="nav-link" href="{{ route('customer_index') }}">Home <span
                                class="sr-only">(current)</span></a>
                    </li>

                    @if (session()->get('role') == 'Super Admin' || session()->get('role') == 'Admin' || session()->get('role') == 'Supervisor')
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Distribusi Pekerjaan
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                @if (session()->get('role') == 'Supervisor')
                                    <a class="dropdown-item" href="{{ route('tl_distribusi') }}"
                                        id="dropdown_deskcoll">User</a>
                                @endif

                                @if (session()->get('role') == 'Super Admin' || session()->get('role') == 'Admin')
                                    <a class="dropdown-item" href="{{ route('tl_distribusi') }}"
                                        id="dropdown_deskcoll">User</a>
                                    <a class="dropdown-item" href="{{ route('tl_set_supervisor') }}"
                                        id="dropdown_supervisor">Supervisor</a>
                                @endif
                            </div>
                        </li>
                    @endif

                    {{-- DIHAPUS KARENA DIGANTIKAN DENGAN MENU USER --}}
                    {{-- <li class="nav-item">
                        <a class="nav-link" href="{{ route('dc_index') }}">Desk Coll</a>
                    </li> --}}
                    
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('user_index') }}">User</a>
                    </li>
                </ul>
            </div>
            {{-- <a class="btn btn-secondary float-right mr-3" href="{{ route('test_detail_page', 1) }}">Test Page</a> --}}
            <a class="btn btn-danger float-right" href="{{ route('logout') }}">Logout</a>
        </nav>

    @show
    <main>
        <div class="main_container" id="menu_container">
            @yield('content')
        </div>
    </main>

</body>

</html>
