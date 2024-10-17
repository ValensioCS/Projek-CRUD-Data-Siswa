@extends('layouts.template')

@section('content')
    <form action="{{ route('siswa.store') }}" method="post" class="card p-5">
        @csrf

        @if(Session::get('success'))
            <div class="alert alert-success"> {{ Session::get('success') }} </div>
        @endif
        @if($errors->any())
            <ul class="alert alert-danger">
                @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        @endif
        <!-- Name -->
        <div class="mb-3 row">
            <label for="name" class="col-sm-2 col-form-label">Name :</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="name" name="name">
            </div>
        </div>
        <!-- NIS -->
        <div class="mb-3 row">
            <label for="nis" class="col-sm-2 col-form-label">NIS :</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="nis" name="nis">
            </div>
        </div>
        <!-- Kelas -->
        <div class="mb-3 row">
            <label for="type" class="col-sm-2 col-form-label">Kelas :</label>
            <div class="col-sm-10">
                <select class="form-select" id="type" name="type">
                    <option selected disabled hidden>Pilih Kelas</option>
                    <option value="X">X</option>
                    <option value="XI">XI</option>
                    <option value="XII">XII</option>
                </select>
            </div>
        </div>
        <!-- Umur -->
        <div class="mb-3 row">
            <label for="umur" class="col-sm-2 col-form-label">Umur :</label>
            <div class="col-sm-10">
                <input type="number" class="form-control" id="umur" name="umur">
            </div>
         </div>
        <!-- Submit -->
        <button type="submit" class="btn btn-primary mt-3">Submit</button>
    </form>
@endsection

