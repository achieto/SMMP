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
                            <td class="p-4">{{$no+1}}</td>
                            <td>{{$dosen->name}}</td>
                            <td>{{$dosen->email}}</td>
                            <td>
                                @csrf
                                @method('put')
                                <form action="/reset-dosen/{{$dosen->id}}" method="post">                                
                                <button type="submit" class="btn btn-warning btn-icon-text p-2" onclick="return confirm('Are you sure to reset password {{$dosen->name}}?')">
                                    <i class="ti-reload btn-icon-prepend"></i>
                                    Reset Password
                                </button>
                            </form>
                            </td>
                            <td>
                                <button type="button" class="btn btn-inverse-dark btn-icon-text p-2" style="margin-right:7px">
                                    Edit
                                    <i class="ti-file btn-icon-append"></i>
                                </button>
                                <button type="button" class="btn btn-danger btn-icon-text p-2" onclick="return confirm('Are you sure to delete {{$dosen->name}}?')">
                                    <i class=" mdi mdi-delete btn-icon-prepend"></i>
                                    Delete
                                </button>
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