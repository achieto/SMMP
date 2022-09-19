@extends('admin.template')
@section('content')
<div class="col-lg-12 grid-margin stretch-card">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">List Mata Kuliah</h4>
            <div class="table-responsive">
                <table class="table table-hover" id="dataTable">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Kode MK</th>
                            <th>Nama MK</th>
                            <th>Deskripsi singkat MK</th>
                            <th>Rumpun</th>
                            <th>Semester</th>
                            <th>MK Prasyarat</th>
                            <th>Kurikulum</th>
                            <th>Bobot</th>
                            <th>Dosen pengampu</th>
                            <th>Bahan kajian/materi pembelajaran</th>
                            <th>Pustaka utama</th>
                            <th>Pustaka pendukung</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($mks as $no=>$mk)
                        <tr>
                            <td class="py-4">{{$no+1}}</td>
                            <td>{{$mk->kode}}</td>
                            <td>{{$mk->nama}}</td>
                            <td><?= substr($mk->deskripsi, 0, 65) ?></td>
                            <td>Mata Kuliah {{$mk->rumpun}}</td>
                            <td>{{$mk->semester}}</td>
                            <td>{{$mk->prasyarat}}</td>
                            <td>{{$mk->kurikulum}}</td>
                            <td><?= (int)$mk->bobot_teori + $mk->bobot_praktikum ?> SKS</td>
                            <td>{{$mk->dosen}}</td>
                            <td><?= substr($mk->materi, 0, 65) ?></td>
                            <td>{{$mk->pustaka_utama}}</td>
                            <td>{{$mk->pustaka_pendukung}}</td>
                            <td class="py-4">
                                <div class="d-flex">
                                    <a type="button" href="/admin/edit-mk/{{$mk->id}}" class="btn btn-inverse-dark btn-icon-text p-2" style="margin-right:7px">
                                        Edit
                                        <i class="ti-file btn-icon-append"></i>
                                    </a>
                                    <form action="/admin/delete-mk/{{$mk->id}}" method="post">
                                        @csrf
                                        @method('delete')
                                        <button type="submit" class="btn btn-danger btn-icon-text p-2" onclick="return confirm('Are you sure to delete {{$mk->nama}}?')">
                                            <i class=" mdi mdi-delete btn-icon-prepend"></i>
                                            Delete
                                        </button>
                                    </form>
                                </div>
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