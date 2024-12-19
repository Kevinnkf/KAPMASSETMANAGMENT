<?php
namespace App\Http\Controllers\Asset;

use App\Http\Controllers\Controller;
use Barryvdh\Snappy\Facades\SnappyPdf;
use Carbon\Carbon;
use Illuminate\Http\Request;
use GuzzleHttp\Client;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Milon\Barcode\Facades\DNS2DFacade;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\AssetExport;

class TrnAssetController extends Controller
{
    private $parent = "Kepegawaian";
    private $modul = "Time Management";
    private $title = "Halaman Izin";
    
    public function index(){
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
        $response = $client->request('GET', 'http://10.48.1.3:7252/api/Master');
        $body = $response->getBody();
        $content = $body->getContents();
        $masterData = json_decode($content, true);

        $response = $client->request('GET', 'http://10.48.1.3:7252/api/TrnAsset');
        $body = $response->getBody()->getContents();
        $assetData = json_decode($body, true);

        $currentPage = LengthAwarePaginator::resolveCurrentPage();
        $perPage = 10;
        $currentItems = array_slice($assetData, ($currentPage-1)*$perPage, $perPage);

        $paginatedData = new LengthAwarePaginator(
            $currentItems,
            count($assetData), // Total items
            $perPage, // Items per page
            $currentPage, // Current page
            ['path' => request()->url(), 'query' => request()->query()] // Maintain query parameters
        );
        
        
        
        // Count assets based on conditions and where nipp is null
        $countAsset = count(array_filter($assetData, function ($item) {
            return is_array($item) && (!array_key_exists('nipp', $item) || is_null($item['nipp']));
            // return (is_null($item['nipp']));
            // return is_array($item);
        }));
        
        $destroyedAsset = count(array_filter($assetData, function ($item) {
            return is_array($item) && array_key_exists('condition', $item) && $item['condition'] == "DESTROYED";
        }));
        
        $inMtc = count(array_filter($assetData, function ($item) {
            return is_array($item) && array_key_exists('condition', $item) && $item['condition'] == "MAINTENANCE";
        }));
        
        Log::info('Result', ['data' => $paginatedData]);
        // Log::info('Result', ['data' => $paginatedData]);
        Log::info('Result', ['data' => $countAsset]);
        
        return view('asset.transaction.asset.index', [  
            'masterData' => $masterData,
            'assetData' => $paginatedData,
            'countAsset' => $countAsset,
            'destroyedAsset' => $destroyedAsset,
            'inMtc' => $inMtc,
            "breadcrumb" => [
                "group-1" => $this->parent,
                "group-2" => $this->modul,
                "time-management.izin.index" => "Izin ",
            ],
            "title" => "Daftar Aset",
            "subtitle" => "Berikut ini adalah daftar aset",
            "atasan" => $atasan,
        
        ]);
    }
    
    public function AssignView($assetCode){
        //new guzzle http client
        $client = new Client();

        // First API call to fetch asset data (TrnAsset)
        $responseAsset = $client->request('GET', "http://10.48.1.3:7252/api/TrnAsset/{ $assetCode}");
        $contentAsset = $responseAsset->getBody()->getContents();
        $assetData = json_decode($contentAsset, true);

        // Second API call to fetch asset spec data (TrnAssetSpec)
        $responseAssetSpec = $client->request('GET', "http://10.48.1.3:7252/api/TrnAssetSpec/{$assetCode}");
        $contentAssetSpec = $responseAssetSpec->getBody()->getContents();
        $assetSpecData = json_decode($contentAssetSpec, true);

        //Third API call to fetch sidebar data (master)
        $responseMaster = $client->request('GET', "http://10.48.1.3:7252/api/master");
        $contentMaster = $responseMaster->getBody()->getContents();
        $masterData = json_decode($contentMaster, true);

        //Fourth API call to fetch employee data
        $responseEmployee = $client->request('GET', "http://10.48.1.3:7252/api/Employee");
        $contentEmployee = $responseEmployee->getBody()->getContents();
        $employeeData = json_decode($contentEmployee, true);

        // Pass both assetData and assetSpecData to the view
        return view('transaction.assign', [
            'assetData' => $assetData,
            'assetSpecData' => $assetSpecData,
            'masterData' => $masterData,
            'employeeData' => $employeeData,
        ]);
    }


