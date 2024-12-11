<?php

namespace App\Http\Controllers\Asset;

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
        $response = $client->request('GET', 'http://10.48.1.3:7252/api/TrnHistMaintenance');
        $body = $response->getBody();
        $content = $body->getContents();
        $data = json_decode($content, true);

        $assetResponse = $client->request('GET', 'http://10.48.1.3:7252/api/TrnAsset');
        $assetBody = $assetResponse->getBody();
        $assetContent = $assetBody->getContents();
        $assetData = json_decode($assetContent, true);

        $userResponse = $client->request('GET', 'http://10.48.1.3:7252/api/user');
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

    public function create($assetcode){
        //new guzzle http client
        $client = new Client();

        // First API call to fetch asset data (TrnAsset)
        $responseAsset = $client->request('GET', "http://10.48.1.3:7252/api/TrnHistMaintenance/{$assetcode}");
        $contentAsset = $responseAsset->getBody()->getContents();
        $mtc = json_decode($contentAsset, true);

        // Second API call to fetch asset spec data (TrnAssetSpec)
        $responseAssetSpec = $client->request('GET', "http://10.48.1.3:7252/api/user");
        $contentAssetSpec = $responseAssetSpec->getBody()->getContents();
        $user = json_decode($contentAssetSpec, true);

        //Third API call to fetch sidebar data (master)
        $responseMaster = $client->request('GET', "http://10.48.1.3:7252/api/master");
        $contentMaster = $responseMaster->getBody()->getContents();
        $mstData = json_decode($contentMaster, true);

        // Pass both assetData and assetSpecData to the view
        return view('asset.transaction.asset.detail.maintenance.create', [
            // 'assetData' => $assetData,
            'assetcode' => $assetcode,
            'mstData' => $mstData,
            'mtc' => $mtc,
            'user' => $user,
            "data" => session('userdata')
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
            $response = $client->post("http://10.48.1.3:7252/api/TrnHistMaintenance/{$assetcode}", [
                'query' => $validatedData,
            ]);

            $data = json_decode($response->getBody()->getContents(), true);
            Log::info("API Response: ", $data);
            return redirect()->route('transaction.asset.laptop', ['assetcode' => $assetcode])
                                 ->with('success', 'Success adding maintenance history!'); 
            // return back()->with("success", "Data has been added successfully");

        } catch (\GuzzleHttp\Exception\RequestException $e) {
            $responseBody = $e->hasResponse() ? (string) $e->getResponse()->getBody() : null;
            Log::error('API Error: ' . $e->getMessage() . ' - Response Body: ' . $responseBody);
        
            return back()->withErrors(['error' => 'An error occurred while submitting the data.']);
        }
    }

    public function print($assetcode, $maintenanceid) {
        $client = new Client();
        
        // Fetch maintenance data for the specific asset code
        $response = $client->request('GET', "http://10.48.1.3:7252/api/TrnHistMaintenance/{$assetcode}");
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
        $assetResponse = $client->request('GET', 'http://10.48.1.3:7252/api/TrnAsset');
        $assetData = json_decode($assetResponse->getBody()->getContents(), true);
        
        // Fetch user data
        $userResponse = $client->request('GET', 'http://10.48.1.3:7252/api/user');
        $userData = json_decode($userResponse->getBody()->getContents(), true);

        $qrCode = DNS2DFacade::getBarcodePNG($assetcode, 'QRCODE', 3, 3); // Generate QR code
        
        // Prepare data for PDF
        $data = [
            'assetData' => $assetData,
            'userData' => $userData,
            'selectedRecord' => $selectedRecord, // Pass the selected maintenance record
            'qrCode' => $qrCode,
            'data' => session('userdata')
        ];

        // Generate PDF
        $pdf = SnappyPdf::loadView('asset.transaction.asset.detail.maintenance.bap', $data);
        $pdf->setOption('enable-local-file-access', true);
        
        return $pdf->inline('Berita Acara Perbaikan.pdf');
    }
}
// using System.Net.Http.Headers;
// using System.Security.Cryptography.X509Certificates;
// using Master_GCM.ViewModels;
// using Microsoft.AspNetCore.Http.HttpResults;
// using Microsoft.AspNetCore.Mvc;
// using Microsoft.EntityFrameworkCore;

