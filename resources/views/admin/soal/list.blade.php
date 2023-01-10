@extends('admin.template')
@section('content')
<div class="col-lg-12 grid-margin stretch-card">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">List Soal</h4>
            <div class="table-responsive">
                <table class="table table-hover dataTable">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Kode MK</th>
                            <th>Nama MK</th>
                            <th>Minggu ke-</th>
                            <th>Jenis Ujian</th>
                            <th>Dosen</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                        $kode_mk = 0;
                        foreach($soals as $no=>$soal):
                        foreach($mks as $mk):
                        if($soal->id_mk == $mk->id)
                        $kode_mk = $mk->kode;
                        $nama_mk = $mk->nama;
                        endforeach
                        @endphp
                        <tr>
                            <td class="py-4">{{$no+1}}</td>
                            <td>{{$kode_mk}}</td>
                            <td>{{$nama_mk}}</td>
                            <td>{{$soal->minggu}}</td>
                            <td>{{$soal->jenis}}</td>
                            <td>{{$soal->dosen}}</td>
                            <td class="py-4 d-flex">
                                <a href="/admin/print-soal/{{encrypt($soal->id)}}" target="_blank" type="button" class="btn btn-info btn-icon-text p-2">
                                    Print
                                    <i class="ti-printer btn-icon-append"></i>
                                </a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection