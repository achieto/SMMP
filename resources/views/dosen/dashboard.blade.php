@extends('dosen.template')
@section('content')

<style>
    .card:hover {
        background-color: rgba(0, 123, 255, .75) !important;
        cursor: pointer;
        transform: scale(.95);
    }
</style>

<div class="container d-flex justify-content-between w-100">
    <a class="card mx-1 w-100 bg-primary text-white text-decoration-none" href="rps/list-rps">
        <div class="card-title m-0">
            <p class="p-4 pb-1 h3 m-0 text-white">JUMLAH RPS</p>
        </div>
        <div class="card-body w-100">
            <p class="h1 text-end pe-3 jumlah">100</p>
        </div>
    </a>
    <a class="card mx-1 w-100 bg-primary text-white text-decoration-none" href="cpl/list-cpl">
        <div class=" card-title m-0">
            <p class="p-4 pb-1 h3 m-0 text-white">JUMLAH CPL</p>
        </div>
        <div class="card-body w-100">
            <p class="h1 text-end pe-3 jumlah">100</p>
        </div>
    </a>
    <a class="card mx-1 w-100 bg-primary text-white text-decoration-none" href="cpmk/list-cpmk">
        <div class="card-title m-0">
            <p class="p-4 pb-1 h3 m-0 text-white">JUMLAH CPMK</p>
        </div>
        <div class="card-body w-100">
            <p class="h1 text-end pe-3 jumlah">100</p>
        </div>
    </a>
</div>

@endsection