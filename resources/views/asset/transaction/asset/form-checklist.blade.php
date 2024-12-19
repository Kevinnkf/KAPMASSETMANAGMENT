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
            width:100%;
            margin-bottom: 20px;
        }

        td, th {
            border: 1px solid black;
            padding: 8px;
            text-align: center;
        }

        .header-table td {
            border: 1px solid black;
            vertical-align: middle;
            position: absolute;
            top: 0;
            left: 0;
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

        .signature{
            width: 100%;
            margin-left: 10%;
        }
-->
</style>
</head>
<body bgcolor="#FFFFFF" vlink="blue" link="blue">
<div id="page1-div" style="position:relative;width:892px;height:1263px;">

    
    <table class="form-table" style="width: 150%; border-collapse: collapse;">
        <thead>
            <tr>
                <th rowspan="2" style="white-space: nowrap;" class="ft16">No</th>
                <th rowspan="2" style="white-space: nowrap;" class="ft16">Kode Aset</th>
                <th rowspan="2" style="white-space: nowrap;" class="ft16">Serial Number</th>
                <th rowspan="2" style="white-space: nowrap;" class="ft16">Jenis Aset</th>
                <th colspan="3" style="white-space: nowrap;" class="ft16">Kondisi</th>
                <th rowspan="2" style="white-space: nowrap;" class="ft16">Tanggal Cek</th>
                <th rowspan="2" style="white-space: nowrap;" class="ft16">Keterangan</th>
            </tr>
            <tr>
                <th style="white-space: nowrap;" class="ft16">Fisik</th>
                <th style="white-space: nowrap;" class="ft16">Pengguna</th>
                <th style="white-space: nowrap;" class="ft16">Fungsi</th>
            </tr>
        </thead>
        @php $inc = 1;@endphp
        @foreach($assetData as $asset)
        <tbody>
            <tr>
                <td style="white-space: nowrap;" class="ft16">{{$inc++}}</td>
                <td style="white-space: nowrap;" class="ft16">{{ $asset['assetcode'] ?? 'N/A' }}</td>
                <td style="white-space: nowrap;" class="ft16">{{ $asset['assetserialnumber'] ?? 'N/A' }}</td>
            <td style="white-space: nowrap;" class="ft16">{{ $asset['assetcategory'] ?? 'N/A' }}</td>
            <td style="white-space: nowrap;" class="ft16"></td>
            <td style="white-space: nowrap;" class="ft16"></td>
            <td style="white-space: nowrap;" class="ft16"></td>
            <td style="white-space: nowrap;" class="ft16"></td>
            <td style="white-space: nowrap;" class="ft16"></td>
            </tr>
            @endforeach
        </tbody>
            </table>
            
            <div class="signature">
                <table style="width: 120%; border: none; border-collapse: collapse;">
                    <tr>
                        <td style="text-align: center; border: none; padding-bottom: 80px;">
                            <p class="ft13">Pelaksana Pengecekan</p><br><br><br><br><br><br><br>
                            <p class="ft13" style="text-decoration: underline"><b>{{ $data['nama'] ?? 'N/A' }}&#160;</b></p>
                    <p class="ft13"><b>Nippm.&#160;{{ $data['nipp'] ?? 'N/A' }}</b>&#160;</p>
                    </td>
                    <td style="text-align: center; border: none; padding-bottom: 80px;">
                        <p class="ft13"> Mengetahui </p><br><br><br><br><br><br><br>
                    <p class="ft13" style="text-decoration: underline"><b>MEILIANA RACHMAWATI&#160;</b></p>
                    <p class="ft13"><b>Nippm.&#160; 21750397&#160;</b></p>
                </td>
            </tr>
        </table>
    </div>

</div>
</body>
</html>