// [ApiController]
// [Route("api/[controller]")]

// public class TrnAssetDtlPictureController : ControllerBase
// {
//     private readonly AppDbContext _context;

//     public TrnAssetDtlPictureController(AppDbContext context)
//     {
//         _context = context;
//     }

//     // Get hardware by ASSETCODE and include the employee information
//     [HttpGet("{ASSETCODE}")]
//     public async Task<ActionResult<List<TRNASSETPICTUREMODEL>>> GetTrnHardware(string assetcode)
//     {
//         var trnassetcode = await _context.TRN_DTL_PICTURE
//                                         .Where(e => e.ASSETCODE == assetcode)
//                                         .ToListAsync();

//         if(trnassetcode == null || !trnassetcode.Any()){
//             return Ok("Not Found");
//         }                                
//         return Ok(trnassetcode);
//     }


//     [HttpPut("{IDASSETPIC}")]
//     public async Task<IActionResult> UpdateAssetImage(int IDASSETPIC, [FromForm] AssetViewModel model)
//     {
//         try
//         {
//             // Retrieve the existing asset from the database
//             var existingAsset = await _context.TRN_DTL_PICTURE
//                 .FirstOrDefaultAsync(a => a.IDASSETPIC == IDASSETPIC);

//             if (existingAsset == null)
//             {
//                 return NotFound("Asset not found.");
//             }

//             // Update asset properties
//             existingAsset.ACTIVE = model.ACTIVE;
//             existingAsset.PICADDED = model.PICADDED;
//             existingAsset.PICUPDATED = model.PICUPDATED;
//             existingAsset.DATEUPDATED = DateOnly.FromDateTime(DateTime.Now);
//             // existingAsset.DATEADDED = DateOnly.FromDateTime(DateTime.Now);

//             // Handle file upload if a new image is provided
//             if (model.ASSETIMG != null && model.ASSETIMG.Count > 0)
//             {
//                 var folderName = @"/var/www/APIASSET/network_share/AssetManagementSystem/Image/Asset"; 
//                 var pathToSave = folderName;

//                 if (!Directory.Exists(pathToSave))
//                     Directory.CreateDirectory(pathToSave);

//                 foreach (var file in model.ASSETIMG)
//                 {
//                     if (file.Length > 0)
//                     {
//                         string assetCode = model.ASSETCODE;
//                         string searchPattern = $"{assetCode}-*.jpg"; 
//                         var existingFiles = Directory.GetFiles(pathToSave, searchPattern);
//                         var existingNumbers = existingFiles
//                             .Select(f => Path.GetFileNameWithoutExtension(f))
//                             .Select(name => name.Substring(assetCode.Length + 1))
//                             .Where(num => int.TryParse(num, out _))
//                             .Select(int.Parse)
//                             .ToList();

//                         int nextNumber = existingNumbers.Any() ? existingNumbers.Max() + 1 : 1;
//                         var newFileName = $"{assetCode}-{nextNumber}.jpg";
//                         var fullPath = Path.Combine(pathToSave, newFileName);

//                         using (var stream = new FileStream(fullPath, FileMode.Create))
//                         {
//                             await file.CopyToAsync(stream);
//                         }

//                         // Update the asset picture path
//                         existingAsset.ASSETPIC = newFileName;
//                     }
//                     else
//                     {
//                         return BadRequest("Invalid file.");
//                     }
//                 }
//             }

//             // Save changes to the database
//             _context.TRN_DTL_PICTURE.Update(existingAsset);
//             await _context.SaveChangesAsync();

