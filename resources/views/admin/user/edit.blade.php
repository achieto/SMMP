@extends('admin.template')
@section('content')
<div class="col-12 grid-margin stretch-card">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Edit User</h4>
            <p class="card-description">
                ({{$dosen->name}})
            </p>
            <form method="POST" action="{{$dosen->id}}" enctype="multipart/form-data">
                @csrf
                @method('put')
                <div class="form-group">
                    <label>Name <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" name="name" placeholder="Name" value="{{$dosen->name}}" autofocus autocomplete="off">
                    @error('name')
                    <div class="alert alert-danger">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="form-group">
                    <label>Email address <span class="text-danger">*</span></label>
                    <input type="email" class="form-control" name="email" placeholder="Email" value="{{$dosen->email}}" required autocomplete="off">
                    @error('email')
                    <div class="alert alert-danger">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="form-group">
                    <label>Profile Picture</label>
                    <p>{{$dosen->img}}</p>
                    <input type="file" accept="image/png, image/jpeg"name="img" class="form-control" style="padding-bottom: +27px">
                    @error('img')
                    <div class="alert alert-danger">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <button type="submit" class="btn btn-primary me-2">Edit</button>
            </form>
        </div>
    </div>
</div>
@endsection