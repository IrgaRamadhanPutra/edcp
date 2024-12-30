<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Master_data_image extends Model
{
    //
    protected $connection = 'db_daily_check_mesin';
    protected $table = 'master_data_daily_image';
    protected $fillable = [
        'id',
        'name_mesin',
        'type',
        'img',
        'type_img',
        'img_daily',
        'status',
        'updated_by',
        'updated_date',
        'created_by',
        'creation_date',
    ];
    protected $primaryKey = 'id';
    public $timestamps = false;
}
