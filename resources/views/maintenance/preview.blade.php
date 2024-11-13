{{-- @extends('layouts.app')
@section('content')
@if ($errors->any())
    <div class="alert alert-danger">
        <strong>Whoops!</strong> There were some problems with your input.<br><br>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>  
    <script>
        console.log("error");
    </script>
@endif

<div id="BAP" class="inset-0 bg-white flex justify-center items-center p-4">
    <div class="bg-white p-6 rounded-md w-full"> <!-- Changed w-96 to w-full -->
        <div class="table-container mx-auto w-full"> <!-- Ensure this is w-full -->
            <table class="p-4 items-center w-full mb-8 align-top border border-gray-200 text-slate-500">
                <tbody>
                    <tr>
                        <td rowspan="4" class="text-center p-2 align-middle border-b border-r max-h-1">
                            <img src="{{ asset('assets/logo/KAPM-logo.png') }}" alt="" class="w-32 h-auto mx-auto">
                        </td>
                        <td rowspan="2" class="text-center p-2 align-middle border-b border-r">
                            <h2> PT. KA Properti Manajemen</h2>
                            <h3> Teknologi Informasi </h3>
                        </td>
                        <td class="text-center p-2 align-middle border-b border-r">
                            <h3 class=""> Nomor </h3>
                        </td>
                    </tr>
                    <tr>
                        <td class="text-center p-2 align-middle border-b border-r">Tanggal Terbit</td>
                    </tr>
                    <tr>
                        <td rowspan="2" class="text-center p-2 align-middle border-b border-r">Berita Acara Pemeriksaan</td>
                        <td class="text-center p-2 align-middle border-b border-r">Status Revisi </td>
                    </tr>
                    <tr>
                        <td class="text-center p-2 align-middle border-b border-r">Halaman</td>
                    </tr>
                </tbody>
            </table>

            <table class="p-4 items-center w-full mb-8 align-top border border-gray-200 text-slate-500">
                <tbody>
                    <tr>
                        <td class="text-center p-2 align-middle border-b border-r max-h-1">
                            <h1>No ref </h1>
                        </td>
                        <td class="text-center p-2 align-middle border-b border-r max-h-1">
                            <h1>: BAP.SR.YYMMXXXX</h1>
                        </td>
                    </tr>
                    <tr>
                        <td class="text-center p-2 align-middle border-b border-r max-h-1">
                            <h1>Tanggal </h1>
                        </td>
                        <td class="text-center p-2 align-middle border-b border-r max-h-1">
                            <h1>: 2024-12-31</h1>
                        </td>
                    </tr>
                </tbody>
            </table>

            
            <table class="p-4 items-center w-full mb-8 align-top border border-gray-200 text-slate-500">
                <tbody>
                    <tr>
                        <td class="text-center p-2 align-middle border-b border-r max-h-1">
                            <h1>No ref </h1>
                        </td>
                        <td class="text-center p-2 align-middle border-b border-r max-h-1">
                            <h1>: BAP.SR.YYMMXXXX</h1>
                        </td>
                        <td class="text-center p-2 align-middle border-b border-r max-h-1">
                            <h1> Tanggal Perbaikan</h1>
                        </td>
                        <td class="text-center p-2 align-middle border-b border-r max-h-1">
                            <h1> Jenis Perangkat</h1>
                        </td>
                    </tr>
                    <tr>
                        <td class="text-center p-2 align-middle border-b border-r max-h-1">
                            <h1>Serial Number </h1>
                        </td>
                        <td class="text-center p-2 align-middle border-b border-r max-h-1">
                            <h1>: ITL2312341</h1>
                        </td>
                        <td class="text-center p-2 align-middle border-b border-r max-h-1">
                            <h1>Jenis Perangkat </h1>
                        </td>
                        <td class="text-center p-2 align-middle border-b border-r max-h-1">
                            <h1>: Laptop </h1>
                        </td>
                    </tr>
                </tbody>
            </table>
            <table class="p-4 items-center w-full mb-8 align-top border border-gray-200 text-slate-500">
                <tbody>
                    <tr>
                        <td colspan="2" class="text-start p-2 align-middle border-b border-r max-h-1">
                            <h1>Tindakan Perbaikan</h1>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2" class="text-start p-2 align-middle border-b border-r max-h-1">
                            <h1>Suku cadang yang digunakan</h1>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2" class="text-start p-2 align-middle border-b border-r max-h-1">
                            <h1>Hasil Perbaikan</h1>
                        </td>
                    </tr>
                    <tr>
                        <td class="text-center p-2 align-middle border-b border-r max-h-1">
                            <h1>Pelaksana Perbaikan</h1>
                        </td>
                        <td class="text-center p-2 align-middle border-b border-r max-h-1">
                            <h1>Mengetahui</h1>
                        </td>
                    </tr>
                    <tr>
                        <td class="text-center p-2 align-middle border-b border-r max-h-1">
                            <h1> </h1>
                        </td>
                        <td class="text-center p-2 align-middle border-b border-r max-h-1">
                            <h1> </h1>
                        </td>
                    </tr>
                    <tr>
                        <td class="text-center p-2 align-middle border-b border-r max-h-1">
                            <h1> Nama Lengkap Pelaksana</h1>
                            <h1> NIPPM </h1>
                        </td>
                        <td class="text-center p-2 align-middle border-b border-r max-h-1">
                            <h1> Nama Lengkap Subdep TI </h1>
                            <h1> NIPPM </h1>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div> 
</div>
@endsection --}}

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" lang="" xml:lang="">
<head>
<title>static/downloads/81bbc765-88bb-494f-80cf-3cf37efb739e/lampiran-iv-form-perbaikan-aset-html.html</title>

