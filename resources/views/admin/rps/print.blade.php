<head>
    <meta charset="UTF-8">
    <title>RPS Print</title>
    <style>
        @media print {
            .blue {
                background-color: rgb(221, 235, 247) !important;
                -webkit-print-color-adjust: exact;
            }

            .grey {
                background-color: rgb(234, 234, 234) !important;
                -webkit-print-color-adjust: exact;
            }
        }

        table,
        th,
        td {
            border: 1px solid black;
            border-collapse: collapse;
        }

        .title {
            text-align: center;
            font-family: Cambria;
            background-color: rgb(221, 235, 247);
        }

        .title-sub {
            padding: 0 30px;
        }

        .subtitle {
            background-color: rgb(234, 234, 234);
        }

        .contain {
            font-family: Calibri;
            font-size: 11pt;
            text-align: left;
        }

        .title-cpmk {
            font-family: Calibri;
            font-size: 11pt;
            text-align: center;
        }

        .sub-contain {
            padding-left: 8px;
        }

        .cpmk-contain {
            vertical-align: text-top;
        }

        .note {
            font-family: Calibri;
            font-size: 11pt;
            text-align: left;
            padding: 40px 50px 0 20px;
        }

        .note-list {
            margin-left: -5px;
        }

        .note-contain {
            margin-left: 15px;
        }

        .list-title {
            font-weight: 700;
        }
    </style>
</head>


