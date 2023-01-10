@extends('admin.template')
@section('content')
<div class="col-12 grid-margin stretch-card">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Edit User</h4>
            <p class="card-description">
                ({{$user->name}})
            </p>
            <form method="POST" action="{{encrypt($user->id)}}" enctype="multipart/form-data">
                @csrf
                @method('put')
                <div class="form-group">
                    <label>Name <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" name="name" placeholder="Name" value="{{$user->name}}" autofocus autocomplete="off">
                    @error('name')
                    <div class="alert alert-danger">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="form-group">
                    <label>Email address <span class="text-danger">*</span></label>
                    <input type="email" class="form-control" name="email" placeholder="Email" value="{{$user->email}}" required autocomplete="off">
                    @error('email')
                    <div class="alert alert-danger">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="form-group">
                    <label>Otoritas <span class="text-danger">*</span></label>
                    <select class="js-example-basic-single w-100" name="otoritas" id="otoritas">
                        <option selected="true" value="" disabled selected>Select...</option>
                        <option value="Dosen" {{ $user->otoritas == 'Dosen' ? 'selected' : '' }}>Dosen</option>
                        <option value="Penjamin Mutu" {{ $user->otoritas == 'Penjamin Mutu' ? 'selected' : '' }}>Penjamin Mutu</option>
                    </select>
                    @error('otoritas')
                    <div class="alert alert-danger">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="form-group">
                    <label>Profile Picture</label>
                    <p>{{$user->img}}</p>
                    <input type="file" accept="image/png, image/jpeg" name="img" class="form-control" style="padding-bottom: +27px">
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