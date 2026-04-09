<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Attendance extends Model
{
    protected $table = 'attendances';

    protected $fillable = [
        'employee_code',
        'log_time',
        'device_id',
        'state',
        'verification',
        'work_code',
    ];

    protected $casts = [
        'log_time' => 'datetime',
    ];

    
}