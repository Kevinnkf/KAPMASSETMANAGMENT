<?php

namespace App\Http\Controllers\TimeManagement\izin;

use Dompdf\Dompdf;
use Dompdf\Options;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
// use PDF;

class IzinController extends Controller
{
    private $parent = "Kepegawaian";
    private $modul = "Time Management";
    private $title = "Halaman Izin";
    public function index(Request $request)
    {

        // if (request()->ajax()) {
        //     $this->datatable($request);
        // }
        $atasan = 1;
        $data = [
            "breadcrumb" => [
                "group-1" => $this->parent,
                "group-2" => $this->modul,
                "time-management.izin.index" => "Izin ",
            ],
            "title" => "Halaman Izin",
            "subtitle" => "Berikut ini adalah daftar riwayat Izin Anda.",
            "atasan" => $atasan,
            "data" => null
        ];
        return view('kepegawaian.asesmen-pekerja.asesmen-multirater-360.time-management.izin.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        if (request()->ajax()) {
            $this->datatable($request);
        }
        $data = [
            "breadcrumb" => [
                "group-1" => $this->parent,
                "group-2" => $this->modul,
                "time-management.izin.create" => "Izin ",
            ],
            "title" => "Formulir Pengajuan Izin Datang Terlambat / Pulang Cepat.",
            "data" => null
        ];

        return view('kepegawaian.asesmen-pekerja.asesmen-multirater-360.time-management.izin.create-izin', $data);
    }

    public function cetakIzin()
    {
        return view('kepegawaian.asesmen-pekerja.asesmen-multirater-360.time-management.izin.cetak-izin');
        // $pdf = view(
        //     'kepegawaian.asesmen-pekerja.asesmen-multirater-360.time-management.izin.cetak-izin'
        // );

        // $options = new Options();
        // $options->set('isRemoteEnabled', TRUE);
        // $dompdf = new Dompdf($options);
        // $dompdf->getOptions()->set([
        //     'chroot' => base_path('/public'),
        // ]);
        // $dompdf->loadHtml($pdf);
        // $dompdf->setPaper('A4', 'potrait');
        // $dompdf->render();
        // $dompdf->stream('surat-izin-datang-terlambat/pulang-cepat.pdf');
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