    //Create new asset view
    // public function newAssetView(){
    //     $client = new Client();
    //     $response = $client->request('GET', 'http://10.48.1.3:7252/api/Master');
    //     $body = $response->getBody();
    //     $content = $body->getContents();
    //     $data = json_decode($content, true);

    //     // Pass the masterData to the view so that the sidebar can consume it
    //     return view('Transaction.create', ['sidebarData' => $data]);
    // }

    public function create() {
        $client = new Client();
        $response = $client->request('GET', 'http://10.48.1.3:7252/api/Master');
        $body = $response->getBody();
        $content = $body->getContents();
        $data = json_decode($content, true);

        return view('asset.transaction.asset.create', [
            'optionData' => $data]); // Keep the view name consistent
    }

    public function updateData($id, $newData)
    {
        // Define the .NET API endpoint URL
        $url = "https://your-dotnet-api.com/api/resource/{$id}";

        // Send the PUT request
        $response = Http::put($url, [
            'Property1' => $newData['property1'],
            'Property2' => $newData['property2'],
            // Include other properties as required by the .NET API
        ]);

        // Handle the response
        if ($response->successful()) {
            return response()->json(['message' => 'Data updated successfully.'], 200);
        } else {
            return response()->json(['message' => 'Failed to update data.'], $response->status());
        }
    }

    public function show($assetcode){
        // Create a new HTTP client instance
        $client = new Client();

        $responseMaster = $client->request('GET', "http://10.48.1.3:7252/api/master");
        $contentMaster = $responseMaster->getBody()->getContents();
        $assetMaster = json_decode($contentMaster, true);
        

        // First API call to fetch asset data (TrnAsset)
        $responseAsset = $client->request('GET', "http://10.48.1.3:7252/api/TrnAsset/{$assetcode}");
        $contentAsset = $responseAsset->getBody()->getContents();
        $assetData = json_decode($contentAsset, true);
        

        // Second API call to fetch asset spec data (TrnAssetSpec)
        $responseAssetSpec = $client->request('GET', "http://10.48.1.3:7252/api/TrnAssetSpec/{$assetcode}");
        $contentAssetSpec = $responseAssetSpec->getBody()->getContents();
        $assetSpecData = json_decode($contentAssetSpec, true);

        // Fetch History Maintenance
        $resposeHistoryMaintenance = $client->request('GET', "http://10.48.1.3:7252/api/TrnHistMaintenance/{$assetcode}");
        $contentHistoryMaintenance = $resposeHistoryMaintenance->getBody()->getContents();
        $historyMaintenanceData = json_decode($contentHistoryMaintenance, true);

        // Fetch Software Installed
        $responseDetailSoftware = $client->request('GET', "http://10.48.1.3:7252/api/TrnSoftware/{$assetcode}");
        $contentDetailSoftware = $responseDetailSoftware->getBody()->getContents();
        $detailSoftwareData = json_decode($contentDetailSoftware, true);

        //Fetch History Asset
        $responseHist = $client->request('GET', "http://10.48.1.3:7252/api/AssetHistory/{$assetcode}");
        $contentHist = $responseHist->getBody()->getContents();
        $histData = json_decode($contentHist, true);  

        //fetch image
        $responseImg = $client->request('GET', "http://10.48.1.3:7252/api/TrnAssetDtlPicture/{$assetcode}");
        $contentImg = $responseImg->getBody()->getContents();
        $imgData = json_decode($contentImg, true);  
        // Ensure $imgData is an array
        if (!is_array($imgData)) {
            $imgData = []; // Set to empty array if not an array
        }
        
        // //Fourth API call to fetch employee data
        // $responseEmployee = $client->request('GET', "http://msvc-employeeizin-kai-group-alpha.apps.dev.okd.kai.id/izin/get-data-pegawai");
        // // $responseEmployee = $client->request('GET', "https://api.kai.id/v3/kapm/employee");
        // $contentEmployee = $responseEmployee->getBody()->getContents();
        // $employeeData = json_decode($contentEmployee, true);

        // Ambil data dari session
        $userData = session('userdata');
        // dd($userData);
        
        // Buat permintaan GET ke API Izin Pegawai
        $responseEmployeeData = $client->request('GET', "https://api.kai.id/v3/kapm/employee", [
            'headers' => [
                'Authorization' => 'Bearer ' . ('EUOP_iqY_1612411309'),
                'Accept' => 'application/json',
            ],
            'timeout' => 10000,
        ]);
        $contentEmployee = $responseEmployeeData->getBody()->getContents();
        $employeeData = json_decode($contentEmployee, true);  


        // Pass both assetData and assetSpecData to the view
        return view('asset.transaction.asset.detail.laptop', [
            'assetMaster' => $assetMaster,
            'assetData' => $assetData,
            'assetSpecData' => $assetSpecData,
            'historyMaintenanceData' => $historyMaintenanceData,
            'detailSoftwareData' => $detailSoftwareData,
            'histData' => $histData,
            'imgData' => $imgData,
            "data" => session('userdata'),
            'employeeData' => $employeeData
        ]);
    }
    // public function index($assetcode) {
    //     // Ambil data dari session
    //     $userData = session('userdata');
    //     $getNipp = $userData['nipp'];
    // dd(session('token'));
    
