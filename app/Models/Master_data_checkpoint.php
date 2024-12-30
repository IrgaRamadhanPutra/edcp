<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Master_data_checkpoint extends Model
{
    protected $connection = 'db_daily_check_mesin';
    protected $table = 'master_data_checkpoint';
    protected $fillable = [

        'id',
        'id_mesin',
        'id_kategori',
        'standard',
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