<table>
    <tr class="title blue">
        <th colspan="2" rowspan="1" style="width:12%" class="title-sub"><img style="width:1.91cm" src="{{asset('/assets/img/logo_unila.png')}}" alt=""></td>
        <th colspan="7" rowspan="1" class="title-sub" style="width:76%;font-size:16pt;">
            <div class="row">
                <div class="col">UNIVERSITAS LAMPUNG</div>
                <div class="col">FAKULTAS MATEMATIKA DAN ILMU PENGETAHUAN ALAM</div>
                <div class="col">JURUSAN ILMU KOMPUTER</div>
            </div>
        </th>
        <th colspan="1" rowspan="1" class="title-sub" style="width:12%;font-size: 12pt; vertical-align: text-top;">
            <div class="row">
                <div class="col">RPS</div>
                <div class="col">3/001</div>
            </div>
        </th>
    </tr>
    <tr class="title blue" style="font-size:14pt">
        <th colspan="10">RENCANA PEMBELAJARAN SEMESTER</th>
    </tr>
    <tr class="contain">
        <th colspan="3" rowspan="1" class="sub-contain subtitle grey" style="width:30%">MATA KULIAH (MK)</th>
        <th colspan="2" rowspan="1" class="sub-contain subtitle grey" style="width:20%">KODE</th>
        <th colspan="1" rowspan="1" class="sub-contain subtitle grey" style="width:17%">Rumpun MK</th>
        <th colspan="2" rowspan="1" class="sub-contain subtitle grey" style="width:13%">Bobot (sks)</th>
        <th colspan="1" rowspan="1" class="sub-contain subtitle grey" style="width:10%">SEMESTER</th>
        <th colspan="1" rowspan="1" class="sub-contain subtitle grey" style="width:10%">Tgl Penyusunan</th>
    </tr>
    @php
    foreach($mks as $mk):
    if($rps->id_mk == $mk->id) {
    $kode_mk = $mk->kode;
    $rumpun_mk = $mk->rumpun;
    $bobot_t = $mk->bobot_teori;
    $bobot_p = $mk->bobot_praktikum;
    $tanggal = $mk->created_at;
    $deskripsi = $mk->deskripsi;
    $prasyarat = $mk->prasyarat;
    $dosen = $mk->dosen;
    $materi = $mk->materi;
    $pustaka_utama = $mk->pustaka_utama;
    $pustaka_pendukung = $mk->pustaka_pendukung;
    }
    endforeach
    @endphp
    <tr class="contain">
        <th colspan="3" rowspan="1" class="sub-contain" style="width: 30%">Nama Mata Kuliah</th>
        <td colspan="2" rowspan="1" class="sub-contain" style="width:20%">{{$kode_mk}}</td>
        <td colspan="1" rowspan="1" class="sub-contain" style="width:17%">Mata Kuliah {{$rumpun_mk}}</td>
        <th colspan="1" rowspan="1" style="width:6.5%; text-align:center">T={{$bobot_t}}</th>
        <th colspan="1" rowspan="1" style="width:6.5%; text-align:center">P={{$bobot_p}}</th>
        <td colspan="1" rowspan="1" style="width:10%; text-align:center"">7</td>
        <td colspan=" 1" rowspan="1" class="sub-contain" style="width:10%">{{date("d-m-Y",strtotime($tanggal))}}</td>
    </tr>
    <tr class="contain">
        <th colspan="3" rowspan="2" class="sub-contain" style="vertical-align:top">OTORISASI</th>
        <th colspan="2" class="subtitle grey" style="text-align:center">Pengembang RPS</th>
        <th colspan="3" class="subtitle grey" style="text-align:center">Koordinator RMK</th>
        <th colspan="2" class="subtitle grey" style="text-align:center">Ketua PRODI</th>
    </tr>
    <tr class="contain">
        <th colspan="2" style="height: 60px;text-align:center;vertical-align:bottom;">{{$rps->pengembang}}</th>
        <th colspan="3" style="height: 60px;text-align:center;vertical-align:bottom;">{{$rps->koordinator}}</th>
        <th colspan="2" style="height: 60px;text-align:center;vertical-align:bottom;">{{$rps->kaprodi}}</th>
    </tr>
    @php
    $no = 0;
    foreach($cplmks as $cplmk):
    if($kode_mk == $cplmk->kode_mk) {
    $no++;
    }
    endforeach
    @endphp
    <tr class="contain">
        <th class="sub-contain" colspan="2" rowspan="{{$no+4}}" style="vertical-align:top">
            <div class="row">
                <div class="col">Capaian</div>
                <div class="col">Pembelajaran (CP)</div>
            </div>
        </th>
        <th class="sub-contain subtitle grey" colspan="8">CPL-PRODI yang dibebankan pada MK</th>
    </tr>
    @foreach($cplmks as $no=>$cplmk)
    @if($kode_mk == $cplmk->kode_mk)
    @foreach($cpls as $cpl)
    @if($cpl->id == $cplmk->id_cpl)
    <tr class="contain">
        <!-- <td class="sub-contain" colspan="0">CPL-{{$no+1}}</td> -->
        <td class="sub-contain" colspan="8">{{$cpl->judul}} ({{$cpl->kode}})</td>
    </tr>
    @endif
    @endforeach
    @endif
    @endforeach
    <tr class="contain">
        <th class="sub-contain subtitle grey" colspan="3">Capaian Pembelajaran Mata Kuliah (CPMK)</th>
        <td class="sub-contain" colspan="5"></td>
    </tr>
    <tr class="contain">
        <td class="sub-contain" colspan="1">CPMK</td>
        <td class="sub-contain" colspan="7">CPMK merupakan turunan/uraian spesifik dari CPL-PRODI yg berkaiatan dengan mata kuliah ini</td>
    </tr>
    <tr class="contain">
        <td class="sub-contain subtitle grey" colspan="3">CPL => Sub-CPMK Sesuai SKKNI</td>
        <td class="sub-contain" colspan="5"></td>
    </tr>
    <!-- <tr class="contain">
            <td class="sub-contain" colspan="1">CPL-1</td>
            <td class="sub-contain" colspan="7">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Quos quisquam voluptatibus minus nam debitis expedita itaque distinctio eius, ipsum esse?</td>
        </tr> -->
    <tr class="contain">
        <th class="sub-contain" colspan="2" rowspan="1" style="vertical-align:top">
            <div class="row">
                <div class="col">Deskripsi Singkat</div>
                <div class="col">MK</div>
            </div>
        </th>
        <td class="sub-contain" colspan="8" style="vertical-align:top"><?= $deskripsi ?></td>
    </tr>
    <tr class="contain">
        <th class="sub-contain" colspan="2" rowspan="1" style="vertical-align:top">
            <div class="row">
                <div class="col">Materi Kajian / </div>
                <div class="col">Materi</div>
                <div class="col">Pembelajaran</div>
            </div>
        </th>
        <td class="sub-contain" colspan="8" style="vertical-align:top"><?= $materi ?></td>
    </tr>
    <tr class="contain">
        <th class="sub-contain" colspan="2" rowspan="4" style="vertical-align:top;">Pustaka</th>
        <th class="sub-contain subtitle grey" colspan="2">Utama :</th>
        <td class="sub-contain" colspan="6" style="vertical-align:top"></td>
    </tr>
    <tr class="contain">
        <td class="sub-contain" colspan="8">{{$pustaka_utama}}</td>
    </tr>
    <tr class="contain">
        <th class="sub-contain subtitle grey" colspan="2">Pendukung :</th>
        <td class="sub-contain" colspan="6" style="vertical-align:top;"></td>
    </tr>
    <tr class="contain">
        <td class="sub-contain" colspan="8">{{$pustaka_pendukung}}</td>
    </tr>
    <tr class="contain">
        <th class="sub-contain" colspan="2" style="vertical-align:top;">Dosen Pengampu</th>
        <td class="sub-contain" colspan="8" style="vertical-align:top">{{$dosen}}</td>
    </tr>
    <tr class="contain">
        <th class="sub-contain" colspan="2" style="vertical-align:top;">Matakuliah syarat</th>
        <td class="sub-contain" colspan="8" style="vertical-align:top">{{$prasyarat}}</td>
    </tr>
    <tr class="title-cpmk grey">
        <th colspan="1" rowspan="2" style="width: 0.1%;">Mg Ke-</th>
        <th colspan="2" rowspan="2" style="width: 10%;">
            <div class="row">
                <div class="col">Sub-CPMK</div>
                <div class="col">(Kemampuan akhir tiap</div>
                <div class="col">tahapan belajar)</div>
            </div>
        </th>
        <th colspan="2">Penilaian</th>
        <th colspan="3" style="width:15%">
            <div class="row">
                <div class="col">Bantuk Pembelajaran,</div>
                <div class="col">Metode Pembelajaran, </div>
                <div class="col">Penugasan Mahasiswa,</div>
                <div class="col" style="color:blue">[ Estimasi Waktu]</div>
            </div>
        </th>
        <th colspan="1" rowspan="2" style="width:10%">
            <div class="row">
                <div class="col">Materi</div>
                <div class="col">Pembelajaran</div>
                <div class="col" style="color:blue">[ Pustaka ]</div>
            </div>
        </th>
        <th colspan="1" rowspan="2" style="width:1%">
            <div class="row">
                <div class="col">Bobot</div>
                <div class="col">Penilaian</div>
                <div class="col">(%)</div>
            </div>
        </th>
    </tr>
    <tr class="title-cpmk grey">
        <th colspan="1" style="width:10%">Indikator</th>
        <th colspan="1">Kriteria & Bentuk</th>
        <th colspan="1">Luring (<em>offline</em>)</th>
        <th colspan="2">Daring (<em>online</em>)</th>
    </tr>
    <tr class="title-cpmk grey">
        <th colspan="1">(1)</th>
        <th colspan="2">(2)</th>
        <th colspan="1">(3)</th>
        <th colspan="1">(4)</th>
        <th colspan="1">(5)</th>
        <th colspan="2">(6)</th>
        <th colspan="1">(7)</th>
        <th colspan="1">(8)</th>
    </tr>
    @foreach($activities as $activity)
    @if($activity->id_rps == $rps->id)
    @if((int)$activity->minggu < 8)
    <tr class="contain">
        <td class="title-cpmk cpmk-contain" colspan="1">{{$activity->minggu}}</td>
        <td class="cpmk-contain sub-contain" colspan="2">{{$activity->sub_cpmk}}</td>
        <td class="cpmk-contain" colspan="1"><?=$activity->indikator?></td>
        <td class="cpmk-contain sub-contain" colspan="1">{{$activity->kriteria}}</td>
        <td class="cpmk-contain" colspan="1">{{$activity->metode_luring}}</td>
        <td class="cpmk-contain" colspan="2">{{$activity->metode_daring}}</td>
        <td class="cpmk-contain sub-contain" colspan="1">{{$activity->materi}}</td>
        <td class="cpmk-contain sub-contain" colspan="1">{{$activity->bobot}}</td>
    </tr>
    @endif
    @endif
    @endforeach
    <!-- <tr class="contain">
            <td class="title-cpmk cpmk-contain" colspan="1">2</td>
            <td class="cpmk-contain sub-contain" colspan="2">Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptate, labore eos aliquid necessitatibus laborum odit!</td>
            <td class="cpmk-contain" colspan="1">
                <ul>
                    <li>Lorem, ipsum dolor.</li>
                    <li>Lorem ipsum dolor sit amet.</li>
                </ul>
            </td>
            <td class="cpmk-contain sub-contain" colspan="1">Lorem, ipsum dolor.</td>
            <td class="cpmk-contain" colspan="1">
                <ul>
                    <li>Lorem.</li>
                    <li>Lorem, ipsum.</li>
                </ul>
            </td>
            <td class="cpmk-contain" colspan="2">
                <ul>
                    <li>Lorem.</li>
                    <li>Lorem, ipsum.</li>
                </ul>
            </td>
            <td class="cpmk-contain sub-contain" colspan="1">Lorem ipsum dolor sit.</td>
            <td class="cpmk-contain sub-contain" colspan="1"></td>
        </tr>
        <tr class="contain">
            <td class="title-cpmk cpmk-contain" colspan="1">3</td>
            <td class="cpmk-contain sub-contain" colspan="2">Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptate, labore eos aliquid necessitatibus laborum odit!</td>
            <td class="cpmk-contain" colspan="1">
                <ul>
                    <li>Lorem, ipsum dolor.</li>
                    <li>Lorem ipsum dolor sit amet.</li>
                </ul>
            </td>
            <td class="cpmk-contain sub-contain" colspan="1">Lorem, ipsum dolor.</td>
            <td class="cpmk-contain" colspan="1">
                <ul>
                    <li>Lorem.</li>
                    <li>Lorem, ipsum.</li>
                </ul>
            </td>
            <td class="cpmk-contain" colspan="2">
                <ul>
                    <li>Lorem.</li>
                    <li>Lorem, ipsum.</li>
                </ul>
            </td>
            <td class="cpmk-contain sub-contain" colspan="1">Lorem ipsum dolor sit.</td>
            <td class="cpmk-contain sub-contain" colspan="1"></td>
        </tr>
        <tr class="contain">
            <td class="title-cpmk cpmk-contain" colspan="1">4</td>
            <td class="cpmk-contain sub-contain" colspan="2">Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptate, labore eos aliquid necessitatibus laborum odit!</td>
            <td class="cpmk-contain" colspan="1">
                <ul>
                    <li>Lorem, ipsum dolor.</li>
                    <li>Lorem ipsum dolor sit amet.</li>
                </ul>
            </td>
            <td class="cpmk-contain sub-contain" colspan="1">Lorem, ipsum dolor.</td>
            <td class="cpmk-contain" colspan="1">
                <ul>
                    <li>Lorem.</li>
                    <li>Lorem, ipsum.</li>
                </ul>
            </td>
            <td class="cpmk-contain" colspan="2">
                <ul>
                    <li>Lorem.</li>
                    <li>Lorem, ipsum.</li>
                </ul>
            </td>
            <td class="cpmk-contain sub-contain" colspan="1">Lorem ipsum dolor sit.</td>
            <td class="cpmk-contain sub-contain" colspan="1"></td>
        </tr>
        <tr class="contain">
            <td class="title-cpmk cpmk-contain" colspan="1">5</td>
            <td class="cpmk-contain sub-contain" colspan="2">Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptate, labore eos aliquid necessitatibus laborum odit!</td>
            <td class="cpmk-contain" colspan="1">
                <ul>
                    <li>Lorem, ipsum dolor.</li>
                    <li>Lorem ipsum dolor sit amet.</li>
                </ul>
            </td>
            <td class="cpmk-contain sub-contain" colspan="1">Lorem, ipsum dolor.</td>
            <td class="cpmk-contain" colspan="1">
                <ul>
                    <li>Lorem.</li>
                    <li>Lorem, ipsum.</li>
                </ul>
            </td>
            <td class="cpmk-contain" colspan="2">
                <ul>
                    <li>Lorem.</li>
                    <li>Lorem, ipsum.</li>
                </ul>
            </td>
            <td class="cpmk-contain sub-contain" colspan="1">Lorem ipsum dolor sit.</td>
            <td class="cpmk-contain sub-contain" colspan="1"></td>
        </tr>
        <tr class="contain">
            <td class="title-cpmk cpmk-contain" colspan="1">6</td>
            <td class="cpmk-contain sub-contain" colspan="2">Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptate, labore eos aliquid necessitatibus laborum odit!</td>
            <td class="cpmk-contain" colspan="1">
                <ul>
                    <li>Lorem, ipsum dolor.</li>
                    <li>Lorem ipsum dolor sit amet.</li>
                </ul>
            </td>
            <td class="cpmk-contain sub-contain" colspan="1">Lorem, ipsum dolor.</td>
            <td class="cpmk-contain" colspan="1">
                <ul>
                    <li>Lorem.</li>
                    <li>Lorem, ipsum.</li>
                </ul>
            </td>
            <td class="cpmk-contain" colspan="2">
                <ul>
                    <li>Lorem.</li>
                    <li>Lorem, ipsum.</li>
                </ul>
            </td>
            <td class="cpmk-contain sub-contain" colspan="1">Lorem ipsum dolor sit.</td>
            <td class="cpmk-contain sub-contain" colspan="1"></td>
        </tr>
        <tr class="contain">
            <td class="title-cpmk cpmk-contain" colspan="1">7</td>
            <td class="cpmk-contain sub-contain" colspan="2">Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptate, labore eos aliquid necessitatibus laborum odit!</td>
            <td class="cpmk-contain" colspan="1">
                <ul>
                    <li>Lorem, ipsum dolor.</li>
                    <li>Lorem ipsum dolor sit amet.</li>
                </ul>
            </td>
            <td class="cpmk-contain sub-contain" colspan="1">Lorem, ipsum dolor.</td>
            <td class="cpmk-contain" colspan="1">
                <ul>
                    <li>Lorem.</li>
                    <li>Lorem, ipsum.</li>
                </ul>
            </td>
            <td class="cpmk-contain" colspan="2">
                <ul>
                    <li>Lorem.</li>
                    <li>Lorem, ipsum.</li>
                </ul>
            </td>
            <td class="cpmk-contain sub-contain" colspan="1">Lorem ipsum dolor sit.</td>
            <td class="cpmk-contain sub-contain" colspan="1"></td>
        </tr> -->
    <tr class="contain">
        <td class="title-cpmk cpmk-contain" colspan="1">8</td>
        <th class="title-cpmk cpmk-contain" colspan="9">Ujian Tengah Semester</th>
    </tr>
    <!-- <tr class="contain">
            <td class="title-cpmk cpmk-contain" colspan="1">9</td>
            <td class="cpmk-contain sub-contain" colspan="2">Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptate, labore eos aliquid necessitatibus laborum odit!</td>
            <td class="cpmk-contain" colspan="1">
                <ul>
                    <li>Lorem, ipsum dolor.</li>
                    <li>Lorem ipsum dolor sit amet.</li>
                </ul>
            </td>
            <td class="cpmk-contain sub-contain" colspan="1">Lorem, ipsum dolor.</td>
            <td class="cpmk-contain" colspan="1">
                <ul>
                    <li>Lorem.</li>
                    <li>Lorem, ipsum.</li>
                </ul>
            </td>
            <td class="cpmk-contain" colspan="2">
                <ul>
                    <li>Lorem.</li>
                    <li>Lorem, ipsum.</li>
                </ul>
            </td>
            <td class="cpmk-contain sub-contain" colspan="1">Lorem ipsum dolor sit.</td>
            <td class="cpmk-contain sub-contain" colspan="1"></td>
        </tr>
        <tr class="contain">
            <td class="title-cpmk cpmk-contain" colspan="1">10</td>
            <td class="cpmk-contain sub-contain" colspan="2">Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptate, labore eos aliquid necessitatibus laborum odit!</td>
            <td class="cpmk-contain" colspan="1">
                <ul>
                    <li>Lorem, ipsum dolor.</li>
                    <li>Lorem ipsum dolor sit amet.</li>
                </ul>
            </td>
            <td class="cpmk-contain sub-contain" colspan="1">Lorem, ipsum dolor.</td>
            <td class="cpmk-contain" colspan="1">
                <ul>
                    <li>Lorem.</li>
                    <li>Lorem, ipsum.</li>
                </ul>
            </td>
            <td class="cpmk-contain" colspan="2">
                <ul>
                    <li>Lorem.</li>
                    <li>Lorem, ipsum.</li>
                </ul>
            </td>
            <td class="cpmk-contain sub-contain" colspan="1">Lorem ipsum dolor sit.</td>
            <td class="cpmk-contain sub-contain" colspan="1"></td>
        </tr>
        <tr class="contain">
            <td class="title-cpmk cpmk-contain" colspan="1">11</td>
            <td class="cpmk-contain sub-contain" colspan="2">Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptate, labore eos aliquid necessitatibus laborum odit!</td>
            <td class="cpmk-contain" colspan="1">
                <ul>
                    <li>Lorem, ipsum dolor.</li>
                    <li>Lorem ipsum dolor sit amet.</li>
                </ul>
            </td>
            <td class="cpmk-contain sub-contain" colspan="1">Lorem, ipsum dolor.</td>
            <td class="cpmk-contain" colspan="1">
                <ul>
                    <li>Lorem.</li>
                    <li>Lorem, ipsum.</li>
                </ul>
            </td>
            <td class="cpmk-contain" colspan="2">
                <ul>
                    <li>Lorem.</li>
                    <li>Lorem, ipsum.</li>
                </ul>
            </td>
            <td class="cpmk-contain sub-contain" colspan="1">Lorem ipsum dolor sit.</td>
            <td class="cpmk-contain sub-contain" colspan="1"></td>
        </tr>
        <tr class="contain">
            <td class="title-cpmk cpmk-contain" colspan="1">12</td>
            <td class="cpmk-contain sub-contain" colspan="2">Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptate, labore eos aliquid necessitatibus laborum odit!</td>
            <td class="cpmk-contain" colspan="1">
                <ul>
                    <li>Lorem, ipsum dolor.</li>
                    <li>Lorem ipsum dolor sit amet.</li>
                </ul>
            </td>
            <td class="cpmk-contain sub-contain" colspan="1">Lorem, ipsum dolor.</td>
            <td class="cpmk-contain" colspan="1">
                <ul>
                    <li>Lorem.</li>
                    <li>Lorem, ipsum.</li>
                </ul>
            </td>
            <td class="cpmk-contain" colspan="2">
                <ul>
                    <li>Lorem.</li>
                    <li>Lorem, ipsum.</li>
                </ul>
            </td>
            <td class="cpmk-contain sub-contain" colspan="1">Lorem ipsum dolor sit.</td>
            <td class="cpmk-contain sub-contain" colspan="1"></td>
        </tr>
        <tr class="contain">
            <td class="title-cpmk cpmk-contain" colspan="1">13</td>
            <td class="cpmk-contain sub-contain" colspan="2">Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptate, labore eos aliquid necessitatibus laborum odit!</td>
            <td class="cpmk-contain" colspan="1">
                <ul>
                    <li>Lorem, ipsum dolor.</li>
                    <li>Lorem ipsum dolor sit amet.</li>
                </ul>
            </td>
            <td class="cpmk-contain sub-contain" colspan="1">Lorem, ipsum dolor.</td>
            <td class="cpmk-contain" colspan="1">
                <ul>
                    <li>Lorem.</li>
                    <li>Lorem, ipsum.</li>
                </ul>
            </td>
            <td class="cpmk-contain" colspan="2">
                <ul>
                    <li>Lorem.</li>
                    <li>Lorem, ipsum.</li>
                </ul>
            </td>
            <td class="cpmk-contain sub-contain" colspan="1">Lorem ipsum dolor sit.</td>
            <td class="cpmk-contain sub-contain" colspan="1"></td>
        </tr>
        <tr class="contain">
            <td class="title-cpmk cpmk-contain" colspan="1">14</td>
            <td class="cpmk-contain sub-contain" colspan="2">Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptate, labore eos aliquid necessitatibus laborum odit!</td>
            <td class="cpmk-contain" colspan="1">
                <ul>
                    <li>Lorem, ipsum dolor.</li>
                    <li>Lorem ipsum dolor sit amet.</li>
                </ul>
            </td>
            <td class="cpmk-contain sub-contain" colspan="1">Lorem, ipsum dolor.</td>
            <td class="cpmk-contain" colspan="1">
                <ul>
                    <li>Lorem.</li>
                    <li>Lorem, ipsum.</li>
                </ul>
            </td>
            <td class="cpmk-contain" colspan="2">
                <ul>
                    <li>Lorem.</li>
                    <li>Lorem, ipsum.</li>
                </ul>
            </td>
            <td class="cpmk-contain sub-contain" colspan="1">Lorem ipsum dolor sit.</td>
            <td class="cpmk-contain sub-contain" colspan="1"></td>
        </tr>
        <tr class="contain">
            <td class="title-cpmk cpmk-contain" colspan="1">15</td>
            <td class="cpmk-contain sub-contain" colspan="2">Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptate, labore eos aliquid necessitatibus laborum odit!</td>
            <td class="cpmk-contain" colspan="1">
                <ul>
                    <li>Lorem, ipsum dolor.</li>
                    <li>Lorem ipsum dolor sit amet.</li>
                </ul>
            </td>
            <td class="cpmk-contain sub-contain" colspan="1">Lorem, ipsum dolor.</td>
            <td class="cpmk-contain" colspan="1">
                <ul>
                    <li>Lorem.</li>
                    <li>Lorem, ipsum.</li>
                </ul>
            </td>
            <td class="cpmk-contain" colspan="2">
                <ul>
                    <li>Lorem.</li>
                    <li>Lorem, ipsum.</li>
                </ul>
            </td>
            <td class="cpmk-contain sub-contain" colspan="1">Lorem ipsum dolor sit.</td>
            <td class="cpmk-contain sub-contain" colspan="1"></td>
        </tr>
        <tr class="contain"> -->
    <td class="title-cpmk cpmk-contain" colspan="1">16</td>
    <th class="title-cpmk cpmk-contain" colspan="9">Ujian Akhir Semester</th>
    </tr>
