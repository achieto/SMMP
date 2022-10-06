@extends('admin.template')
@section('content')
<div class="col-12 grid-margin stretch-card">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Edit Mata Kuliah</h4>
            <form method="POST" action="{{$mk->id}}" enctype="multipart/form-data">
                @csrf
                @method('put')
                <div class="form-group">
                    <label>Kode MK <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" name="kode" placeholder="Kode MK" value="{{$mk->kode}}" autocomplete="off">
                    @error('kode')
                    <div class="alert alert-danger">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="form-group">
                    <label>Nama MK <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" name="nama" placeholder="Nama MK" value="{{$mk->nama}}" autocomplete="off">
                    @error('nama')
                    <div class="alert alert-danger">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="form-group">
                    <label>Deskripsi singkat MK <span class="text-danger">*</span></label>
                    <textarea class="form-control" name="deskripsi" id="editor1" placeholder="Deskripsi singkat MK">{{$mk->deskripsi}}</textarea>
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
                            <input type="radio" class="form-check-input" name="rumpun" id="rumpun1" value="Wajib" {{ $mk->rumpun == "Wajib" ? 'checked' : '' }}>
                            Wajib
                        </label>
                    </div>
                    <div class="form-check">
                        <label class="form-check-label">
                            <input type="radio" class="form-check-input" name="rumpun" id="rumpun2" value="Peminatan" {{ $mk->rumpun == "Peminatan" ? 'checked' : '' }}>
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
                    <label>MK prasyarat</label>
                    <input type="text" class="form-control" name="prasyarat" placeholder="MK prasyarat" value="{{$mk->prasyarat}}" autocomplete="off">
                    @error('prasyarat')
                    <div class="alert alert-danger">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="form-group">
                    <label>Kurikulum <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" name="kurikulum" placeholder="Kurikulum" value="{{$mk->kurikulum}}" autocomplete="off">
                    @error('kurikulum')
                    <div class="alert alert-danger">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="form-group">
                    <label>Bobot teori (sks) <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" name="bobot_teori" placeholder="Bobot teori" value="{{$mk->bobot_teori}}" autocomplete="off">
                    @error('bobot_teori')
                    <div class="alert alert-danger">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="form-group">
                    <label>Bobot praktikum (sks)</label>
                    <input type="text" class="form-control" name="bobot_praktikum" placeholder="Bobot praktikum" value="{{$mk->bobot_praktikum}}" autocomplete="off">
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
                        <option value="{{$user->name}}" {{ $mk->dosen == $user->name ? 'selected' : '' }}>{{$user->name}}</option>
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
                    <textarea class="form-control" id="editor2" name="materi" placeholder="Bahan kajian/materi pembelajaran">{{$mk->materi}}</textarea>
                    @error('materi')
                    <div class="alert alert-danger">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="form-group">
                    <label>Pustaka utama <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" name="pustaka_utama" placeholder="Pustaka utama" value="{{$mk->pustaka_utama}}" autocomplete="off">
                    @error('pustaka_utama')
                    <div class="alert alert-danger">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="form-group">
                    <label>Pustaka pendukung</label>
                    <input type="text" class="form-control" name="pustaka_pendukung" placeholder="Pustaka pendukung" value="{{$mk->pustaka_pendukung}}" autocomplete="off">
                    @error('pustaka_pendukung')
                    <div class="alert alert-danger">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <input type="submit" class="btn btn-primary me-2" value="Edit">
            </form>
        </div>
    </div>
</div>
@endsection