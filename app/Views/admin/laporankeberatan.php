<!DOCTYPE html>
<html>

<head>
    <style>
        #customers {
            font-family: Arial, Helvetica, sans-serif;
            border-collapse: collapse;
            width: 100%;
        }

        #customers td,
        #customers th {
            border: 1px solid #ddd;
            padding: 8px;
        }

        #customers tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        #customers tr:hover {
            background-color: #ddd;
        }

        #customers th {
            padding-top: 12px;
            padding-bottom: 12px;
            text-align: left;
            background-color: #04AA6D;
            color: white;
        }

        h1,
        h3 {
            text-align: center;
        }

        h3 {
            margin-top: 0px;
        }

        h1 {
            margin-bottom: 0px;
        }

        .footer1 {
            float: left;

            width: 45%;
            /* background-color: ; */
            margin-left: 5px;
            padding: 20px;
            font-size: 1rem;

        }




        .footer4 {
            /* float: right; */

            width: 45%;
            /* background-color: ; */

            padding: 20px;
            font-size: 1rem;

        }

        .space {

            height: 8%;
        }

        .pejabat {
            text-align: center;
            margin: 0px 20px;
        }
    </style>
</head>

<body>

    <h1>Laporan Permohonan Informasi</h1>
    <h3>Bulan <?= $bulan; ?> Tahun <?= $tahun; ?></h3>


    <table id="customers">
        <thead>

            <tr>
                <th rowspan="2" style="text-align: center;">Jenis Informasi</th>
                <th rowspan="2" style="text-align: center;">Jumlah Permohonan Keberatan</th>
                <th style="text-align: center;" colspan="2">Tanggapan Atasan PPID atas Keberatan</th>
                <th style="text-align: center;" rowspan="2">Penyelesaian sengketa ke Komisi Informasi</th>
                <th style="text-align: center;" colspan="2">Hasil Mediasi di Komisi Informasi</th>
                <th style="text-align: center;" colspan="2">Status putusan komisi informasi</th>

            </tr>
            <tr>
                <th style="text-align: center;">Menerima</th>
                <th style="text-align: center;">Menolak</th>
                <th style="text-align: center;">Berhasil</th>
                <th style="text-align: center;">Gagal</th>
                <th style="text-align: center;">Menguatkan Pengadilan</th>
                <th style="text-align: center;">Menguatkan Pemohon Informasi</th>
            </tr>
        </thead>
        <tbody>

            <tr>
                <td>Perkara dan putusan</td>
                <td style="text-align: center;"><?= $jml_keberatan_perkara[0] ?: '-'; ?></td>
                <td style="text-align: center;"><?= $jml_keberatan_perkara[1] ?: '-'; ?></td>
                <td style="text-align: center;"><?= $jml_keberatan_perkara[2] ?: '-'; ?></td>
                <td style="text-align: center;"><?= $komisi_perkara[0] ?: '-'; ?></td>
                <td style="text-align: center;"><?= $komisi_perkara[1] ?: '-'; ?></td>
                <td style="text-align: center;"><?= $komisi_perkara[2] ?: '-'; ?></td>
                <td style="text-align: center;"><?= $komisi_perkara[3] ?: '-'; ?></td>
                <td style="text-align: center;"><?= $komisi_perkara[4] ?: '-'; ?></td>


            </tr>
            <tr>
                <td>Kepegawaian</td>
                <td style="text-align: center;"><?= $jml_keberatan_kepegawaian[0] ?: '-'; ?></td>

                <td style="text-align: center;"><?= $jml_keberatan_kepegawaian[1] ?: '-'; ?></td>
                <td style="text-align: center;"><?= $jml_keberatan_kepegawaian[2] ?: '-'; ?></td>
                <td style="text-align: center;"><?= $komisi_kepegawaian[0] ?: '-'; ?></td>
                <td style="text-align: center;"><?= $komisi_kepegawaian[1] ?: '-'; ?></td>
                <td style="text-align: center;"><?= $komisi_kepegawaian[2] ?: '-'; ?></td>
                <td style="text-align: center;"><?= $komisi_kepegawaian[3] ?: '-'; ?></td>
                <td style="text-align: center;"><?= $komisi_kepegawaian[4] ?: '-'; ?></td>


            </tr>
            <tr>
                <td>Pengawasan</td>
                <td style="text-align: center;"><?= $jml_keberatan_pengawasan[0] ?: '-'; ?></td>

                <td style="text-align: center;"><?= $jml_keberatan_pengawasan[1] ?: '-'; ?></td>
                <td style="text-align: center;"><?= $jml_keberatan_pengawasan[2] ?: '-'; ?></td>
                <td style="text-align: center;"><?= $komisi_pengawasan[0] ?: '-'; ?></td>
                <td style="text-align: center;"><?= $komisi_pengawasan[1] ?: '-'; ?></td>
                <td style="text-align: center;"><?= $komisi_pengawasan[2] ?: '-'; ?></td>
                <td style="text-align: center;"><?= $komisi_pengawasan[3] ?: '-'; ?></td>
                <td style="text-align: center;"><?= $komisi_pengawasan[4] ?: '-'; ?></td>
            </tr>
            <tr>
                <td>Anggaran dan Aset</td>
                <td style="text-align: center;"><?= $jml_keberatan_anggaran[0] ?: '-'; ?></td>

                <td style="text-align: center;"><?= $jml_keberatan_anggaran[1] ?: '-'; ?></td>
                <td style="text-align: center;"><?= $jml_keberatan_anggaran[2] ?: '-'; ?></td>
                <td style="text-align: center;"><?= $komisi_anggaran[0] ?: '-'; ?></td>
                <td style="text-align: center;"><?= $komisi_anggaran[1] ?: '-'; ?></td>
                <td style="text-align: center;"><?= $komisi_anggaran[2] ?: '-'; ?></td>
                <td style="text-align: center;"><?= $komisi_anggaran[3] ?: '-'; ?></td>
                <td style="text-align: center;"><?= $komisi_anggaran[4] ?: '-'; ?></td>
            </tr>
            <tr>
                <td>Lainnya</td>
                <td style="text-align: center;"><?= $jml_keberatan_lainnya[0] ?: '-'; ?></td>

                <td style="text-align: center;"><?= $jml_keberatan_lainnya[1] ?: '-'; ?></td>
                <td style="text-align: center;"><?= $jml_keberatan_lainnya[2] ?: '-'; ?></td>
                <td style="text-align: center;"><?= $komisi_lainnya[0] ?: '-'; ?></td>
                <td style="text-align: center;"><?= $komisi_lainnya[1] ?: '-'; ?></td>
                <td style="text-align: center;"><?= $komisi_lainnya[2] ?: '-'; ?></td>
                <td style="text-align: center;"><?= $komisi_lainnya[3] ?: '-'; ?></td>
                <td style="text-align: center;"><?= $komisi_lainnya[4] ?: '-'; ?></td>
            </tr>

        </tbody>


    </table>
    <div>

        <div class="footer1">
            <div>
                <br>
                <p class="pejabat"><?= $sekretaris['jabatan']; ?></p>


            </div>
            <div class="space">

            </div>
            <div>
                <p class="pejabat"><?= $sekretaris['nama']; ?></p>
                <p class="pejabat">NIP. <?= $sekretaris['nip']; ?></p>


            </div>
        </div>

        <div class="footer4">
            <div>
                <p class="pejabat"><?= $kota; ?>, <?= $tanggal; ?></p>
                <p class="pejabat"><?= $panitera['jabatan']; ?></p>


            </div>
            <div class="space">

            </div>
            <div>
                <p class="pejabat"><?= $panitera['nama']; ?></p>
                <p class="pejabat">NIP. <?= $panitera['nip']; ?></p>


            </div>
        </div>
    </div>
</body>

</html>