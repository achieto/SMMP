@extends('admin.template')
@section('content')
<div class="col-lg-12 grid-margin stretch-card">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">List Dosen</h4>
            <div class="table-responsive">
                <table class="table table-hover" id="dataTable">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Password</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($dosens as $no=>$dosen)
                        <tr>
                            <td class="py-4">{{$no+1}}</td>
                            <td>{{$dosen->name}}</td>
                            <td>{{$dosen->email}}</td>
                            <td>
                                <form action="/reset-dosen/{{$dosen->id}}" method="post">
                                    @csrf
                                    @method('put')
                                    <button type="submit" class="btn btn-warning btn-icon-text p-2" onclick="return confirm('Are you sure to reset password {{$dosen->name}}?')">
                                        <i class="ti-reload btn-icon-prepend"></i>
                                        Reset Password
                                    </button>
                                </form>
                            </td>
                            <td class="d-flex py-4">
                                <button type="button" class="btn btn-inverse-dark btn-icon-text p-2" style="margin-right:7px">
                                    Edit
                                    <i class="ti-file btn-icon-append"></i>
                                </button>
                                <form action="/delete-dosen/{{$dosen->id}}" method="post">
                                    @csrf
                                    @method('delete')
                                    <button type="submit" class="btn btn-danger btn-icon-text p-2" onclick="return confirm('Are you sure to delete {{$dosen->name}}?')">
                                        <i class=" mdi mdi-delete btn-icon-prepend"></i>
                                        Delete
                                    </button>
                                </form>
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