    //     // Inisiasi Guzzle client
    //     $client = new Client();

    //     // URL API
    //     $apiUrlIzin = config('constants.GET_DATA_IZIN_PEGAWAI') . "?nipp=" . $getNipp;
    //     $apiUrlStatus = config('constants.GET_STATUS_IZIN');
        
    //     // Buat permintaan GET ke API Izin Pegawai
    //     $responseIzin = $client->request('GET', $apiUrlIzin, [
    //         'headers' => [
    //             'Authorization' => 'Bearer ' . session('token'),
    //             'Accept' => 'application/json',
    //         ],
    //         'timeout' => 10,
    //     ]);

    //     // Cek apakah respon berhasil (status 200)
    //     if ($responseIzin->getStatusCode() !== 200) {
    //         return back()->withErrors(['message' => 'Gagal mengambil data pegawai.']);
    //     }

    //     // Buat permintaan GET ke API Status Izin
    //     $responseStatus = $client->request('GET', $apiUrlStatus, [
    //         'headers' => [
    //             'Authorization' => 'Bearer ' . session('token'),
    //             'Accept' => 'application/json',
    //         ],
    //         'timeout' => 10,
    //     ]);

    //     // Cek apakah respon berhasil (status 200)
    //     if ($responseStatus->getStatusCode() !== 200) {
    //         return back()->withErrors(['message' => 'Gagal mengambil status izin.']);
    //     }

    //     // Ambil isi dari kedua respons
    //     $dataIzin = json_decode($responseIzin->getBody(), true);
    //     $dataStatus = json_decode($responseStatus->getBody(), true);

    //     // Data atasan dari data izin pegawai
    //     $atasan = ['atasan' => $dataIzin['data'][0]['atasan'] ?? null];

    //     $response = $client->request('GET', 'http://10.48.1.3:7252/api/Master');
    //     $body = $response->getBody();
    //     $content = $body->getContents();
    //     $masterData = json_decode($content, true);

    //     $responseAsset = $client->request('GET', "http://10.48.1.3:7252/api/TrnAssetSpec/{$assetcode}");
    //     $contentAsset = $responseAsset->getBody()->getContents();
    //     $assetData = json_decode($contentAsset, true);

    //     return view('asset.transaction.asset.index', [
    //         'masterData' => $masterData,
    //         'assetData' => $assetData
    //     ]); // Keep the view name consistent
    // }

