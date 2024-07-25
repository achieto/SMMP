@include('admin.layout.header')
@include('admin.layout.navbar')
<div class="container-fluid page-body-wrapper">
    @include('admin.layout.sidebar')
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="row">
                <div class="px-3">
                    @include('admin.layout.success')
                </div>
                @yield('content')
                @include('admin.layout.footer')
