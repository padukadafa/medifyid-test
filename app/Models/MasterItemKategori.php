<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MasterItemKategori extends Model
{
    use HasFactory;

    
    protected $fillable = [
        'kode_kategori',
        'id_master_item',
    ];
    public function master_item() {
        return $this->belongsTo(MasterItem::class, 'id_master_item');
    }
    public function kategori() {
        return $this->belongsTo(Kategori::class, 'kode_kategori', 'kode');
    }
}
