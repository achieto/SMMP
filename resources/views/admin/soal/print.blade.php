<style>
    @media print {
        .blue {
            background-color: rgb(221, 235, 247) !important;
            -webkit-print-color-adjust: exact;
        }
    }

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
<style type="text/css" media="print">
    @page {
        size: portrait;
    }
</style>

<table style="width:100%; height:3cm">
    <tr class="blue header" style="vertical-align: top;">
        <th colspan="1"><img style="width:1.91cm; padding: 12px 6px 0 6px" src="{{asset('/assets/img/logo_unila.png')}}" alt=""></th>
        <th>
            <div>UNIVERSITAS LAMPUNG</div>
            <div>FAKULTAS MATEMATIKA DAN ILMU PENGETAHUAN ALAM</div>
            <div>JURUSAN ILMU KOMPUTER</div>
            <div>PRODI D3 MANAJEMEN INFORMATIKA</div>
        </th>
    </tr>
</table>
<main>
    <div style="font-weight:700; text-align:center; margin: 15px 0 45px 0">KUIS MATA KULIAH</div>
    <table class="non-border">
        <tr>
            <td class="non-border" style="padding-left: 85px;">Kode Mata Kuliah</td>
            <td class="non-border" style="padding-left: 40px;">:</td>
            <td class="non-border" style="padding-left: 13px;">COM010101</td>
        </tr>
        <tr>
            <td class="non-border" style="padding-left: 85px;">Nama Mata Kuliah</td>
            <td class="non-border" style="padding-left: 40px;">:</td>
            <td class="non-border" style="padding-left: 13px;">Proyek Dadakan</td>
        </tr>
        <tr>
            <td class="non-border" style="padding-left: 85px;">Sub-CPMK</td>
            <td class="non-border" style="padding-left: 40px;">:</td>
            <td class="non-border" style="padding-left: 13px;">
                <ol>
                    <li>......</li>
                    <li>......</li>
                </ol>
            </td>
        </tr>
        <tr>
            <td class="non-border" style="padding-left: 85px;">Minggu ke-</td>
            <td class="non-border" style="padding-left: 40px;">:</td>
            <td class="non-border" style="padding-left: 13px;">15</td>
        </tr>
        <tr>
            <td class="non-border" style="padding-left: 85px;">Jenis Ujian</td>
            <td class="non-border" style="padding-left: 40px;">:</td>
            <td class="non-border" style="padding-left: 13px;">Kuis ke-</td>
        </tr>
        <tr>
            <td class="non-border" style="padding-left: 85px;">Dosen</td>
            <td class="non-border" style="padding-left: 40px;">:</td>
            <td class="non-border" style="padding-left: 13px;">Sensei-san</td>
        </tr>
    </table>
    <div style="padding-left:75px; margin-top:35px;">
        <table style="width:100%; text-align:left;">
            <tr>
                <th>Deskripsi Kuis:</th>
            </tr>
            <tr>
                <td style="padding-bottom:15px">
                    <div class="desc-contain">Soal Sub-CPMK 1:</div>
                    <ol class="start">
                        <li>........</li>
                        <li>........</li>
                        <li>........</li>
                    </ol>
                    <div class="desc-contain" style="margin-top: 15px">Soal Sub-CPMK 2,3:</div>
                    <ol class="continue">
                        <li>........</li>
                        <li>........</li>
                        <li>........</li>
                    </ol>
                    <div class="desc-contain" style="margin-top:15px">Dst....</div>
                </td>
            </tr>
        </table>
    </div>
</main>


<script>
    window.print();
</script>