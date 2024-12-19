<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" lang="" xml:lang="" style="height: 100%; width: 100%">
<head>
<title>static/downloads/f4246daa-f389-4a59-bd69-59b98fbfa719/Lampiran-II-Form-BAST-html.html</title>

<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
 <br/>
<style type="text/css">
/* <!-- */
    .{margin: 0}

	p {margin: 0; padding: 0; scale: 2;}	
    .ft10{font-size:18px;font-family:BCDEEE+Calibri;color:#000000;}
	.ft11{font-size:18px;font-family:BCDFEE+Calibri;color:#000000;}
	.ft12{font-size:16px;font-family:BCDGEE+Calibri;color:#000000;}
	.ft13{font-size:18px;font-family:TimesNewRomanPS;color:#000000;}
	.ft14{font-size:15px;font-family:TimesNewRomanPSMT;color:#000000;}
	.ft15{font-size:16px;font-family:BCDHEE+Calibri;color:#000000;}
	.ft16{font-size:18px;font-family:TimesNewRomanPSMT;color:#000000;}
	.ft17{font-size:12px;font-family:TimesNewRomanPSMT;color:#000000;}
	.ft18{font-size:18px;line-height:21px;font-family:TimesNewRomanPS;color:#000000;}
	.ft19{font-size:18px;line-height:21px;font-family:TimesNewRomanPSMT;color:#000000;}
	.ft110{font-size:18px;line-height:25px;font-family:TimesNewRomanPSMT;color:#00FAFAFA;}



	.centered-container {
            position: absolute;
            top: 1010px; /* Positioning the container */
            left: 530px; /* Center the container horizontally */
            transform: translateX(-50%); /* Shift left by 50% of its width */
            max-width: 300px; /* Set a max width to limit the container size */
            text-align: center; /* Center text within the container */
            white-space: nowrap; /* Prevent text wrapping */
        }

        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }

        table {
            border-collapse: collapse;
            width: 100%;
            margin-bottom: 20px;
        }

        td, th {
            border: 1px solid black;
            padding: 8px;
            text-align: left;
        }

        .header-table td {
            border: 1px solid black;
            vertical-align: middle;
        }

        .logo {
            text-align: center;
        }

        .logo img {
            width: 200px; /* Set your desired width */
            height: auto; /* Maintain aspect ratio */
            max-width: none; /* Allow the image to exceed the default max width */
        }

        .header-title {
            text-align: center;
            font-weight: bold;
        }

        .qr-code {
            text-align: center;
        }

        .note {
            font-size: 12px;
            text-align: left;
            margin-top: 20px;
        }

        .info-table{
            width: 50%;
            border-collapse: collapse;
            border: 1px solid black; 
            height: wrap;
        }

        .info-table td{
            padding: 8px; /* Adds some spacing inside the cells */
            border: 1px solid black; /* Adds borders to the cells */
        }

        .user-table{
            width: 70%;
            border-collapse: collapse;
            border: none;
            height: wrap;
        }

        .user-table td{
            padding: 8px;
            border: none;
        }

        .
-->
</style>
</head>
<body bgcolor="#FFFFFF" vlink="blue" link="blue">
<div id="page1-div" style="position:relative;width:892px;height:1263px;">
@php
    $todayDay = \Carbon\Carbon::now()->format('l'); // Example: "Friday"
@endphp

@php
    $empNIPP = 'N/A';
    $empName = 'N/A';
    $empPosition = 'N/A';
    $empUnit = 'N/A';
@endphp

@foreach($empData as $emp)
    @if($emp['nipp'] == $assetData['nipp'])
        @php
            $empNIPP = $emp['nipp'] ?? 'N/A';
            $empName = $emp['name'] ?? 'N/A';
            $empPosition = $emp['position'] ?? 'N/A';
            $empUnit = $emp['unit'] ?? 'N/A';
        @endphp
    @endif
@endforeach

@php
    // Get the current day in English
    $todayDayEnglish = \Carbon\Carbon::now()->format('l'); // Example: "Friday"

    // Mapping of English days to Indonesian days
    $daysTranslation = [
        'Sunday' => 'Minggu',
        'Monday' => 'Senin',
        'Tuesday' => 'Selasa',
        'Wednesday' => 'Rabu',
        'Thursday' => 'Kamis',
        'Friday' => 'Jumat',
        'Saturday' => 'Sabtu',
    ];

    // Get the Indonesian equivalent
    $todayDayIndonesian = $daysTranslation[$todayDayEnglish] ?? 'N/A'; // Fallback to 'N/A' if not found
@endphp
@php
    $nippm = '';

    switch ($assetData['picadded']) {
        case 'TOMMY WISNU WARDHANA':
            $nippm = '19930429';
			$jabatan = 'PKWT - Staff IT';
            break;
        case 'MUHAMAD FAUZAN':
            $nippm = '19930431';
			$jabatan = 'PKWT - Staff IT';
            break;
        case 'YUGI WAHYUDI':
            $nippm = '19850291';
			$jabatan = 'PKWT - Staff IT';
            break;
        case 'MEILINA RACHMAWATI':
            $nippm = '21750397';
			$jabatan = 'Manager Teknologi Informasi';
            break;
        default:
            $nippm = 'Unknown NIPP'; // Default case if picadded doesn't match
            break;
    }
@endphp
    <table class="header-table">
        <tr>
            <td class="logo" rowspan="4">
                <img src="D:\laragon\www\KAPMASSETMANAGMENT\public\assets\logo\KAPM-logo.png" alt="Logo">
            </td>
            <td class="header-title" rowspan="2">
                <p style="white-space:nowrap" class="ft13">PT. KAI PROPERTI MANAJEMEN</p><br>
                <p style="white-space:nowrap" class="ft13">Teknologi Informasi</p>
            </td>
            <td>
                <p white-space:nowrap" class="ft14">Nomor: BAST/IT/2023/01</p>
            </td>
        </tr>
        <tr>
            <td>
                <p white-space:nowrap" class="ft14">Tanggal Terbit: </p>
            </td>
        </tr>
        <tr>
            <td class="header-title" rowspan="2">
                <p style="white-space:nowrap" class="ft13">BERITA ACARA SERAH TERIMA</p>
            </td>
            <td>
                <p white-space:nowrap" class="ft14">Status Revisi: </p>
            </td>
        </tr>
        <tr style="justify-content: space-between">
            
            <td>
                <p white-space:nowrap" class="ft14">Halaman: Halaman 1 dari 1 :</p>
            </td>
        </tr>
    </table>

    
    <table class="info-table">
        <tr>
            <td><p white-space:nowrap" class="ft16">No Ref: </p></td>
            <td><p white-space:nowrap" class="ft16">BAST.IT.{{ now()->format('myd') }}{{ $assetData['idasset'] }}</p></td>
        </tr>
        <tr>
            <td><p white-space:nowrap" class="ft16">Tanggal: </p></td>
            <td><p white-space:nowrap" class="ft16">{{ now()->format('d F Y') }}</p></td>
        </tr>
    </table>

    <img src="data:image/png;base64,{{ $qrCode }}" alt="QR Code" style="position:absolute;top:170px;left:803px;white-space:nowrap;" />
    <p style="position:absolute;top:260px;left:803px;white-space:nowrap" class="ft13">{{$assetData['assetcode']}}&#160;</p>

    <table class="user-table">
        <tr>
            <td colspan="2"><p white-space:nowrap" class="ft16"> Pada hari ini, <strong>Kamis</strong> tanggal <strong>28 November 2024</strong> </p></td>
        </tr>
        <tr>
            <td style="width: 30%; white-space: normal;"><p class="ft16">Nama</p></td>
            <td style="width: 70%; white-space: nowrap;"><p class="ft16">: {{ $data['nama'] ?? 'N/A' }}</p></td>
        </tr>
        <tr>
            <td style="width: 30%; white-space: normal;"><p class="ft16">Nippm</p></td>
            <td style="width: 70%; white-space: nowrap;"><p class="ft16">: {{ $data['nipp'] }}</p></td>
        </tr>
        <tr>
            <td style="width: 30%; white-space: normal;"><p class="ft16">Jabatan</p></td>
            <td style="width: 70%; white-space: nowrap;"><p class="ft16">: {{$data['jabatan']}}</p></td>
        </tr>
        <tr>
            <td style="width: 30%; white-space: normal;"><p class="ft16">Tempat Kedudukan</p></td>
            <td style="width: 70%; white-space: nowrap;"><p class="ft16">: PKM</p></td>
        </tr>
    </table>

    <p class="ft16">Menyerahkan barang-barang sebagai berikut:</p>

    
    <table>
        <tr>
            <th><p white-space:nowrap" class="ft16">No</p> </th>
            <th><p white-space:nowrap" class="ft16">Nama Perangkat</p> </th>
            <th><p white-space:nowrap" class="ft16">Brand/Series</p></th>
            <th><p white-space:nowrap" class="ft16">Inventory Number</p></th>
            <th><p white-space:nowrap" class="ft16">Serial Number</p></th>
            <th><p white-space:nowrap" class="ft16">Keterangan</p></th>
        </tr>
        <tr>
            <td><p white-space:nowrap" class="ft16">1</p></td>
            <td><p white-space:nowrap" class="ft16">{{ $assetData['assetcategory'] ?? 'N/A' }}</p></td>
            <td><p white-space:nowrap" class="ft16">{{ $assetData['assetbrand'] ?? 'N/A' }}</p></td>
            <td><p white-space:nowrap" class="ft16">{{ $assetData['assetcode'] ?? 'N/A' }}</p></td>
            <td><p white-space:nowrap" class="ft16">{{ $assetData['assetserialnumber'] ?? 'N/A' }}</p></td>
            <td><p white-space:nowrap" class="ft16">{{ $assetData['condition'] ?? 'N/A' }}</p></td>
        </tr>
    </table>

    <table class="user-table">
        <tr>
            <td colspan="2"><p white-space:nowrap" class="ft16"> Kepada: </p></td>
        </tr>
        <tr>
            <td style="width: 30%; white-space: normal;"><p class="ft16">Nama</p></td>
            <td style="width: 70%; white-space: nowrap;"><p class="ft16">: {{ $empName ?? 'N/A' }}</p></td>
        </tr>
        <tr>
            <td style="width: 30%; white-space: normal;"><p class="ft16">Nippm</p></td>
            <td style="width: 70%; white-space: nowrap;"><p class="ft16">: {{ $empNIPP ?? 'N/A' }}</p></td>
        </tr>
        <tr>
            <td style="width: 30%; white-space: normal;"><p class="ft16">Jabatan</p></td>
            <td style="width: 70%; white-space: nowrap;"><p class="ft16">: {{ $empPosition ?? 'N/A' }}</p></td>
        </tr>
        <tr>
            <td style="width: 30%; white-space: normal;"><p class="ft16">Tempat Kedudukan</p></td>
            <td style="width: 70%; white-space: nowrap;"><p class="ft16">: {{ $empUnit ?? 'N/A' }}</p></td>
        </tr>
    </table>

    <p white-space:nowrap" class="ft16">
        Dipergunakan untuk inventaris alat bantu kerja dan selanjutnya barang tersebut menjadi tanggung jawab penerima sepenuhnya serta wajib dirawat dengan penuh tanggung jawab.
    </p> <br>

    <div class="signature">
        <table style="width: 100%; border: none; border-collapse: collapse;">
            <tr>
                <td style="text-align: center; border: none; padding-bottom: 80px;">
                    <p class="ft13">yang Menyerahkan</p><br><br><br><br><br><br><br>
                    <p class="ft13" style="text-decoration: underline"><b>{{ $assetData['picadded'] ?? 'N/A' }}&#160;</b></p>
                    <p class="ft13"><b>Nippm.&#160;{{$nippm}}&#160;</b></p>
                </td>
                <td style="text-align: center; border: none; padding-bottom: 80px;">
                    <p class="ft13"> yang Menerima</p><br><br><br><br><br><br><br>
                    <p class="ft13" style="text-decoration: underline"><b>{{ $assetData['employee']['name'] ?? 'N/A' }}&#160;</b></p>
                    <p class="ft13"><b>Nippm.&#160;{{ $assetData['employee']['nipp'] ?? 'N/A' }}</b>&#160;</p>
                </td>
            </tr>
        </table>
    </div>

    <p white-space:nowrap" class="ft19" font-size: 12px;
            text-align: left;
            margin-top: 20px;>
        *Mohon setelah di tandatangani BAST dikembalikan ke alamat pengirim
    </p>

</div>
</body>
</html>
