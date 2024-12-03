<?php

namespace App\Http\Controllers\Asset;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use GuzzleHttp\Client;

class ConfigurationController extends Controller
{
    private $parent = "Asset";
    private $modul = "Asset Management";
    private $title = "Setting Main Menu & Sub Menu ";

    public function index(Request $request)
    {
        // Ambil data dari session
        $userData = session('userdata');

        // Inisiasi Guzzle client
        $client = new Client();

        // URL API
        $apiUrlMenus = config('constants.GET_DATA_IZIN_PEGAWAI');

        try {
            // Buat permintaan GET ke API Menus
            $responseIzin = $client->request('GET', $apiUrlMenus, [
                'headers' => [
                    'Authorization' => 'Bearer ' . session('token'),
                    'Accept' => 'application/json',
                ],
                'timeout' => 10,
            ]);

            // Cek apakah respon berhasil (status 200)
            if ($responseIzin->getStatusCode() !== 200) {
                return back()->withErrors(['message' => 'Fail get status employee.']);
            }

            // Ambil isi dari kedua respons
            $dataIzin = json_decode($responseIzin->getBody(), true);

            // View data yang akan dikirim ke view
            $viewData = [
                "breadcrumb" => [
                    "group-1" => $this->parent,
                    "group-2" => $this->modul,
                    "configuration.menus.index" => "Izin ",
                ],
                "title" => "Setting Main Menu & Sub Menu",
                "subtitle" => "This is list of main menu and submenu.",
            ];

            return view('asset.configuration.menus.index', $viewData);
        } catch (\GuzzleHttp\Exception\RequestException $e) {
            return back()->withErrors(['message' => 'Gagal mengambil data: ' . $e->getMessage()]);
        } catch (\Exception $e) {
            return back()->withErrors(['message' => 'Terjadi kesalahan: ' . $e->getMessage()]);
        }
    }
}
