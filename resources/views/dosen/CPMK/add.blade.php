@extends('dosen.template')
@section('content')

<div class="container-fluid">
    <div class="card">
        <div class="card-header">
            <div class="fw-bold">
                <h3>Tambah CPMK Baru</h3>
            </div>
        </div>
        <div class="card-body">
            <form action="" method="post">
                @csrf
                <div class="form-floating">
                    <select id="mataKuliah" name="kode_mk" class="form-select form-control-lg" aria-label="select Mata Kuliah">
                        <option selected disabled> </option>
                        @foreach ($mks as $mk)
                        <option value="{{$mk->kode}}">{{$mk->nama}}</option>
                        @endforeach
                    </select>
                    <label for="mataKuliah">Mata Kuliah <span style="color:red">*</span></label>
                    @error('kode_mk')
                    <div class="alert alert-danger">
                        {{ $message }}
                    </div>
                    @enderror
                    <div id="MKHelp" class="form-text mb-3">Silahkan pilih mata kuliah.</div>
                </div>
                <div class="form-floating mb-3">
                    <input type="text" name="judul" class="form-control" id="judul" placeholder="judul" aria-describedby="judulHelp">
                    <label for="judul" class="form-label">Judul Rincian CPMK <span style="color:red">*</span></label>
                    @error('judul')
                    <div class="alert alert-danger">
                        {{ $message }}
                    </div>
                    @enderror
                    <div id="judulHelp" class="form-text">Silahkan masukkan rincian CPMK.</div>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
</div>

@endsection