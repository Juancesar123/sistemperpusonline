<?php

namespace Modules\DendaTransaksi\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class DendaTransaksiModel extends Model
{
    use SoftDeletes;
    protected $fillable = [];
    protected $table = 'denda';
    protected $primaryKey = 'id_denda';
    protected $dates = ['deleted_at'];
}
