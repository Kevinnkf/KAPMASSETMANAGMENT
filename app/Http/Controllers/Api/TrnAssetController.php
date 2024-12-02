<?php
namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Barryvdh\Snappy\Facades\SnappyPdf;
use Carbon\Carbon;
use Illuminate\Http\Request;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Illuminate\Validation\ValidationException;
use Knp\Snappy\Pdf;
use Milon\Barcode\Facades\DNS1DFacade;
use Milon\Barcode\Facades\DNS2DFacade;

class TRNAssetController extends Controller
{
    public function AssignView($assetCode){
        //new guzzle http client
        $client = new Client();

        // First API call to fetch asset data (TrnAsset)
        $responseAsset = $client->request('GET', "http://localhost:5252/api/TrnAsset/{ $assetCode}");
        $contentAsset = $responseAsset->getBody()->getContents();
        $assetData = json_decode($contentAsset, true);

        // Second API call to fetch asset spec data (TrnAssetSpec)
        $responseAssetSpec = $client->request('GET', "http://localhost:5252/api/TrnAssetSpec/{$assetCode}");
        $contentAssetSpec = $responseAssetSpec->getBody()->getContents();
        $assetSpecData = json_decode($contentAssetSpec, true);

        //Third API call to fetch sidebar data (master)
        $responseMaster = $client->request('GET', "http://localhost:5252/api/master");
        $contentMaster = $responseMaster->getBody()->getContents();
        $masterData = json_decode($contentMaster, true);

        //Fourth API call to fetch employee data
        $responseEmployee = $client->request('GET', "http://localhost:5252/api/Employee");
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
    //     $response = $client->request('GET', 'http://localhost:5252/api/Master');
    //     $body = $response->getBody();
    //     $content = $body->getContents();
    //     $data = json_decode($content, true);

    //     // Pass the masterData to the view so that the sidebar can consume it
    //     return view('Transaction.create', ['sidebarData' => $data]);
    // }

    public function msttrnasset() {
        $client = new Client();
        $response = $client->request('GET', 'http://localhost:5252/api/Master');
        $body = $response->getBody();
        $content = $body->getContents();
        $data = json_decode($content, true);

        return view('transaction.asset', [
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

        $responseMaster = $client->request('GET', "http://localhost:5252/api/master");
        $contentMaster = $responseMaster->getBody()->getContents();
        $assetMaster = json_decode($contentMaster, true);
        

        // First API call to fetch asset data (TrnAsset)
        $responseAsset = $client->request('GET', "http://localhost:5252/api/TrnAsset/{$assetcode}");
        $contentAsset = $responseAsset->getBody()->getContents();
        $assetData = json_decode($contentAsset, true);
        

        // Second API call to fetch asset spec data (TrnAssetSpec)
        $responseAssetSpec = $client->request('GET', "http://localhost:5252/api/TrnAssetSpec/{$assetcode}");
        $contentAssetSpec = $responseAssetSpec->getBody()->getContents();
        $assetSpecData = json_decode($contentAssetSpec, true);

        // Fetch History Maintenance
        $resposeHistoryMaintenance = $client->request('GET', "http://localhost:5252/api/TrnHistMaintenance/{$assetcode}");
        $contentHistoryMaintenance = $resposeHistoryMaintenance->getBody()->getContents();
        $historyMaintenanceData = json_decode($contentHistoryMaintenance, true);

        // Fetch Software Installed
        $responseDetailSoftware = $client->request('GET', "http://localhost:5252/api/TrnSoftware/{$assetcode}");
        $contentDetailSoftware = $responseDetailSoftware->getBody()->getContents();
        $detailSoftwareData = json_decode($contentDetailSoftware, true);

        //Fetch PIC
        $responsePic = $client->request('GET', "http://localhost:5252/api/User");
        $contentPic = $responsePic->getBody()->getContents();
        $userData = json_decode($contentPic, true);  

        //Fetch History Asset
        $responseHist = $client->request('GET', "http://localhost:5252/api/AssetHistory/{$assetcode}");
        $contentHist = $responseHist->getBody()->getContents();
        $histData = json_decode($contentHist, true);  

        //fetch image
        $responseImg = $client->request('GET', "http://localhost:5252/api/TrnAssetDtlPicture/{$assetcode}");
        $contentImg = $responseImg->getBody()->getContents();
        $imgData = json_decode($contentImg, true);  
        // Ensure $imgData is an array
        if (!is_array($imgData)) {
            $imgData = []; // Set to empty array if not an array
        }

        // Pass both assetData and assetSpecData to the view
        return view('detailAsset.Laptop', [
            'assetMaster' => $assetMaster,
            'assetData' => $assetData,
            'assetSpecData' => $assetSpecData,
            'historyMaintenanceData' => $historyMaintenanceData,
            'detailSoftwareData' => $detailSoftwareData,
            'userData' => $userData,
            'histData' => $histData,
            'imgData' => $imgData,
        ]);
    }
    public function index($assetcode) {
        $client = new Client();
        $response = $client->request('GET', 'http://localhost:5252/api/Master');
        $body = $response->getBody();
        $content = $body->getContents();
        $masterData = json_decode($content, true);

        $responseAsset = $client->request('GET', "http://localhost:5252/api/TrnAssetSpec/{$assetcode}");
        $contentAsset = $responseAsset->getBody()->getContents();
        $assetData = json_decode($contentAsset, true);

        return view('detailAsset.Laptop', [
            'masterData' => $masterData,
            'assetData' => $assetData
        ]); // Keep the view name consistent
    }

    public function store(Request $request)
    {
        // Validate the incoming request data
        $validated = $request->validate([
            'assettype' => 'required|string|max:255',
            'assetcategory' => 'required|string|max:255',
            'assetbrand' => 'required|string|max:255',
            'assetmodel' => 'required|string|max:255',
            'assetseries' => 'required|string|max:255',
            'assetserialnumber' => 'required|string|max:255',
            'picadded' => 'required|string|max:255',
        ]);

        // Initialize the HTTP client for making requests
        $client = new \GuzzleHttp\Client();

        try {
            // Send POST request directly using the validated data
            $response = $client->post("http://localhost:5252/api/TrnAsset", [
                'json' => [
                    'idasset' => '0',
                    'assetcode' => 'assetcode',
                    'assettype' => $validated['assettype'],
                    'assetcategory' => $validated['assetcategory'],
                    'assetbrand' => $validated['assetbrand'],
                    'assetmodel' => $validated['assetmodel'],
                    'assetseries' => $validated['assetseries'],
                    'assetserialnumber' => $validated['assetserialnumber'],
                    'picadded' => $validated['picadded'],
                    'condition' => 'GREAT',
                    'active' => 'Y',
                    'nipp' => null,
                    'picupdated' => null,
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
                return redirect()->route('transaction.trnlaptop', ['assetcategory' => $category, 'assetcode' => $assetcode])
                                 ->with('success', 'Asset created successfully!');
            } else if ($category == 'MOBILE') {
                return redirect()->route('transaction.mobile', ['assetcategory' => $category, 'assetcode' => $assetcode])
                                 ->with('success', 'Asset created successfully!');
            } else {
                return redirect()->route('transaction.others', ['assetcategory' => $category, 'assetcode' => $assetcode])
                                 ->with('success', 'Asset created successfully!');
            }
            
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

        $response = Http::put("http://localhost:5252/api/TrnAsset/update-nipp/{$assetcode}", (int) $validatedData['nipp']);
        Log::info('Data sent for assignment:', ['assetcode' => $assetcode, 'nipp' => (int) $validatedData['nipp']]);

        if ($response->successful()) {
            $historyResponse = Http::post('http://localhost:5252/api/AssetHistory', [
                'assetcode' => $assetcode,
                'nipp' => $validatedData['nipp'],
                'picadded' => 'dava'
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
        $data = [
            'nipp' => null, // Unassigning by setting NIPP to null
        ];

        // Send PUT request to unassign the asset (set NIPP to null)
        $response = Http::put("http://localhost:5252/api/TrnAsset/update-nipp/{$assetcode}", null);
        Log::info('Data sent for unassignment:', ['data' => $data['nipp']]);

        // Check if the unassignment was successful before logging history
        if ($response->successful()) {
            // Log the unassignment in the asset history API if successful
            $historyData = [
                'assetcode' => $assetcode,
                'nipp' => $data['nipp'],
                'picadded' => 'dava'
            ];

            $historyResponse = Http::post('http://localhost:5252/api/AssetHistory', $historyData);
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
            $responseAsset = $client->request('GET', "http://localhost:5252/api/TrnAsset/{$assetCode}");
    
            
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
        ];
    
        $pdf = SnappyPdf::loadView('detailAsset.BAST', $data);
        $pdf->setOption('enable-local-file-access', true)->setPaper('a4');
        return $pdf->inline('Berita Acara Serah Terima.pdf');
    }

    public function search(Request $request) {
        $request->validate([
            'searchTerm' => 'required|string|max:255',
        ]);
    
        $client = new Client();
        $searchTerm = $request->input('searchTerm'); 
    
        try {
            $response = $client->request("GET", "http://localhost:5252/api/TrnAsset", [
                'query' => ['term' => $searchTerm] 
            ]);
            $content = $response->getBody()->getContents();
            $assetData = json_decode($content, true);
    
            return view('dashboard', [
                'assetData' => $assetData,
            ]);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Unable to fetch asset data: ' . $e->getMessage()], 500);
        }
    }

    public function printLabel($assetcode) {
        $client = new Client();
        
        // Fetch asset data
        $assetResponse = $client->request('GET', "http://localhost:5252/api/TrnAsset/{$assetcode}");
        $assetData = json_decode($assetResponse->getBody()->getContents(), true);

        $qrCode = DNS2DFacade::getBarcodePNG($assetcode, 'QRCODE', 3, 3); // Generate QR code
        
        // Prepare data for PDF
        $data = [
            'assetData' => $assetData,
            'qrCode' => $qrCode
        ];

        // Generate PDF
        $pdf = SnappyPdf::loadView('detailAsset.label', $data);
        $pdf->setOption('enable-local-file-access', true);

        // Set margins
        $pdf->setOption('margin-top', '0mm');    // Set top margin
        $pdf->setOption('margin-right', '0mm');  // Set right margin
        $pdf->setOption('margin-bottom', '0mm'); // Set bottom margin
        $pdf->setOption('margin-left', '0mm');   // Set left margin
        
        
        return $pdf->inline("Label QRCode.pdf");
    }



}