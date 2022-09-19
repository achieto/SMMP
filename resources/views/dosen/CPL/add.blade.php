@extends('dosen.template')
@section('content')

<div class="container-fluid">
    <div class="card">
        <div class="card-header">
            <div class="fw-bold">
                <h3>Tambah CPL Baru</h3>
            </div>
        </div>
        <div class="card-body">
            <form action="" method="post">
                <select id="id_rps" name="id_rps" class="form-select form-control-lg" aria-label="select Mata Kuliah">
                    <option selected>Pilih RPS</option>
                    <option value="1">One</option>
                    <option value="2">Two</option>
                    <option value="3">Three</option>
                </select>
                <div id="rpsHelp" class="form-text mb-3">Silahkan pilih RPS.</div>
                
                <select id="jenis" name="jenis" class="form-select form-control-lg" aria-label="select Jenis CPL">
                    <option selected>Pilih Jenis CPL</option>
                    <option value="1">One</option>
                    <option value="2">Two</option>
                    <option value="3">Three</option>
                </select>
                <div id="jenisHelp" class="form-text mb-3">Silahkan pilih jenis CPL.</div>
                
                <select id="aspek" name="aspek" class="form-select form-control-lg" aria-label="select Aspek CPL">
                    <option selected>Pilih Aspek CPL</option>
                    <option value="1">One</option>
                    <option value="2">Two</option>
                    <option value="3">Three</option>
                </select>
                <div id="jenisHelp" class="form-text mb-3">Silahkan pilih aspek CPL.</div>
                
                <div class="form-floating mb-3">
                    <textarea class="form-control" placeholder="isi Deskripsi CPL" id="floatingTextarea2" style="height: 100px"></textarea>
                    <label for="floatingTextarea2">Deskripsi CPL</label>
                    <div id="jenisHelp" class="form-text">Silahkan tuliskan deskripsi CPL.</div>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
              </form>
        </div>
    </div>
</div>

@endsection