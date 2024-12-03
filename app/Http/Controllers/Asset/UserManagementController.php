<?php

namespace App\Http\Controllers\Asset;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use GuzzleHttp\Client;

class UserManagementController extends Controller
{
    private $parent = "Asset";
    private $modul = "Asset Management";
    private $title = "Halaman User Management";

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
}
