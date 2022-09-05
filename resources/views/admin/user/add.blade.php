@extends('admin.template')
@section('content')
<div class="col-12 grid-margin stretch-card">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Add User</h4>
            <p class="card-description">
                (Dosen)
            </p>
            <form method="POST" action="{{ route('add-dosen') }}" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label>Name <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" name="name" placeholder="Name" :value="old('name')" required autofocus autocomplete="off">
                    @error('name')
                    <div class="alert alert-danger">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="form-group">
                    <label>Email address <span class="text-danger">*</span></label>
                    <input type="email" class="form-control" name="email" placeholder="Email" :value="old('email')" required autocomplete="off">
                    @error('email')
                    <div class="alert alert-danger">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="form-group">
                    <label>Password</label>
                    <input type="password" class="form-control" name="password" placeholder="Password" autocomplete="new-password">
                    @error('password')
                    <div class="alert alert-danger">
                        {{ $message }}
                    </div>
                    @enderror
                </div>

                <div class="form-group">
                    <label>Profile Picture</label>
                    <input type="file" name="img" class="form-control" style="padding-bottom: +27px">
                    @error('img')
                    <div class="alert alert-danger">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <input type="text" hidden class="form-control" name="otoritas" value="Dosen">
                <button class="btn btn-primary me-2">{{ __('Register') }}</button>
                <button class="btn btn-light">Cancel</button>
            </form>
        </div>
    </div>
</div>
@endsection