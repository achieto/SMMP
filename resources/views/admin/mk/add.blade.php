@extends('admin.template')
@section('content')
<div class="col-12 grid-margin stretch-card">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Add Mata Kuliah</h4>
            <form method="POST" action="/admin/add-mk" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label>Kode MK <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" name="kode" placeholder="Kode MK" value="{{old('kode')}}" autocomplete="off">
                    @error('kode')
                    <div class="alert alert-danger">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="form-group">
                    <label>Nama MK <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" name="nama" placeholder="Nama MK" value="{{old('nama')}}" autocomplete="off">
                    @error('nama')
                    <div class="alert alert-danger">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="form-group">
                    <label>Deskripsi singkat MK <span class="text-danger">*</span></label>
                    <textarea class="form-control" name="deskripsi" id="editor" placeholder="Deskripsi singkat MK">{{old('deskripsi')}}</textarea>
                    @error('deskripsi')
                    <div class="alert alert-danger">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="form-group">
                    <label>Rumpun <span class="text-danger">*</span></label>
                    <div class="form-check">
                        <label class="form-check-label">
                            <input type="radio" class="form-check-input" name="rumpun" id="rumpun1" value="Wajib" {{ old('rumpun') == "Wajib" ? 'checked' : '' }}>
                            Wajib
                        </label>
                    </div>
                    <div class="form-check">
                        <label class="form-check-label">
                            <input type="radio" class="form-check-input" name="rumpun" id="rumpun2" value="Peminatan" {{ old('rumpun') == "Peminatan" ? 'checked' : '' }}>
                            Peminatan
                        </label>
                    </div>
                </div>
                @error('rumpun')
                <div class="alert alert-danger">
                    {{ $message }}
                </div>
                @enderror
                <div class="form-group">
                    <label>Semester <span class="text-danger">*</span></label>
                    <select class="js-example-basic-single w-100" name="semester" id="semester">
                        <option selected="true" value="" disabled selected>Select...</option>
                        <option value="1" {{ old('semester') == 1 ? 'selected' : '' }}>1</option>
                        <option value="2" {{ old('semester') == 2 ? 'selected' : '' }}>2</option>
                        <option value="3" {{ old('semester') == 3 ? 'selected' : '' }}>3</option>
                        <option value="4" {{ old('semester') == 4 ? 'selected' : '' }}>4</option>
                        <option value="5" {{ old('semester') == 5 ? 'selected' : '' }}>5</option>
                        <option value="6" {{ old('semester') == 6 ? 'selected' : '' }}>6</option>
                        <option value="7" {{ old('semester') == 7 ? 'selected' : '' }}>7</option>
                        <option value="8" {{ old('semester') == 8 ? 'selected' : '' }}>8</option>
                    </select>
                    @error('semester')
                    <div class="alert alert-danger">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="form-group">
                    <label>MK prasyarat</label>
                    <input type="text" class="form-control" name="prasyarat" placeholder="MK prasyarat" value="{{old('prasyarat')}}" autocomplete="off">
                    @error('prasyarat')
                    <div class="alert alert-danger">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="form-group">
                    <label>Kurikulum <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" name="kurikulum" placeholder="Kurikulum" value="{{old('kurikulum')}}" autocomplete="off">
                    @error('kurikulum')
                    <div class="alert alert-danger">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="form-group">
                    <label>Bobot teori (sks) <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" name="bobot_teori" placeholder="Bobot teori" value="{{old('bobot_teori')}}" autocomplete="off">
                    @error('bobot_teori')
                    <div class="alert alert-danger">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="form-group">
                    <label>Bobot praktikum (sks)</label>
                    <input type="text" class="form-control" name="bobot_praktikum" placeholder="Bobot praktikum" value="{{old('bobot_praktikum')}}" autocomplete="off">
                    @error('bobot_praktikum')
                    <div class="alert alert-danger">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="form-group">
                    <label>Dosen pengampu <span class="text-danger">*</span></label>
                    <select class="js-example-basic-single w-100" name="dosen" id="dosen">
                        <option selected="true" value="" disabled selected>Select...</option>
                        @foreach($users as $user)
                        <option value="$user->name" {{ old('dosen') == $user->name ? 'selected' : '' }}>{{$user->name}}</option>
                        @endforeach
                    </select>
                    @error('dosen')
                    <div class="alert alert-danger">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="form-group">
                    <label>Bahan kajian/materi pembelajaran <span class="text-danger">*</span></label>
                    <textarea class="form-control" id="editor" name="materi" placeholder="Bahan kajian/materi pembelajaran">{{old('materi')}}</textarea>
                    @error('materi')
                    <div class="alert alert-danger">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="form-group">
                    <label>Pustaka utama <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" name="pustaka_utama" placeholder="Pustaka utama" value="{{old('pustaka_utama')}}" autocomplete="off">
                    @error('pustaka_utama')
                    <div class="alert alert-danger">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="form-group">
                    <label>Pustaka pendukung</label>
                    <input type="text" class="form-control" name="pustaka_pendukung" placeholder="Pustaka pendukung" value="{{old('pustaka_pendukung')}}" autocomplete="off">
                    @error('pustaka_pendukung')
                    <div class="alert alert-danger">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <input type="submit" class="btn btn-primary me-2" value="Submit">
            </form>
        </div>
    </div>
</div>
@endsection