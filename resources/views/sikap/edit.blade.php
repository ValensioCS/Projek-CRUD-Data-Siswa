@extends ('layouts.template')

@section('content')
<form action="{{ route('sikap.update', $sikap['id']) }}" method="POST" class="card p-5">
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
            <input type="text" class="form-control" name="name" id="name" value="{{ $sikap['name'] }}">
        </div>
    </div>
    <div class="mb-3 row">
        <label for="type" class="col-sm-2 col-form-label">Nilai :</label>
        <div class="col-sm-10">
           <select class="form-select" name="type" id="type">
               <option selected disabled hidden>Pilih</option>
               <option value="A" {{ $sikap['type'] == 'A' ? 'selected' : '' }}>A</option>
               <option value="B" {{ $sikap['type'] == 'B' ? 'selected' : '' }}>B</option>
               <option value="C" {{ $sikap['type'] == 'C' ? 'selected' : '' }}>C</option>
               <option value="D" {{ $sikap['type'] == 'D' ? 'selected' : '' }}>D</option>
               <option value="E" {{ $sikap['type'] == 'E' ? 'selected' : '' }}>E</option>
           </select>
        </div>
    </div>
    <div class="mb-3 row">
        <label for="sikap" class="col-sm-2 col-form-label">Sikap :</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" name="sikap" id="sikap" value="{{ $sikap['sikap'] }}">
        </div>
    </div>
    <div class="mb-3 row">
        <label for="deskrpsi" class="col-sm-2 col-form-label">Deskripsi :</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" name="deskripsi" id="deskripsi" value="{{ $sikap['deskripsi'] }}">
        </div>
    </div>
    <button type="submit" class="btn btn-primary mt-3">Ubah Data</button>
</form>
@endSection