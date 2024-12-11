<?php
namespace App\Http\Controllers\Asset;
use GuzzleHttp\Exception\RequestException;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

use function Symfony\Component\Clock\now;

class ImageController extends Controller
{
    public function create($assetcode) {
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

        // Pass both assetData and assetSpecData to the view
        return view('asset.transaction.asset.detail.image.create', [
            'assetcode' => $assetcode,
            'assetData' => $assetData,
            'userData' => $userData,
            "data" => session('userdata'),
        ]);
    }

    public function indexUpdate($assetcode) {
        // Create a new HTTP client instance
        $client = new Client();

        // First API call to fetch asset data (TrnAsset)
        $responseAsset = $client->request('GET', "http://10.48.1.3:7252/api/TrnAsset/{$assetcode}");
        $contentAsset = $responseAsset->getBody()->getContents();
        $assetData = json_decode($contentAsset, true);

        // Fetch PIC
        $responseUser = $client -> get('http://10.48.1.3:7252/api/User');
        $contentUser = $responseUser->getBody()->getContents();
        $userData = json_decode($contentUser, true);

        // Pass both assetData and assetSpecData to the view
        return view('image.update', [
            'assetcode' => $assetcode,
            'assetData' => $assetData,
            'userData' => $userData,
        ]);
    }

    public function store(Request $request){
        Log::info('Request Data:', $request->all());
        // Validate the input
        $validated = $request->validate([
            'assetcode' => 'required',
            'assetimage' => 'required|file|image|mimes:jpg,png,jpeg,gif,svg|max:2048', // Ensure it's a valid image file
            'active' => 'required',
            'picadded' => 'required',
        ]);

        $client = new Client();

        $assetcode = $validated['assetcode'];

        try {
             // Store the image locally and get the storage path
             if ($request->hasFile('assetimage')) {
                // No need to store the file locally, just get the file and send it in the POST request
                $file = $request->file('assetimage');
            }   

            // Build the multipart form data including the image file
            $response = $client->post('http://10.48.1.3:7252/api/TrnAssetDtlPicture', [
                'multipart' => [
                    [
                        'name' => 'ASSETCODE',
                        'contents' => $validated['assetcode'],
                    ],
                    [
                        'name' => 'ACTIVE',
                        'contents' => $validated['active'],
                    ],
                    [
                        'name' => 'PICADDED',
                        'contents' => $validated['picadded'],
                    ],
                    [
                        'name' => 'ASSETIMG',
                        'contents' => fopen($file->getPathname(), 'r'),
                        'filename' => $request->file('assetimage')->getClientOriginalName(),
                    ],
                ]
            ]);

            $data = json_decode($response->getBody()->getContents(), true); // Decode the response
            // Log success (ensure $data is an array or provide a message)
            Log::info("Success", $data ? $data : []); // Pass empty array if $data is null  
            return redirect()->route('transaction.asset.laptop', ['assetcode' => $assetcode])
                                 ->with('success', 'Success adding image!'); 
            // return back()->with("success", "Data has been added successfully");
        } catch (\Throwable $th) {
            // Log error and handle the exception
            Log::error('API Error: ' . $th->getMessage());
            return back()->withErrors('Failed to upload data.');
        }
    }

    //funtion to delete (switch of the active filed)
    public function deleteAsset(Request $request, $id){
       // Validate the input
       $validated = $request->validate([
        'assetimage' => 'required|file|image|mimes:jpg,png,jpeg,gif,svg|max:2048', // Ensure it's a valid image file
        'active' => 'required',
    ]); 

        $client = new Client();
    }

