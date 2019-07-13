<?php

namespace Modules\Siswa\Entities;

use Illuminate\Database\Eloquent\Model;

class SiswaModel extends Model
{
    protected $fillable = [];
    protected $table = "siswa";
    protected $primaryKey = 'id_siswa';
}