</table>
<div class="note">
    <div style="font-weight:700; text-decoration:underline">Catatan :</div>
    <ol>
        <li class="note-list">
            <div class="note-contain">
                <span class="list-title">Capaian Pembelajaran Lulusan PRODI (CPL-PRODI) </span>
                <span class="list-contain">adalah kemampuan yang dimiliki oleh setiap lulusan PRODI yang merupakan internalisasi dari sikap, penguasaan pengetahuan dan ketrampilan sesuai dengan jenjang prodinya yang diperoleh melalui proses pembelajaran.</span>
            </div>
        </li>
        <li class="note-list">
            <div class="note-contain">
                <span class="list-title">CPL yang dibebankan pada mata kuliah </span>
                <span class="list-contain">adalah beberapa capaian pembelajaran lulusan program studi (CPL-PRODI) yang digunakan untuk pembentukan/pengembangan sebuah mata kuliah yang terdiri dari aspek sikap, ketrampulan umum, ketrampilan khusus dan pengetahuan.</span>
            </div>
        </li>
        <li class="note-list">
            <div class="note-contain">
                <span class="list-title">CP Mata kuliah (CPMK) </span>
                <span class="list-contain">adalah kemampuan yang dijabarkan secara spesifik dari CPL yang dibebankan pada mata kuliah, dan bersifat spesifik terhadap bahan kajian atau materi pembelajaran mata kuliah tersebut.</span>
            </div>
        </li>
        <li class="note-list">
            <div class="note-contain">
                <span class="list-title">Sub-CP Mata kuliah (Sub-CPMK) </span>
                <span class="list-contain">adalah kemampuan yang dijabarkan secara spesifik dari CPMK yang dapat diukur atau diamati dan merupakan kemampuan akhir yang direncanakan pada tiap tahap pembelajaran, dan bersifat spesifik terhadap materi pembelajaran mata kuliah tersebut.</span>
            </div>
        </li>
        <li class="note-list">
            <div class="note-contain">
                <span class="list-title">Indikator penilaian </span>
                <span class="list-contain">kemampuan dalam proses maupun hasil belajar mahasiswa adalah pernyataan spesifik dan terukur yang mengidentifikasi kemampuan atau kinerja hasil belajar mahasiswa yang disertai bukti-bukti.</span>
            </div>
        </li>
        <li class="note-list">
            <div class="note-contain">
                <span class="list-title">Kreteria Penilaian </span>
                <span class="list-contain">adalah patokan yang digunakan sebagai ukuran atau tolok ukur ketercapaian pembelajaran dalam penilaian berdasarkan indikator-indikator yang telah ditetapkan. Kreteria penilaian merupakan pedoman bagi penilai agar penilaian konsisten dan tidak bias. Kreteria dapat berupa kuantitatif ataupun kualitatif.</span>
            </div>
        </li>
        <li class="note-list">
            <div class="note-contain">
                <span class="list-title">Bentuk penilaian: </span>
                <span class="list-contain">tes dan non-tes.</span>
            </div>
        </li>
        <li class="note-list">
            <div class="note-contain">
                <span class="list-title">Bentuk pembelajaran: </span>
                <span class="list-contain">Kuliah, Responsi, Tutorial, Seminar atau yang setara, Praktikum, Praktik Studio, Praktik Bengkel, Praktik Lapangan, Penelitian, Pengabdian Kepada Masyarakat dan/atau bentuk pembelajaran lain yang setara.</span>
            </div>
        </li>
        <li class="note-list">
            <div class="note-contain">
                <span class="list-title">Metode Pembelajaran: </span>
                <span class="list-contain">Small Group Discussion, Role-Play & Simulation, Discovery Learning, Self-Directed Learning, Cooperative Learning, Collaborative Learning, Contextual Learning, Project Based Learning, dan metode lainnya yg setara.</span>
            </div>
        </li>
        <li class="note-list">
            <div class="note-contain">
                <span class="list-title">Materi Pembelajaran </span>
                <span class="list-contain">adalah rincian atau uraian dari bahan kajian yg dapat disajikan dalam bentuk beberapa pokok dan sub-pokok bahasan.</span>
            </div>
        </li>
        <li class="note-list">
            <div class="note-contain">
                <span class="list-title">Bobot penilaian </span>
                <span class="list-contain">adalah prosentasi penilaian terhadap setiap pencapaian sub-CPMK yang besarnya proposional dengan tingkat kesulitan pencapaian sub-CPMK tsb., dan totalnya 100%.</span>
            </div>
        </li>
        <li class="note-list">
            <div class="note-contain">
                <span class="list-contain">TM=Tatap Muka, PT=Penugasan terstruktur, BM=Belajar mandiri.</span>
            </div>
        </li>
    </ol>
</div>
<script>
    window.print();
</script>