    public function edit($assettype ,$assetcategory, $assetcode) {
        $client = new Client();
        $response = $client->request('GET', 'http://10.48.1.3:7252/api/Master');
        $body = $response->getBody();
        $content = $body->getContents();
        $data = json_decode($content, true);

        $responseAsset = $client->request('GET', "http://10.48.1.3:7252/api/TrnAsset/{$assetcode}");
        $contentAsset = $responseAsset->getBody()->getContents();
        $assetData = json_decode($contentAsset, true);
        // dd($assetData);

        return view('asset.transaction.asset.detail.edit', [
            'assetcode' => $assetcode,
            'assettype' => $assettype,
            'assetcategory' => $assetcategory,
            'optionData' => $data,
            'assetData' => $assetData]); // Keep the view name consistent
    }

    public function store(Request $request)
    {
        $userData = session('userdata');
        $userName = $userData['nama'];
        // Validate the incoming request data
        $validated = $request->validate([
            'assettype' => 'required|string|max:255',
            'assetcategory' => 'required|string|max:255',
            'assetbrand' => 'required|string|max:255',
            'assetmodel' => 'required|string|max:255',
            'assetseries' => 'required|string|max:255',
            'assetserialnumber' => 'required|string|max:255',
            'datepurchased' => 'required'
        ]);

        // Initialize the HTTP client for making requests
        $client = new \GuzzleHttp\Client();
        // $datepurchase = date("YYYY-mm-dd", strtotime($validet));
        $datepurchase = date("Y-m-d", strtotime($validated['datepurchased']));

        try {
            // Send POST request directly using the validated data
            $response = $client->post("http://10.48.1.3:7252/api/TrnAsset", [
                'json' => [
                    'idasset' => '0',
                    'assetcode' => 'assetcode',
                    'assettype' => $validated['assettype'],
                    'assetcategory' => $validated['assetcategory'],
                    'assetbrand' => $validated['assetbrand'],
                    'assetmodel' => $validated['assetmodel'],
                    'assetseries' => $validated['assetseries'],
                    'assetserialnumber' => $validated['assetserialnumber'],
                    'picadded' => $userName,
                    'condition' => 'GREAT',
                    'active' => 'y',
                    'nipp' => null,
                    'picupdated' => null,
                    'purchasedate' => $datepurchase
                ]
            ]);

            // Retrieve the response data and log for debugging
            $responseData = json_decode($response->getBody()->getContents(), true);
            Log::info('API Response:', $responseData);

            // Get the assetcode from the response
            $assetcode = $responseData['assetcode'];
            $category = $responseData['assetcategory'];

            // Check if the API response was successful and redirect accordingly
            if ($category == 'LAPTOP') {
                return redirect()->route('transaction.hardware.laptop.create', ['assetcategory' => $category, 'assetcode' => $assetcode])
                                 ->with('success', 'Asset created successfully!');  
            } else if ($category == 'MOBILE') {
                return redirect()->route('transaction.hardware.mobile.create', ['assetcategory' => $category, 'assetcode' => $assetcode])
                                 ->with('success', 'Asset created successfully!');
            } else {
                return redirect()->route('transaction.hardware.others.create', ['assetcategory' => $category, 'assetcode' => $assetcode])
                                 ->with('success', 'Asset created successfully!');
            }
            
        } catch (\GuzzleHttp\Exception\RequestException $e) {
            // Handle error response, log the error message, and show the error to the user
            $responseBody = $e->hasResponse() ? (string) $e->getResponse()->getBody() : null;
            Log::error('API Error: ' . $e->getMessage() . ' - Response Body: ' . $responseBody);

            return back()->withErrors(['error' => 'Failed to create asset. Please try again.'])->withInput();
        }
    }

