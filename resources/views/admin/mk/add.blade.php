@extends('admin.template')
@section('content')
<div class="col-12 grid-margin stretch-card">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Add Mata Kuliah</h4>
            <form method="POST" action="add-mk" enctype="multipart/form-data">
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
                    <label>MK prasyarat</label>
                    <input type="text" class="form-control" name="prasyarat" placeholder="MK prasyarat" value="{{old('prasyarat')}}" autocomplete="off">
                    @error('prasyarat')
                    <div class="alert alert-danger">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="form-group">
                    <label>Tahun kurikulum <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" name="kurikulum" placeholder="Kurikulum" value="{{old('kurikulum')}}" autocomplete="off">
                    @error('kurikulum')
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
                    @error('rumpun')
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
                <input type="submit" class="btn btn-primary me-2" value="Submit">
            </form>
        </div>
    </div>
</div>
@endsection