    public function testUpdate(Request $request, $assetcode, $idassetpic){
        Log::info('Request Data Image:', $request->all());
        
        // Validate the input
        $validated = $request->validate([
            'idassetpic' => 'required',
            'assetcode' => 'required',
            'assetpic' => 'nullable|file|image|mimes:jpg,png,jpeg,gif,svg|max:2048', 
            'active' => 'required',
            'picadded' => 'required',
            'picupdated' => 'required',
        ]);
        
        Log::info('Request Data Validated:', $validated);

        $client = new Client();

        try {
            // Prepare the multipart form data
            $queryParams = [
                'idassetpic' => $idassetpic,
                'ASSETCODE' => $assetcode,
                'ACTIVE' => $validated['active'],
                'PICADDED' => $validated['picadded'],
                'PICUPDATED' => $validated['picupdated'],
                'year' => now(), 
                'month' => now(), 
                'day' => now(), 
                'dayOfWeek' => now(), 
            ];

            Log::info('Request Data Query:', $queryParams);

            // If a new file is uploaded, add it to the multipart data
            if ($request->hasFile('assetpic')) {
                $file = $request->file('assetpic');
                // Assuming need to upload the file first, handle it accordingly
                // This part may depend on how API is set up to handle file uploads
                $queryParams['ASSETPIC'] = $file->getClientOriginalName(); // or the file path if needed
                // might need to upload the file separately if the API expects it to be stored first
            } else {
                // Handle the case where no file is uploaded
                return back()->withErrors(['message' => 'No image file provided.']);
            }

            // Log::info('Request Data Query Image:', $queryParams['ASSETPIC']);

            // Make the PUT request
            $response = $client->put("http://10.48.1.3:7252/api/TrnAssetDtlPicture/{$idassetpic}", [
                'query' => $queryParams,
            ]);

            $data = json_decode($response->getBody()->getContents(), true);
            Log::info("Success", $data ? $data : []);

            return redirect()->route('transaction.asset.laptop', ['assetcode' => $assetcode])
                             ->with('success', 'Data submitted successfully!');
        } catch (RequestException $e) {
            Log::error('API Error: ' . $e->getMessage());
            if ($e->hasResponse()) {
                Log::error('API Response: ' . $e->getResponse()->getBody());
            }
            return redirect()->back()
                             ->with('error', 'Data submitted unsuccessfully!');
        } catch (\Throwable $th) {
            Log::error('API Error: ' . $th->getMessage());
            return redirect()->back()
                             ->with('error', 'Data submitted unsuccessfully!');
        }
    }

    public function edit($assetcode, $idassetpic){
        // Create a new HTTP client instance
        $client = new Client();

        // First API call to fetch asset data (TrnAsset)
        $responseAsset = $client->request('GET', "http://10.48.1.3:7252/api/TrnAssetDtlPicture/{$idassetpic}");
        $contentAsset = $responseAsset->getBody()->getContents();
        $img = json_decode($contentAsset, true);

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

        // Pass both img and assetSpecData to the view
        return view('asset.transaction.asset.detail.image.edit', [
           'idassetpic' => $idassetpic,
            'assetcode' => $assetcode,
            'img' => $img,
            'userData' => $userData,
            'mstData' => $mstData,
            "data" => session('userdata'),
            
           //  'softwareData' => $softwareData
        ]);

   }

   public function update(Request $request, $assetcode , $idassetpic){
    try {
        Log::info('Request Data:', $request->all());
        // Validate the input
        $validated = $request->validate([
            'idassetpic' => 'required',
            'assetcode' => 'required',
            'assetpic' => 'required|file|image|mimes:jpg,png,jpeg,gif,svg|max:2048', // Ensure it's a valid image file
            'active' => 'required',
            'picupdated' => 'required',
            'picadded' => 'nullable',
        ]);

        $client = new Client();


            // Store the image locally and get the storage path
            if ($request->hasFile('assetpic')) {
                // No need to store the file locally, just get the file and send it in the POST request
                $file = $request->file('assetpic');
            }   

        // Build the multipart form data including the image file
        $response = $client->put("http://10.48.1.3:7252/api/TrnAssetDtlPicture/{$idassetpic}", [
            'multipart' => [
                [
                    'name' => 'IDASSETPIC',
                    'contents' => $idassetpic,
                ],
                [
                    'name' => 'ASSETCODE',
                    'contents' => $assetcode,
                ],
                [
                    'name' => 'ACTIVE',
                    'contents' => $validated['active'],
                ],
                [
                    'name' => 'PICADDED',
                    'contents' => $validated['picadded'],
                ],
                [
                    'name' => 'PICUPDATED',
                    'contents' => $validated['picupdated'],
                ],
                [
                    'name' => 'ASSETIMG',
                    'contents' => fopen($file->getPathname(), 'r'),
                    'filename' => $request->file('assetpic')->getClientOriginalName(),
                ],
            ]
        ]);

        $data = json_decode($response->getBody()->getContents(), true); // Decode the response
        // Log success (ensure $data is an array or provide a message)
        Log::info("Success", $data ? $data : []); // Pass empty array if $data is null  
        return back()->with("success", "Data has been added successfully");
    } catch (\Throwable $th) {
        // Log error and handle the exception
        Log::error('API Error: ' . $th->getMessage());
        return back()->withErrors('Failed to upload data.');
    }
}
}