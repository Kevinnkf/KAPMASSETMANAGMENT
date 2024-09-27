<?php

namespace App\Http\Controllers\Kepegawaian\TimeManagement\Dinas;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    private $parent = "Kepegawaian";
    private $modul = "Time Management";
    private $title = "Dinas";

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = [
            "breadcrumb" => [
                "group-1" => $this->parent,
                "group-2" => $this->modul,
                "Dinas.index" => "Dinas",
            ],
            "title" => "Halaman Dinas",
            "subtitle" => "Berikut ini adalah halaman dinas anda",
            "data" => null
        ];

        return view('kepegawaian.time-management.dinas.index_atasan', $data);
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data = [
            "breadcrumb" => [
                "group-1" => $this->parent,
                "group-2" => $this->modul,
                "Dinas.index" => "Dinas",
            ],
            "title" => "Formulir Pengajuan Dinasan",
            "subtitle" => "",
            "data" => null
        ];
        return view('kepegawaian.time-management.dinas.create',$data);
    }
    public function show()
    {
        $data = [
            "breadcrumb" => [
                "group-1" => $this->parent,
                "group-2" => $this->modul,
                "Dinas.index" => "Dinas",
            ],
            "title" => "Formulir Pengajuan Dinasan",
            "subtitle" => "",
            "data" => null
        ];
        return view('kepegawaian.time-management.dinas.modal_detail',$data);
    }
    /**
     * Cetak formulir pengajuan dinas
     *
     * @param int $id ID dari pengajuan dinas
     * @return \Illuminate\Http\Response
     */
    public function cetak($id)
    {
        $data = [
            "breadcrumb" => [
                "group-1" => $this->parent,
                "group-2" => $this->modul,
                "Dinas.index" => "Dinas",
            ],
            "title" => "Formulir Pengajuan Dinasan",
            "subtitle" => "",
            "data" => $id
        ];
        return view('kepegawaian.time-management.dinas.cetak',$data);
    }

    /**
     * Display a listing of the resource.
     */
    public function listoperator()
    {
        $data = [
            "breadcrumb" => [
                "group-1" => $this->parent,
                "group-2" => $this->modul,
                "Dinas.index" => "Dinas",
            ],
            "title" => "Falah Ocktafian Akbar Putera",
            "subtitle" => "UPT Resort Jalan Rel 3,15 Ciledung Daop III Cirebon",
            "data" => null
        ];

        return view('kepegawaian.time-management.dinas.listoperator', $data);
    }
    
    /**
     * Cetak formulir pengajuan dinas
     *
     * @param int $id ID dari pengajuan dinas
     * @return \Illuminate\Http\Response
     */
    public function cetakoperator($id)
    {
        $data = [
            "breadcrumb" => [
                "group-1" => $this->parent,
                "group-2" => $this->modul,
                "Dinas.index" => "Dinas",
            ],
            "title" => "Formulir Pengajuan Dinasan",
            "subtitle" => "",
            "data" => $id
        ];
        return view('kepegawaian.time-management.dinas.cetak',$data);
    }
}