//             return Ok("Asset updated successfully.");
//         }
//         catch (Exception ex)
//         {
//             return StatusCode(500, $"Internal server error: {ex.Message}");
//         }
//     }

//     [HttpGet("{IDASSETPIC:int}")]
//     public async Task<ActionResult<TRNASSETPICTUREMODEL>> GetIDImage(int IDASSETPIC){
//         var trngetspec = await _context.TRN_DTL_PICTURE.Where(x => x.IDASSETPIC == IDASSETPIC).FirstOrDefaultAsync();
        
//         if (trngetspec == null)
//         {
//             return NotFound();
//         }

//         return Ok(trngetspec);
//     }
//     private bool TrnPictureExists(int IDASSETPIC)
//     {
//         return _context.TRN_DTL_PICTURE.Any(e => e.IDASSETPIC == IDASSETPIC);
//     }

//     [HttpPost]
//     [Consumes("multipart/form-data")]
//     public async Task<IActionResult> UploasdAssetImage([FromForm] AssetViewModel model)
//     {
//         try
//         {
//             if (model.ASSETIMG != null && model.ASSETIMG.Count > 0)
//             {
                
//                 var folderName = @"/var/www/APIASSET/network_share/AssetManagementSystem/Image/Asset"; 
//                 var pathToSave = folderName;

                
//                 if (!Directory.Exists(pathToSave))
//                     Directory.CreateDirectory(pathToSave);

//                 foreach (var file in model.ASSETIMG)
//                 {
//                     // Ensure the file is valid
//                     if (file.Length > 0)
//                     {
//                         string assetCode = model.ASSETCODE; // Get the asset code from the model
//                         string searchPattern = $"{assetCode}-*.jpg"; // Define the search pattern

//                         // Get existing files that match the pattern
//                         var existingFiles = Directory.GetFiles(pathToSave, searchPattern);

//                         // Extract numbers from existing file names
//                         var existingNumbers = existingFiles
//                             .Select(f => Path.GetFileNameWithoutExtension(f))
//                             .Select(name => name.Substring(assetCode.Length + 1)) // Remove asset code and dash
//                             .Where(num => int.TryParse(num, out _)) // Ensure it's a number
//                             .Select(int.Parse)
//                             .ToList();

//                         // Determine the next number
//                         int nextNumber = existingNumbers.Any() ? existingNumbers.Max() + 1 : 1;

//                         // Construct the new file name
//                         var newFileName = $"{assetCode}-{nextNumber}.jpg";
//                         var fullPath = Path.Combine(pathToSave, newFileName);
//                         var relativePath = newFileName;

//                         // Save the image to the folder
//                         using (var stream = new FileStream(fullPath, FileMode.Create))
//                         {
//                             Console.WriteLine($"Saving file to: {fullPath}");
//                             await file.CopyToAsync(stream);
//                         }

//                         // Save only the file name to the database, not the path
//                         var trnPicture = new TRNASSETPICTUREMODEL
//                         {
//                             ASSETCODE = model.ASSETCODE,
//                             ACTIVE = model.ACTIVE,  
//                             ASSETPIC = relativePath,  
//                             PICADDED = model.PICADDED,  
//                             PICUPDATED = model.PICUPDATED,  
//                             DATEADDED = DateOnly.FromDateTime(DateTime.Now)  
//                         };

//                         // Add image data to the database
//                         _context.TRN_DTL_PICTURE.Add(trnPicture);
//                         await _context.SaveChangesAsync();
//                     }
//                     else
//                     {
//                         return BadRequest("Invalid file.");
//                     }
//                 }   

//                 return Ok("File(s) uploaded successfully.");
//             }
//             else
//             {
//                 return BadRequest("No files uploaded.");
//             }
//         }
//         catch (Exception ex)
//         {
//             return StatusCode(500, $"Internal server error: {ex.Message}");
//         }
//     }
// }