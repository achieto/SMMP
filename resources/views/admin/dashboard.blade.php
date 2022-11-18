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
        <a class="card card-sum mx-1 w-100 bg-primary text-white text-decoration-none" href="/admin/list-user">
            <div class="card-title m-0">
                <p class="p-4 pb-1 h3 m-0 text-white">JUMLAH USER</p>
            </div>
            <div class="card-body w-100">
                @php
                $users = DB::table('users')
                ->where('otoritas', '!=', 'Admin')
                ->get();
                $sum = 0;
                foreach($users as $user) :
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
<div class="container-fluid">
    <div class="row justify-content-end">
        <div class="form-group col-3">
            <label for="filter" class="form-label">FILTER KURIKULUM</label>
            <select name="kurikulum" id="filter" class="form-select text-center">
                <option value="all"> - </option>
                @foreach($kurikulums as $kur)
                <option value="{{$kur->tahun}}">{{$kur->tahun}}</option>
                @endforeach
            </select>
        </div>
    </div>
</div>
<div class="form-group">
    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">CPL Pengetahuan</h4>
                    <canvas id="barChartP"></canvas>
                </div>
            </div>
        </div>
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">CPL Keterampilan</h4>
                    <canvas id="barChartK"></canvas>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script>
    $(document).ready(function() {
        showChart('all')
    })

    $('#filter').change(function() {
        // console.log($('#filter option:selected').val())
        showChart($('#filter option:selected').val())
    })

    function showChart(url) {
        $.ajax({
            url: `/admin/dashboard-chart/${url}`,
            type: "GET",
            dataType: "json",
            success: function(dt) {
                var dataP = {
                    labels: dt.pengetahuan,
                    datasets: [{
                        label: 'Jumlah MK',
                        data: dt.jumlahp,
                        backgroundColor: dt.warnap,
                        borderColor: dt.borderp,
                        borderWidth: 1,
                        fill: false
                    }]
                };
                var dataK = {
                    labels: dt.keterampilan,
                    datasets: [{
                        label: 'Jumlah MK',
                        data: dt.jumlahk,
                        backgroundColor: dt.warnak,
                        borderColor: dt.borderk,
                        borderWidth: 1,
                        fill: false
                    }]
                };
                var options = {
                    scales: {
                        yAxes: [{
                            ticks: {
                                beginAtZero: true
                            }
                        }]
                    },
                    legend: {
                        display: false
                    },
                    elements: {
                        point: {
                            radius: 0
                        }
                    }

                };
                if ($("#barChartP").length) {
                    var barChartCanvas = $("#barChartP").get(0).getContext("2d");
                    // This will get the first returned node in the jQuery collection.
                    var barChart = new Chart(barChartCanvas, {
                        type: 'bar',
                        data: dataP,
                        options: options
                    });
                }
                if ($("#barChartK").length) {
                    var barChartCanvas = $("#barChartK").get(0).getContext("2d");
                    // This will get the first returned node in the jQuery collection.
                    var barChart = new Chart(barChartCanvas, {
                        type: 'bar',
                        data: dataK,
                        options: options
                    });
                }
            }
        });

    }
</script>
@endsection