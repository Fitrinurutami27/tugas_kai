<table>
    <thead>
        <tr>
            <th>No</th>
            <th>Peminjam</th>
            <th>Judul Buku</th>
            <th>Tanggal Pinjam</th>
            <th>Status</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($peminjaman as $index => $item)
            <tr>
                <td>{{ $index + 1 }}</td>
                <td>{{ $item->user->name ?? '-' }}</td>
                <td>{{ $item->buku->judul ?? '-' }}</td>
                <td>{{ $item->created_at->format('d-m-Y') }}</td>
                <td>{{ ucfirst($item->status) }}</td>
            </tr>
        @endforeach
    </tbody>
</table>
