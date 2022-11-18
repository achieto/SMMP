@extends('admin.template')
@section('content')
<?php
error_reporting(0);
?>
<h3 class="px-4 pb-4 fw-bold text-center">Add CPL Prodi</h3>
<div class="form-group stretch-card">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Sikap</h4>
            <form method="POST" action="add-cpl" enctype="multipart/form-data">
                @csrf
                <div id="dynamicAddRemoveSik">
                    <div class="form-group row">
                        <div class="col-2">
                            <div class="form-group">
                                <label>Tahun kurikulum <span class="text-danger">*</span></label>
                                <select class="form-control" name="kurikulum[0]">
                                    <option selected="true" value="" disabled selected>Select...</option>
                                    @foreach($kurikulums as $kurikulum)
                                    <option value="{{$kurikulum->tahun}}" {{ old('kurikulum.0') == $kurikulum->tahun ? 'selected' : '' }}>{{$kurikulum->tahun}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-3">
                            <div class="form-group">
                                <label>Kode <span class="text-danger">*</span></label>
                                <div class="input-group mb-2">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">S</span>
                                    </div>
                                    <input type="text" class="form-control" name="kode[0]" value="{{old('kode.0')}}" placeholder="Nomor" autocomplete="off">
                                </div>
                                <div style="font-size: x-small">
                                    <div class="row">
                                        <div class="col-4" style="padding: 0 0 0 15px;">
                                            Already exist:
                                        </div>
                                        <div class="col" style="padding: 0 15px 0 0;">@foreach($sikaps as $sik)
                                            {{$sik->kurikulum}}-{{$sik->kode}};
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-5">
                            <div class="form-group">
                                <label>Judul <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" name="judul[0]" placeholder="Judul" autocomplete="off">
                            </div>
                        </div>
                        <div class="col-2">
                            <label>Action</label>
                            <div class="form-group">
                                <button type="button" name="add" id="dynamic-ar-sik" class="btn btn-sm btn-primary">Add Field</button>
                            </div>
                        </div>
                    </div>
                </div>
                <input hidden type="text" name="aspek" value="Sikap">
                <input type="submit" class="btn btn-primary" style="margin-top:-4%; margin-bottom:-1%" value="Submit">
            </form>
        </div>
    </div>
</div>
<div class="form-group stretch-card">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Umum</h4>
            <form method="POST" action="add-cpl" enctype="multipart/form-data">
                @csrf
                <div id="dynamicAddRemoveUmm">
                    <div class="form-group row">
                        <div class="col-2">
                            <div class="form-group">
                                <label>Tahun kurikulum <span class="text-danger">*</span></label>
                                <select class="form-control" name="kurikulum[0]">
                                    <option selected="true" value="" disabled selected>Select...</option>
                                    @foreach($kurikulums as $kurikulum)
                                    <option value="{{$kurikulum->tahun}}">{{$kurikulum->tahun}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-3">
                            <div class="form-group">
                                <label>Kode <span class="text-danger">*</span></label>
                                <div class="input-group mb-2">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">KU</span>
                                    </div>
                                    <input type="text" class="form-control" name="kode[0]" placeholder="Nomor" autocomplete="off">
                                </div>
                                <div style="font-size: x-small">
                                    <div class="row">
                                        <div class="col-4" style="padding: 0 0 0 15px;">
                                            Already exist:
                                        </div>
                                        <div class="col" style="padding: 0 15px 0 0;">@foreach($umums as $umm)
                                            {{$umm->kurikulum}}-{{$umm->kode}};
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-5">
                            <div class="form-group">
                                <label>Judul <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" name="judul[0]" placeholder="Judul" autocomplete="off">
                            </div>
                        </div>
                        <div class="col-2">
                            <label>Action</label>
                            <div class="form-group">
                                <button type="button" name="add" id="dynamic-ar-umm" class="btn btn-sm btn-primary">Add Field</button>
                            </div>
                        </div>
                    </div>
                </div>
                <input hidden type="text" name="aspek" value="Umum">
                <input type="submit" class="btn btn-primary" style="margin-top:-4%; margin-bottom:-1%" value="Submit">
            </form>
        </div>
    </div>
</div>
<div class="form-group stretch-card">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Pengetahuan</h4>
            <form method="POST" action="add-cpl" enctype="multipart/form-data">
                @csrf
                <div id="dynamicAddRemovePeng">
                    <div class="form-group row">
                        <div class="col-2">
                            <div class="form-group">
                                <label>Tahun kurikulum <span class="text-danger">*</span></label>
                                <select class="form-control" name="kurikulum[0]">
                                    <option selected="true" value="" disabled selected>Select...</option>
                                    @foreach($kurikulums as $kurikulum)
                                    <option value="{{$kurikulum->tahun}}">{{$kurikulum->tahun}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-3">
                            <div class="form-group">
                                <label>Kode <span class="text-danger">*</span></label>
                                <div class="input-group mb-2">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">P</span>
                                    </div>
                                    <input type="text" class="form-control" name="kode[0]" placeholder="Nomor" autocomplete="off">
                                </div>
                                <div style="font-size: x-small">
                                    <div class="row">
                                        <div class="col-4" style="padding: 0 0 0 15px;">
                                            Already exist:
                                        </div>
                                        <div class="col" style="padding: 0 15px 0 0;">@foreach($pengetahuans as $peng)
                                            {{$peng->kurikulum}}-{{$peng->kode}};
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-5">
                            <div class="form-group">
                                <label>Judul <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" name="judul[0]" placeholder="Judul" autocomplete="off">
                            </div>
                        </div>
                        <div class="col-2">
                            <label>Action</label>
                            <div class="form-group">
                                <button type="button" name="add" id="dynamic-ar-peng" class="btn btn-sm btn-primary">Add Field</button>
                            </div>
                        </div>
                    </div>
                </div>
                <input hidden type="text" name="aspek" value="Pengetahuan">
                <input type="submit" class="btn btn-primary" style="margin-top:-4%; margin-bottom:-1%" value="Submit">
            </form>
        </div>
    </div>
</div>
<div class="form-group stretch-card">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Keterampilan</h4>
            <form method="POST" action="add-cpl" enctype="multipart/form-data">
                @csrf
                <div id="dynamicAddRemoveKet">
                    <div class="form-group row">
                        <div class="col-2">
                            <div class="form-group">
                                <label>Tahun kurikulum <span class="text-danger">*</span></label>
                                <select class="form-control" name="kurikulum[0]">
                                    <option selected="true" value="" disabled selected>Select...</option>
                                    @foreach($kurikulums as $kurikulum)
                                    <option value="{{$kurikulum->tahun}}">{{$kurikulum->tahun}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-3">
                            <div class="form-group">
                                <label>Kode <span class="text-danger">*</span></label>
                                <div class="input-group mb-2">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">KK</span>
                                    </div>
                                    <input type="text" class="form-control" name="kode[0]" placeholder="Nomor" autocomplete="off">
                                </div>
                                <div style="font-size: x-small">
                                    <div class="row">
                                        <div class="col-4" style="padding: 0 0 0 15px;">
                                            Already exist:
                                        </div>
                                        <div class="col" style="padding: 0 15px 0 0;">@foreach($keterampilans as $ket)
                                            {{$ket->kurikulum}}-{{$ket->kode}};
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-5">
                            <div class="form-group">
                                <label>Judul <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" name="judul[0]" placeholder="Judul" autocomplete="off">
                            </div>
                        </div>
                        <div class="col-2">
                            <label>Action</label>
                            <div class="form-group">
                                <button type="button" name="add" id="dynamic-ar-ket" class="btn btn-sm btn-primary">Add Field</button>
                            </div>
                        </div>
                    </div>
                </div>
                <input hidden type="text" name="aspek" value="Keterampilan">
                <input type="submit" class="btn btn-primary" style="margin-top:-4%; margin-bottom:-1%" value="Submit">
            </form>
        </div>
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script type="text/javascript">
    var i = 0;

    $("#dynamic-ar-sik").click(function() {
        ++i;
        $("#dynamicAddRemoveSik").append('<div class="form-group row clone"><div class="col-2"><div class="form-group"><label>Kurikulum <span class="text-danger">*</span></label><select class="form-control" name="kurikulum[' + i +
            ']"><option selected = "true" value = "" disabled selected> Select... </option> @foreach($kurikulums as $kurikulum) <option value="{{$kurikulum->tahun}}" {{ old("kurikulum." + i) == $kurikulum->tahun ? "selected " : "" }}>{{$kurikulum->tahun}}</option>@endforeach</select></div></div><div class="col-3"><div class="form-group"><label>Kode <span class="text-danger">*</span></label><div class="input-group mb-2"><div class="input-group-prepend"><span class="input-group-text">S</span></div><input type="text" class="form-control" name="kode[' + i +
            ']" placeholder="Nomor" autocomplete="off"></div></div></div><div class="col-5"><div class="form-group"><label>Judul <span class="text-danger">*</span></label><input type="text" class="form-control"name="judul[' + i +
            ']" placeholder="Judul" autocomplete="off"></div></div><input hidden type="text" name="aspek" value="Sikap">'
        );
    });


    $("#dynamic-ar-umm").click(function() {
        ++i;
        $("#dynamicAddRemoveUmm").append('<div class="form-group row clone"><div class="col-2"><div class="form-group"><label>Kurikulum <span class="text-danger">*</span></label><select class="form-control" name="kurikulum[' + i +
            ']"><option selected = "true" value = "" disabled selected> Select... </option> @foreach($kurikulums as $kurikulum) <option value = "{{$kurikulum->tahun}}">{{$kurikulum->tahun}}</option>@endforeach</select></div></div><div class="col-3"><div class="form-group"><label>Kode <span class="text-danger">*</span></label><div class="input-group mb-2"><div class="input-group-prepend"><span class="input-group-text">KU</span></div><input type="text" class="form-control" name="kode[' + i +
            ']" placeholder="Nomor" autocomplete="off"></div></div></div><div class="col-5"><div class="form-group"><label>Judul <span class="text-danger">*</span></label><input type="text" class="form-control"name="judul[' + i +
            ']" placeholder="Judul" autocomplete="off"></div></div><input hidden type="text" name="aspek" value="Umum">'
        );
    });

    $("#dynamic-ar-peng").click(function() {
        ++i;
        $("#dynamicAddRemovePeng").append('<div class="form-group row clone"><div class="col-2"><div class="form-group"><label>Kurikulum <span class="text-danger">*</span></label><select class="form-control" name="kurikulum[' + i +
            ']"><option selected = "true" value = "" disabled selected> Select... </option> @foreach($kurikulums as $kurikulum) <option value = "{{$kurikulum->tahun}}">{{$kurikulum->tahun}}</option>@endforeach</select></div></div><div class="col-3"><div class="form-group"><label>Kode <span class="text-danger">*</span></label><div class="input-group mb-2"><div class="input-group-prepend"><span class="input-group-text">P</span></div><input type="text" class="form-control" name="kode[' + i +
            ']" placeholder="Nomor" autocomplete="off"></div></div></div><div class="col-5"><div class="form-group"><label>Judul <span class="text-danger">*</span></label><input type="text" class="form-control"name="judul[' + i +
            ']" placeholder="Judul" autocomplete="off"></div></div><input hidden type="text" name="aspek" value="Pengetahuan">'
        );
    });

    $("#dynamic-ar-ket").click(function() {
        ++i;
        $("#dynamicAddRemoveKet").append('<div class="form-group row clone"><div class="col-2"><div class="form-group"><label>Kurikulum <span class="text-danger">*</span></label><select class="form-control" name="kurikulum[' + i +
            ']"><option selected = "true" value = "" disabled selected> Select... </option> @foreach($kurikulums as $kurikulum) <option value = "{{$kurikulum->tahun}}">{{$kurikulum->tahun}}</option>@endforeach</select></div></div><div class="col-3"><div class="form-group"><label>Kode <span class="text-danger">*</span></label><div class="input-group mb-2"><div class="input-group-prepend"><span class="input-group-text">KK</span></div><input type="text" class="form-control" name="kode[' + i +
            ']" placeholder="Nomor" autocomplete="off"></div></div></div><div class="col-5"><div class="form-group"><label>Judul <span class="text-danger">*</span></label><input type="text" class="form-control"name="judul[' + i +
            ']" placeholder="Judul" autocomplete="off"></div></div><input hidden type="text" name="aspek" value="Keterampilan"><div class="col-2">'
        );
    });
</script>
@endsection