@extends('admin.template')
@section('content')
<style>
    .card-sum:hover {
        background-color: rgba(0, 123, 255, .75) !important;
        cursor: pointer;
        transform: scale(.95);
    }
</style>
<div class="container-fluid">
    <div class="row justify-content-start">
        <div class="form-group col-3">
            <label for="filter" class="form-label">FILTER KURIKULUM</label>
            <select name="kurikulum" id="filter" class="form-select text-center">
                <option value="all"> All </option>
                @foreach($kurikulums as $kur)
                <option value="{{$kur->tahun}}">{{$kur->tahun}}</option>
                @endforeach
            </select>
        </div>
    </div>
</div>
<div class="form-group">
    <div class="d-flex justify-content-between w-100">
        <a class="card card-sum mx-1 w-100 bg-primary text-white text-decoration-none" href="/admin/list-user">
            <div class="card-body pb-0">
                <h4 class="card-title card-title-dash text-white mb-4">Jumlah User</h4>
                <div class="row">
                    <div class="col">
                        <p class="status-summary-ight-white mb-1">Dosen, Penjamin Mutu</p>
                        @php
                        $users = DB::table('users')->get();
                        $sum = 0;
                        foreach($users as $user) :
                        $sum+=1;
                        endforeach
                        @endphp
                        <h2 class="text-info">{{$sum}}</h2>
                    </div>
                    <div class="col text-end p-4">
                        <i class="h1 mdi mdi-account-multiple"></i>
                    </div>
                </div>
            </div>
        </a>
        <a class="card card-sum mx-1 w-100 bg-primary text-white text-decoration-none" href="/admin/list-mk">
            <div class="card-body pb-0">
                <h4 class="card-title card-title-dash text-white mb-4">Jumlah Mata Kuliah</h4>
                <div class="row">
                    <div class="col">
                        <p id="kur-mk" class="status-summary-ight-white mb-1">All Kurikulum</p>
                        <h2 class="text-info" id="jumlah-mk"></h2>
                    </div>
                    <div class="col text-end p-4">
                        <i class="h1 mdi mdi-book-open"></i>
                    </div>
                </div>
            </div>
        </a>
        <a class="card card-sum mx-1 w-100 bg-primary text-white text-decoration-none" href="/admin/list-cpl">
            <div class="card-body pb-0">
                <h4 class="card-title card-title-dash text-white mb-4">Jumlah CPL</h4>
                <div class="row">
                    <div class="col">
                        <p id="kur-cpl" class="status-summary-ight-white mb-1">All Kurikulum</p>
                        <h2 class="text-info" id="jumlah-cpl"></h2>
                    </div>
                    <div class="col text-end p-4">
                        <i class="h1 mdi mdi-view-list"></i>
                    </div>
                </div>
            </div>
        </a>
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

    $(document).ready(function() {
        showCard('all')
    })

    $('#filter').change(function() {
        // console.log($('#filter option:selected').val())
        if ($('#filter option:selected').val() != 'all') {
            document.getElementById('kur-mk').innerText = 'Kurikulum ' + $('#filter option:selected').val();
            document.getElementById('kur-cpl').innerText = 'Kurikulum ' + $('#filter option:selected').val();
        } else {
            document.getElementById('kur-mk').innerText = 'All Kurikulum';
            document.getElementById('kur-cpl').innerText = 'All Kurikulum';
        }

        showChart($('#filter option:selected').val());
        showCard($('#filter option:selected').val());
    })

    function showCard(url) {
        $.ajax({
            url: `/admin/dashboard-card/${url}`,
            type: "GET",
            dataType: "json",
            success: function(data) {
                $("#jumlah-mk").empty();
                $("#jumlah-mk").append(data.sum_mk);
                $("#jumlah-cpl").empty();
                $("#jumlah-cpl").append(data.sum_cpl);
            }
        });
    }

    function showChart(url) {
        $.ajax({
            url: `/admin/dashboard-chart/${url}`,
            type: "GET",
            dataType: "json",
            success: function(dt) {
                var dataP = {
                    labels: dt.pengetahuan,
                    datasets: [{
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
                    },
                    events: []
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