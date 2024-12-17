<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromArray;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Events\AfterSheet;
use PhpOffice\PhpSpreadsheet\Style\Color;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class AssetExport implements FromArray, WithHeadings, WithEvents, ShouldAutoSize
{
    protected $data;

    public function __construct(array $data)
    {
        $this->data = $data;
    }

    public function array(): array
    {
        return array_map(function($asset) {
            return [
                'idasset' => $asset['idasset'],
                'assetcode' => $asset['assetcode'],
                'nipp' => $asset['nipp'],
                'assettype' => $asset['assettype'],
                'assetcategory' => $asset['assetcategory'],
                'assetbrand' => $asset['assetbrand'],
                'assetmodel' => $asset['assetmodel'],
                'assetseries' => $asset['assetseries'],
                'assetserialnumber' => $asset['assetserialnumber'],
                'condition' => $asset['condition'],
                'purchasedate' => $asset['purchasedate'],
                'picadded' => $asset['picadded'],
                
            ];
        }, $this->data['assetData']); 
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
                $event->sheet->getDelegate()->getStyle('A1:L1')
                    ->getFill()
                    ->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
                    ->getStartColor()
                    ->setARGB(Color::COLOR_CYAN); 

                // Set border for the header
                $event->sheet->getDelegate()->getStyle('A1:L1')
                    ->getBorders()
                    ->getAllBorders()
                    ->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);

                // Set border for all data cells 
                $lastColumn = 'L'; // Change this to the last column as needed
                $event->sheet->getDelegate()->getStyle('A2:' . $lastColumn . (count($this->data['assetData']) + 1))
                    ->getBorders()
                    ->getAllBorders()
                    ->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);
            },
        ];
    }

}