    public function update(Request $request, $assetcode)
    {
        $userData = session('userdata');
        $userName = $userData['nama'];
        // Validate the incoming request data
        $validated = $request->validate([
            'assetcategory' => 'required|string|max:255',
            'assetbrand' => 'required|string|max:255',
            'assetmodel' => 'required|string|max:255',
            'assetseries' => 'required|string|max:255',
            'assetserialnumber' => 'required|string|max:255',
            'condition' => 'required|string|max:255',
            'status' => 'required|string|max:255',
        ]);

        // Initialize the HTTP client for making requests
        $client = new \GuzzleHttp\Client();

        try {
            // Send POST request directly using the validated data
            $response = $client->put("http://10.48.1.3:7252/api/TrnAsset/{$assetcode}", [
                'json' => [
                    'idasset' => '0',
                    'assetcode' => 'assetcode',
                    'assettype' => 'assettype',
                    'assetcategory' => 'assetcategory',
                    'assetbrand' => $validated['assetbrand'],
                    'assetmodel' => $validated['assetmodel'],
                    'assetseries' => $validated['assetseries'],
                    'assetserialnumber' => $validated['assetserialnumber'],
                    'picadded' => 'picadded',
                    'picupdated' => $userName,
                    'condition' => $validated['condition'],
                    'active' => $validated['status'],
                ]
            ]);

            // Retrieve the response data and log for debugging
            $responseData = json_decode($response->getBody()->getContents(), true);
            Log::info('API Response:', $responseData);

            // Get the assetcode from the response
            $category = $validated['assetcategory'];
            // Check if the API response was successful and redirect accordingly
            if ($category == 'LAPTOP') {
                return redirect()->route('transaction.asset.laptop', ['assetcode' => $assetcode])
                                 ->with('success');
            } else if ($category == 'MOBILE') {
                return redirect()->route('transaction.asset.laptop', ['assetcode' => $assetcode])
                                 ->with('success', 'Asset created successfully!');
            } else {
                return redirect()->route('transaction.asset.laptop', ['assetcode' => $assetcode])
                                ->with('success');}
            
        } catch (\GuzzleHttp\Exception\RequestException $e) {
            // Handle error response, log the error message, and show the error to the user
            $responseBody = $e->hasResponse() ? (string) $e->getResponse()->getBody() : null;
            Log::error('API Error: ' . $e->getMessage() . ' - Response Body: ' . $responseBody);

            return back()->withErrors(['error' => 'Failed to create asset. Please try again.'])->withInput();
        }
    }


    public function assignAsset(Request $request, $assetcode)
    {
        $validatedData = $request->validate([
            'nipp' => 'required|integer',
        ]);

        $pic = session('userdata');
        $name = $pic['name'];

        $response = Http::put("http://10.48.1.3:7252/api/TrnAsset/update-nipp/{$assetcode}", (int) $validatedData['nipp']);
        Log::info('Data sent for assignment:', ['assetcode' => $assetcode, 'nipp' => (int) $validatedData['nipp']]);

        if ($response->successful()) {
            $historyResponse = Http::post('http://10.48.1.3:7252/api/AssetHistory', [
                'assetcode' => $assetcode,
                'nipp' => $validatedData['nipp'],
                'picadded' => $name,
                'status' => 'assigned'
            ]);

            if ($historyResponse->successful()) {
                return back()->with('success', 'Asset assigned successfully.');
            } else {
                Log::error('Failed to History asset history.', ['response' => $historyResponse->body()]);
                return back()->withErrors(['message' => 'Asset assigned, but failed to log in history.'])->withInput();
            }
        } else {
            Log::error('Failed to assign asset.', [ 'response' => $response->body()]);
            return back()->withErrors(['message' => 'Failed to assign asset. Please try again.'])->withInput();
        }
    }

