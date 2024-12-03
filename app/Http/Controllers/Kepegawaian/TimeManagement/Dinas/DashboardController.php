<?php

namespace App\Http\Controllers\Kepegawaian\TimeManagement\Dinas;

use Dompdf\Dompdf;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Endroid\QrCode\Builder\Builder;
use App\Http\Controllers\Controller;
use Endroid\QrCode\Writer\PngWriter;
use Illuminate\Support\Facades\Http;
use Yajra\DataTables\Facades\DataTables;
use GuzzleHttp\Exception\RequestException;


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
        // $data = [
        //     "breadcrumb" => [
        //         "group-1" => $this->parent,
        //         "group-2" => $this->modul,
        //         "Dinas.index" => "Dinas",
        //     ],
        //     "title" => "Halaman Dinas",
        //     "subtitle" => "Berikut ini adalah halaman dinas anda",
        //     "data" => null
        // ];

        // return view('kepegawaian.time-management.dinas.index_atasan', $data);

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
                    "Dinas.index" => "Dinas",
                ],
                "title" => "Halaman Dinas",
                "subtitle" => "Berikut ini adalah halaman dinas anda",
                "atasan" => $atasan,
                "statusOptions" => $dataStatus['data'], // Data status izin
            ];

            return view('kepegawaian.time-management.dinas.index_atasan', $viewData);
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
        $apiUrl = config('constants.GET_DATA_DINAS_PEGAWAI') . "?nipp=" . $getNipp;
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
                    "Dinas.index" => "Dinas",
                ],
                "title" => "Formulir Pengajuan Dinasan",
                "data" => $data['data'],
                "profile_URL" => $profile_URL
            ];

            return view('kepegawaian.time-management.dinas.create', $viewData);
        } catch (\GuzzleHttp\Exception\RequestException $e) {
            // Tangani jika ada error dalam request
            return back()->withErrors(['message' => 'Gagal mengambil data: ' . $e->getMessage()]);
        } catch (\Exception $e) {
            // Tangani jika ada error umum lainnya
            return back()->withErrors(['message' => 'Terjadi kesalahan: ' . $e->getMessage()]);
        }
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
        return view('kepegawaian.time-management.dinas.modal_detail', $data);
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
        return view('kepegawaian.time-management.dinas.cetak', $data);
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
        return view('kepegawaian.time-management.dinas.cetak', $data);
    }

    public function getHistoryDinas(Request $request)
    {
        $userData = session('userdata');
        $getNipp = $userData['nipp'];

        // Inisiasi Guzzle client
        $client = new Client();

        // URL API
        $apiUrl = config('constants.GET_HISTORY_PEGAWAI_DINAS') . "?nipp=" . $getNipp;

        // Tetapkan nilai untuk pageSize dan pageNumber
        $pageSize = 1000;  // Contoh ukuran halaman
        $pageNumber = 1; // Contoh nomor halaman

        // Tambahkan parameter pageSize dan pageNumber ke URL
        $apiUrl .= "&pageNumber=" . $pageNumber . "&pageSize=" . $pageSize;
        // dd($apiUrl);

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
                ->addColumn('jenisDinas', function ($row) {
                    return $row['jenisDinas'];
                })
                ->addColumn('alamat', function ($row) {
                    return $row['alamat'];
                })
                // ->addColumn('jam', function ($row) {
                //     $timeParts = explode(':', $row['jam']); // Pisahkan berdasarkan ":"
                //     $formattedTime = $timeParts[0] . ':' . $timeParts[1]; // Ambil jam dan menit saja
                //     return $formattedTime; // Kembalikan hasil format
                // })
                // ->addColumn('jumlahJam', function ($row) {
                //     $hourParts = explode(':', $row['jumlahJam']); // Pisahkan berdasarkan ":"
                //     $formattedHour = (int) $hourParts[0]; // Ambil bagian jam dan ubah ke integer
                //     return $formattedHour . ' jam'; // Mengembalikan hasil dalam format yang diinginkan
                // })
                ->addColumn('tanggalMulai', function ($row) {
                    return $row['tanggalMulai'];
                })
                ->addColumn('tanggalBerakhir', function ($row) {
                    return $row['tanggalBerakhir'];
                })
                ->addColumn('jamMulai', function ($row) {
                    return $row['jamMulai'];
                })
                // ->addColumn('status', function ($row) {
                //     if ($row['statusApprove'] == 0) {
                //         return '<span class="badge bg-warning">Menunggu</span>';
                //     } elseif ($row['statusApprove'] == 1) {
                //         return '<span class="badge bg-success">Disetujui</span>';
                //     } elseif ($row['statusApprove'] == 2) {
                //         return '<span class="badge bg-danger">Ditolak</span>';
                //     } elseif ($row['statusApprove'] == 3) {
                //         return '<span class="badge bg-dark">Batal</span>';
                //     }
                // })
                // ->rawColumns(['status']) // Pastikan status dirender dengan benar
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

    public function getHistoryDinasAtasan(Request $request)
    {
        $userData = session('userdata');
        $getNipp = $userData['nipp'];

        // Inisiasi Guzzle client
        $client = new Client();

        // URL API
        $apiUrl = config('constants.GET_HISTORY_PEGAWAI_DINAS') . "?nipp=" . $getNipp;

        // Tetapkan nilai untuk pageSize dan pageNumber
        $pageSize = 1000;  // Contoh ukuran halaman
        $pageNumber = 1; // Contoh nomor halaman

        // Tambahkan parameter pageSize dan pageNumber ke URL
        $apiUrl .= "&pageNumber=" . $pageNumber . "&pageSize=" . $pageSize;
        // dd($apiUrl);

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
            // dd($data);

            // Cek jika status fail atau data tidak ditemukan
            if ($data['status'] == 'fail') {
                return response()->json([
                    'draw' => intval($request->input('draw')),
                    'recordsTotal' => 0,
                    'recordsFiltered' => 0,
                    'data' => []
                ]);
            }

            function formatDate($dateString)
            {
                $date = new \DateTime($dateString); // Tambahkan "\" sebelum DateTime
                $monthNames = [
                    'Januari',
                    'Februari',
                    'Maret',
                    'April',
                    'Mei',
                    'Juni',
                    'Juli',
                    'Agustus',
                    'September',
                    'Oktober',
                    'November',
                    'Desember'
                ];

                $day = $date->format('d');
                $month = $monthNames[$date->format('n') - 1];
                $year = $date->format('Y');

                return "$day $month $year";
            }
            // Jika data ditemukan, kirim ke DataTables
            return DataTables::of($data['data'])
                ->addIndexColumn()
                ->addColumn('jenisDinas', function ($row) {
                    return $row['jenisDinas'];
                })
                ->addColumn('alamat', function ($row) {
                    return $row['alamat'];
                })
                // ->addColumn('jam', function ($row) {
                //     $timeParts = explode(':', $row['jam']); // Pisahkan berdasarkan ":"
                //     $formattedTime = $timeParts[0] . ':' . $timeParts[1]; // Ambil jam dan menit saja
                //     return $formattedTime; // Kembalikan hasil format
                // })
                // ->addColumn('jumlahJam', function ($row) {
                //     $hourParts = explode(':', $row['jumlahJam']); // Pisahkan berdasarkan ":"
                //     $formattedHour = (int) $hourParts[0]; // Ambil bagian jam dan ubah ke integer
                //     return $formattedHour . ' jam'; // Mengembalikan hasil dalam format yang diinginkan
                // })
                ->addColumn('tanggalMulai', function ($row) {
                    return formatDate($row['tanggalMulai']); // Format tanggal mulai
                })
                ->addColumn('tanggalBerakhir', function ($row) {
                    return formatDate($row['tanggalBerakhir']); // Format tanggal berakhir
                })
                ->addColumn('jamMulai', function ($row) {
                    return $row['jamMulai'];
                })
                // ->addColumn('status', function ($row) {
                //     if ($row['statusApprove'] == 0) {
                //         return '<span class="badge bg-warning">Menunggu</span>';
                //     } elseif ($row['statusApprove'] == 1) {
                //         return '<span class="badge bg-success">Disetujui</span>';
                //     } elseif ($row['statusApprove'] == 2) {
                //         return '<span class="badge bg-danger">Ditolak</span>';
                //     } elseif ($row['statusApprove'] == 3) {
                //         return '<span class="badge bg-dark">Batal</span>';
                //     }
                // })
                // ->rawColumns(['status']) // Pastikan status dirender dengan benar
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
                'error' => 'Terjadi kesalahan saat mengambil data dinas'
            ], 500);
        }
    }

    public function getPengajuanDinas(Request $request)
    {
        $userData = session('userdata');

        // Cek jika ada session
        // Inisiasi Guzzle client
        $client = new Client();
        // URL API
        $apiUrl = config('constants.GET_DINAS_APPROVAL');

        $pageSize = 1000;  // Contoh ukuran halaman
        $pageNumber = 1; // Contoh nomor halaman

        // Tambahkan parameter pageSize dan pageNumber ke URL
        $apiUrl .= "?pageNumber=" . $pageNumber . "&pageSize=" . $pageSize;
        // dd($apiUrl);
        // Buat permintaan GET ke API
        try {
            $response = $client->request('GET', $apiUrl, [
                'headers' => [
                    'Authorization' => 'Bearer ' . session('token'), // Jika Anda masih ingin menyertakan token
                    'Accept' => 'application/json',
                ],
                'timeout' => 10, // Timeout untuk permintaan
            ]);

            $data = json_decode($response->getBody(), true);
            // dd($data);
            function formatDate($dateString)
            {
                $date = new \DateTime($dateString); // Tambahkan "\" sebelum DateTime
                $monthNames = [
                    'Januari',
                    'Februari',
                    'Maret',
                    'April',
                    'Mei',
                    'Juni',
                    'Juli',
                    'Agustus',
                    'September',
                    'Oktober',
                    'November',
                    'Desember'
                ];

                $day = $date->format('d');
                $month = $monthNames[$date->format('n') - 1];
                $year = $date->format('Y');

                return "$day $month $year";
            }

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
                ->addColumn('jenisDinas', function ($row) {
                    return $row['jenisDinas'];
                })
                ->addColumn('alamat', function ($row) {
                    return $row['alamat'];
                })
                ->addColumn('tanggalMulai', function ($row) {
                    return formatDate($row['tanggalMulai']); // Format tanggal mulai
                })
                ->addColumn('tanggalBerakhir', function ($row) {
                    return formatDate($row['tanggalBerakhir']); // Format tanggal berakhir
                })
                ->addColumn('jamMulai', function ($row) {
                    return $row['jamMulai'];
                })
                ->addColumn('jamBerakhir', function ($row) {
                    return $row['jamBerakhir'];
                })
                ->addColumn('jumlahJam', function ($row) {
                    return $row['jumlahJam'];
                })
                ->addColumn('statusApprove', function ($row) {
                    return $row['statusApprove']; // Pastikan ini sesuai dengan data API
                })
                ->addColumn('action', function ($row) {
                    return '<a id="btnShowModalTanggapiDinas" data-id="' . $row['idDinas'] . '" class="fw-bolder cursor-pointer">Tanggapi Pengajuan</a>';
                })
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
                'error' => 'Terjadi kesalahan saat mengambil data dinas'
            ], 500);
        }
    }

    public function show_tanggapi_dinas(Request $request)
    {
        // dd($request->all());
        $client = new Client();
        $response = Http::withToken(session('token'))->get(config('constants.GET_DINAS_DETAIL_PENGAJUAN') . '?id_dinas=' . $request->id)->json();
        $data = $response;
        return response()->json([
            'data' => $response,
        ]);
    }

    public function submit_tanggapi(Request $request)
    {
        // dd($request->all());
        try {
            $response = (new Client())->post(config('constants.SUBMIT_DINAS_APPROVE'), [
                'headers' => [
                    'Authorization' => 'Bearer ' . session('token'), // Jika Anda masih ingin menyertakan token
                    'Accept' => 'application/json',
                ],
                'form_params' => [
                    'id_dinas' => $request->id, // Decode ID yang mungkin ter-encode
                    'approve' => $request->status, // Ambil alasan penolakan dari request
                    // 'keterangan' => $request->alasan
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

    public function cetakDinas(Request $request)
    {
        // dd($request->all());
        $response = Http::withToken(session('token'))
            ->get(config('constants.GET_DINAS_DETAIL_PENGAJUAN') . '?id_Dinas=' . $request->id)
            ->json();
        // dd($response);
        if ($response['status'] == 'success') {
            $data = $response['data'];
        } else {
            return response()->json(['error' => 'Data dinas tidak ditemukan.'], 404);
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

        $html = view('kepegawaian.time-management.dinas.cetak', compact('data', 'qrCodeAtasanImage', 'qrCodePribadiImage'))->render();

        $dompdf = new Dompdf();
        $dompdf->loadHtml($html);
        $dompdf->setPaper('A4', 'landscape');
        $dompdf->render();

        return $dompdf->stream($nippPegawai . '' . date('dmy', strtotime($tglIzin)) . '.pdf');
    }
}
