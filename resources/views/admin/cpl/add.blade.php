@extends('admin.template')
@section('content')
<div class="col-12 grid-margin stretch-card">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Add CPL Prodi</h4>
            <form method="POST" action="/admin/add-mk" enctype="multipart/form-data">
                @csrf
                <div class="form-group row">
                    <div class="col">
                        <label>Aspek <span class="text-danger">*</span></label>
                        <div class="form-check">
                            <label class="form-check-label">
                                <input type="radio" class="form-check-input" name="aspek" value="Sikap" {{ old('aspek') == "Sikap" ? 'checked' : '' }}>
                                Sikap
                            </label>
                        </div>
                        <div class="form-check">
                            <label class="form-check-label">
                                <input type="radio" class="form-check-input" name="aspek" value="Pengetahuan" {{ old('aspek') == "Pengetahuan" ? 'checked' : '' }}>
                                Pengetahuan
                            </label>
                        </div>
                        <div class="form-check">
                            <label class="form-check-label">
                                <input type="radio" class="form-check-input" name="aspek" value="Umum" {{ old('aspek') == "Umum" ? 'checked' : '' }}>
                                Umum
                            </label>
                        </div>
                        <div class="form-check">
                            <label class="form-check-label">
                                <input type="radio" class="form-check-input" name="aspek" value="Keterampilan" {{ old('aspek') == "Keterampilan" ? 'checked' : '' }}>
                                Keterampilan
                            </label>
                        </div>
                        @error('aspek')
                        <div class="alert alert-danger">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="col">
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
                            <label>Nomor <span class="text-danger">*</span></label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">CPL-</span>
                                </div>
                                <input type="text" class="form-control" name="nomor" placeholder="Nomor" value="{{old('nomor')}}" autocomplete="off">
                            </div>
                            @error('nomor')
                            <div class="alert alert-danger">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label>Judul <span class="text-danger">*</span></label>
                    <textarea id="editor" class="form-control" name="judul" placeholder="Judul" value="{{old('judul')}}" autocomplete="off"></textarea>
                    @error('judul')
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