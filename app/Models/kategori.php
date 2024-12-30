<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class kategori extends Model
{
    //
    protected $connection = 'db_daily_check_mesin';
    protected $table = 'kategori_checkpoint';
    protected $fillable = [
        'id',
        'kategori',
        'k_unik',
        'status',
        'voided',
        'created',
        'created_date',
        'updated_by',
        'updated_date',
    ];
    protected $primaryKey = 'id';
    public $timestamps = false;
}
