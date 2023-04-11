<div>
    <table class="table table-striped table-sm">
        <thead>
            <tr>
                <th scope="col">No</th>
                <th scope="col">Name</th>
                <th scope="col">Rent </th>
                <th scope="col">Rent Date </th>
                <th scope="col">Return Date</th>
                <th scope="col">Actual Return Date</th>
                {{-- @can('SuperAdmin')
                    <th scope="col">Action</th>
                @endcan --}}
            </tr>
        </thead>
        <tbody>
            @foreach ($logs as $barang)
                <tr
                    class="{{ $barang->actual_return_date == null ? '' 
                                    : ($barang->return_date <= $barang->actual_return_date ? 'bg-danger text-white' 
                                    : 'bg-success text-white') }}">
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $barang->user->name }}</td>
                    <td>{{ $barang->item->name }}</td>
                    <td>{{ $barang->rent_date }}</td>
                    <td>{{ $barang->return_date }}</td>
                    <td>{{ $barang->actual_return_date }}</td>
                    <td>
                        {{-- @can('SuperAdmin')
                            <a href="/rent-item/{{ $barang->id }}" class="badge bg-warning border-0 d-inline"><span
                                    data-feather="eye"></span></a>

                            <a href="/rent-item/{{ $barang->id }}/edit" class="badge bg-warning border-0 d-inline"><span
                                    data-feather="edit"></span></a>
                            <form action="/rent-item/{{ $barang->id }}" class="d-inline" method="POST">
                                @csrf
                                @method('DELETE')
                                <button class="badge bg-danger border-0"
                                    onclick="return confirm('Yakin Ingin Menghapus Data? {{ $barang->nama }}')"><span
                                        data-feather="file-minus"></span></button>
                            </form>
                        @endcan --}}
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
