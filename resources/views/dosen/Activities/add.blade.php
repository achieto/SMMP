@extends('dosen.template')
@section('content')

<div class="container-fluid">
    <div class="card">
        <div class="card-header">
            <div class="fw-bold">
                <h3>Tambah Aktifitas Mingguan Baru</h3>
            </div>
        </div>
        <div class="card-body">
            <form action="" method="post">
                @csrf
                <div class="form-floating">
                    <select id="rps" name="id_rps" class="form-select form-control-lg" aria-label="select RPS">
                        <option selected disabled> </option>
                        @foreach ($rpss as $rps)
                        <option value="{{$rps->id}}">{{$rps->nomor}}</option>
                        @endforeach
                    </select>
                    <label for="rps">Nomor RPS <span style="color:red">*</span></label>
                    @error('rps')
                    <div class="alert alert-danger">
                        {{ $message }}
                    </div>
                    @enderror
                    <div id="MKHelp" class="form-text mb-3">Silahkan pilih Nomor RPS.</div>
                </div>
                <div class="form-floating mb-3">
                    <input type="text" name="sub_cpmk" class="form-control" id="sub_cpmk" placeholder="sub_cpmk" aria-describedby="sub_cpmkHelp">
                    <label for="sub_cpmk" class="form-label">Rincian Sub CPMK <span style="color:red">*</span></label>
                    @error('sub_cpmk')
                    <div class="alert alert-danger">
                        {{ $message }}
                    </div>
                    @enderror
                    <div id="sub_cpmkHelp" class="form-text">Silahkan masukkan rincian Sub CPMK.</div>
                </div>
                <div id="dynamic-indikator" class="form-group">
                    <div class="form-group row">
                        <div class="form-floating col-10">
                            <input type="text" name="indikators[0]" class="form-control" id="indikator" placeholder="indikator">
                            <label for="indikator" class="form-label ps-4"> Indikator <span style="color:red">*</span></label>
                        </div>
                        <div class="col-2">
                            <button type="button" name="add" id="dynamic-btn-indikator" class="ms-3 mt-2 btn btn-primary">Add Field</button>
                        </div>
                    </div>
                    @error('indikator')
                    <div class="alert alert-danger">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="form-floating mb-3">
                    <input type="text" name="kriteria" class="form-control" id="kriteria" placeholder="kriteria" aria-describedby="kriteriaHelp">
                    <label for="kriteria" class="form-label">Kriteria <span style="color:red">*</span></label>
                    @error('kriteria')
                    <div class="alert alert-danger">
                        {{ $message }}
                    </div>
                    @enderror
                    <div id="kriteriaHelp" class="form-text">Silahkan masukkan Kriteria.</div>
                </div>

                <div class="form-group">

                    <div id="dynamic-metode" class="form-group mb-0">
                        <div class="mb-2">
                            <label class="form-label me-2 align-middle fs-6">Metode Pembelajaran : </label>
                            <input type="radio" onclick="check(this)" class="btn-check" name="metode" value="luring" id="success-outlined" autocomplete="off" checked>
                            <label class="btn btn-outline-primary p-2 mb-0" for="success-outlined">Metode Luring</label>
                            <input type="radio" onclick="check(this)" class="btn-check" name="metode" value="daring" id="danger-outlined" autocomplete="off">
                            <label class="btn btn-outline-primary p-2 mb-0" for="danger-outlined">Metode Daring</label>
                        </div>
                    </div>

                    <div id="dynamic-metode_luring" class="form-group ">
                        <div class="form-group row">
                            <div class="form-floating col-10">
                                <input type="text" name="metode_lurings[0]" class="form-control" id="metode_luring" placeholder="metode_luring">
                                <label for="metode_luring" class="form-label ps-4"> Metode Luring <span style="color:red">*</span></label>
                            </div>
                            <div class="col-2">
                                <button type="button" name="add" id="dynamic-btn-metode_luring" class="ms-3 mt-2 btn btn-primary">Add Field</button>
                            </div>
                        </div>
                        @error('metode_luring')
                        <div class="alert alert-danger">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div id="dynamic-metode_daring" class="form-group d-none">
                        <div class="form-group row">
                            <div class="form-floating col-10">
                                <input type="text" name="metode_darings[0]" class="form-control" id="metode_daring" placeholder="metode_daring">
                                <label for="metode_daring" class="form-label ps-4"> Metode Daring <span style="color:red">*</span></label>
                            </div>
                            <div class="col-2">
                                <button type="button" name="add" id="dynamic-btn-metode_daring" class="ms-3 mt-2 btn btn-primary">Add Field</button>
                            </div>
                        </div>
                        @error('metode_daring')
                        <div class="alert alert-danger">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                </div>
                <div class="form-floating mb-3">
                    <input type="text" name="materi" class="form-control" id="materi" placeholder="materi" aria-describedby="materiHelp">
                    <label for="materi" class="form-label">Materi <span style="color:red">*</span></label>
                    @error('materi')
                    <div class="alert alert-danger">
                        {{ $message }}
                    </div>
                    @enderror
                    <div id="materiHelp" class="form-text">Silahkan masukkan Materi.</div>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script type="text/javascript">
    var i = 0;
    $("#dynamic-btn-indikator").click(function() {
        ++i;
        $("#dynamic-indikator").append('<div class="form-group row clone"><div class="form-floating mb-3 col-10">' +
            '<input type="text" name="indikators[' + i + ']" class="form-control" id="indikator[' + i + ']" placeholder="indikator[' + i + ']">' +
            '<label for="indikator" class="form-label ps-4"> Indikator <span style="color:red">*</span></label></div>' +
            '<div class="col-2"><button type="button" id="remove-indikator'+[i]+'" class="btn ms-3 mt-2 btn-danger remove-input-indikator d-none">Delete</button></div></div>');
    });
    $(document).on('click', '.remove-input-indikator', function() {
        $(this).parents('.clone').remove();
    });

    function check(param) {
        if ($(param).val() == 'daring') {
            console.log("daring")
            $('#dynamic-metode_luring').addClass("d-none")
            $('#dynamic-metode_daring').removeClass("d-none")
        } else if ($(param).val() == 'luring') {
            console.log("luring")
            $('#dynamic-metode_daring').addClass("d-none")
            $('#dynamic-metode_luring').removeClass("d-none")
        }
    }
</script>
@endsection