    public function unassignAsset($assetcode){
        // Prepare data to send to the API for unassignment (setting NIPP to null)
        // First API call to fetch asset data (TrnAsset)
        $client = new Client();
        $responseAsset = $client->request('GET', "http://10.48.1.3:7252/api/TrnAsset/{$assetcode}");
        $contentAsset = $responseAsset->getBody()->getContents();
        $assetData = json_decode($contentAsset, true);

        $currentNIPP = $assetData['nipp']??null;

        $pic = session('userdata');
        $name = $pic['name'];

        $data = [
            'nipp' => null, // Unassigning by setting NIPP to null
        ];

        // Send PUT request to unassign the asset (set NIPP to null)
        $response = Http::put("http://10.48.1.3:7252/api/TrnAsset/update-nipp/{$assetcode}", null);
        Log::info('Data sent for unassignment:', ['data' => $data['nipp']]);

        // Check if the unassignment was successful before logging history
        if ($response->successful()) {
            // Log the unassignment in the asset history API if successful
            $historyData = [
                'assetcode' => $assetcode,
                'nipp' => $currentNIPP['nipp'],
                'picadded' => $name,
                'status' => "Unassigned"
            ];

            $historyResponse = Http::post('http://10.48.1.3:7252/api/AssetHistory', $historyData);
            Log::info('Data sent to history log:', $historyData);

            if ($historyResponse->successful()) {
                Log::info('Asset unassigned and history logged successfully.', ['assetcode' => $assetcode]);
                return back()->with('success', 'Asset unassigned successfully.');
            } else {
                Log::error('Failed to log history for unassigned asset.', ['assetcode' => $assetcode, 'response' => $historyResponse->body()]);
                return back()->withErrors(['message' => 'Asset unassigned, but failed to log in history.'])->withInput();
            }
        } else {
            // Log any errors that occurred during unassignment
            Log::error('Failed to unassign asset.', [
                'assetcode' => $assetcode,
                'response_status' => $response->status(),
                'response_body' => $response->body(),
                'request_data' => $data,
            ]);
            return back()->withErrors(['message' => 'Failed to unassign asset. Please try again.'])->withInput();
        }
    }

    public function print($assetCode) {
        $client = new Client();
    
        try {
            $responseAsset = $client->request('GET', "http://10.48.1.3:7252/api/TrnAsset/{$assetCode}");
    
            
            if ($responseAsset->getStatusCode() !== 200) {
                return response()->json(['err   or' => 'Failed to retrieve asset data.'], $responseAsset->getStatusCode());
            }
    
            $contentAsset = $responseAsset->getBody()->getContents();
            $assetData = json_decode($contentAsset, true);
    
            if (json_last_error() !== JSON_ERROR_NONE) {
                return response()->json(['error' => 'Error decoding asset data.'], 500);
            }
    
        } catch (\Exception $e) {
        
            return response()->json(['error' => 'Unable to fetch asset data: ' . $e->getMessage()], 500);
        }
    
        $url = url("/detail-asset/laptop/{$assetCode}");
        $qrCode = DNS2DFacade::getBarcodePNG($url, 'QRCODE', 3, 3); // Generate QR code

        $data = [
            'assetData' => $assetData,
            'qrCode' => $qrCode,
            "data" => session('userdata')
        ];
    
        $pdf = SnappyPdf::loadView('asset.transaction.asset.bast', $data);
        $pdf->setOption('enable-local-file-access', true)->setPaper('a4');
        return $pdf->inline('Berita Acara Serah Terima.pdf');
    }

