<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" lang="" xml:lang="" style="height: 100%; width: 100%">
<head>
<title>static/downloads/f4246daa-f389-4a59-bd69-59b98fbfa719/Lampiran-II-Form-BAST-html.html</title>

<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
 <br/>
<style type="text/css">
/* <!-- */
    .{margin: 0}

	p {margin: 0; padding: 0;}	
    .ft10{font-size:18px;font-family:BCDEEE+Calibri;color:#000000;}
	.ft11{font-size:18px;font-family:BCDFEE+Calibri;color:#000000;}
	.ft12{font-size:16px;font-family:BCDGEE+Calibri;color:#000000;}
	.ft13{font-size:18px;font-family:Tahoma;color:#000000;}
	.ft14{font-size:15px;font-family:TimesNewRomanPSMT;color:#000000;}
	.ft15{font-size:16px;font-family:BCDHEE+Calibri;color:#000000;}
	.ft16{font-size:18px;font-family:TimesNewRomanPSMT;color:#000000;}
	.ft17{font-size:12px;font-family:TimesNewRomanPSMT;color:#000000;}
	.ft18{font-size:18px;line-height:21px;font-family:TimesNewRomanPS;color:#000000;}
	.ft19{font-size:18px;line-height:21px;font-family:TimesNewRomanPSMT;color:#000000;}
	.ft110{font-size:18px;line-height:25px;font-family:TimesNewRomanPSMT;color:#00FAFAFA;}

       html, body {
            font-family: Arial, sans-serif;
            margin: 0px;
        }

        .header-table {
            border: none;
            padding: 6px;
            width: 60mm; /* Set the width of the table */x
            height: 16mm; /* Set the height of the table */
            border-collapse: collapse; /* Optional: collapse borders */
            text-align: left;
            position: absolute; top: 0px; left: 0px; white-space: nowrap; z-index: -100;
        }
        .header-table td {
            padding: 1mm; /* Optional: padding for cells */
            vertical-align: middle; /* Align content to the top */
            font-size: 10pt
        }

        .logo {
            text-align: center;
            font-size: 10px;
        }

        .logo img {
            width: auto; /* Set your desired width */
            height: auto; /* Maintain aspect ratio */
            max-width: none; /* Allow the image to exceed the default max width */
            vertical-align: middle;
            text-align: center;
        }

        .
-->
</style>
</head>
<body bgcolor="#FFFFFF" vlink="blue" link="blue" style="style="position:absolute; top:0px; left:0;">
<div id="page1-div" style="position:absolute; top:0px; left:0; width:892px;height:1263px;">
    @php
         use Carbon\Carbon;

        // Get the date string from assetData
        $dateString = $assetData['addeddate'] ?? 'N/A';

        // Initialize a formatted date variable
        $formattedDate = 'N/A';

        if ($dateString !== 'N/A') {
            // Create a Carbon instance from the date string
            $date = Carbon::parse($dateString);
            // Format the date to 'd F Y'
            $formattedDate = $date->translatedFormat('d F Y'); // Use translatedFormat for Indonesian month names
        }
    @endphp


    <table class="header-table">
        <tr>
            <td class="logo" rowspan="2">
                <img src="data:image/png;base64,{{ $qrCode }}" alt="QR Code" /> <br>                
            </td>
            <td class="header-title">
                <p style="white-space:nowrap" class="ft13">{{ $assetData['assetbrand'] ?? 'N/A' }} {{ $assetData['assetmodel'] ?? 'N/A' }} {{ $assetData['assetseries'] ?? 'N/A' }}</p>
                <p style="white-space:nowrap" class="ft13">{{ $assetData['assetserialnumber'] ?? 'N/A' }}</p>
                <p style="white-space:nowrap" class="ft13">{{ $formattedDate }}</p>
            </td>
            <td class="logo" rowspan="3"> 
                <img style="max-width: 100px" src="D:\laragon\www\KAPMASSETMANAGMENT\public\assets\logo\KAPM-logo.png" alt="Logo">
            </td>
        </tr>
        <tr>
            
        </tr>
        <tr>
            <td class="header-title">
                <p class="ft17">{{ $assetData['assetcode'] }}&#160;</p>
            </td>
        </tr>
    </table>

</div>
</body>
</html>
