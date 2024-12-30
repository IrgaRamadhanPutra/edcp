<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Master_data_desc extends Model
{
    //
    protected $connection = 'db_daily_check_mesin';
    protected $table = 'master_data_desc';
    protected $fillable = [

        'id_desc',
        'id_kategori',
        'standard',
        'status',
        'voided',
        'created',
        'created_date',
        'updated_by',
        'updated_date',
    ];
    protected $primaryKey = 'id_desc';
    public $timestamps = false;
}
