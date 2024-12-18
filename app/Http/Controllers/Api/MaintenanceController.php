<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Maintenance;
use Barryvdh\DomPDF\Facade\Pdf;
use Barryvdh\Snappy\Facades\SnappyPdf;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\Log;
use Milon\Barcode\Facades\DNS2DFacade;

use function Symfony\Component\Clock\now;

class MaintenanceController extends Controller{
    // Get all maintenance records
    public function indexz() {
        $client = new Client();
        $response = $client->request('GET', 'http://localhost:5252/api/TrnHistMaintenance');
        $body = $response->getBody();
        $content = $body->getContents();
        $data = json_decode($content, true);

        $assetResponse = $client->request('GET', 'http://localhost:5252/api/TrnAsset');
        $assetBody = $assetResponse->getBody();
        $assetContent = $assetBody->getContents();
        $assetData = json_decode($assetContent, true);

        $userResponse = $client->request('GET', 'http://localhost:5252/api/user');
        $userBody = $userResponse->getBody();
        $userContent = $userBody->getContents();
        $userData = json_decode($userContent, true);
        
        $currentPage = LengthAwarePaginator::resolveCurrentPage();
        $perPage = 7;
        $currentItems = array_slice($data, ($currentPage-1)*$perPage, $perPage);

        $paginatedData = new LengthAwarePaginator(
            $currentItems,
            count($data), // Total items
            $perPage, // Items per page
            $currentPage, // Current page
            ['path' => request()->url(), 'query' => request()->query()] // Maintain query parameters
        );

        return view('maintenance.index', [
            'maintenanceData' => $paginatedData,
            'assetData' => $assetData,
            'userData' => $userData  
        ]); // Keep the view name consistent
    }

    public function index($assetcode){
        //new guzzle http client
        $client = new Client();

        // First API call to fetch asset data (TrnAsset)
        $responseAsset = $client->request('GET', "http://localhost:5252/api/TrnHistMaintenance/{$assetcode}");
        $contentAsset = $responseAsset->getBody()->getContents();
        $mtc = json_decode($contentAsset, true);

        // Second API call to fetch asset spec data (TrnAssetSpec)
        $responseAssetSpec = $client->request('GET', "http://localhost:5252/api/user");
        $contentAssetSpec = $responseAssetSpec->getBody()->getContents();
        $user = json_decode($contentAssetSpec, true);

        //Third API call to fetch sidebar data (master)
        $responseMaster = $client->request('GET', "http://localhost:5252/api/master");
        $contentMaster = $responseMaster->getBody()->getContents();
        $asset = json_decode($contentMaster, true);

        // Pass both assetData and assetSpecData to the view
        return view('maintenance.create', [
            // 'assetData' => $assetData,
            'assetcode' => $assetcode,
            'asset' => $asset,
            'mtc' => $mtc,
            'user' => $user,
        ]);
    }

    // Store a new maintenance record
    public function store(Request $request, $assetcode){
        $validatedData = $request->validate([
            "assetcode"=> 'required',
            "picadded"=> 'required',
            "notesaction"=> 'required',
            "notessparepart"=> 'required',
            "notesresult"=> 'required',
        ]);

        $client = new Client();

        try {
            $response = $client->post("http://localhost:5252/api/TrnHistMaintenance/{$assetcode}", [
                'query' => $validatedData,
            ]);

            $data = json_decode($response->getBody()->getContents(), true);
            Log::info("API Response: ", $data);
            return redirect("/detail-asset/laptop/$assetcode")
                ->with("success", "Data has been added successfully");

        } catch (\GuzzleHttp\Exception\RequestException $e) {
            $responseBody = $e->hasResponse() ? (string) $e->getResponse()->getBody() : null;
            Log::error('API Error: ' . $e->getMessage() . ' - Response Body: ' . $responseBody);
        
            return redirect("/maintenance/create/{$assetcode}")->withErrors(['error' => 'An error occurred while submitting the data.']);
        }
    }

    public function print($assetcode, $maintenanceid) {
        $client = new Client();
        
        // Fetch maintenance data for the specific asset code
        $response = $client->request('GET', "http://localhost:5252/api/TrnHistMaintenance/{$assetcode}");
        $mtcData = json_decode($response->getBody()->getContents(), true);
        
        // Filter to find the specific maintenance record by maintenanceid
        $selectedRecord = null;
        foreach ($mtcData as $record) {
            if ($record['maintenanceid'] == $maintenanceid) { // Adjust 'id' to the actual key in your response
                $selectedRecord = $record;
                break;
            }
        }
    
        // Check if the record was found
        if (!$selectedRecord) {
            return abort(404); // Or handle the error appropriately
        }
        
        // Fetch asset data
        $assetResponse = $client->request('GET', 'http://localhost:5252/api/TrnAsset');
        $assetData = json_decode($assetResponse->getBody()->getContents(), true);
        
        // Fetch user data
        $userResponse = $client->request('GET', 'http://localhost:5252/api/user');
        $userData = json_decode($userResponse->getBody()->getContents(), true);

        $qrCode = DNS2DFacade::getBarcodePNG($assetcode, 'QRCODE', 3, 3); // Generate QR code
        
        // Prepare data for PDF
        $data = [
            'assetData' => $assetData,
            'userData' => $userData,
            'selectedRecord' => $selectedRecord, // Pass the selected maintenance record
            'qrCode' => $qrCode
        ];

        // Generate PDF
        $pdf = SnappyPdf::loadView('maintenance.preview', $data);
        $pdf->setOption('enable-local-file-access', true);
        
        return $pdf->inline('Berita Acara Perbaikan.pdf');
    }
}
