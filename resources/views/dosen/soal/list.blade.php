@extends('dosen.template')
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
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                        // $kode_mk = 0;
                        foreach($soals as $no=>$soal):
                        // foreach($mks as $mk):
                        // if($soal->kode_mk == $mk->kode)
                        // $kode_mk = $mk->kode;
                        // $nama_mk = $mk->nama;
                        // endforeach
                        @endphp
                        <tr>
                            <td class="py-4">{{$no+1}}</td>
                            <td>{{$soal->kode_mk}}</td>
                            <td>{{$soal->mk->nama}}</td>
                            <td>{{$soal->minggu}}</td>
                            <td>{{$soal->jenis}}</td>
                            <td>{{$soal->dosen}}</td>
                            @if($soal->status == 'Belum')
                            <td>Menunggu validasi</td>
                            @elseif($soal->status == 'Valid')
                            <td>Soal telah tervalidasi</td>
                            @else
                            <td class="py-4">
                                <div class="me-2">Soal ditolak</div>
                            </td>
                            @endif
                            @if($soal->status == 'Valid')
                            <td class="py-4 d-flex">
                                <a href="/admin/print-soal/{{encrypt($soal->id)}}" target="_blank" type="button" class="btn btn-info btn-icon-text p-2">
                                    <i class="ti-download btn-icon"></i>
                                </a>
                            </td>
                            @elseif($soal->status == 'Tolak')
                            <td class="py-4 d-flex">
                                 <a href="/dosen/rps/edit-rps/{{$soal->id}}" type="button" class="btn btn-warning me-2 btn-icon-text p-2">
                                    <i class="ti-pencil btn-icon"></i>
                                </a>
                                <form action="delete-rps/{{$soal->id}}" method="post">
                                    @csrf
                                    @method('delete')
                                    <button type="submit" class="btn btn-danger btn-icon-text p-2 me-2" onclick="return confirm('Are you sure to delete RPS no.?')">
                                        <i class="ti-trash btn-icon"></i>
                                    </button>
                                </form>
                                <button class="btn btn-warning btn-icon-text p-2" data-bs-toggle="modal" data-bs-target="#exampleModal{{$soal->id}}">
                                    <i class="ti-alert btn-icon"></i>
                                </button>
                            </td>
                            @else
                            <td class="py-4 d-flex">
                                <a href="/dosen/soal/edit-soal/{{$soal->id}}" type="button" class="btn btn-warning me-2 btn-icon-text p-2">
                                    <i class="ti-pencil btn-icon"></i>
                                </a>
                                <form action="delete-soal/{{$soal->id}}" method="post">
                                    @csrf
                                    @method('delete')
                                    <button type="submit" class="btn btn-danger btn-icon-text p-2 me-2" onclick="return confirm('Are you sure to delete soal ?')">
                                        <i class="ti-trash btn-icon"></i>
                                    </button>
                                </form>
                                <button class="btn btn-secondary btn-icon-text p-2" disabled>
                                    <i class="ti-download btn-icon"></i>
                                </a>

                            </td>
                            @endif
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@foreach($soals as $soal)
<div class="modal fade" id="exampleModal{{$soal->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                {{$soal->komentar}}
            </div>
        </div>
    </div>
</div>
@endforeach
@endsection
