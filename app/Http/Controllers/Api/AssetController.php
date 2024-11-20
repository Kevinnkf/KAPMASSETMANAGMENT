<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use OpenApi\Annotations\Get;
use Illuminate\Pagination\LengthAwarePaginator;

class AssetController extends Controller
{
    public function create(){
        $client = new Client();
        $response = $client->request('GET', 'http://localhost:5252/api/Master');
        $body = $response->getBody();
        $content = $body->getContents();
        $masterData = json_decode($content, true);

        $client = new Client();
        $response = $client->request('GET', 'http://localhost:5252/api/TrnAsset');
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
        
        
        
        // Count assets based on conditions
        $countAsset = count(array_filter($assetData, function ($item) {
            return is_array($item) && (!array_key_exists('nipp', $item) || is_null($item['nipp']));
        }));
        
        $destroyedAsset = count(array_filter($assetData, function ($item) {
            return is_array($item) && array_key_exists('condition', $item) && $item['condition'] == "DESTROYED";
        }));
        
        $inMtc = count(array_filter($assetData, function ($item) {
            return is_array($item) && array_key_exists('condition', $item) && $item['condition'] == "MAINTENANCE";
        }));
        
        Log::info('Result', ['data' => $paginatedData]);
        Log::info('Result', ['data' => $countAsset]);
        
        return view('dashboard', [  
            'masterData' => $masterData,
            'assetData' => $paginatedData,
            'countAsset' => $countAsset,
            'destroyedAsset' => $destroyedAsset,
            'inMtc' => $inMtc
        
        ]);
    }

    public function store(Request $request){
        $validatedData = $request->validate([
            'assetcode' => 'required|string|max:255',
            'assettype' => 'required|string|max:255',
            'assetcategory' => 'required|string|max:255',
            'assetbrand' => 'required|string|max:255',
            'assetmodel' => 'required|string|max:255',
            'assetseries' => 'required|string|max:255',
            'assetserialnumber' => 'required|string|max:255',
            'active' => 'required|string|max:255',
        ]);

        $client = new Client();
        try{
            $response = $client->post('http://localhost:5252/api/TrnAsset',[
                'json'=> $validatedData,
            ]);
            $data = json_decode($response->getBody()->getContents(), true);
            Log::info('API Response:', $data);  // Log the API response for inspection
            return redirect('/dashboard')->with('success', 'Data submitted successfully!');
        }catch (\GuzzleHttp\Exception\RequestException $e) {
            $responseBody = $e->hasResponse() ? (string) $e->getResponse()->getBody() : null;
            Log::error('API Error: ' . $e->getMessage() . ' - Response Body: ' . $responseBody);
        
            return redirect('/master/create')->withErrors(['error' => 'An error occurred while submitting the data.']);
        }   
    }

    public function search(Request $request) {
        $validated = $request->validate([
            'search' => 'required|string|max:255',
        ]);

        Log::info('Result', ['data' => $validated]);
    
        $client = new Client();
    
        try {
            // Fetch asset data based on search term
            $response = $client->request("GET", "http://localhost:5252/api/TrnAsset/search", [
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
    
            return view('dashboard', [
                'assetData' => $paginatedData,
                'countAsset' => $countAsset,
                'destroyedAsset' => $destroyedAsset,
                'inMtc' => $inMtc,
            ]);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Unable to fetch asset data: ' . $e->getMessage()], 500);
        }
    }
}