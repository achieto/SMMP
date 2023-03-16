@extends('dosen.template')
@section('content')

<style>
    li.select2-selection__choice {
        color: #646464;
        font-weight: bolder;
    }
</style>
<div class="container-fluid">
    <div class="card">
        <div class="card-header">
            <div class="fw-bold">
                <h3>Tambah Soal Mata Kuliah Baru</h3>
            </div>
        </div>
        <div class="card-body">
            <form action="{{$soal->id}}" method="post">
                @method('put')
                @csrf
                <div class="form-floating">
                    <select id="prodi" name="prodi"  class="form-select form-control-lg" aria-label="select Prodi" required>
                        <option disabled> - </option>
                        <option {{$soal->prodi == 'S1 - Ilmu Komputer'?'selected':''}} value="1">S1 - Ilmu Komputer</option>
                        <option {{$soal->prodi == 'D3 - Manajemen Informatika'?'selected':''}} value="2">D3 - Manajemen Informatika</option>
                    </select>
                    <label for="prodi"> Pilih Prodi <span class="text-danger"> *</span></label>
                    <div id="prodiHelp" class="form-text mb-3">Silahkan pilih Prodi.</div>
                </div>

                <div class="form-floating">
                    <select id="kurikulum" name="kurikulum"  class="form-select form-control-lg" aria-label="select kurikulum" required>
                        <option selected disabled> - </option>
                        @foreach ($kurikulum as $kur )
                        <option {{$soal->kurikulum == $kur->tahun?'selected':''}} value="{{$kur->tahun}}">{{$kur->tahun}}</option>
                        @endforeach
                    </select>
                    <label for="kurikulum"> Pilih Kurikulum <span class="text-danger"> *</span></label>
                    <div id="kurikulumHelp" class="form-text mb-3">Silahkan pilih Kurikulum.</div>
                </div>

                <div class="form-floating">
                    <select id="mataKuliah" name="kode_mk"  class="form-select form-control-lg" aria-label="select Mata Kuliah" required>
                        <option selected disabled> - </option>
                        @foreach ($rpss as $rps)
                        <option {{$soal->kode_mk == $rps->kode_mk?'selected':''}} value="{{$rps->kode_mk}}">{{$rps->mk->nama}}</option>
                        @endforeach
                    </select>
                    <label for="mataKuliah"> Pilih Mata Kuliah <span class="text-danger"> *</span></label>
                    <div id="MKHelp" class="form-text mb-3">Silahkan pilih mata kuliah RPS.</div>
                </div>

                <div class="form-floating">
                    <input type="number" name="minggu" min="1" max="16" value="{{ $soal->minggu}}" class="form-control" placeholder="minggu" autocomplete="off">
                    <label for="minggu">Minggu <span class="text-danger">*</span></label>
                    @error('minggu')
                    <div class="alert alert-danger">
                        {{ $message }}
                    </div>
                    @enderror
                    <div id="mingguHelp" class="form-text mb-3">Pada minggu ke berapa soal akan diberikan.</div>
                </div>

                <div class="form-floating">
                    <select id="jenis" name="jenis"  class="form-select form-control-lg" aria-label="select jenis" required>
                        <option disabled> - </option>
                        <option {{$soal->jenis == 'Kuis ke-1'?'selected':''}} value="1">Kuis ke-1</option>
                        <option {{$soal->jenis == 'Kuis ke-2'?'selected':''}} value="4">Kuis ke-2</option>
                        <option {{$soal->jenis == 'UTS'?'selected':''}} value="2">UTS</option>
                        <option {{$soal->jenis == 'UAS'?'selected':''}} value="3">UAS</option>
                    </select>
                    <label for="jenis"> Pilih Jenis <span class="text-danger"> *</span></label>
                    <div id="jenisHelp" class="form-text mb-3">Silahkan pilih jenis soal.</div>
                </div>

                <div class="form-floating">
                    <textarea name="pertanyaan" id="pertanyaan" class="form-control" placeholder="insert pertanyaan" style="height: 100px">{{$soal->pertanyaan}}</textarea>
                    <label for="pertanyaan">Pertanyaan <span class="text-danger">*</span></label>
                    @error('pertanyaan')
                    <div class="alert alert-danger">
                        {{ $message }}
                    </div>
                    @enderror
                    <div id="pertanyaanHelp" class="form-text mb-3">Silahkan masukkan Pertanyaan.</div>
                </div>

                <div class="form-floating">
                    <select name="id_cpmk[]" class="js-example-basic-multiple form-select form-control-lg" multiple="multiple">
                        @foreach ($rpss as $rps)
                        @foreach ($rps->mk->cpmk as $cpmk)
                        <option {{$soal->cpmk()->wherePivot('id_cpmk', $cpmk->id)->first()? 'selected':''}} value="{{$cpmk->id}}">{{$cpmk->judul}}</option>
                        @endforeach
                        @endforeach
                    </select>
                    <label for="id_cpl"> Pilih CPMK <span class="text-danger"> *</span></label>
                    <div id="cpmkHelp" class="form-text mb-3">Silahkan pilih cpmk yang akan di implementasikan.</div>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="{{ asset('/assets/template/vendors/select2/select2.min.js')}}"></script>
<script src="{{ asset('/assets/template/js/select2.js')}}"></script>

@endsection
