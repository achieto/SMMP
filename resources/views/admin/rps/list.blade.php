@extends('admin.template')
@section('content')
<div class="col-lg-12 grid-margin stretch-card">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">List RPS</h4>
            <div class="table-responsive">
                <table class="table table-hover dataTable">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Kode MK</th>
                            <th>Tanggal Penyusunan</th>
                            <th>Pengembang RPS</th>
                            <th>Koordinator RMK</th>
                            <th>Ketua Prodi</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                        $kode_mk = 0;
                        foreach($rpss as $no=>$rps):
                        foreach($mks as $mk):
                        if($rps->id_mk == $mk->id)
                        $kode_mk = $mk->kode;
                        endforeach
                        @endphp
                        <tr>
                            <td class="py-4">{{$no+1}}</td>
                            <td>{{$kode_mk}}</td>
                            <td>{{date("d-m-Y",strtotime($rps->created_at))}}</td>
                            <td>{{$rps->pengembang}}</td>
                            <td>{{$rps->koordinator}}</td>
                            <td>{{$rps->kaprodi}}</td>
                            <td class="py-4 d-flex">
                                <a href="/admin/print-rps/{{$rps->id}}" type="button" class="btn btn-info btn-icon-text p-2">
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