<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromArray;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Events\AfterSheet;

class AssetExport implements FromArray, WithHeadings
{
    protected $data;

    public function __construct(array $data)
    {
        $this->data = $data;
    }

    public function array(): array
    {
        // Extract the assetbrand from each asset in the assetData array
        return array_map(function($asset) {
            return [
                'idasset' => $asset['idasset'], // Adjust this based on your data structure
                'assetcode' => $asset['assetcode'], // Adjust this based on your data structure
                'nipp' => $asset['nipp'], // Adjust this based on your data structure
                'assettype' => $asset['assettype'], // Adjust this based on your data structure
                'assetcategory' => $asset['assetcategory'], // Adjust this based on your data structure
                'assetbrand' => $asset['assetbrand'], // Adjust this based on your data structure
                'assetmodel' => $asset['assetmodel'], // Adjust this based on your data structure
                'assetseries' => $asset['assetseries'], // Adjust this based on your data structure
                'assetserialnumber' => $asset['assetserialnumber'], // Adjust this based on your data structure
                'condition' => $asset['condition'], // Adjust this based on your data structure
                'purchasedate' => $asset['purchasedate'], // Adjust this based on your data structure
                'picadded' => $asset['picadded'], // Adjust this based on your data structure
                // Add more fields if needed
            ];
        }, $this->data['assetData']); // Make sure to use the correct key
    }

    public function headings(): array
    {
        return [
            'ID Asset',
            'Kode Aset',
            'NIPP',
            'Tipe Aset',
            'Kategori Aset',
            'Brand Aset', 
            'Model Aset',
            'Seri Aset',
            'Nomor Serial Aset',
            'Kondisi',
            'Tanggal Dibeli',
            'Person in charge'
            
            
        ];
    }
    public function registerEvents(): array
    {
        return [
            AfterSheet::class => function(AfterSheet $event) {
                // Set header background color
                $event->sheet->getDelegate()->getStyle('A1')
                    ->getFill()
                    ->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
                    ->getStartColor()
                    ->setARGB('#40E0D0'); // Change to your desired color

                // Set border for the header
                $event->sheet->getDelegate()->getStyle('A1')
                    ->getBorders()
                    ->getAllBorders()
                    ->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);

                // Set border for data cells
                $event->sheet->getDelegate()->getStyle('A2:A' . (count($this->data['assetData']) + 1))
                    ->getBorders()
                    ->getAllBorders()
                    ->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);
            },
        ];
    }

}