    public function printBasts($assetCode, $idassethistory) {
        $client = new Client();
    
        try {
            $responseAsset = $client->request('GET', "http://10.48.1.3:7252/api/TrnAsset/{$assetCode}");
    
            
            if ($responseAsset->getStatusCode() !== 200) {
                return response()->json(['err   or' => 'Failed to retrieve asset data.'], $responseAsset->getStatusCode());
            }
    
            $contentAsset = $responseAsset->getBody()->getContents();
            $assetData = json_decode($contentAsset, true);
    
            if (json_last_error() !== JSON_ERROR_NONE) {
                return response()->json(['error' => 'Error decoding asset data.'], 500);
            }

            //Fetch History Asset
            $responseHist = $client->request('GET', "http://10.48.1.3:7252/api/AssetHistory/{$assetCode}");
            $contentHist = $responseHist->getBody()->getContents();
            $histData = json_decode($contentHist, true);  

            // // Filter the histData to only include entries that match the idassethistory
            // $filteredHistData = array_filter($histData, function($item) use ($idassethistory) {
            //     return $item['idassethistory'] === $idassethistory;
            // });
    
        } catch (\Exception $e) {
        
            return response()->json(['error' => 'Unable to fetch asset data: ' . $e->getMessage()], 500);
        }
    
        $url = url("/detail-asset/laptop/{$assetCode}");
        $qrCode = DNS2DFacade::getBarcodePNG($url, 'QRCODE', 3, 3); // Generate QR code

        

        $data = [
            '$idassethistory' => $idassethistory,
            'assetData' => $assetData,
            'histData' => $histData,
            'qrCode' => $qrCode,
            "data" => session('userdata')
        ];
    
        $pdf = SnappyPdf::loadView('asset.transaction.asset.bast-balik', $data);
        $pdf->setOption('enable-local-file-access', true)->setPaper('a4');
        return $pdf->inline('Berita Acara Serah Terima.pdf');
    }

    public function printBast($assetcode, $idassethistory) {
        $client = new Client();
        
        // Fetch maintenance data for the specific asset code
        $responseAsset = $client->request('GET', "http://10.48.1.3:7252/api/AssetHistory/{$assetcode}");
        $histData = json_decode($responseAsset->getBody()->getContents(), true);
        
        // Filter to find the specific maintenance record by maintenanceid
        // dd($histData);
        $selectedRecord = null;
        foreach ($histData as $record) {
            if ($record['idassethistory'] == $idassethistory) { // Adjust 'id' to the actual key in your response
                $selectedRecord = $record;
                break;
            }
        }

        // Check if the record was found
        if (!$selectedRecord) {
            return abort(404); // Or handle the error appropriately
        }
        
        // Fetch asset data
        $assetResponse = $client->request('GET', "http://10.48.1.3:7252/api/TrnAsset/{$assetcode}");
        $assetData = json_decode($assetResponse->getBody()->getContents(), true);
        
        // Fetch user data
        $userResponse = $client->request('GET', 'http://10.48.1.3:7252/api/user');
        $userData = json_decode($userResponse->getBody()->getContents(), true);
        
        // Fetch employee  data
        $userResponse = $client->request('GET', 'http://10.48.1.3:7252/api/Employee');
        $empData = json_decode($userResponse->getBody()->getContents(), true);

        $url = url("/detail-asset/laptop/{$assetcode}");
        $qrCode = DNS2DFacade::getBarcodePNG($url, 'QRCODE', 3, 3); // Generate QR code

        
        
        // Prepare data for PDF
        $data = [
            'assetData' => $assetData,
            'userData' => $userData,
            'empData' => $empData,
            'selectedRecord' => $selectedRecord, // Pass the selected maintenance record
            'qrCode' => $qrCode,
            'data' => session('userdata')
        ];

        // Generate PDF
        $pdf = SnappyPdf::loadView('asset.transaction.asset.bast-balik', $data);
        $pdf->setOption('enable-local-file-access', true);
        
        return $pdf->inline('Berita Acara Serah Terima Balik.pdf');
    }

