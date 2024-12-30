<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Master_data_mesin extends Model
{
    protected $connection = 'db_daily_check_mesin';
    protected $table = 'master_data_mesin';
    protected $fillable = [
        'id_mesin', 'name_mesin', 'type', 'descript', 'status',
        'voided', 'created', 'created_date', 'updated_by', 'updated_date'
    ];
    protected $primaryKey = 'id_mesin';
    public $timestamps = false;
}
