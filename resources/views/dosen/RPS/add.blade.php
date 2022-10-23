@extends('dosen.template')
@section('content')

<div class="container-fluid">
    <div class="card">
        <div class="card-header">
            <div class="fw-bold">
                <h3>Tambah RPS Baru</h3>
            </div>
        </div>
        <div class="card-body">
            <form action="" method="post">
                <div class="form-floating mb-3">
                    <input type="number" name="semester" class="form-control" max="8" min="1" id="semester" placeholder="semester" aria-describedby="semesterHelp">
                    <label for="semester" class="form-label">Semester</label>
                    <div id="semesterHelp" class="form-text">Silahkan masukkan Semester (1-8).</div>
                </div>
                <select id="mataKuliah" name="mataKuliah" class="form-select form-control-lg" aria-label="select Mata Kuliah">
                    <option selected disabled>Pilih Mata Kuliah</option>
                    @foreach ($mks as $mk)
                        <option value="{{$mk->id}}">{{$mk->nama}}</option>
                    @endforeach
                </select>
                <div id="MKHelp" class="form-text mb-3">Silahkan pilih mata kuliah RPS.</div>
                <div class="form-floating mb-3">
                    <input type="text" name="pengembangan" class="form-control" id="pengembang" placeholder="pengembang" aria-describedby="pengembangHelp">
                    <label for="pengembang" class="form-label">Pengembang</label>
                    <div id="pengembangHelp" class="form-text">Silahkan masukkan nama lengkap Dosen Pengembang RPS.</div>
                </div>
                
                <select id="koordinator" name="koordinator" class="form-select form-control-lg" aria-label="select Koordinator">
                    <option selected disabled>Pilih Koordinator Mata Kuliah</option>
                    @foreach ($users as $user)
                        <option value="{{$user->id}}">{{$user->name}}</option>
                    @endforeach
                </select>
                    <div id="koordinatorHelp" class="form-text mb-3">Silahkan masukkan nama lengkap Dosen Koordinator Mata Kuliah.</div>
                <div class="form-floating mb-3">
                    <input type="text" name="kaprodi" class="form-control" id="kaprodi" placeholder="kaprodi" aria-describedby="kaprodiHelp">
                    <label for="kaprodi" class="form-label">Kepala Program Studi</label>
                    <div id="kaprodiHelp" class="form-text">Silahkan masukkan nama lengkap Dosen Kepala Program Studi.</div>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
              </form>
        </div>
    </div>
</div>

@endsection