<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    protected $guarded = [];

    protected $casts = [
        'date_for_employment' => 'date',
        'pagibig_date_from'   => 'date',
        'birthday'            => 'date',
        'fiesta_date'         => 'date',
        'active'              => 'boolean',
    ];
}