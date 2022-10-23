@extends('dosen.template')
@section('content')

<div class="container-fluid">
    <div class="card">
        <div class="card-header">
            <div class="fw-bold">
                <h3>Tambah CPL Mata Kuliah Baru</h3>
            </div>
        </div>
        <div class="card-body">
            <form action="" method="post">
                <select id="mataKuliah" name="mataKuliah" class="form-select form-control-lg" aria-label="select Mata Kuliah">
                    <option selected disabled>Pilih Mata Kuliah</option>
                    @foreach ($mks as $mk)
                        <option value="{{$mk->kode}}">{{$mk->nama}}</option>
                    @endforeach
                </select>
                <div id="MKHelp" class="form-text mb-3">Silahkan pilih mata kuliah RPS.</div>

                <select id="id_cpl" name="id_cpl" class="form-select form-control-lg" aria-label="select CPL Prodi">
                    <option selected disabled>Pilih CPL Prodi</option>
                    @foreach ($cpls as $cpl)
                    <option value="{{$cpl->id}}">{{$cpl->judul}}</option>
                    @endforeach
                </select>
                <div id="cplHelp" class="form-text mb-3">Silahkan pilih CPL Prodi.</div>
                <button type="submit" class="btn btn-primary">Submit</button>
              </form>
        </div>
    </div>
</div>
@endsection