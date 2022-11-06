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
            <form action="add-rps" method="post">
                @csrf
                <div class="form-floating mb-3">
                    <input type="text" name="nomor" class="form-control" id="nomor" placeholder="nomor" aria-describedby="nomorHelp">
                    <label for="nomor" class="form-label">nomor <span class="text-danger">*</span></label>
                    @error('nomor')
                    <div class="alert alert-danger">
                        {{ $message }}
                    </div>
                    @enderror
                    <div id="nomorHelp" class="form-text">Silahkan masukkan nomor RPS.</div>
                </div>

                <!-- <div class="input-group mb-3">
                    <div class="form-floating">
                        <input type="number" name="semester" min='0' class="form-control" id="floatingInputGroup1" placeholder="Username">
                        <label for="floatingInputGroup1">Semester</label>
                    </div>
                    <span class="input-group-text">/</span>
                    <div class="form-floating">
                        <input type="text" name="nomor" min='0' class="form-control" id="floatingInputGroup1" placeholder="Username">
                        <label for="floatingInputGroup1">Nomor RPS</label>
                    </div>
                </div> -->
                <div class="form-floating">
                    <select id="prodi" name="prodi" class="form-select form-control-lg" aria-label="select Prodi">
                        <option selected disabled> </option>
                        <option value="S1 - Ilmu Komputer">S1 - Ilmu Komputer</option>
                        <option value="D3 - Manajemen Informatika">D3 - Manajemen Informatika</option>
                    </select>
                    <label for="prodi">Program Studi <span style="color:red">*</span></label>
                    @error('prodi')
                    <div class="alert alert-danger">
                        {{ $message }}
                    </div>
                    @enderror
                    <div id="ProdiHelp" class="form-text mb-3">Silahkan pilih Program Studi.</div>
                </div>

                <div class="form-floating mb-3">
                    <input type="number" name="kurikulum" class="form-control" min="1" id="kurikulum" placeholder="kurikulum" aria-describedby="kurikulumHelp">
                    <label for="kurikulum" class="form-label">Tahun Kurikulum <span class="text-danger">*</span></label>
                    @error('kurikulum')
                    <div class="alert alert-danger">
                        {{ $message }}
                    </div>
                    @enderror
                    <div id="kurikulumHelp" class="form-text">Silahkan masukkan Tahun Kurikulum saat ini.</div>
                </div>

                <div class="form-floating mb-3">
                    <input type="number" name="semester" class="form-control" max="8" min="1" id="semester" placeholder="semester" aria-describedby="semesterHelp">
                    <label for="semester" class="form-label">Semester <span class="text-danger">*</span></label>
                    @error('semester')
                    <div class="alert alert-danger">
                        {{ $message }}
                    </div>
                    @enderror
                    <div id="semesterHelp" class="form-text">Silahkan masukkan Semester (1-8).</div>
                </div>

                <div class="form-floating">
                    <select id="mataKuliah" name="mataKuliah" class="form-select form-control-lg" aria-label="select Mata Kuliah">
                        <option selected disabled>  </option>
                        @foreach ($mks as $mk)
                        <option value="{{$mk->id}}">{{$mk->nama}}</option>
                        @endforeach
                    </select>
                    <label for="mataKuliah">Mata Kuliah <span style="color:red">*</span></label>
                    @error('mataKuliah')
                    <div class="alert alert-danger">
                        {{ $message }}
                    </div>
                    @enderror
                    <div id="MKHelp" class="form-text mb-3">Silahkan pilih mata kuliah.</div>
                </div>

                <div class="form-floating">
                    <select id="pengembang" name="pengembang" class="form-select form-control-lg" aria-label="select pengembang">
                        <option selected disabled>  </option>
                        @foreach ($users as $user)
                        <option value="{{$user->name}}">{{$user->name}}</option>
                        @endforeach
                    </select>
                    <label for="pengembang">Pengembang RPS <span style="color:red">*</span></label>
                    @error('pengembang')
                    <div class="alert alert-danger">
                        {{ $message }}
                    </div>
                    @enderror
                    <div id="pengembangHelp" class="form-text mb-3">Silahkan masukkan nama lengkap pengembang RPS.</div>
                </div>

                <div class="form-floating">
                    <select id="koordinator" name="koordinator" class="form-select form-control-lg" aria-label="select Koordinator">
                        <option selected disabled>  </option>
                        @foreach ($users as $user)
                        <option value="{{$user->name}}">{{$user->name}}</option>
                        @endforeach
                    </select>
                    <label for="koordinator">Koordinator Mata Kuliah <span style="color:red">*</span></label>
                    @error('koordinator')
                    <div class="alert alert-danger">
                        {{ $message }}
                    </div>
                    @enderror
                    <div id="koordinatorHelp" class="form-text mb-3">Silahkan masukkan nama lengkap Dosen Koordinator Mata Kuliah.</div>
                </div>

                <div class="form-floating">
                    <select id="dosen" name="dosen" class="form-select form-control-lg" aria-label="select dosen">
                        <option value="null"> - </option>
                        @foreach ($users as $user)
                        <option value="{{$user->name}}">{{$user->name}}</option>
                        @endforeach
                    </select>
                    <label for="dosen">Dosen Pengampu 2 </label>
                    @error('dosen')
                    <div class="alert alert-danger">
                        {{ $message }}
                    </div>
                    @enderror
                    <div id="dosenHelp" class="form-text mb-3">Silahkan masukkan nama lengkap Dosen Pengampu 2 Mata Kuliah. (Opsional)</div>
                </div>

                <div class="form-floating mb-3">
                    <input type="text" name="kaprodi" class="form-control" id="kaprodi" placeholder="kaprodi" aria-describedby="kaprodiHelp">
                    <label for="kaprodi" class="form-label">Kepala Program Studi <span style="color:red">*</span></label>
                    @error('kaprodi')
                    <div class="alert alert-danger">
                        {{ $message }}
                    </div>
                    @enderror
                    <div id="kaprodiHelp" class="form-text">Silahkan masukkan nama lengkap Dosen Kepala Program Studi.</div>
                </div>

                <div class="form-floating mb-3">
                    <input type="text" name="pustaka_utama" class="form-control" id="pustaka_utama" placeholder="pustaka utama" aria-describedby="pustaka_utamaHelp">
                    <label for="pustaka_utama" class="form-label">Pustaka Utama <span class="text-danger">*</span></label>
                    @error('pustaka_utama')
                    <div class="alert alert-danger">
                        {{ $message }}
                    </div>
                    @enderror
                    <div id="utamaHelp" class="form-text">Silahkan masukkan Pustaka Referensi Bahan Ajar Utama.</div>
                </div>

                <div class="form-floating mb-3">
                    <input type="text" name="pustaka_pendukung" class="form-control" id="pustaka_pendukung" placeholder="pustaka pendukung" aria-describedby="pustaka_pendukungHelp">
                    <label for="pustaka_pendukung" class="form-label">Pustaka Pendukung</label>
                    @error('pustaka_pendukung')
                    <div class="alert alert-danger">
                        {{ $message }}
                    </div>
                    @enderror
                    <div id="pendukungHelp" class="form-text">Silahkan masukkan Pustaka Referensi Bahan Ajar Pendukung.</div>
                </div>
                <div class="form-floating mb-3">
                    <textarea name="materi_mk" id="materi_mk" class="form-control" placeholder="insert materi_mk" style="height: 100px"></textarea>
                    <label for="materi_mk" class="form-label">Materi Mata Kuliah <span class="text-danger">*</span></label>
                    @error('materi_mk')
                    <div class="alert alert-danger">
                        {{ $message }}
                    </div>
                    @enderror
                    <div id="materiHelp" class="form-text">Silahkan masukkan informasi singkat tentang Mata Kuliah.</div>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
</div>

@endsection