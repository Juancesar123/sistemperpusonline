<?php

namespace Modules\Buku\Entities;

use Illuminate\Database\Eloquent\Model;

class BukuModel extends Model
{
    protected $fillable = [];
    protected $table = 'buku';
    protected $primaryKey = 'id_buku';
}
