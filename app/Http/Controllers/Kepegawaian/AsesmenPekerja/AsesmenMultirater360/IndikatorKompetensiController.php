<?php

namespace App\Http\Controllers\Kepegawaian\AsesmenPekerja\AsesmenMultirater360;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class IndikatorKompetensiController extends Controller
{
    private $parent = "Kepegawaian";
    private $modul = "Asesmen Pekerja";
    private $submodul = "General Settings";
    private $title = "Indikator Kompetensi";

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = [
            "breadcrumb" => [
                "group-1" => $this->parent,
                "group-2" => $this->modul,
                "asesmen-multirater-360-dashboard.index" => "Asesmen Multirater 360",
                "asesmen-multirater-360-indikator-kompetensi.index" =>  $this->submodul . " - " . $this->title
            ],
            "title" => $this->title,
            "data" => null
        ];

        return view('kepegawaian.asesmen-pekerja.asesmen-multirater-360.general-settings.indikator-kompetensi.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
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
