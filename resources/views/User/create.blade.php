@extends('layout')

@section('section_menu')
    @parent

@endsection

@section('content')
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

    <h1 class="h1">User Baru</h1>
    <a class="btn btn-secondary mb-3 mt-3" href="{{ route('user_index') }}"> Kembali </a>

    <div id="div_role_value" hidden=true>
        <input type="text" id="role_value" value="{{ session('role') }}">
    </div>

    <form action="{{ route('user_store') }}" method="post" enctype="multipart/form-data">
      @csrf
      @method('POST')
        <div class="mb-3" id="div_Nama">
            <label for="inputNama" class="form-label">Nama</label>
            <input type="text" class="form-control" id="inputNama" name="name" value="{{ old('Nama') }}">
        </div>
        
        <div class="mb-3" id="div_Email">
            <label for="inputEmail" class="form-label">Email</label>
            <input type="email" class="form-control" id="inputEmail" name="email" value="{{ old('email') }}">
        </div>

        <div class="mb-3" id="div_alamat">
            <label for="input_alamat" class="form-label">Alamat</label>
            <textarea class="form-control" id="input_alamat" name="alamat" value="{{ old('alamat') }}"></textarea>
        </div>

        <div class="mb-3" id="div_nip">
            <label for="inputnip" class="form-label">NIP</label>
            <input type="text" class="form-control" id="inputnip" name="nip" value="{{ old('nip') }}">
        </div>

        <div class="mb-3" id="div_no_telepon">
            <label for="inputno_telepon" class="form-label">Nomor Telepon</label>
            <input type="text" class="form-control" id="inputno_telepon" name="no_telepon" value="{{ old('no_telepon') }}">
        </div>

        <div class="mb-3" id="div_Password">
            <label for="inputPassword" class="form-label">Password</label>
            <input type="password" class="form-control" id="inputPassword" name="password" autocomplete="new-password">
        </div>

        <div class="mb-3" id="div_Role">
            <label for="inputRole" class="form-label">Role</label>
            <select name="role" id="input_role" class="form-control" onchange="onRoleChanged(this.value)">
                @if (session('role') == 'Super Admin')
                    <option value="Super Admin">Super Admin</option>
                    <option value="Admin">Admin</option>
                    <option value="Supervisor">Supervisor</option>
                @endif
                <option value="User">User</option>
            </select>
        </div>

        {{-- MUNCUL JIKA ROLE = SUPERVISOR --}}
        <div class="mb-3" id="div_Admin" hidden=true>
            <label for="input_admin_id" class="form-label">Pilih Admin</label>
            <select name="admin_id" id="input_admin_id" class="form-control">
                @foreach ($admins as $item)
                    <option value="" selected></option>
                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                @endforeach
            </select>
        </div>

        {{-- MUNCUL JIKA ROLE = User --}}
        <div class="mb-3" id="div_supervisor" hidden=true>
            <label for="input_supervisor_id" class="form-label">Pilih Supervisor</label>
            <select name="supervisor_id" id="input_supervisor_id" class="form-control">
                @foreach ($supervisors as $item)
                    <option value="" selected></option>
                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3" id="div_Username">
            <label for="inputUsername" class="form-label">Username</label>
            <input type="text" class="form-control" id="inputUsername" name="username" autocomplete="new-username">
        </div>

        <button type="submit" class="btn btn-primary mt-2 mb-3">Submit</button>
    </form>

<script>
    function onRoleChanged(e) {
        if (e == 'Supervisor') {
            document.getElementById('div_Admin').hidden = false;
            document.getElementById('div_supervisor').hidden = true;
        } else if (e == 'User') {
            document.getElementById('div_Admin').hidden = true;
            document.getElementById('div_supervisor').hidden = false;
        } else {
            document.getElementById('div_Admin').hidden = true;
            document.getElementById('div_supervisor').hidden = true;
        }
    }

    function roleSettingUser() {
        let role = document.getElementById('role_value').value;
        let divAdmin = document.getElementById('div_Admin');
        let divSupervisor = document.getElementById('div_supervisor');

        if (role == 'User') {
            divSupervisor.hidden = false;
        }
    }
</script>
@endsection