@extends ('layouts.template')

@section('content')

    @if (Session::get('success'))
        <div class="alert alert-success">{{ Session::get('success') }}</div>
    @endif
    @if (Session::get('deleted'))
        <div class="alert alert-warning">{{ Session::get('deleted') }}</div>
    @endif
    <table class="table table-striped table-bordered table-hover mb-4">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Tipe</th>
                <th>Sikap</th>
                <th>Deskripsi</th>
                <th class="text-center">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @php $no = 1; @endphp
            @foreach ($sikaps as $item)
            <tr>
                <td>{{ $no++ }}</td>
                <td>{{ $item->name }}</td>
                <td>{{ $item->type }}</td>
                <td>{{ $item->sikap }}</td>
                <td>{{ $item->deskripsi }}</td>
                <td class="text-center">
                    <a href="{{ route('sikap.edit', $item->id) }}" class="btn btn-primary me-3">Edit</a>
                    <form action="{{ route('sikap.delete', $item['id']) }}" method="POST">    
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Hapus</a>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <a href="{{ route('sikap.create') }}" class="btn btn-primary mt-4">Tambah Data</a>
@endsection