<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
 <br/>
<style type="text/css">
<!--
	p {margin: 0; padding: 0;}	.ft10{font-size:16px;font-family:BCDEEE+Calibri;color:#000000;}
	.ft11{font-size:16px;font-family:BCDFEE+Calibri;color:#000000;}
	.ft12{font-size:16px;font-family:BCDGEE+Calibri;color:#000000;}
	.ft13{font-size:18px;font-family:TimesNewRomanPSMT;color:#000000;}
	.ft14{font-size:18px;font-family:TimesNewRomanPS;color:#000000;}
	.ft15{font-size:18px;font-family:TimesNewRomanPS;color:#000000;}
	.ft16{font-size:12px;font-family:TimesNewRomanPSMT;color:#000000;}
	.ft17{font-size:15px;font-family:TimesNewRomanPSMT;color:#000000;}
	.ft18{font-size:16px;font-family:BCDHEE+Calibri;color:#000000;}
-->
</style>
</head>
<body bgcolor="#A0A0A0" vlink="blue" link="blue">
<div id="page1-div" style="position:relative;width:892px;height:1263px;">
<img width="892" height="1263" src="data:image/png;base64,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" alt="background image"/>
<p style="position:absolute;top:53px;left:53px;white-space:nowrap" class="ft10"><b>LAMPIRAN IV&#160;–&#160;FORM&#160;BERITA&#160;ACARA&#160;PERBAIKAN&#160;</b></p>
<p style="position:absolute;top:236px;left:53px;white-space:nowrap" class="ft12">&#160;</p>
<p style="position:absolute;top:270px;left:62px;white-space:nowrap" class="ft13">No Ref&#160;</p>
<p style="position:absolute;top:270px;left:231px;white-space:nowrap" class="ft13">:&#160;BAP.SR.YYMMXXXX&#160;</p>
<p style="position:absolute;top:291px;left:62px;white-space:nowrap" class="ft13">Tanggal&#160;</p>
<p style="position:absolute;top:291px;left:231px;white-space:nowrap" class="ft13">:&#160;&lt;&lt;tanggal&#160;perbaikan&gt;&gt;&#160;</p>
<p style="position:absolute;top:334px;left:53px;white-space:nowrap" class="ft13">&#160;</p>
<p style="position:absolute;top:352px;left:61px;white-space:nowrap" class="ft13">Nomor&#160;Aset&#160;</p>
<p style="position:absolute;top:352px;left:189px;white-space:nowrap" class="ft13">:&#160;&#160;___________________________&#160;&#160;Tanggal&#160;Perbaikan&#160;&#160;:&#160;&#160;___________________&#160;</p>
<p style="position:absolute;top:382px;left:61px;white-space:nowrap" class="ft13">Serial&#160;Number&#160;&#160;:&#160;&#160;___________________________&#160;&#160;Jenis&#160;Perangkat&#160;</p>
<p style="position:absolute;top:382px;left:636px;white-space:nowrap" class="ft13">:&#160;&#160;___________________&#160;</p>
<p style="position:absolute;top:436px;left:53px;white-space:nowrap" class="ft13">&#160;</p>
<p style="position:absolute;top:454px;left:62px;white-space:nowrap" class="ft14"><b>Tindakan&#160;Perbaikan&#160;</b>–&#160;<i>diisikan oleh&#160;Pelaksana&#160;Perbaikan</i>&#160;</p>
<p style="position:absolute;top:605px;left:62px;white-space:nowrap" class="ft14"><b>Suku&#160;Cadang yang&#160;digunakan&#160;–&#160;</b><i>diisikan oleh Pelaksana&#160;Perbaikan</i><b>&#160;</b></p>
<p style="position:absolute;top:765px;left:62px;white-space:nowrap" class="ft14"><b>Hasil&#160;Perbaikan&#160;</b>–&#160;<i>disikan oleh&#160;Pelaksana Perbaikan&#160;</i></p>
<p style="position:absolute;top:938px;left:53px;white-space:nowrap" class="ft16">&#160;</p>
<p style="position:absolute;top:1130px;left:53px;white-space:nowrap" class="ft16">&#160;</p>
<p style="position:absolute;top:110px;left:62px;white-space:nowrap" class="ft12">&#160;</p>
<p style="position:absolute;top:122px;left:270px;white-space:nowrap" class="ft14"><b>PT. KA&#160;PROPERTI&#160;MANAJEMEN&#160;</b></p>
<p style="position:absolute;top:142px;left:331px;white-space:nowrap" class="ft14"><b>Teknologi&#160;Informasi&#160;</b></p>
<p style="position:absolute;top:117px;left:595px;white-space:nowrap" class="ft17">Nomor&#160;</p>
<p style="position:absolute;top:117px;left:703px;white-space:nowrap" class="ft17">:</p>
<p style="position:absolute;top:114px;left:707px;white-space:nowrap" class="ft18">&#160;BAP.SR/IT/24/01&#160;</p>
<p style="position:absolute;top:149px;left:595px;white-space:nowrap" class="ft17">Tanggal&#160;Terbit&#160;</p>
<p style="position:absolute;top:149px;left:703px;white-space:nowrap" class="ft17">:&#160;30/08/2023&#160;</p>
<p style="position:absolute;top:194px;left:285px;white-space:nowrap" class="ft14"><b>BERITA&#160;ACARA&#160;PERBAIKAN&#160;</b></p>
<p style="position:absolute;top:180px;left:595px;white-space:nowrap" class="ft17">Status&#160;Revisi&#160;</p>
<p style="position:absolute;top:180px;left:703px;white-space:nowrap" class="ft17">:&#160;</p>
<p style="position:absolute;top:211px;left:595px;white-space:nowrap" class="ft17">Halaman&#160;</p>
<p style="position:absolute;top:211px;left:703px;white-space:nowrap" class="ft17">:&#160;Halaman 1 dari&#160;1&#160;</p>
<p style="position:absolute;top:958px;left:170px;white-space:nowrap" class="ft13">Pelaksana&#160;Perbaikan&#160;</p>
<p style="position:absolute;top:958px;left:590px;white-space:nowrap" class="ft13">Mengetahui&#160;</p>
<p style="position:absolute;top:994px;left:61px;white-space:nowrap" class="ft13">&#160;</p>
<p style="position:absolute;top:994px;left:633px;white-space:nowrap" class="ft13">&#160;</p>
<p style="position:absolute;top:1089px;left:149px;white-space:nowrap" class="ft14"><b>&lt;&lt;NAMA&#160;LENGKAP&gt;&gt;&#160;</b></p>
<p style="position:absolute;top:1110px;left:123px;white-space:nowrap" class="ft14"><b>Nippm.&#160;&lt;&lt;nippm_pemeriksa&gt;&gt;&#160;</b></p>
<p style="position:absolute;top:1089px;left:495px;white-space:nowrap" class="ft14"><b>&lt;&lt;NAMA&#160;KEPALA&#160;SUBDEP&#160;TI&gt;&gt;&#160;</b></p>
<p style="position:absolute;top:1110px;left:485px;white-space:nowrap" class="ft14"><b>Nippm.&#160;&lt;&lt;nippm_kepala subdep&#160;TI&gt;&gt;</b>&#160;</p>
</div>
</body>
</html>
