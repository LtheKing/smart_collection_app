@extends('layout')

@section('section_menu')
    @parent

@endsection

@section('content')

    <h1>Distribusi Pekerjaan</h1>

    <form action="">
        <div class="mb-3" id="div_deskcoll">
            <select name="" id="">
                @foreach ($dc as $item)
                    <option value="{{ $dc->Nama }}">{{ $dc->Nama }}</option>
                @endforeach
            </select>
        </div>
    </form>
@endsection