    public function search(Request $request) {
        $validated = $request->validate([
            'search' => 'required|string|max:255',
        ]);

        Log::info('Result', ['data' => $validated]);
    
        $client = new Client();
    
        try {

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
            $response = $client->request('GET', 'http://10.48.1.3:7252/api/Master');
            $body = $response->getBody();
            $content = $body->getContents();
            $masterData = json_decode($content, true);

            // Fetch asset data based on search term
            $response = $client->request("GET", "http://10.48.1.3:7252/api/TrnAsset/search", [
                'query' => $validated 
            ]);

            $content = $response->getBody()->getContents();
            $responseData = json_decode($content, true); // Decoding JSON to associative array

            $currentPage = LengthAwarePaginator::resolveCurrentPage();
            $perPage = 10;  
            $currentItems = array_slice($responseData, ($currentPage-1)*$perPage, $perPage);

            $paginatedData = new LengthAwarePaginator(
                $currentItems,
                count($responseData), // Total items
                $perPage, // Items per page
                $currentPage, // Current page
                ['path' => request()->url(), 'query' => request()->query()] // Maintain query parameters
            );
    
            // Count assets based on conditions
            $countAsset = count(array_filter($responseData, function ($item) {
                return is_array($item) && (!array_key_exists('nipp', $item) || is_null($item['nipp']));
            }));
    
            $destroyedAsset = count(array_filter($responseData, function ($item) {
                return is_array($item) && array_key_exists('condition', $item) && $item['condition'] == "DESTROYED";
            }));
    
            $inMtc = count(array_filter($responseData, function ($item) {
                return is_array($item) && array_key_exists('condition', $item) && $item['condition'] == "MAINTENANCE";
            }));

            Log::info('Result', ['data' => $paginatedData]);
            Log::info('Result', ['data' => $countAsset]);
    
            return view('asset.transaction.asset.index', [
                'masterData' => $masterData,
                'assetData' => $paginatedData,
                'countAsset' => $countAsset,
                'destroyedAsset' => $destroyedAsset,
                'inMtc' => $inMtc,
                "breadcrumb" => [
                    "group-1" => $this->parent,
                    "group-2" => $this->modul,
                    "time-management.izin.index" => "Izin ",
                ],
                "title" => "Daftar Aset",
                "subtitle" => "Berikut ini adalah daftar aset",
                "atasan" => $atasan,
                
            ]);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Unable to fetch asset data: ' . $e->getMessage()], 500);
        }
    }

    public function printLabel($assetcode) {
        $client = new Client();
        
        // Fetch asset data
        $assetResponse = $client->request('GET', "http://10.48.1.3:7252/api/TrnAsset/{$assetcode}");
        $assetData = json_decode($assetResponse->getBody()->getContents(), true);

        $url = url("/detail-asset/laptop/{$assetcode}");
        $qrCode = DNS2DFacade::getBarcodePNG($url, 'QRCODE', 3, 3); // Generate QR code
        
        // Prepare data for PDF
        $data = [
            'assetData' => $assetData,
            'qrCode' => $qrCode,
            "data" => session('userdata')
        ];

        // Generate PDF
        $pdf = SnappyPdf::loadView('asset.transaction.asset.label', $data);
        $pdf->setOption('enable-local-file-access', true);

        // Set margins
        $pdf->setOption('margin-top', '0mm');    // Set top margin
        $pdf->setOption('margin-right', '0mm');  // Set right margin
        $pdf->setOption('margin-bottom', '0mm'); // Set bottom margin
        $pdf->setOption('margin-left', '0mm');   // Set left margin
        
        
        return $pdf->inline("Label QRCode.pdf");
    }

    public function exportExcel() {
        $client = new Client();
    
        try {
            $responseAsset = $client->request('GET', "http://10.48.1.3:7252/api/TrnAsset");
    
            
            if ($responseAsset->getStatusCode() !== 200) {
                return response()->json(['err   or' => 'Failed to retrieve asset data.'], $responseAsset->getStatusCode());
            }
    
            $contentAsset = $responseAsset->getBody()->getContents();
            $assetData = json_decode($contentAsset, true);
    
            if (json_last_error() !== JSON_ERROR_NONE) {
                return response()->json(['error' => 'Error decoding asset data.'], 500);
            }
    
        } catch (\Exception $e) {
        
            return response()->json(['error' => 'Unable to fetch asset data: ' . $e->getMessage()], 500);
        }
    

        $data = [
            'assetData' => $assetData,            
            "data" => session('userdata')
        ];

        $excel = Excel::download(new AssetExport($data), "Data Aset KAPM.xlsx");
        return $excel;

    
        // $pdf = SnappyPdf::loadView('asset.transaction.asset.bast', $data);
        // $pdf->setOption('enable-local-file-access', true)->setPaper('a4');
        // return $pdf->inline('Berita Acara Serah Terima.pdf');
    }
}