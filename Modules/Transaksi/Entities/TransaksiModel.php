<?php

namespace Modules\Transaksi\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class TransaksiModel extends Model
{
    use SoftDeletes;
    protected $fillable = [];
    protected $table = 'transaksi_pinjaman';
    protected $primaryKey = 'id_transaksi';
    protected $dates = ['deleted_at'];
}
