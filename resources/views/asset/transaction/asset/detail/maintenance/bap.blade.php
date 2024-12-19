<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" lang="" xml:lang="">
<head>
<title>form-perbaikan-aset-</title>

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

            detail-table{
                width: 100%;
                border-collapse: collapse;
                border: none
                height: wrap;
            }
    
            detail-table td{
                padding: 8px;
                border: none;
            }

            mtc-table{
                width: 100%;
                border-collapse: collapse;
                border: 1px black;
                height: wrap;
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

    switch ($selectedRecord['picadded']) {
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
                <p white-space:nowrap" class="ft14">Nomor: BAP/IT/2023/01</p>
            </td>
        </tr>
        <tr>
            <td>
                <p white-space:nowrap" class="ft14">Tanggal Terbit: </p>
            </td>
        </tr>
        <tr>
            <td class="header-title" rowspan="2">
                <p style="white-space:nowrap" class="ft13">BERITA ACARA PERBAIKAN</p>
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
            <td><p white-space:nowrap" class="ft16">BAP.IT.{{ now()->format('myd') }}{{$selectedRecord['maintenanceid']}}</p></td>
        </tr>
        <tr>
            <td><p white-space:nowrap" class="ft16">Tanggal: </p></td>
            <td><p white-space:nowrap" class="ft16">{{ now()->format('d F Y') }}</p></td>
        </tr>
    </table>

    <img src="data:image/png;base64,{{ $qrCode }}" alt="QR Code" style="position:absolute;top:160px;left:803px;white-space:nowrap;" />
    <p style="position:absolute;top:250px;left:803px;white-space:nowrap" class="ft13">{{$selectedRecord['assetcode']}}&#160;</p>

    <table class="detail-table">
        <tr>
            <td style="border: none"> <p style="white-space: nowrap;" class="ft16">Nomor Asset </p></td>
            <td style="border: none"> <p style="white-space: nowrap;" class="ft16">: {{$selectedRecord['assetcode']}}</p></td>
            <td style="border: none"> <p style="white-space: nowrap;" class="ft16">Tanggal Perbaikan</p></td>
            <td style="border: none"> <p style="white-space: nowrap;" class="ft16">: {{ now()->format('d-m-Y')}}</p></td>
        </tr>
        <tr>
            <td style="border: none"> <p style="white-space: nowrap;" class="ft16">Serial Number </p></td>
            <td style="border: none"> <p style="white-space: nowrap;" class="ft16">: {{ $selectedRecord['trnasset']['assetserialnumber']}}</p></td>
            <td style="border: none"> <p style="white-space: nowrap;" class="ft16">Jenis Perangkat</p></td>
            <td style="border: none"> <p style="white-space: nowrap;" class="ft16">: {{ $selectedRecord['trnasset']['assetcategory']}}</p></td>
        </tr>
    </table>

    <table class="mtc-table" style="border-collapse: collapse; width: 100%;">
        <tr>
            <td style="border: 1px solid black; white-space: normal;">
                <p class="ft14"><strong>Tindakan Perbaikan</strong>- diisikan oleh Pelaksana Perbaikan </p> <br>
                <p class="ft14">{{$selectedRecord['notesaction'] ?? 'N/A'}} </p> <br><br><br><br><br>
            </td>
        </tr>
        <tr>
            <td style="border: 1px solid black; white-space: normal;">
                <p class="ft14"><strong> Suku cadang yang digunakan </strong> - diisikan oleh Pelaksana Perbaikan</p> <br>
                <p class="ft14">{{$selectedRecord['notessparepart'] ?? 'N/A'}} </p><br><br><br><br><br>
            </td>
        </tr>
        <tr>    
            <td style="border: 1px solid black; white-space: normal;">
                <p class="ft14"><strong>Hasil perbaikan</strong> - diisikan oleh Pelaksana Perbaikan </p> <br>
                <p class="ft14">{{$selectedRecord['notesresult'] ?? 'N/A'}} </p><br><br><br><br><br>
            </td>
        </tr>
    </table>

    @php
    $nippm = '';

    switch ($selectedRecord['trnasset']['picadded']) {
        case 'TOMMY WISNU WARDHANA':
            $nippm = '19930429';
            break;
        case 'MUHAMAD FAUZAN':
            $nippm = '19930431';
            break;
        case 'YUGI WAHYUDI':
            $nippm = '19850291';
            break;
        case 'MEILINA RACHMAWATI':
            $nippm = '21750397';
            break;
        default:
            $nippm = 'Unknown NIPP'; // Default case if picadded doesn't match
            break;
    }
    @endphp 

    
    <table style="width: 100%; border: 1px black; border-collapse: collapse;">
        <tr>
            <td style="text-align: center; border: 1px black; padding-bottom: 80px;">
                <p class="ft13">yang Memeriksa</p><br><br><br><br><br><br><br>
                <p class="ft13" style="text-decoration: underline"><b>{{ $data['nama'] }}&#160;</b></p>
                <p class="ft13"><b>Nippm.&#160;{{$data['nipp']}}&#160;</b></p>
            </td>
            <td style="text-align: center; border: 1px black; padding-bottom: 80px;">
                <p class="ft13"> Mengetahui</p><br><br><br><br><br><br><br>
                <p class="ft13" style="text-decoration: underline"><b>MEILINA RACHMAWATI&#160;</b></p>
                <p class="ft13"><b>Nippm.&#160;21750397</b>&#160;</p>
            </td>
        </tr>
    </table>
</div>
</body>
</html>
