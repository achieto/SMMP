@extends('admin.template')
@section('content')
<style>
    .card-sum:hover {
        background-color: rgba(0, 123, 255, .75) !important;
        cursor: pointer;
        transform: scale(.95);
    }
</style>
<div class="form-group">
    <div class="d-flex justify-content-between w-100">
        <a class="card card-sum mx-1 w-100 bg-primary text-white text-decoration-none" href="/admin/list-dosen">
            <div class="card-title m-0">
                <p class="p-4 pb-1 h3 m-0 text-white">JUMLAH DOSEN</p>
            </div>
            <div class="card-body w-100">
                @php
                $user = DB::table('users')
                ->where('otoritas', '=', 'Dosen')
                ->get();
                $sum = 0;
                foreach($user as $dosen) :
                $sum+=1;
                endforeach
                @endphp
                <p class="h1 text-end pe-3 jumlah">{{$sum}}</p>
            </div>
        </a>
        <a class="card card-sum mx-1 w-100 bg-primary text-white text-decoration-none" href="/admin/list-mk">
            <div class=" card-title m-0">
                <p class="p-4 pb-1 h3 m-0 text-white">JUMLAH MATA KULIAH</p>
            </div>
            <div class="card-body w-100">
                @php
                $mks = DB::table('mks')->get();
                $sum = 0;
                foreach($mks as $mk) :
                $sum+=1;
                endforeach
                @endphp
                <p class="h1 text-end pe-3 jumlah">{{$sum}}</p>
            </div>
        </a>
        <a class="card card-sum mx-1 w-100 bg-primary text-white text-decoration-none" href="/admin/list-cpl">
            <div class="card-title m-0">
                <p class="p-4 pb-1 h3 m-0 text-white">JUMLAH CPL PRODI</p>
            </div>
            <div class="card-body w-100">
                @php
                $cpls = DB::table('cpls')->get();
                $sum = 0;
                foreach($cpls as $cpl) :
                $sum+=1;
                endforeach
                @endphp
                <p class="h1 text-end pe-3 jumlah">{{$sum}}</p>
            </div>
        </a>
    </div>
</div>
<div class="form-group">
    <div class="row">
        <div class="col-lg-6 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">CPL Sikap</h4>
                    <canvas id="barChartS"></canvas>
                </div>
            </div>
        </div>
        <div class="col-lg-6 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">CPL Umum</h4>
                    <canvas id="barChartU"></canvas>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-6 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">CPL Pengetahuan</h4>
                    <canvas id="barChartP"></canvas>
                </div>
            </div>
        </div>
        <div class="col-lg-6 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">CPL Keterampilan</h4>
                    <canvas id="barChartK"></canvas>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- <script>
    document.addEventListener("DOMContentLoaded", () => {
        
    });
</script> -->
@endsection