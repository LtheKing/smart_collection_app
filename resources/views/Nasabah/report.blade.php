<table>
    <thead class="table-borderless">
        <tr>
            <th align="center">Nama</th>
            <th align="center">No Rekening</th>
            <th align="center">NIK</th>
            <th align="center">Nomor Telepon</th>
            <th align="center">Alamat</th>
            <th align="center">Bank</th>
            <th align="center" colspan="3">Email</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($nasabahs as $item)
            <tr>
                <td>{{ $item->Nama }}</td>
                <td>{{ $item->NoRekening }}</td>
                <td>{{ $item->NIK }}</td>
                <td>{{ $item->NoTelepon }}</td>
                <td>{{ $item->Alamat }}</td>
                <td>{{ $item->Bank }}</td>
                <td colspan="3">{{ $item->Email }}</td>
            </tr>
        @endforeach
    </tbody>
</table>