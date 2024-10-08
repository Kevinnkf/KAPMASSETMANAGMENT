<!DOCTYPE html>
<html>

<head>
    <link id="themeColors" rel="stylesheet" href="{{ asset('assets/dist/css/style.min.css') }}" />
    <title>Cetak Presensi</title>
</head>

<body>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
            font-family: Arial, sans-serif;
            border: 1px solid black;
            /* Border luar */
        }

        th,
        td {
            padding: 7px 0 0 50px;
            text-align: left;
        }

        th {
            background-color: #cce5ff;
            text-align: center;
            border-bottom: 1px solid black;
            /* Hanya border bawah */
        }

        td {
            vertical-align: top;
            border-bottom: 1px solid black;
            /* Border horizontal */
        }

        tr:first-child th,
        tr:first-child td {
            border-top: 1px solid black;
            /* Border atas */
        }

        tr:last-child td {
            border-bottom: 1px solid black;
            /* Border bawah pada baris terakhir */
        }

        /* Menghilangkan border vertikal di tengah */
        td:first-child,
        th:first-child {
            border-left: 1px solid black;
            /* Border kiri untuk elemen pertama di baris */
        }

        td:last-child,
        th:last-child {
            border-right: 1px solid black;
            /* Border kanan untuk elemen terakhir di baris */
        }

        .header-title {
            background-color: #cce5ff;
            font-weight: bold;
            text-align: center;
            font-size: 16px;
            padding: 20px 0;
        }

        .section-title {
            background-color: #cce5ff;
            font-weight: bold;
            text-align: center;
        }

        /* QR Code styling */
        .qr-code {
            text-align: center;
        }

        .qr-code img {
            width: 100px;
            height: 100px;
        }

        .signature-table {
            width: 85%;
            margin-left: auto;
            margin-right: auto;
            border-collapse: collapse;
            padding-bottom: 20px;
            /* Sesuaikan nilai padding sesuai kebutuhan */
        }

        .signature-table th,
        .signature-table td {
            border: 1px solid black;
            padding: 10px;
            text-align: center;
        }

        .signature-table th {
            background-color: #ffffff;
        }
    </style>
    <div class="card w-100">
        <div class="card-body">
            <table>
                <tr>
                    <td colspan="2" class="header-title">SURAT IZIN DATANG TERLAMBAT / PULANG CEPAT</td>
                </tr>
                <tr class="section-title">
                    <td colspan="2">DATA PEGAWAI</td>
                </tr>
                <tr class="no-border-between">
                    <td>Nama</td>
                    <td>DARUSSALAM</td>
                </tr>
                <tr class="no-border-between">
                    <td>NIPP</td>
                    <td>22222</td>
                </tr>
                <tr class="no-border-between">
                    <td>Jabatan</td>
                    <td>Staff</td>
                </tr>
                <tr class="no-border-between">
                    <td>Unit Kerja</td>
                    <td>UPT Resor Jalan Rel 3.15 Ciledug</td>
                </tr>
                <tr class="section-title">
                    <td colspan="2">DATA IZIN</td>
                </tr>
                <tr class="no-border-between">
                    <td>Jenis Izin</td>
                    <td>Izin Pulang Cepat</td>
                </tr>
                <tr class="no-border-between">
                    <td>Tanggal</td>
                    <td>17/09/2024</td>
                </tr>
                <tr class="no-border-between">
                    <td>Jam</td>
                    <td>10:00:00 WIB</td>
                </tr>
                <tr class="no-border-between">
                    <td>No Telepon</td>
                    <td>082115500778</td>
                </tr>
                <tr class="no-border-between">
                    <td>Alasan</td>
                    <td>Keperluan Keluarga</td>
                </tr>
                <tr class="section-title">
                    <td colspan="2">PERSETUJUAN CUTI</td>
                </tr>
                <tr class="no-border-between">
                    <td>NIPP Atasan</td>
                    <td>11111</td>
                </tr>
                <tr class="no-border-between">
                    <td>Nama Atasan</td>
                    <td>DINDA FITRI SAFIRA</td>
                </tr>
                <tr class="no-border-between">
                    <td>Jabatan</td>
                    <td>Pjt. Specialist of Design</td>
                </tr>
                <tr class="no-border-between">
                    <td>Tanggal Disetujui</td>
                    <td>16/09/2024</td>
                </tr>
                <tr>
                    <td style="padding: 30px 0;" colspan="2">
                        <table class="signature-table">
                            <tr>
                                <th>Pemohon</th>
                                <th>Pjbt yang memberikan izin</th>
                                <th>Pjbt yg menandatangani izin</th>
                            </tr>
                            <!-- Baris 1 -->
                            <tr>
                                <td style="text-align: left">
                                    Tgl, 11/09/2024<br>
                                </td>
                                <td style="text-align: left">
                                    Tgl, 16/09/2024
                                </td>
                                <td style="text-align: left">
                                    Tgl, 17/09/2024
                                </td>
                            </tr>
                            <!-- Baris 2 -->
                            <tr>
                                <td>
                                </td>
                                <td style="text-align: left">
                                    Jabatan : Supervisor
                                </td>
                                <td style="text-align: left">
                                    Jabatan :
                                </td>
                            </tr>
                            <!-- Baris 3 -->
                            <tr>
                                <td>
                                    <div class="qr-code">
                                        {!! QrCode::size(150)->generate('https://example.com?qrcode=1') !!}
                                    </div>

                                </td>
                                <td>
                                    <div class="qr-code">
                                        {!! QrCode::size(150)->generate('https://example.com?qrcode=2') !!}
                                    </div>

                                </td>
                                <td>
                                    <div class="qr-code">
                                        {!! QrCode::size(150)->generate('https://example.com?qrcode=3') !!}
                                    </div>

                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
            </table>
        </div>
    </div>
</body>

</html>
