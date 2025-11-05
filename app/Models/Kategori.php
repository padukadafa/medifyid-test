<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kategori extends Model
{
    use HasFactory;
    protected $table = 'kategoris';

    protected $primaryKey = 'kode';

    public $incrementing = false;

    protected $keyType = 'string';

    protected $fillable = ['nama', 'kode'];

    public function master_item()
    {
        return $this->belongsToMany(MasterItem::class, 'master_item_kategoris', 'kode_kategori', 'id_master_item');
    }
}
