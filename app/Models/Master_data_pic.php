<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Master_data_pic extends Model
{
    protected $connection = 'db_daily_check_mesin';
    protected $table = 'master_data_pic';
    protected $fillable = [
        'id_pic', 'name', 'shift', 'Nik', 'section', 'status',
        'voided', 'created', 'created_date', 'updated_by', 'updated_date'
    ];
    protected $primaryKey = 'id_pic';
    public $timestamps = false;
}
