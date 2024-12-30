<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CheckPoint_Answer extends Model
{
    //
    protected $connection = 'db_daily_check_mesin';
    protected $table = 'daily_checkpoint_answer';
    protected $fillable = [
        'id_answer', 'daily_no', 'id_mesin', 'id_pic', 'id_point', 'answer', 'id_quiz', 'date', 'time',
        'status', 'voided', 'created_date', 'created_by', 'updated_date',
        'updated_by'
    ];
    protected $primaryKey = 'id_answer';
    public $timestamps = false;
}
