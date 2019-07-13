<?php

namespace Modules\Transaksi\Entities;

use Illuminate\Database\Eloquent\Model;

class TransaksiModel extends Model
{
    protected $fillable = [];
    protected $table = 'transaksi_pinjaman';
    protected $primaryKey = 'id_transaksi';
}
