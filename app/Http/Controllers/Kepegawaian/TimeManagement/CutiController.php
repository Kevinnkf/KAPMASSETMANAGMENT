<?php

namespace App\Http\Controllers\Kepegawaian\TimeManagement;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CutiController extends Controller
{
    private $parent = "Kepegawaian";
    private $modul = "Time Management";
    private $title = "Cuti";

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = [
            "breadcrumb" => [
                "group-1" => $this->parent,
                "group-2" => $this->modul,
                "cuti.index" => "Cuti",
            ],
            "title" => "Cuti",
            "data" => null
        ];

        return view('kepegawaian.time-management.cuti.index', $data);
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
                "cuti.index" => "Cuti",
            ],
            "title" => "Cuti",
            "data" => null
        ];

        return view('kepegawaian.time-management.cuti.form-pengajuan', $data);
        // return view('kepegawaian.time-management.cuti.form-dropzone', $data);
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

    public function submitCuti(Request $request)
    {
        $validNamaAtasan = 'Nama';
        $validNippAtasan = 'Nipp';
        $validJabatanAtasan = 'Jabatan';
        $validEmailAtasan = 'email@gmail.com';

        $validated = $request->validate([
            // Data Pegawai
            'nama' => [
                'required',
                'string',
                'max:255',
            ],
            'nipp' => [
                'required',
                'string',
                'max:255',
            ],
            'jabatan' => [
                'required',
                'string',
                'max:255',
            ],
            'unit_kerja' => [
                'required',
                'string',
                'max:255',
            ],
            'email' => [
                'required',
                'email',
                'max:255',
            ],

            // Data Cuti
            'jenis_cuti' => [
                'required',
                'string',
            ],
            'tanggal_mulai' => [
                'required',
                'date',
            ],
            'tanggal_akhir' => [
                'required',
                'date',
                'after:tanggal_mulai',
            ],
            'alamat' => [
                'required',
                'string',
            ],
            'kontak' => [
                'required',
                'string',
                'regex:/^\+62 \d{4} \d{3} \d{4}$/',
            ],

            // Data Atasan
            'nama_atasan' => [
                'required',
                'string',
                'max:255',
                'in:' . $validNamaAtasan, // Value harus ada dalam daftar
            ],
            'nipp_atasan' => [
                'required',
                'string',
                'max:255',
                'in:' . $validNippAtasan, // Value harus ada dalam daftar
            ],
            'jabatan_atasan' => [
                'required',
                'string',
                'max:255',
                'in:' . $validJabatanAtasan, // Value harus ada dalam daftar
            ],
            'email_atasan' => [
                'required',
                'email',
                'max:255',
                'in:' . $validEmailAtasan, // Value harus ada dalam daftar
            ],
        ], [
            // Data Pegawai
            'nama.required' => 'Nama tidak boleh kosong.',
            'nama.string' => 'Nama harus berupa string.',
            'nama.max' => 'Nama tidak boleh lebih dari 255 karakter.',

            'nipp.required' => 'Nomor NIPP tidak boleh kosong.',
            'nipp.string' => 'Nomor NIPP harus berupa string.',
            'nipp.max' => 'Nomor NIPP tidak boleh lebih dari 255 karakter.',

            'jabatan.required' => 'Nama jabatan tidak boleh kosong.',
            'jabatan.string' => 'Nama jabatan harus berupa string.',
            'jabatan.max' => 'Nama jabatan tidak boleh lebih dari 255 karakter.',

            'unit_kerja.required' => 'Unit kerja tidak boleh kosong.',
            'unit_kerja.string' => 'Unit kerja harus berupa string.',
            'unit_kerja.max' => 'Unit kerja tidak boleh lebih dari 255 karakter.',

            'email.required' => 'Email tidak boleh kosong.',
            'email.email' => 'Format email yang anda masukan salah.',
            'email.max' => 'Email tidak boleh lebih dari 255 karakter.',
            'email.in' => 'Email yang anda masukan tidak sesuai.',

            // Data Cuti
            'jenis_cuti.required' => 'Jenis cuti tidak boleh kosong.',
            'jenis_cuti.string' => 'Jenis cuti harus berupa string.',

            'tanggal_mulai.required' => 'Tanggal mulai tidak boleh kosong.',

            'tanggal_akhir.required' => 'Tanggal akhir tidak boleh kosong.',
            'tanggal_akhir.after' => 'Tanggal akhir harus lebih besar dari tanggal mulai.',

            'alamat.required' => 'Alamat tidak boleh kosong.',
            'alamat.string' => 'Alamat harus berupa string.',
            'alamat.max' => 'Alamat tidak boleh lebih dari 255 karakter.',

            'kontak.required' => 'Kontak tidak boleh kosong.',
            'kontak.string' => 'Kontak harus berupa string.',
            'kontak.max' => 'Kontak tidak boleh lebih dari 255 karakter.',
            'kontak.regex' => 'Format nomor telepon harus +62 0000 000 0000.',

            // Data Atasan
            'nama_atasan.required' => 'Nama tidak boleh kosong.',
            'nama_atasan.string' => 'Nama harus berupa string.',
            'nama_atasan.max' => 'Nama tidak boleh lebih dari 255 karakter.',
            'nama_atasan.in' => 'Nama atasan yang anda masukan tidak ditemukan.',

            'nipp_atasan.required' => 'Nomor NIPP tidak boleh kosong.',
            'nipp_atasan.string' => 'Nomor NIPP harus berupa string.',
            'nipp_atasan.max' => 'Nomor NIPP tidak boleh lebih dari 255 karakter.',
            'nipp_atasan.in' => 'Nomor NIPP yang anda masukan salah.',

            'jabatan_atasan.required' => 'Nama jabatan tidak boleh kosong.',
            'jabatan_atasan.string' => 'Nama jabatan harus berupa string.',
            'jabatan_atasan.max' => 'Nama jabatan tidak boleh lebih dari 255 karakter.',
            'jabatan_atasan.in' => 'Nama jabatan yang anda masukan tidak sesuai.',

            'email_atasan.required' => 'Email tidak boleh kosong.',
            'email_atasan.email' => 'Format email yang anda masukan salah.',
            'email_atasan.max' => 'Email tidak boleh lebih dari 255 karakter.',
            'email_atasan.in' => 'Email yang anda masukan tidak sesuai.',
        ]);


        // Lakukan penyimpanan atau proses lainnya
        return redirect()->back()->with('success', 'Form cuti berhasil diajukan.');
    }
}
