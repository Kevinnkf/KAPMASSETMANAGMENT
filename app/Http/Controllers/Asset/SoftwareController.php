<?php

namespace App\Http\Controllers\Asset;

use App\Http\Controllers\Controller;
use App\Models\Software;
use Exception;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class SoftwareController extends Controller
{
    // Get all software records
    public function index() {
        $client = new Client();
        $response = $client->request('GET', 'http://10.48.1.3:7252/api/Master');
        $body = $response->getBody();
        $content = $body->getContents();
        $data = json_decode($content, true);

        return view('detailAsset.Laptop', ['softwareData' => $data]); // Keep the view name consistent
    }

    public function edit($assetcode, $idassetsoftware){
         // Create a new HTTP client instance
         $client = new Client();

         // First API call to fetch asset data (TrnAsset)
         $responseAsset = $client->request('GET', "http://10.48.1.3:7252/api/TrnSoftware/{$idassetsoftware}");
         $contentAsset = $responseAsset->getBody()->getContents();
         $assetData = json_decode($contentAsset, true);
 
         //Fetch PIC
         $responsePic = $client->request('GET', "http://10.48.1.3:7252/api/User");
         $contentPic = $responsePic->getBody()->getContents();
         $userData = json_decode($contentPic, true);  

         //Fetch Master
         $responseMst = $client->get("http://10.48.1.3:7252/api/master");
         $contentMst = $responseMst->getBody()->getContents();
         $mstData = json_decode($contentMst, true);

         //Fetch software
        //  $responseSoftware = $client -> request('GET', 'http://10.48.1.3:7252/api/TrnSoftware/{$assetcode}');
        //  $contentSoftware = $responseSoftware ->getBody()->getContents();
        //  $softwareData = json_decode($contentSoftware, true);
 
         // Pass both assetData and assetSpecData to the view
         return view('asset.transaction.asset.detail.software.edit', [
            'idassetsoftware' => $idassetsoftware,
             'assetcode' => $assetcode,
             'assetData' => $assetData,
             'userData' => $userData,
             'mstData' => $mstData,
             "data" => session('userdata'),
             
            //  'softwareData' => $softwareData
         ]);

    }

    public function create($assetcode){
         // Create a new HTTP client instance
         $client = new Client();

         // First API call to fetch asset data (TrnAsset)
         $responseAsset = $client->request('GET', "http://10.48.1.3:7252/api/TrnAsset/{$assetcode}");
         $contentAsset = $responseAsset->getBody()->getContents();
         $assetData = json_decode($contentAsset, true);
 
         //Fetch PIC
         $responsePic = $client->request('GET', "http://10.48.1.3:7252/api/User");
         $contentPic = $responsePic->getBody()->getContents();
         $userData = json_decode($contentPic, true);  

         //Fetch Master
         $responseMst = $client->get("http://10.48.1.3:7252/api/master");
         $contentMst = $responseMst->getBody()->getContents();
         $mstData = json_decode($contentMst, true);

         //Fetch software
        //  $responseSoftware = $client -> request('GET', 'http://10.48.1.3:7252/api/TrnSoftware/{$assetcode}');
        //  $contentSoftware = $responseSoftware ->getBody()->getContents();
        //  $softwareData = json_decode($contentSoftware, true);

        // Log::info('Result', ['data' => $assetData]);
 
         // Pass both assetData and assetSpecData to the view
         return view('asset.transaction.asset.detail.software.create', [
             'assetcode' => $assetcode,
             'assetData' => $assetData,
             'userData' => $userData,
             'mstData' => $mstData,
             "data" => session('userdata')
            //  'softwareData' => $softwareData
         ]);
    }

    public function store(Request $request){
        // Log the information with the request data as context
        Log::info('Request received', $request->all());
        
        try {
            $validated = $request -> validate([
                'assetcode' => 'required',
                'softwaretype' => 'required',   
                'softwarecategory' => 'required',
                'softwarename' => 'required',
                'softwarelicense' => 'required',
                'softwareperiod'=> 'required',
                'active' => 'nullable',
                'picadded' => 'nullable',
                'dateadded' => 'nullable',
                'picupdated' => 'nullable',
                'dateupdated' => 'nullable',
                'trnasset' => 'nullable'
                ]);
            Log::info('Request received', $validated);
            $client = new Client();
            $assetCodes = $validated['assetcode'];
        
            $response = $client->post("http://10.48.1.3:7252/api/TrnSoftware", [
                'json' => $validated,  // Use the validated data
            ]);

            $data = json_decode($response->getBody()->getContents(), true);
            Log::info('API Response:', $data);  // Log the API response for inspection
            return redirect()->route('transaction.asset.laptop', ['assetcode' => $assetCodes])
                                 ->with('success', 'Success adding software!');  
            // return redirect('')->with("success", "Data has been added successfully");
        } catch (\GuzzleHttp\Exception\RequestException $e) {
            $responseBody = $e->hasResponse() ? (string) $e->getResponse()->getBody() : null;
            Log::error('API Error: ' . $e->getMessage() . ' - Response Body: ' . $responseBody);
            return redirect()->back()->withErrors(['error' => 'An error occurred while submitting the data.']);
        }   
    }   

    public function update(Request $request, $assetcode, $idassetsoftware){
        try {
            $client = new Client();
            Log::info('Update method called with assetcode: ' . $assetcode . ' and idassetsoftware: ' . $idassetsoftware);
            Log::info('Request Data:', $request->all());
            
            $validated = $request -> validate([
                'idassetsoftware' => 'required',
                'assetcode' => 'required',
                'softwaretype' => 'required',   
                'softwarecategory' => 'required',
                'softwarename' => 'required',   
                'softwarelicense' => 'required',
                'softwareperiod' => 'required',
                'active' => 'required',
                'picadded' => 'ss',
                'dateadded' => 'nullable',
                'picupdated' => 'nullable',
                'dateupdated' => 'nullable',
                ]);

            Log::info('validated:', $validated);  // Log the API response for inspection
            
        
            $response = $client->put("http://10.48.1.3:7252/api/TrnSoftware/{$idassetsoftware}", [
                'json' => $validated,  // Use the validated data
            ]);
        
            $data = json_decode($response->getBody()->getContents(),  true);
            // Log::info('API raw Response:', $response->getStatusCode()); 
            Log::info('API Response:', $data);  // Log the API response for inspection
    
            return redirect()->route('transaction.asset.laptop', ['assetcode' => $assetcode])
                             ->with('success', 'Data submitted successfully!');
            
        } catch (\GuzzleHttp\Exception\RequestException $e) {
            $responseBody = $e->hasResponse() ? (string) $e->getResponse()->getBody() : null;
            Log::error('API Error: ' . $e->getMessage() . ' - Response Body: ' . $responseBody);
            
            // return redirect()->route('transaction.asset.index')
            //                  ->with('error', 'Data submitted unsuccessfully!');
            return redirect()->back()
                             ->with('error', 'Data submitted unsuccessfully!');
        }   
    }

    public function delete(Request $request, $id){
        $validated = $request->validate([
            'active' => 'required|string|in:Y,N',  // Ensure active is either 'Y' or 'N'
        ]);

        $client = new Client();

        try {
            $response = $client->put("http://10.48.1.3:7252/api/TrnSoftware/{$id}", [
                'json' => $validated,
            ]);

            // Log the success response
            Log::info('Successfully updated software status', [
                'id' => $id,
                'response_status' => $response->getStatusCode(),
                'response_body' => json_decode($response->getBody(), true),
            ]);

            return response()->json(['message' => 'Successfully updated software status'], 200);

        } catch (\Throwable $th) {
            // Log detailed error response
            Log::error('Failed to update software status', [
                'id' => $id,
                'error_message' => $th->getMessage(),
                'error_code' => $th->getCode(),
            ]);

            return response()->json(['error' => 'Failed to update software status'], 500);
        }
    }
}



# TODO

# PRINT BAST (DONE)
# PRINT QRCODE (DONE)
# Regular sized QR CODE (DONE)
# Add new fields for maintenance (DONE)
# Date purcharsed for new asset  
# PRINT LABEL ASSET CODE (Soon)
 




