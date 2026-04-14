<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Employee extends Model
{
    use SoftDeletes;

    protected $guarded = [];

    protected $casts = [
        'date_for_employment' => 'date',
        'pagibig_date_from' => 'date',
        'birthday' => 'date',
        'fiesta_date' => 'date',
        'active' => 'boolean',
    ];
}
