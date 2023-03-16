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
            <form method="POST" action="add-rps" enctype="multipart/form-data">
                @csrf
                <div class="form-floating mb-3">
                    <input type="text" name="nomor" value="{{old('nomor')}}" class="form-control" placeholder="Nomor" autocomplete="off">
                    <label for="nomor">Nomor <span class="text-danger">*</span></label>
                    @error('nomor')
                    <div class="alert alert-danger">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="form-floating mb-3">
                    <select class="form-select form-control-lg" name="prodi">
                        <option selected="true" value="" disabled selected> </option>
                        <option value="S1 - Ilmu Komputer" {{old('prodi') == 'S1 - Ilmu Komputer' ? 'selected' : ''}}>S1 - Ilmu Komputer</option>
                        <option value="D3 - Manajemen Informatika" {{old('prodi') == 'D3 - Manajemen Informatika' ? 'selected' : ''}}>D3 - Manajemen Informatika</option>
                    </select>
                    <label for="prodi">Program studi <span style="color:red">*</span></label>
                    @error('prodi')
                    <div class="alert alert-danger">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="form-floating mb-3">
                    <select id="matakuliah" name="matakuliah" class="form-select form-control-lg">
                        <option selected="true" value="" disabled selected> </option>
                        @foreach ($mks as $mk)
                        <option value="{{$mk->kode}}" {{old('matakuliah') == $mk->kode ? 'selected' : ''}}>{{$mk->nama}}</option>
                        @endforeach
                    </select>
                    <label for="matakuliah">Mata kuliah <span style="color:red">*</span></label>
                    @error('matakuliah')
                    <div class="alert alert-danger">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="form-floating mb-3">
                    <select class="form-select form-control-lg" name="semester" id="semester">
                        <option selected="true" value="" disabled selected> </option>
                        <option value="1" {{ old('semester') == 1 ? 'selected' : '' }}>1</option>
                        <option value="2" {{ old('semester') == 2 ? 'selected' : '' }}>2</option>
                        <option value="3" {{ old('semester') == 3 ? 'selected' : '' }}>3</option>
                        <option value="4" {{ old('semester') == 4 ? 'selected' : '' }}>4</option>
                        <option value="5" {{ old('semester') == 5 ? 'selected' : '' }}>5</option>
                        <option value="6" {{ old('semester') == 6 ? 'selected' : '' }}>6</option>
                        <option value="7" {{ old('semester') == 7 ? 'selected' : '' }}>7</option>
                        <option value="8" {{ old('semester') == 8 ? 'selected' : '' }}>8</option>
                    </select>
                    <label>Semester <span class="text-danger">*</span></label>
                    @error('semester')
                    <div class="alert alert-danger">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="form-floating mb-3">
                    <select name="pengembang" class="form-select form-control-lg">
                        <option selected="true" value="" disabled selected> </option>
                        @foreach ($users as $user)
                        <option value="{{$user->name}}" {{old('pengembang') == $user->name ? 'selected' : ''}}>{{$user->name}}</option>
                        @endforeach
                    </select>
                    <label for="pengembang">Pengembang RPS <span style="color:red">*</span></label>
                    @error('pengembang')
                    <div class="alert alert-danger">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="form-floating mb-3">
                    <select name="koordinator" class="form-select form-control-lg">
                        <option selected="true" value="" disabled selected> </option>
                        @foreach ($users as $user)
                        <option value="{{$user->name}}" {{old('koordinator') == $user->name ? 'selected' : ''}}>{{$user->name}}</option>
                        @endforeach
                    </select>
                    <label for="koordinator">Koordinator RMK <span style="color:red">*</span></label>
                    @error('koordinator')
                    <div class="alert alert-danger">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="form-floating mb-3">
                    <select name="dosen" class="form-select form-control-lg">
                        <option selected="true" value="" disabled selected> </option>
                        @foreach ($users as $user)
                        <option value="{{$user->name}}" {{old('dosen') == $user->name ? 'selected' : ''}}>{{$user->name}}</option>
                        @endforeach
                    </select>
                    <label for="dosen">Dosen pengampu <span style="color:red">*</span></label>
                    @error('dosen')
                    <div class="alert alert-danger">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="form-floating mb-3">
                    <select name="kaprodi" class="form-select form-control-lg">
                        <option selected="true" value="" disabled selected> </option>
                        @foreach ($users as $user)
                        <option value="{{$user->name}}" {{old('kaprodi') == $user->name ? 'selected' : ''}}>{{$user->name}}</option>
                        @endforeach
                    </select>
                    <label for="kaprodi">Kepala program studi <span style="color:red">*</span></label>
                    @error('kaprodi')
                    <div class="alert alert-danger">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="form-floating mb-3">
                    <textarea name="materi_mk" class="form-control" placeholder="Materi MK" style="height: 100px">{{old('materi_mk')}}</textarea>
                    <label for="materi_mk">Materi MK <span class="text-danger">*</span></label>
                    @error('materi_mk')
                    <div class="alert alert-danger">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="form-floating mb-3">
                    <textarea name="kontrak" class="form-control" placeholder="Kontrak kuliah" style="height: 100px">{{old('kontrak')}}</textarea>
                    <label for="kontrak">Kontrak kuliah <span class="text-danger">*</span></label>
                    @error('kontrak')
                    <div class="alert alert-danger">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="row">
                    <div class="col-6 form-floating mb-3">
                        <textarea name="pustaka_utama" class="form-control" style="height:100px" placeholder="Pustaka utama">{{old('pustaka_utama')}}</textarea>
                        <label for="pustaka_utama" class="form-label ms-3">Pustaka utama <span class="text-danger">*</span></label>
                        @error('pustaka_utama')
                        <div class="alert alert-danger">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="col-6">
                        <div class="form-floating mb-3">
                            <textarea name="pustaka_pendukung" class="form-control" style="height:100px" placeholder="Pustaka pendukung">{{old('pustaka_pendukung')}}</textarea>
                            <label for="pustaka_pendukung">Pustaka pendukung</label>
                            @error('pustaka_pendukung')
                            <div class="alert alert-danger">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
</div>

@endsection
