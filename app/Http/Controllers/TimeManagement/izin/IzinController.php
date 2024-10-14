<?php

namespace App\Http\Controllers\TimeManagement\izin;

use Dompdf\Dompdf;
use Dompdf\Options;
use GuzzleHttp\Client;
// use Barryvdh\DomPDF\PDF;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Crypt;
use Yajra\DataTables\Facades\DataTables;
use GuzzleHttp\Exception\RequestException;
use Endroid\QrCode\Builder\Builder;
use Endroid\QrCode\Writer\PngWriter;
// use PDF;

class IzinController extends Controller
{
    private $parent = "Kepegawaian";
    private $modul = "Time Management";
    private $title = "Halaman Izin";

    public function index(Request $request)
    {
        // Ambil data dari session
        $userData = session('userdata');
        $getNipp = $userData['nipp'];

        // Inisiasi Guzzle client
        $client = new Client();

        // URL API
        $apiUrlIzin = config('constants.GET_DATA_IZIN_PEGAWAI') . "?nipp=" . $getNipp;
        $apiUrlStatus = config('constants.GET_STATUS_IZIN');

        try {
            // Buat permintaan GET ke API Izin Pegawai
            $responseIzin = $client->request('GET', $apiUrlIzin, [
                'headers' => [
                    'Authorization' => 'Bearer ' . session('token'),
                    'Accept' => 'application/json',
                ],
                'timeout' => 10,
            ]);

            // Cek apakah respon berhasil (status 200)
            if ($responseIzin->getStatusCode() !== 200) {
                return back()->withErrors(['message' => 'Gagal mengambil data pegawai.']);
            }

            // Buat permintaan GET ke API Status Izin
            $responseStatus = $client->request('GET', $apiUrlStatus, [
                'headers' => [
                    'Authorization' => 'Bearer ' . session('token'),
                    'Accept' => 'application/json',
                ],
                'timeout' => 10,
            ]);

            // Cek apakah respon berhasil (status 200)
            if ($responseStatus->getStatusCode() !== 200) {
                return back()->withErrors(['message' => 'Gagal mengambil status izin.']);
            }

            // Ambil isi dari kedua respons
            $dataIzin = json_decode($responseIzin->getBody(), true);
            $dataStatus = json_decode($responseStatus->getBody(), true);

            // Data atasan dari data izin pegawai
            $atasan = ['atasan' => $dataIzin['data'][0]['atasan'] ?? null];

            // View data yang akan dikirim ke view
            $viewData = [
                "breadcrumb" => [
                    "group-1" => $this->parent,
                    "group-2" => $this->modul,
                    "time-management.izin.index" => "Izin ",
                ],
                "title" => "Halaman Izin",
                "subtitle" => "Berikut ini adalah daftar riwayat Izin Anda.",
                "atasan" => $atasan,
                "statusOptions" => $dataStatus['data'], // Data status izin
            ];

            return view('kepegawaian.asesmen-pekerja.asesmen-multirater-360.time-management.izin.index', $viewData);
        } catch (\GuzzleHttp\Exception\RequestException $e) {
            return back()->withErrors(['message' => 'Gagal mengambil data: ' . $e->getMessage()]);
        } catch (\Exception $e) {
            return back()->withErrors(['message' => 'Terjadi kesalahan: ' . $e->getMessage()]);
        }
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Ambil data dari session
        $userData = session('userdata');
        $getNipp = $userData['nipp'];
        $profile_URL = $userData['profile_URL'];
        // Inisiasi Guzzle client
        $client = new Client();
        // URL API
        $apiUrl = config('constants.GET_DATA_IZIN_PEGAWAI') . "?nipp=" . $getNipp;
        try {
            // Buat permintaan GET ke API
            $response = $client->request('GET', $apiUrl, [
                'headers' => [
                    'Authorization' => 'Bearer ' . session('token'), // Jika Anda masih ingin menyertakan token
                    'Accept' => 'application/json',
                ],
                'timeout' => 10, // Timeout untuk permintaan
            ]);
            // Cek apakah respon berhasil (status 200)
            if ($response->getStatusCode() !== 200) {
                return back()->withErrors(['message' => 'Gagal mengambil data pegawai.']);
            }
            // Ambil isi dari respons
            $data = json_decode($response->getBody(), true);
            // Tampilkan atau gunakan data yang diambil
            $viewData = [
                "breadcrumb" => [
                    "group-1" => $this->parent,
                    "group-2" => $this->modul,
                    "time-management.izin.create" => "Izin ",
                ],
                "title" => "Formulir Pengajuan Izin Datang Terlambat / Pulang Cepat.",
                "data" => $data['data'],
                "profile_URL" => $profile_URL
            ];

            return view('kepegawaian.asesmen-pekerja.asesmen-multirater-360.time-management.izin.create-izin', $viewData);
        } catch (\GuzzleHttp\Exception\RequestException $e) {
            // Tangani jika ada error dalam request
            return back()->withErrors(['message' => 'Gagal mengambil data: ' . $e->getMessage()]);
        } catch (\Exception $e) {
            // Tangani jika ada error umum lainnya
            return back()->withErrors(['message' => 'Terjadi kesalahan: ' . $e->getMessage()]);
        }
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request = [
            'tipe_izin' => $request->input('tipe_izin'),
            'tanggal_izin' => $request->input('tanggal_izin'),
            'jam_izin' => $request->input('jam_izin'),
            'alasan' => $request->input('alasan'),
            'telepon' => $request->input('telepon'),
            'email_korporate' => $request->input('email'),
            'nipp_atasan' => $request->input('nipp_atasan'),
            'nama_atasan' => $request->input('nama_atasan'),
            'email_atasan' => $request->input('email_atasan'),
            'keterangan_atasan' => $request->input('jabatan_atasan'),
            'photo_profile' => $request->input('photo_profile')
        ];
        try {
            $response = (new Client())->post(config('constants.SUBMIT_IZIN'), [
                'headers' => [
                    'Authorization' => 'Bearer ' . session('token'), // Jika Anda masih ingin menyertakan token
                    'Accept' => 'application/json',
                ],
                'form_params' => $request,
            ]);

            $responseBody = json_decode($response->getBody()->getContents(), true);
            if ($responseBody['status'] != 'success') {
                $isValidation = $responseBody['status'] == 'success';
                return $this->error($responseBody['status'], $responseBody['message'], $isValidation);
            }
            // return redirect()->route('time-management.izin.index')->with('success', $responseBody['message']);
            return response()->json(['status' => 'success', 'message' => 'Entri Data Berhasil']);
        } catch (\Throwable $th) {
            return back()->withErrors(['message' => 'Gagal mengambil data: ']);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request)
    {
        // dd($request->all());
        $client = new Client();
        $response = Http::withToken(session('token'))->get(config('constants.GET_DETAIL_PEGAWAI_IZIN') . '?id_izinpulang=' . $request->id)->json();
        $data = $response;
        return response()->json([
            'data' => $response,
        ]);
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
    public function batalPegawai(Request $request)
    {

        // dd($request->all());
        // Validasi ID
        // $request->validate([
        //     'id' => 'required|exists:izin_pulang,id', // Ganti `izin_pulang` dengan nama tabel yang sesuai
        // ]);
        $client = new Client();

        try {
            // Lakukan request POST ke API eksternal
            $response = $client->post(config('constants.SUBMIT_BATAL_IZIN'), [
                'headers' => [
                    'Authorization' => 'Bearer ' . session('token'), // Gunakan token dari sesi
                ],
                'form_params' => [
                    'id_izinpulang' => $request->id, // Decode ID yang mungkin ter-encode
                    'keterangan' => $request->alasan, // Ambil alasan penolakan dari request
                ],
            ]);

            // Decode response body sebagai JSON
            $responseBody = json_decode($response->getBody()->getContents(), true);
            // dd($responseBody); //
            // Cek apakah respon statusnya success
            if ($responseBody['status'] === "success") {
                // Ambil pesan dari response body
                $successMessage = isset($responseBody['message']) ? $responseBody['message'] : 'Pengajuan berhasil dibatalkan.';
                return response()->json(['message' => $successMessage], 200);
            } else {
                // Ambil pesan error dari response body jika status gagal
                $errorMessage = isset($responseBody['message']) ? $responseBody['message'] : 'Terjadi kesalahan saat membatalkan pengajuan.';
                return response()->json(['message' => $errorMessage], 500);
            }
        } catch (RequestException $e) {
            // Tangani exception jika API gagal
            $errorResponse = $e->hasResponse() ? $e->getResponse()->getBody()->getContents() : 'Server Error';
            return response()->json(['message' => $errorResponse], 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function getHistoryIzin(Request $request)
    {
        $userData = session('userdata');
        $getNipp = $userData['nipp'];

        // Inisiasi Guzzle client
        $client = new Client();

        // URL API
        $apiUrl = config('constants.GET_HISTORY_PEGAWAI_IZIN') . "?nipp=" . $getNipp;

        // Tetapkan nilai untuk pageSize dan pageNumber
        $pageSize = 1000;  // Contoh ukuran halaman
        $pageNumber = 1; // Contoh nomor halaman

        // Tambahkan parameter pageSize dan pageNumber ke URL
        $apiUrl .= "&pageSize=" . $pageSize . "&pageNumber=" . $pageNumber;
        try {
            // Buat permintaan GET ke API
            $response = $client->request('GET', $apiUrl, [
                'headers' => [
                    'Authorization' => 'Bearer ' . session('token'), // Jika Anda masih ingin menyertakan token
                    'Accept' => 'application/json',
                ],
                'timeout' => 10, // Timeout untuk permintaan
            ]);

            // Decode response body
            $data = json_decode($response->getBody(), true);

            // Cek jika status fail atau data tidak ditemukan
            if ($data['status'] == 'fail') {
                return response()->json([
                    'draw' => intval($request->input('draw')),
                    'recordsTotal' => 0,
                    'recordsFiltered' => 0,
                    'data' => []
                ]);
            }

            // Jika data ditemukan, kirim ke DataTables
            return DataTables::of($data['data'])
                ->addIndexColumn()
                ->addColumn('tipeIzin', function ($row) {
                    return $row['tipeIzinDesc'];
                })
                ->addColumn('tanggal', function ($row) {
                    return $row['tanggal'];
                })
                ->addColumn('jam', function ($row) {
                    $timeParts = explode(':', $row['jam']); // Pisahkan berdasarkan ":"
                    $formattedTime = $timeParts[0] . ':' . $timeParts[1]; // Ambil jam dan menit saja
                    return $formattedTime; // Kembalikan hasil format
                })
                ->addColumn('jumlahJam', function ($row) {
                    $hourParts = explode(':', $row['jumlahJam']); // Pisahkan berdasarkan ":"
                    $formattedHour = (int) $hourParts[0]; // Ambil bagian jam dan ubah ke integer
                    return $formattedHour . ' jam'; // Mengembalikan hasil dalam format yang diinginkan
                })
                ->addColumn('namaAtasan', function ($row) {
                    return $row['namaAtasan'];
                })
                ->addColumn('nippAtasan', function ($row) {
                    return $row['nippAtasan'];
                })
                ->addColumn('telepon', function ($row) {
                    return $row['telepon'];
                })
                ->addColumn('alasan', function ($row) {
                    return $row['alasan'];
                })
                ->addColumn('status', function ($row) {
                    if ($row['statusApprove'] == 0) {
                        return '<span class="badge bg-warning">Menunggu</span>';
                    } elseif ($row['statusApprove'] == 1) {
                        return '<span class="badge bg-success">Disetujui</span>';
                    } elseif ($row['statusApprove'] == 2) {
                        return '<span class="badge bg-danger">Ditolak</span>';
                    } elseif ($row['statusApprove'] == 3) {
                        return '<span class="badge bg-dark">Batal</span>';
                    }
                })
                ->rawColumns(['status']) // Pastikan status dirender dengan benar
                ->make(true);
        } catch (RequestException $e) {
            // Jika terjadi error (misal 404), kembalikan data kosong
            if ($e->hasResponse() && $e->getResponse()->getStatusCode() == 404) {
                return response()->json([
                    'draw' => intval($request->input('draw')),
                    'recordsTotal' => 0,
                    'recordsFiltered' => 0,
                    'data' => []
                ]);
            }

            // Tangani error lainnya jika perlu
            return response()->json([
                'error' => 'Terjadi kesalahan saat mengambil data izin'
            ], 500);
        }
    }

    public function getHistoryIzinAtasan(Request $request)
    {
        $userData = session('userdata');
        $getNipp = $userData['nipp'];
        // Inisiasi Guzzle client
        $client = new Client();
        // URL API
        $apiUrl = config('constants.GET_HISTORY_PEGAWAI_IZIN') . "?nipp=" . $getNipp;

        $pageSize = 40;  // Contoh ukuran halaman
        $pageNumber = 1; // Contoh nomor halaman

        // Tambahkan parameter pageSize dan pageNumber ke URL
        $apiUrl .= "&pageSize=" . $pageSize . "&pageNumber=" . $pageNumber;

        try {
            // Buat permintaan GET ke API
            $response = $client->request('GET', $apiUrl, [
                'headers' => [
                    'Authorization' => 'Bearer ' . session('token'), // Jika Anda masih ingin menyertakan token
                    'Accept' => 'application/json',
                ],
                'timeout' => 10, // Timeout untuk permintaan
            ]);

            // Decode response body
            $data = json_decode($response->getBody(), true);

            // Cek jika status fail atau data tidak ditemukan
            if ($data['status'] == 'fail') {
                return response()->json([
                    'draw' => intval($request->input('draw')),
                    'recordsTotal' => 0,
                    'recordsFiltered' => 0,
                    'data' => []
                ]);
            }

            // Jika data ditemukan, kirim ke DataTables
            return DataTables::of($data['data'])
                ->addIndexColumn()
                ->addColumn('tipeIzin', function ($row) {
                    return $row['tipeIzinDesc'];
                })
                ->addColumn('tanggal', function ($row) {
                    return $row['tanggal'];
                })
                ->addColumn('jam', function ($row) {
                    $timeParts = explode(':', $row['jam']); // Pisahkan berdasarkan ":"
                    $formattedTime = $timeParts[0] . ':' . $timeParts[1]; // Ambil jam dan menit saja
                    return $formattedTime; // Kembalikan hasil format
                })
                ->addColumn('jumlahJam', function ($row) {
                    $hourParts = explode(':', $row['jumlahJam']); // Pisahkan berdasarkan ":"
                    $formattedHour = (int) $hourParts[0]; // Ambil bagian jam dan ubah ke integer
                    return $formattedHour . ' jam'; // Mengembalikan hasil dalam format yang diinginkan
                })
                ->addColumn('namaAtasan', function ($row) {
                    return $row['namaAtasan'];
                })
                ->addColumn('nippAtasan', function ($row) {
                    return $row['nippAtasan'];
                })
                ->addColumn('telepon', function ($row) {
                    return $row['telepon'];
                })
                ->addColumn('alasan', function ($row) {
                    return $row['alasan'];
                })
                ->addColumn('status', function ($row) {
                    if ($row['statusApprove'] == 0) {
                        return '<span class="badge bg-warning">Menunggu</span>';
                    } elseif ($row['statusApprove'] == 1) {
                        return '<span class="badge bg-success">Disetujui</span>';
                    } elseif ($row['statusApprove'] == 2) {
                        return '<span class="badge bg-danger">Ditolak</span>';
                    } elseif ($row['statusApprove'] == 3) {
                        return '<span class="badge bg-dark">Batal</span>';
                    }
                })
                ->rawColumns(['status']) // Pastikan status dirender dengan benar
                ->make(true);
        } catch (RequestException $e) {
            // Jika terjadi error (misal 404), kembalikan data kosong
            if ($e->hasResponse() && $e->getResponse()->getStatusCode() == 404) {
                return response()->json([
                    'draw' => intval($request->input('draw')),
                    'recordsTotal' => 0,
                    'recordsFiltered' => 0,
                    'data' => []
                ]);
            }

            // Tangani error lainnya jika perlu
            return response()->json([
                'error' => 'Terjadi kesalahan saat mengambil data izin'
            ], 500);
        }
    }

    public function getStatusIzin(Request $request)
    {
        $client = new Client();
        $apiUrl = config('constants.GET_STATUS_IZIN');
        $response = $client->request('GET', $apiUrl, [
            'headers' => [
                'Authorization' => 'Bearer ' . session('token'), // Jika Anda masih ingin menyertakan token
                'Accept' => 'application/json',
            ],
            'timeout' => 10, // Timeout untuk permintaan
        ]);
        $data = json_decode($response->getBody(), true);
        return response()->json($data);
    }


    public function cetakIzin(Request $request)
    {
        $response = Http::withToken(session('token'))
            ->get(config('constants.GET_DETAIL_PEGAWAI_IZIN') . '?id_izinpulang=' . $request->id)
            ->json();

        if ($response['status'] == 'success') {
            $data = $response['data'];
        } else {
            return response()->json(['error' => 'Data izin tidak ditemukan.'], 404);
        }

        $nippAtasan = $data[0]['nippAtasan'];
        $namaAtasan = $data[0]['namaAtasan'];
        $nippPegawai = $data[0]['nippPegawai'];
        $namaPegawai = $data[0]['namaPegawai'];
        $tglIzin = $data[0]['createdAt'];

        $qrCodeAtasan = Builder::create()
            ->writer(new PngWriter())
            ->data("Nipp Atasan: " . $nippAtasan . "," . // Menggunakan \n untuk enter
                "Nama Atasan: " . $namaAtasan)
            ->size(500)  // Ukuran lebih besar
            ->margin(10) // Margin lebih besar
            ->build();
        $qrCodeAtasanImage = 'data:image/png;base64,' . base64_encode($qrCodeAtasan->getString());

        $qrCodePribadi = Builder::create()
            ->writer(new PngWriter())
            ->data("Nipp: " . $nippPegawai . "," .  // Menggunakan \n untuk enter
                "Nama: " . $namaPegawai)
            ->size(500)  // Ukuran lebih besar
            ->margin(10) // Margin lebih besar
            ->build();
        $qrCodePribadiImage = 'data:image/png;base64,' . base64_encode($qrCodePribadi->getString());

        $html = view('kepegawaian.asesmen-pekerja.asesmen-multirater-360.time-management.izin.cetak-izin', compact('data', 'qrCodeAtasanImage', 'qrCodePribadiImage'))->render();

        $dompdf = new Dompdf();
        $dompdf->loadHtml($html);
        $dompdf->setPaper('A4', 'landscape');
        $dompdf->render();

        return $dompdf->stream($nippPegawai . '' . date('dmy', strtotime($tglIzin)) . '.pdf');
    }

    // CONTROLLER YOGA
    public function getPengajuanIzin(Request $request)
    {
        $userData = session('userdata');

        // Cek jika ada session
        // Inisiasi Guzzle client
        $client = new Client();
        // URL API
        $apiUrl = config('constants.GET_IZIN_APPROVAL');
        // Buat permintaan GET ke API
        $response = $client->request('GET', $apiUrl, [
            'headers' => [
                'Authorization' => 'Bearer ' . session('token'), // Jika Anda masih ingin menyertakan token
                'Accept' => 'application/json',
            ],
            'timeout' => 10, // Timeout untuk permintaan
        ]);

        $data = json_decode($response->getBody(), true);
        // dd($data);

        return DataTables::of($data['data'])
            ->addColumn('nippPegawai', function ($row) {
                return $row['nippPegawai'];
            })
            ->addColumn('namaPegawai', function ($row) {
                return $row['namaPegawai'];
            })
            ->addColumn('posisiPegawai', function ($row) {
                return $row['posisiPegawai'];
            })
            ->addColumn('tanggal', function ($row) {
                return $row['tanggal'];
            })
            ->addColumn('namaAtasan', function ($row) {
                return $row['namaAtasan'];
            })
            ->addColumn('statusApprove', function ($row) {
                return $row['statusApprove']; // Pastikan ini sesuai dengan data API
            })
            ->addColumn('action', function ($row) {
                return '<a id="btnShowModalTanggapi" data-id="' . $row['idIzinPulang'] . '" class="fw-bolder cursor-pointer">Tanggapi Pengajuan</a>';
            })
            ->make(true);
    }

    public function show_tanggapi(Request $request)
    {
        // dd($request->all());
        $client = new Client();
        $response = Http::withToken(session('token'))->get(config('constants.GET_IZIN_DETAIL_PENGAJUAN') . '?id_izinpulang=' . $request->id)->json();
        $data = $response;
        return response()->json([
            'data' => $response,
        ]);
    }

    public function submit_tanggapi(Request $request)
    {
        // dd($request->all());
        try {
            $response = (new Client())->post(config('constants.SUBMIT_IZIN_APPROVE'), [
                'headers' => [
                    'Authorization' => 'Bearer ' . session('token'), // Jika Anda masih ingin menyertakan token
                    'Accept' => 'application/json',
                ],
                'form_params' => [
                    'id_izinpulang' => $request->id, // Decode ID yang mungkin ter-encode
                    'approve' => $request->status, // Ambil alasan penolakan dari request
                    'keterangan' => $request->alasan
                ],
            ]);
            // dd($response->getBody()->getContents());
            $responseBody = json_decode($response->getBody()->getContents(), true);
            // dd($responseBody);
            // Cek apakah respon statusnya success
            if ($responseBody['status'] === "success") {
                // Ambil pesan dari response body
                $successMessage = isset($responseBody['message']) ? $responseBody['message'] : 'Pengajuan berhasil dibatalkan.';
                return response()->json(['message' => $successMessage], 200);
            } else {
                // Ambil pesan error dari response body jika status gagal
                $errorMessage = isset($responseBody['message']) ? $responseBody['message'] : 'Terjadi kesalahan saat membatalkan pengajuan.';
                return response()->json(['message' => $errorMessage], 500);
            }
        } catch (RequestException $e) {
            // Tangani exception jika API gagal
            $errorResponse = $e->hasResponse() ? $e->getResponse()->getBody()->getContents() : 'Server Error';
            return response()->json(['message' => $errorResponse], 500);
        }
    }

    public function getApprovalIzin(Request $request)
    {
        $userData = session('userdata');
        // Inisiasi Guzzle client
        $client = new Client();
        // URL API
        $apiUrl = config('constants.GET_IZIN_APPROVAL_HISTORY');
        // Buat permintaan GET ke API
        $response = $client->request('GET', $apiUrl, [
            'headers' => [
                'Authorization' => 'Bearer ' . session('token'), // Jika Anda masih ingin menyertakan token
                'Accept' => 'application/json',
            ],
            'timeout' => 10, // Timeout untuk permintaan
        ]);

        $data = json_decode($response->getBody(), true);
        return DataTables::of($data['data'])
            ->addColumn('nippPegawai', function ($row) {
                return $row['nippPegawai'];
            })
            ->addColumn('namaPegawai', function ($row) {
                return $row['namaPegawai'];
            })
            ->addColumn('posisiPegawai', function ($row) {
                return $row['posisiPegawai'];
            })
            ->addColumn('tanggal', function ($row) {
                return $row['tanggal'];
            })
            ->addColumn('namaAtasan', function ($row) {
                return $row['namaAtasan'];
            })
            ->addColumn('statusApproveType', function ($row) {
                return $row['statusApproveType']; // Pastikan ini sesuai dengan data API
            })
            ->addColumn('action', function ($row) {
                return '<a id="btnShowModalDetail" data-id="' . $row['idIzinPulang'] . '" class="fw-bolder cursor-pointer">Lihat Detail</a>';
            })
            ->make(true);
    }

    public function show_approvaldetail(Request $request)
    {
        // dd($request->all());
        $client = new Client();
        $response = Http::withToken(session('token'))->get(config('constants.GET_IZIN_DETAIL_PENGAJUAN') . '?id_izinpulang=' . $request->id)->json();
        $data = $response;
        return response()->json([
            'data' => $response,
        ]);
    }

    // public function tolakPengajuanDinas(Request $request)
    // {

    //     // dd($request->all());
    //     // Validasi ID
    //     // $request->validate([
    //     //     'id' => 'required|exists:izin_pulang,id', // Ganti `izin_pulang` dengan nama tabel yang sesuai
    //     // ]);
    //     $client = new Client();

    //     try {
    //         // Lakukan request POST ke API eksternal
    //         $response = $client->post(config('constants.SUBMIT_BATAL_IZIN'), [
    //             'headers' => [
    //                 'Authorization' => 'Bearer ' . session('token'), // Gunakan token dari sesi
    //             ],
    //             'form_params' => [
    //                 'id_izinpulang' => $request->id, // Decode ID yang mungkin ter-encode
    //                 'keterangan' => $request->alasan, // Ambil alasan penolakan dari request
    //             ],
    //         ]);

    //         dd($response);

    //         // Decode response body sebagai JSON
    //         $responseBody = json_decode($response->getBody()->getContents(), true);
    //         // dd($responseBody); //
    //         // Cek apakah respon statusnya success
    //         if ($responseBody['status'] === "success") {
    //             // Ambil pesan dari response body
    //             $successMessage = isset($responseBody['message']) ? $responseBody['message'] : 'Pengajuan berhasil dibatalkan.';
    //             return response()->json(['message' => $successMessage], 200);
    //         } else {
    //             // Ambil pesan error dari response body jika status gagal
    //             $errorMessage = isset($responseBody['message']) ? $responseBody['message'] : 'Terjadi kesalahan saat membatalkan pengajuan.';
    //             return response()->json(['message' => $errorMessage], 500);
    //         }
    //     } catch (RequestException $e) {
    //         // Tangani exception jika API gagal
    //         $errorResponse = $e->hasResponse() ? $e->getResponse()->getBody()->getContents() : 'Server Error';
    //         return response()->json(['message' => $errorResponse], 500);
    //     }
    // }
}
