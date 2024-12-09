<?php
namespace App\Http\Controllers\Asset;

use App\Http\Controllers\Controller;
use App\Models\Master;
use Exception;
use Illuminate\Http\Request;
use GuzzleHttp\Client;
use Illuminate\Auth\Events\Validated;
use Illuminate\Contracts\Pagination\Paginator;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\View;
use PDO;

class MasterController extends Controller
{

    private $parent = "Kepegawaian";
    private $modul = "Time Management";
    private $title = "Halaman Izin";

    // Fetch all data
    public function index() {
        // Ambil data dari session
        $userData = session('userdata');
        $getNipp = $userData['nipp'];

        // Inisiasi Guzzle client
        $client = new Client();

        // URL API
        $apiUrlIzin = config('constants.GET_DATA_IZIN_PEGAWAI') . "?nipp=" . $getNipp;
        $apiUrlStatus = config('constants.GET_STATUS_IZIN');
        
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


        // $response = $client->request('GET', 'http://10.48.1.3:7252/api/Master');
        $response = $client->request('GET', 'http://10.48.1.3:7252/api/Master');
        $body = $response->getBody();
        $content = $body->getContents();
        $data = json_decode($content, true);

        $currentPage = LengthAwarePaginator::resolveCurrentPage();
        $perPage = 10;
        $currentItems = array_slice($data, ($currentPage-1)*$perPage, $perPage);

        $paginatedData = new LengthAwarePaginator(
            $currentItems,
            count($data), // Total items
            $perPage, // Items per page
            $currentPage, // Current page
            ['path' => request()->url(), 'query' => request()->query()] // Maintain query parameters
        );

        $viewData = [
            "breadcrumb" => [
                "group-1" => $this->parent,
                "group-2" => $this->modul,
                "time-management.izin.index" => "Izin ",
            ],
            "data" => session('userdata'),
            "title" => "Halaman Izin",
            "subtitle" => "Berikut ini adalah daftar riwayat Izin Anda.",
            "atasan" => $atasan,
            'masterData' => $paginatedData
        ];

        // dd($viewData);

        return view('asset.master.type.index', $viewData); // Keep the view name consistent
    } 
    
    public function show($condition) {
        // Create a new HTTP client instance
        $client = new Client();

        // First API call to fetch asset data (TrnAsset)
        $responseMaster = $client->request('GET', "http://10.48.1.3:7252/api/Master/{$condition}");
        $contentMaster = $responseMaster->getBody()->getContents();
        $mastersData = json_decode($contentMaster, true);

        $currentPage = LengthAwarePaginator::resolveCurrentPage();
        $perPage = 5;
        $currentItems = array_slice($mastersData, ($currentPage-1)*$perPage, $perPage);

        $paginatedData = new LengthAwarePaginator(
            $currentItems,
            count($mastersData), // Total items
            $perPage, // Items per page
            $currentPage, // Current page
            ['path' => request()->url(), 'query' => request()->query()] // Maintain query parameters
        );

        $viewData = [
            "breadcrumb" => [
                "group-1" => $this->parent,
                "group-2" => $this->modul,
                "time-management.izin.index" => "Izin ",
            ],
            "title" => "Halaman Izin",
            "subtitle" => "Berikut ini adalah daftar riwayat Izin Anda.",
            'masterData' => $paginatedData,
            'currentCondition' => $condition
        ];

        // Pass both assetData and assetSpecData to the view
        return view('asset.master.type.show', $viewData );
    }


    public function boot()
    {
        View::composer('layouts.sidebar', function ($view) {
            $client = new Client();
            $response = $client->request('GET', 'http://10.48.1.3:7252/api/Master');
            $body = $response->getBody();
            $content = $body->getContents();
            $data = json_decode($content, true);

            // Share the master data with the sidebar
            $view->with('masterData', $data);
        });
    }

    public function create($condition)
    {
        $client = new Client();

        // Fetch the condition data from the API
        $response = $client->request('GET', "http://10.48.1.3:7252/api/Master");
        $body = $response->getBody()->getContents();
        $masterData = json_decode($body, true);


        // Pass the condition to the view for use in the form
        return view('asset.master.type.create', [
            'condition' => $condition,
            'masterData' => $masterData]);
    }

