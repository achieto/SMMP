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
                  <input type="text" name="fakultas" class="form-control" id="floatingInput" placeholder="Fakultas" aria-describedby="fakultasHelp">
                  <label for="floatingInput" class="form-label">Fakultas</label>
                  <div id="fakultasHelp" class="form-text">Silahkan masukkan nama fakultas anda dengan lengkap. ex: Fakultas Matematika dan Ilmu Pengetahuan Alam</div>
                </div>
                <div class="form-floating mb-3">
                  <input type="text" name="jurusan" class="form-control" id="floatingInputJurusan" placeholder="Jurusan" aria-describedby="jurusanHelp">
                  <label for="floatingInputJurusan" class="form-label">Jurusan</label>
                  <div id="jurusanHelp" class="form-text">Silahkan masukkan nama jurusan anda dengan lengkap. ex: Jurusan Ilmu Komputer</div>
                </div>
                <select id="mataKuliah" name="mataKuliah" class="form-select form-control-lg" aria-label="select Mata Kuliah">
                    <option selected>Pilih Mata Kuliah</option>
                    <option value="1">One</option>
                    <option value="2">Two</option>
                    <option value="3">Three</option>
                </select>
                <div id="MKHelp" class="form-text mb-3">Silahkan pilih mata kuliah RPS.</div>
                <div class="form-floating mb-3">
                    <input type="text" name="pengembangan" class="form-control" id="pengembang" placeholder="pengembang" aria-describedby="pengembangHelp">
                    <label for="pengembang" class="form-label">Pengembang</label>
                    <div id="pengembangHelp" class="form-text">Silahkan masukkan nama lengkap Dosen Pengembang RPS.</div>
                </div>
                <div class="form-floating mb-3">
                    <input type="text" name="koordinator" class="form-control" id="koordinator" placeholder="koordinator" aria-describedby="koordinatorHelp">
                    <label for="koordinator" class="form-label">Koordinator</label>
                    <div id="koordinatorHelp" class="form-text">Silahkan masukkan nama lengkap Dosen Koordinator Mata Kuliah.</div>
                </div>
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