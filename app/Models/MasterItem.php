<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class MasterItem extends Model
{
    use HasFactory;
    use SoftDeletes;

    public function categories() {
        return $this->belongsToMany(Kategori::class, 'master_item_kategoris', 'id_master_item', 'kode_kategori');
    }
}
