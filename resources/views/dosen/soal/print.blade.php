<style type="text/css" media="print">
    @page {
        size: portrait;
    }
</style>
<style>
    table,
    th,
    td {
        border: 1px solid black;
        border-collapse: collapse;
    }

    .header {
        font-family: Cambria, Cochin, Georgia, Times, 'Times New Roman', serif;
        font-size: 16pt;
    }

    main {
        font-family: 'Times New Roman', Times, serif;
        font-size: 12pt;
    }

    .non-border {
        border: none;
    }

    .desc-contain {
        padding: 0 8px;
    }

    ol.start {
        counter-reset: mycounter;
    }

    ol.start li,
    ol.continue li {
        list-style: none;
    }

    ol.start li:before,
    ol.continue li:before {
        content: counter(mycounter) ". ";
        counter-increment: mycounter;
    }
</style>

<table style="width:100%; height:3cm">
    <tr class="blue header" style="vertical-align: top; background-color: rgb(221, 235, 247)">
        <th colspan="1"><img style="width:1.91cm; padding: 12px 6px 0 6px" src="{{public_path('/assets/img/logo_unila.png')}}" alt=""></th>
        <th>
            <div>UNIVERSITAS LAMPUNG</div>
            <div>FAKULTAS MATEMATIKA DAN ILMU PENGETAHUAN ALAM</div>
            <div>JURUSAN ILMU KOMPUTER</div>
            <div>PRODI <?= strtoupper($soal->prodi) ?></div>
        </th>
    </tr>
</table>
<main>
    <div style="font-weight:700; text-align:center; margin: 15px 0 45px 0"><?= strtoupper($soal->jenis . " " . $soal->mk->nama) ?></div>
    <table class="non-border">
        <tr>
            <td class="non-border" style="padding-left: 85px;">Kode Mata Kuliah</td>
            <td class="non-border" style="padding-left: 40px;">:</td>
            <td class="non-border" style="padding-left: 13px;">{{$soal->mk->kode}}</td>
        </tr>
        <tr>
            <td class="non-border" style="padding-left: 85px;">Nama Mata Kuliah</td>
            <td class="non-border" style="padding-left: 40px;">:</td>
            <td class="non-border" style="padding-left: 13px;">{{$soal->mk->nama}}</td>
        </tr>
        <tr>
            <td class="non-border" style="padding-left: 85px;">CPMK</td>
            <td class="non-border" style="padding-left: 40px;">:</td>
            <td class="non-border" style="padding-left: 13px;">
                <ol>
                    @foreach($soal->mk->cpmk as $cpmk)
                        <li>{{$cpmk->judul}}</li>
                    @endforeach
                </ol>
            </td>
        </tr>
        <tr>
            <td class="non-border" style="padding-left: 85px;">Minggu ke-</td>
            <td class="non-border" style="padding-left: 40px;">:</td>
            <td class="non-border" style="padding-left: 13px;">{{$soal->minggu}}</td>
        </tr>
        <tr>
            <td class="non-border" style="padding-left: 85px;">Jenis Ujian</td>
            <td class="non-border" style="padding-left: 40px;">:</td>
            <td class="non-border" style="padding-left: 13px;">{{$soal->jenis}}</td>
        </tr>
        <tr>
            <td class="non-border" style="padding-left: 85px;">Dosen</td>
            <td class="non-border" style="padding-left: 40px;">:</td>
            <td class="non-border" style="padding-left: 13px;">{{$soal->dosen}}</td>
        </tr>
    </table>
    <div style="padding-left:75px; margin-top:35px;">
        <table style="width:100%; text-align:left;">
            <tr>
                <th>Deskripsi Kuis: </th>
            </tr>
            <tr>
                <td style="padding-bottom:15px">
                    @foreach($soal->mk->cpmk as $no=>$cpmk)
                        @if($cpmk->soal->where('jenis',$soal->jenis)->count() > 0)
                            <div class="desc-contain" @if($no > 0) style="margin-top: 15px" @endif>Soal CPMK {{$no+1}}:</div>
                            <ol class="start">
                                    @foreach($cpmk->soal->where('jenis',$soal->jenis) as $sfc)
                                    <li>{{$sfc->pertanyaan}}</li>
                                    @endforeach
                            </ol>
                        @else
                            <div class="desc-contain" @if($no > 0) style="margin-top: 15px" @endif>Soal CPMK {{$no+1}}: -</div>
                        @endif
                    @endforeach
                </td>
            </tr>
        </table>
    </div>
</main>
