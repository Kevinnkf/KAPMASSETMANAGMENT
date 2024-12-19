<!DOCTYPE html>
<html>
    <head>
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
                    
                    .header-table{
                        margin: 21px;
                        position: absolute;
                        width: 97%;
                        top: 0;
                        left:0;

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
                        position: absolute;
                        width: 50%;
                        top: 200px;
                        left:20px;
                        
                    }

            
                    .info-table td{
                        padding: 8px; /* Adds some spacing inside the cells */
                        border: 0px solid black; /* Adds borders to the cells */
                        text-align: left
                    }
            
                    .info-table tr{
                        padding: 8px; /* Adds some spacing inside the cells */
                        border: 1px solid black; /* Adds borders to the cells */
                        text-align: left
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
    <body>
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
                        <p white-space:nowrap" class="ft14">Nomor: FM.CEK/IT/{{ now()->format('y') }}/{{ now()->format('m') }}</p>
                    </td>
                </tr>
                <tr>
                    <td>
                        <p white-space:nowrap" class="ft14">Tanggal Terbit: </p>
                    </td>
                </tr>
                <tr>
                    <td class="header-title" rowspan="2">
                        <p style="white-space:nowrap" class="ft13">Formulir Checklist</p>
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
                <table class="info-table">
                    <tr>
                        <td style=""><p white-space:nowrap" class="ft16">No Ref </p></td>
                        <td style=""><p white-space:nowrap" class="ft16">:</p></td>
                        <td><p white-space:nowrap" class="ft16">FM.CEK.{{ now()->format('ym') }}</p></td>
                    </tr>
                    <tr>
                        <td><p white-space:nowrap" class="ft16">Tahun </p></td>
                        <td><p white-space:nowrap" class="ft16">: </p></td>
                        <td><p white-space:nowrap" class="ft16">{{ now()->format('Y') }}</p></td>
                    </tr>
                </table>
            </table>

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
        
    </body>
</html>