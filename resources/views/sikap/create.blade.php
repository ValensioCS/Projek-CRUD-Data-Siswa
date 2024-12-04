@extends ('layouts.template')

@section('content')
<form action="{{ route('sikap.store') }}" method="POST" class="card p-5">
    @csrf
    @if(Session::get('success'))
        <div class="alert alert-success">{{ Session::get('success') }}</div>
    @endif
    @if($errors->any())
        <ul class="alert alert-danger">
            @foreach($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif


    <div class="mb-3 row">
    <label for="name" class="col-sm-2 col-form-label">Nama :</label>
        <div class="col-sm-10">
        <select class="form-select" name="siswa_id" id="name" required>
    <option selected disabled hidden>Pilih Nama Siswa</option>
    @foreach ($siswa as $item)
        <option value="{{ $item->id }}" {{ old('siswa_id') == $item->id ? 'selected' : '' }}>
            {{ $item->name }}
        </option>
    @endforeach
</select>

        </div>
    </div>

    <div class="mb-3 row">
        <label for="nis" class="col-sm-2 col-form-label">Nilai :</label>
        <div class="col-sm-10">
           <select class="form-select" name="type" id="type">
               <option selected disabled hidden>Pilih</option>
               <option value="A">A</option>
               <option value="B">B</option>
               <option value="C">C</option>
               <option value="D">D</option>
               <option value="E">E</option>
           </select>
        </div>
    </div>
    <div class="mb-3 row">
        <label for="jurusan" class="col-sm-2 col-form-label">Sikap :</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" name="sikap" id="sikap">
        </div>
    </div>
    <div class="mb-3 row">
        <label for="nilai" class="col-sm-2 col-form-label">Deskripsi :</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" name="deskripsi" id="deskripsi">
        </div>
    </div>
    <button type="submit" class="btn btn-primary">Tambah Data Nilai</button>
</form>
@endsection
