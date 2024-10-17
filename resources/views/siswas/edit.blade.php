@extends ('layouts.template')

@section('content')
    <h1>Edit Data</h1>

    <form action="{{ route('siswa.update', $siswa['id']) }}" method="POST" class="card p-5">
        @csrf
        @method('PATCH')

        @if ($errors->any())
            <ul class="alert alert-danger p-3">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        @endif

        <div class="mb-3 row">
            <label for="name" class="col-sm-2 col-form-label">Nama :</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="name" name="name" value="{{ $siswa['name'] }}">
            </div>
        </div>
        <div class="mb-3 row">
            <label for="type" class="col-sm-2 col-form-label">Kelas :</label>
            <div class="col-sm-10">
                <select class="form-select" name="type" id="type">
                    <option selected disabled hidden>Pilih Kelas</option>
                    <option value="X" {{ $siswa['type'] == 'X' ? 'selected' : '' }}>X</option>
                    <option value="XI" {{ $siswa['type'] == 'XI' ? 'selected' : '' }}>XI</option>
                    <option value="XII" {{ $siswa['type'] == 'XII' ? 'selected' : '' }}>XII</option>
                </select>
            </div>
        </div>
        <div class="mb-3 row">
            <label for="umur" class="col-sm-2 col-form-label">Umur :</label>
            <div class="col-sm-10">
                <input type="number" class="form-control" id="umur" name="umur" value="{{ $siswa['umur'] }}">
            </div>
        </div>
        <button type="submit" class="btn btn-primary mt-3">Update</button>
    </form>
@endsection