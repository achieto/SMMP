@extends('dosen.template')
@section('content')
<div class="col-lg-12 grid-margin stretch-card">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">
                <a href="/dosen/soal/list-soal" class="btn btn-info btn-icon-text p-2 me-2">
                    <i class="ti-arrow-left btn-icon"></i>
                </a> List Pertanyaan {{$soals[0]->jenis}} ( {{$soals[0]->mk->nama}} )
            </h4>
            <div class="table-responsive">
                <table class="table table-hover dataTable">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Kode MK</th>
                            <th>Nama MK</th>
                            <th>Jenis Ujian</th>
                            <th>Pertanyaan</th>
                            <th>Lampiran</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($soals as $no=>$soal)
                        <tr>
                            <td class="py-4">{{$no+1}}</td>
                            <td>{{$soal->kode_mk}}</td>
                            <td>{{$soal->mk->nama}}</td>
                            <td>{{$soal->jenis}}</td>
                            <td>{{$soal->pertanyaan}}</td>
                            <td>
                                @if($soal->lampiran == "")
                                    <span class="badge bg-secondary rounded">Tidak ada</span>
                                @else
                                <span type="button" class="btn btn-sm btn-success rounded" data-bs-toggle="modal" data-bs-target="#exampleModal{{$soal->id}}">
                                    Lihat Lampiran
                                </sp>
                                @endif
                            </td>
                            @if($soal->status == 'Belum')
                            <td>Menunggu validasi</td>
                            @elseif($soal->status == 'Valid')
                            <td>Soal telah tervalidasi</td>
                            @else
                            <td class="py-4">
                                <div class="me-2">Soal ditolak</div>
                            </td>
                            @endif
                            @if($soal->status == 'Tolak')
                            <td class="py-4 d-flex">
                                <a href="/dosen/soal/edit-soal/{{$soal->id}}" type="button" class="btn btn-warning me-2 btn-icon-text p-2">
                                    <i class="ti-pencil btn-icon"></i>
                                </a>
                                <form action="/dosen/soal/delete-soal/{{$soal->id}}" method="post">
                                    @csrf
                                    @method('delete')
                                    <button type="submit" class="btn btn-danger btn-icon-text p-2 me-2" onclick="return confirm('Are you sure to delete soal ?')">
                                        <i class="ti-trash btn-icon"></i>
                                    </button>
                                </form>

                            </td>
                            @elseif($soal->status == 'Belum')
                            <td class="py-4 d-flex">
                                <a href="/dosen/soal/edit-soal/{{$soal->id}}" type="button" class="btn btn-warning me-2 btn-icon-text p-2">
                                    <i class="ti-pencil btn-icon"></i>
                                </a>
                                <form action="{{route('soal-delete', ['id' => $soal->id])}}" method="post">
                                    @csrf
                                    @method('delete')
                                    <button type="submit" class="btn btn-danger btn-icon-text p-2 me-2" onclick="return confirm('Are you sure to delete soal ?')">
                                        <i class="ti-trash btn-icon"></i>
                                    </button>
                                </form>
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
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Lampiran Soal</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body" id="modalBody{{$soal->id}}">
                @php
                    $extension = pathinfo($soal->lampiran, PATHINFO_EXTENSION);
                @endphp

                @if(in_array($extension, ['jpg', 'jpeg', 'png']))
                    <div class="d-flex justify-content-center w-100">
                        <img src="{{ asset('/assets/lampiran_soal/' . $soal->lampiran) }}" alt="Lampiran Soal" class="w-75">
                    </div>
                @elseif($extension === 'pdf')
                    <iframe src="{{ asset('/assets/lampiran_soal/' . $soal->lampiran) }}" width="100%" height="100%" style="min-height: 450px;"></iframe>
                @elseif(in_array($extension, ['doc', 'docx', 'xls', 'xlsx']))
                    <div class="d-flex justify-content-between align-items-center">
                        <h6 class="m-0">File lampiran: {{ $soal->lampiran }}</h6>
                        <a href="{{ asset('/assets/lampiran_soal/' . $soal->lampiran) }}" class="btn btn-primary float-right" download>Unduh File</a>
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>
@endforeach
@endsection
