@extends('admin.template')
@section('content')
<div class="col-lg-12 grid-margin stretch-card">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">List RPS</h4>
            <div class="table-responsive">
                <table class="table table-hover" id="dataTable">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Judul</th>
                            <th>Kode MK</th>
                            <th>Tanggal Penyusunan</th>
                            <th>Pengembang RPS</th>
                            <th>Koordinator RMK</th>
                            <th>Ketua Prodi</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="py-4"></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td class="py-4 d-flex">
                                <a href="/print-rps" type="button" class="btn btn-info btn-icon-text p-2">
                                    Print
                                    <i class="ti-printer btn-icon-append"></i>
                                </a>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection