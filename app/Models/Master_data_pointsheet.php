<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Master_data_pointsheet extends Model
{
    //
    protected $connection = 'db_daily_check_mesin';
    protected $table = 'master_data_pointsheet';
    protected $fillable = [

        'id_point',
        'id_mesin',
        'id_desc',
        'status',
        'voided',
        'created',
        'created_date',
        'updated_by',
        'updated_date',
    ];
    protected $primaryKey = 'id_point';
    public $timestamps = false;
}
