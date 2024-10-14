<!DOCTYPE html>
<html>

<head>
    <link id="themeColors" rel="stylesheet" href="{{ asset('assets/dist/css/style.min.css') }}" />
    <title>Cetak Presensi</title>
</head>

<body>
    <style>
        body {
            font-size: 13px;
            /* Sesuaikan dengan ukuran yang diinginkan */
        }

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
            margin: 10px 0px 10px 0px;
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
            padding: 5px;
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
                    <td>{{ $data[0]['namaPegawai'] }}</td>
                </tr>
                <tr class="no-border-between">
                    <td>NIPP</td>
                    <td>{{ $data[0]['nippPegawai'] }}</td>
                </tr>
                <tr class="no-border-between">
                    <td>Jabatan</td>
                    <td>{{ $data[0]['posisiPegawai'] }}</td>
                </tr>
                <tr class="no-border-between">
                    <td>Unit Kerja</td>
                    <td>{{ $data[0]['unitPegawai'] }}</td>
                </tr>
                <tr class="section-title">
                    <td colspan="2">DATA IZIN</td>
                </tr>
                <tr class="no-border-between">
                    <td>Jenis Izin</td>
                    <td>{{ $data[0]['tipeIzinDesc'] }}</td>
                </tr>
                <tr class="no-border-between">
                    <td>Tanggal</td>
                    <td>{{ \Carbon\Carbon::parse($data[0]['tanggal'])->format('d/m/Y') }}</td>
                </tr>
                <tr class="no-border-between">
                    <td>Jam</td>
                    <td>{{ $data[0]['jam'] }}</td>
                </tr>
                <tr class="no-border-between">
                    <td>No Telepon</td>
                    <td>{{ $data[0]['telepon'] }}</td>
                </tr>
                <tr class="no-border-between">
                    <td>Alasan</td>
                    <td>{{ $data[0]['alasan'] }}</td>
                </tr>
                <tr class="section-title">
                    <td colspan="2">PERSETUJUAN CUTI</td>
                </tr>
                <tr class="no-border-between">
                    <td>NIPP Atasan</td>
                    <td>{{ $data[0]['nippAtasan'] }}</td>
                </tr>
                <tr class="no-border-between">
                    <td>Nama Atasan</td>
                    <td>{{ $data[0]['namaAtasan'] }}</td>
                </tr>
                <tr class="no-border-between">
                    <td>Tanggal Disetujui</td>
                    <td>{{ \Carbon\Carbon::parse($data[0]['tglSetuju'])->format('d/m/Y') }}</td>
                </tr>
                <tr>
                    <td style="padding: 30px 0 10px 0;" colspan="2">
                        <table class="signature-table" style="table-layout: fixed; padding-left: 0;">
                            <tr>
                                <th>Pemohon</th>
                                <th>Pjbt yang memberikan izin</th>
                                <th>Pjbt yg menandatangani izin</th>
                            </tr>
                            <!-- Baris 1 -->
                            <tr>
                                <td style="text-align: left">
                                    Tgl, {{ \Carbon\Carbon::parse($data[0]['createdAt'])->format('d/m/Y') }}
                                </td>
                                <td style="text-align: left">
                                    Tgl, {{ \Carbon\Carbon::parse($data[0]['tglSetuju'])->format('d/m/Y') }}
                                    <!-- Menambahkan default jika null -->
                                </td>
                                <td style="text-align: left">
                                    Tgl, {{ \Carbon\Carbon::parse($data[0]['tglSetuju'])->format('d/m/Y') }}
                                    <!-- Tanggal penandatangan izin -->
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
                                        <!-- QR Code untuk Bawahan -->
                                        <img src="{{ $qrCodePribadiImage }}" alt="QR Code Bawahan">
                                    </div>
                                </td>
                                <td>
                                    <div class="qr-code">
                                        <!-- QR Code untuk Atasan -->
                                        <img src="{{ $qrCodeAtasanImage }}" alt="QR Code Atasan">
                                    </div>
                                </td>
                                <td>
                                    <div class="qr-code">
                                        <!-- QR Code untuk Diri Sendiri -->
                                        <img src="{{ $qrCodeAtasanImage }}" alt="QR Code Diri Sendiri">
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
