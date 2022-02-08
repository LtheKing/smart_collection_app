@extends('layout')

@section('section_menu')
    @parent

@endsection

@section('content')

    <h1>Distribusi Pekerjaan</h1>

    <form action="" id="form1">
        <div class="mb-3" id="div_deskcoll">
            <select name="DeskColl" id="input_desk_coll" class="form-control-sm mb-3 mt-3">
                @foreach ($dc as $item)
                    <option value="{{ $item->Nama }}">{{ $item->Nama }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
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
                        <button onclick="moveRight('leftProcess','rightProcess');" class="btn btn-secondary mb-3 mt-2">>></button>
                        <br />
                        <button onclick="moveRight('rightProcess','leftProcess')" class="btn btn-secondary mt-3"><<</button>
                    </td>
                    <td>
                        <select name="rightProcess" size="15" class="form-control">
                            <option value="3">Right List Option 1</option>
                            <option value="4">Right List Option 2</option>
                        </select>
                    </td>
                </tr>
            </table>
        </div>
    </form>

    <script>
        function moveRight(leftValue, rightValue) {
            //alert("Elft value is t : "+leftValue);
            var leftSelect = document.forms["form1"].elements[leftValue];
            var rightSelect = document.forms["form1"].elements[rightValue];

            //alert("test : " + document.forms["form1"].elements[myLeftId].options[selItem].value);
            if (leftSelect.selectedIndex == -1) {
                window.alert("You must first select an item on the left side.")
            } else {
                var option = leftSelect.options[leftSelect.selectedIndex];
                rightSelect.appendChild(option);
            }
        }
    </script>
@endsection