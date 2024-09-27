@extends('layouts.print')
@section('content')
<!DOCTYPE html>
<html>

<head>
    <link id="themeColors" rel="stylesheet" href="{{ asset('assets/dist/css/style.min.css') }}" />
    <title>Cetak Dinas</title>
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
            width: 90%;
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
            background-color: #f2f2f2;
        }
    </style>
    <div class="card w-100">
        <div class="card-body">
            <table>
                <tr>
                    <td colspan="2" class="header-title">SURAT DINAS</td>
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
                    <td>Jenis Dinas</td>
                    <td>Dinas Luar (jarak kurang dari 50KM)</td>
                </tr>
                <tr class="no-border-between">
                    <td>Tanggal Mulai</td>
                    <td>17/09/2024</td>
                </tr>
                <tr class="no-border-between">
                    <td>Tanggal Berakhir</td>
                    <td>18/09/2024</td>
                </tr>
                <tr class="no-border-between">
                    <td>Lama Dinas</td>
                    <td>2 Hari</td>
                </tr>
                <tr class="no-border-between">
                    <td>Tujuan Dinas</td>
                    <td>Bandung</td>
                </tr>
                <tr class="no-border-between"></tr>
                    <td>No Telepon</td>
                    <td>082115500778</td>
                </tr>
                <tr class="section-title">
                    <td colspan="2">PERSETUJUAN DINAS</td>
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
                    <td style="padding: 20px 0;" colspan="2" >
                        <table class="signature-table">
                            <tr style="margin-bottom: 1.5em;">
                                <th>Pemohon</th>
                                <th>Pjt yang memberikan izin</th>
                                <th>Pjt yang menandatangani izin</th>
                            </tr>
                            <tr >
                                <td style="text-align: left;">
                                    Tgl, 11/09/2024
                                </td>
                                <td style="text-align: left;">
                                    Tgl, 16/09/2024
                                </td>
                                <td style="text-align: left;">
                                    Tgl, 17/09/2024<br>
                                </td>
                            </tr>
                            <tr >
                                <td style="text-align: left;">
                                </td>
                                <td style="text-align: left;">
                                    Jabatan : Pjt. Specialist of System Design<br><br>
                                </td>
                                <td style="text-align: left;">
                                    Jabatan :
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="qr-code">
                                        {!! QrCode::size(100)->generate('https://example.com?qrcode=1') !!}
                                    </div>
                                </td>
                                <td>
                                    <div class="qr-code">
                                        {!! QrCode::size(100)->generate('https://example.com?qrcode=2') !!}
                                    </div>
                                </td>
                                <td>
                                    <div class="qr-code">
                                        {!! QrCode::size(100)->generate('https://example.com?qrcode=3') !!}
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
@endsection
<style>
    .qrcode {
        border: 1px solid #333;
        padding: 5px;
        align: center;
    }
</style>
