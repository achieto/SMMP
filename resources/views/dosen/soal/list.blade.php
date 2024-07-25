@extends('dosen.template')
@section('content')
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>

<div class="col-lg-12 grid-margin stretch-card">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">List Soal</h4>
            <div class="table-responsive">
                <table class="table table-hover dataTable">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Kode MK</th>
                            <th>Nama MK</th>
                            <th>Minggu ke-</th>
                            <th>Jenis Ujian</th>
                            <th>Dosen</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                    @php
                        $no = 1;
                    @endphp
                    @foreach($groupedSoals as $kodeMk => $jenisSoals)
                        @foreach($jenisSoals as $jenis => $soals)
                        <tr>
                            <td class="py-4">{{ $no++ }}</td>
                            <td>{{ $kodeMk }}</td>
                            <td>{{ $soals[0]->mk->nama }}</td>
                            <td>{{ $soals[0]->minggu }}</td>
                            <td>{{ $jenis }}</td>
                            <td>{{ $soals[0]->dosen }}</td>
                            @if($soals[0]->status == 'Belum')
                            <td>Menunggu validasi</td>
                            @elseif($soals[0]->status == 'Valid')
                            <td>Soal telah tervalidasi</td>
                            @else
                            <td class="py-4">
                                <div class="me-2">Soal ditolak</div>
                            </td>
                            @endif
                            <td class="py-4 d-flex gap-2">
                                <a href="{{route('soal-detail', ['kodeMk' => $kodeMk, 'jenis' => $jenis])}}" type="button" class="btn btn-primary btn-icon-text p-2">
                                    <i class="ti-menu-alt btn-icon"></i>
                                </a>
                                <button type="button" class="btn btn-list btn-inverse-primary btn-icon p-2 chart-btn" data-id="{{$soals[0]->id}}" data-bs-target="#chartModal{{$soals[0]->id}}">
                                    <i class="ti-bar-chart-alt btn-icon"></i>
                                </button>
                                @if($soals[0]->status == 'Valid')
                                <a href="/dosen/print-soal/{{encrypt($soals[0]->id)}}" target="_blank" type="button" class="btn btn-info btn-icon-text p-2">
                                    <i class="ti-download btn-icon"></i>
                                </a>
                                @elseif($soals[0]->status == 'Tolak')
                                <button class="btn btn-warning btn-icon-text p-2" data-bs-toggle="modal" data-bs-target="#exampleModal{{$soals[0]->id}}">
                                    <i class="ti-alert btn-icon"></i>
                                </button>
                                @endif
                            </td>
                        </tr>
                        @endforeach
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

@foreach($groupedSoals as $jenisSoals)
    @foreach($jenisSoals as $jenis => $soals)
    <div class="modal fade" id="exampleModal{{$soals[0]->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    {{$soals[0]->komentar}}
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="chartModal{{$soals[0]->id}}" tabindex="-1" aria-labelledby="chartModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Grafik CPMK pada {{$soals[0]->jenis}} ({{$soals[0]->mk->nama}})</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body pt-2">
                    <div class="row w-100">
                        <div class="col-6">
                            <div class="table-responsive">
                                <table class="table table-bordered rounded text-wrap">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>CPMK</th>
                                            <th>Jumlah Soal</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                            $jumlah = [];
                                            $no = 1;
                                            foreach($soals[0]->mk->cpmk as $cpmk){
                                            array_push($jumlah, $cpmk->soal->where('jenis', $jenis)->count());
                                        @endphp
                                        <tr>
                                            <td class="text-center">{{$no}}</td>
                                            <td class="text-wrap">{{$cpmk->judul}}</td>
                                            <td class="text-center">{{$cpmk->soal->where('jenis', $jenis)->count()}}</td>
                                        </tr>

                                        @php
                                            $no++;
                                            }
                                        @endphp
                                        <div id="chartData-{{$soals[0]->id}}" class="d-none" data-jumlah="{!! json_encode($jumlah) !!}"></div>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="col-6 align-self-center">
                            <canvas id="chart{{$soals[0]->id}}" width="100%"></canvas>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endforeach
@endforeach
<script>
    $(document).ready(function() {
        $('.chart-btn').on('click', function() {
            var id = $(this).data('id');
            var target = $(this).data('bs-target');
            showChart(id);
            $(target).modal('show');
        });
    });
    function showChart(id) {
        var chartElement = $('#chartData-' + id);
        var jumlah = chartElement.data('jumlah');
        var kode = [];
        for(var i = 0; i < jumlah.length; i++){
            kode[i] = 'CPMK-'+(i+1);
        }
        var data = {
            labels: kode,
            datasets: [{
                label: 'Jumlah Soal',
                data: jumlah,
                backgroundColor: [
                    'rgba(255, 99, 132, 0.2)',
                    'rgba(54, 162, 235, 0.2)',
                    'rgba(255, 206, 86, 0.2)',
                    'rgba(75, 192, 192, 0.2)',
                    'rgba(153, 102, 255, 0.2)',
                    'rgba(255, 159, 64, 0.2)'
                ],
                borderColor: [
                    'rgba(255,99,132,1)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 206, 86, 1)',
                    'rgba(75, 192, 192, 1)',
                    'rgba(153, 102, 255, 1)',
                    'rgba(255, 159, 64, 1)'
                ],
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

        var $canvas = $('#chart' + id);
        var ctx = $canvas[0].getContext('2d');
        var chart = new Chart(ctx, {
            type: 'bar',
            data: data,
            options: options
        });
    }
</script>
@endsection
