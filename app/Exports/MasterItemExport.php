<?php

namespace App\Exports;

use App\Models\MasterItem;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class MasterItemExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return MasterItem::with(['categories'])->get()->map(function($item, $index) {
            return [
                'no' => $index + 1,
                'nama_kategori' => $item->categories->pluck('nama')->join(', '),
                'nama_item' => $item->nama,
                'nama_supplier' => $item->supplier,
                'harga' => $item->harga_beli,
                'laba' => $item->laba."%",
                'harga_jual' => $item->harga_beli+$item->laba*$item->harga_beli/100,
            ];
        });
    }

    public function headings(): array
    {
        return [
            'No',
            'Nama Kategori',
            'Nama Item',
            'Nama Supplier',
            'Harga',
            'Laba',
            'Harga Jual',
        ];
    }
}