    public function store(Request $request, $condition)
    {
        // Validate the incoming request data
        $validated = $request->validate([
            'condition' => 'required|string|max:255',
            'description' => 'required|string',
            'valuegcm' => 'required|numeric',
            'typegcm' => 'nullable|string|max:255', // Use 'nullable' if this field can be optional
        ]);

        $client = new Client();

        try {
            // Correct the URL by using double quotes and properly interpolating $condition
            $response = $client->post("http://10.48.1.3:7252/api/Master/{$condition}", [
                'json' => [
                    'masterid' => '0',
                    'condition' => $validated['condition'],
                    'nosr' => '0',
                    'description' => $validated['description'],
                    'valuegcm' => $validated['valuegcm'],
                    'typegcm' => $validated['typegcm'],
                    'active' => 'y',
                ],
            ]);
        
            $data = json_decode($response->getBody()->getContents(), true);
            Log::info('API Response:', $data);  // Log the API response for inspection
        
            return redirect("master/type/show/{$condition}")->with('success', 'Data submitted successfully!');
        } catch (\GuzzleHttp\Exception\RequestException $e) {
            $responseBody = $e->hasResponse() ? (string) $e->getResponse()->getBody() : null;
            Log::error('API Error: ' . $e->getMessage() . ' - Response Body: ' . $responseBody);
        
            return redirect("master/type/create/{$condition}")->withErrors(['error' => 'An error occurred while submitting the data.']);
        }    
    }


    // // Edit method to show the form for editing the record
    // public function edit($id) {
    //     // Fetch the master record using the $id
    //     $master = Master::findOrFail($id);  
        
    //     // Return the edit view with the master data
    //     return view('master.edit', compact('master'));
    // }

    // // Destroy method to delete a record
    // public function destroy($masterid, Request $request) {
    //     // Validate the incoming request data
    //     try {
    //         $validated = $request->validate([
    //             'masterid-delete' => 'required|integer',
    //             'condition-delete' => 'required|string|max:255',
    //             'nosr-delete' => 'required|string|max:255',
    //             'description-delete' => 'required|string',
    //             'valuegcm-delete' => 'required|numeric',
    //             'typegcm-delete' => 'nullable|string|max:255', 
    //             'active-delete' => 'required|string',
    //         ]);
    
    //         // Map validated data to match the API's expected field names
    //         $apiData = [
    //             'masterid' => $validated['masterid-delete'],
    //             'condition' => $validated['condition-delete'],
    //             'nosr' => $validated['nosr-delete'],
    //             'description' => $validated['description-delete'],
    //             'valuegcm' => $validated['valuegcm-delete'],
    //             'typegcm' => $validated['typegcm-delete'] ?? null, // Nullable field
    //             'active' => $validated['active-delete'],
    //         ];

    //     } catch (\Illuminate\Validation\ValidationException $e) {
    //         Log::error('Validation errors:', $e->errors());
    //         return response()->json(['errors' => $e->errors()], 422);
    //     }
        
    //     $client = new Client();     
        
    //     try {
    //         // Send the PUT request to the API to update the master data
    //         $response = $client->put("http://10.48.1.3:7252/api/Master/{$masterid}", [
    //             'json' => $apiData // Send the validated data as JSON
    //         ]);                                 
    
    //         $data = json_decode($response->getBody()->getContents(), true);
    //         // Ensure $data is logged as an array
    //         Log::info('API Response:', $data ?? []); // Use an empty array if $data is null 
            
    //         return redirect('/master')->with('success', 'Data submitted successfully!');
    //     } catch (\GuzzleHttp\Exception\RequestException $e) {
    //         $responseBody = $e->hasResponse() ? (string) $e->getResponse()->getBody() : null;
    //         Log::error('API Error: ' . $e->getMessage() . ' - Response Body: ' . $responseBody);
        
    //         return redirect('/master')->withErrors(['error' => 'An error occurred while submitting the data.']);
    //     }    
    // }

    public function update(Request $request, $id) {
        // Validate the incoming request data
        try {
            $validated = $request->validate([
                'masterid' => 'required|integer',
                'sbarcondition' => 'nullable|string',
                'condition' => 'required|string|max:255',
                'nosr' => 'required|string|max:255',
                'description' => 'required|string',
                'valuegcm' => 'required|numeric',
                'typegcm' => 'nullable|string|max:255', 
                'active' => 'required|string',
            ]);
        } catch (\Illuminate\Validation\ValidationException $e) {
            Log::error('Validation errors:', $e->errors());
            return response()->json(['errors' => $e->errors()], 422);
        }
        
        $client = new Client();     
        
        try {
            // Send the PUT request to the API to update the master data
            $response = $client->put("http://10.48.1.3:7252/api/Master/{$id}", [
                'json' => $validated // Send the validated data as JSON
            ]);                                 
    
            $data = json_decode($response->getBody()->getContents(), true);
            // Ensure $data is logged as an arraygit 
            Log::info('API Response:', $data ?? []); // Use an empty array if $data is null 
        
            return back()->with('success', 'Data submitted successfully!');
        } catch (\GuzzleHttp\Exception\RequestException $e) {
            $responseBody = $e->hasResponse() ? (string) $e->getResponse()->getBody() : null;
            Log::error('API Error: ' . $e->getMessage() . ' - Response Body: ' . $responseBody);
        
            return back()->withErrors(['error' => 'An error occurred while submitting the data.']);
        }    
    }   
}
