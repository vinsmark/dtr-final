<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Employee extends Model
{
    use SoftDeletes;

    protected $guarded = [];

    protected $table = 'employees';

    public function getFullNameAttribute(): string
    {
        return trim($this->lastname.', '.$this->firstname.' '.$this->middlename);
    }

    public function attendances()
    {
        return $this->hasMany(Attendance::class, 'employee_code', 'employee_code');
    }

    protected $casts = [
        'date_for_employment' => 'date',
        'pagibig_date_from' => 'date',
        'birthday' => 'date',
        'fiesta_date' => 'date',
        'active' => 'boolean',
    ];

    public function attachments()
    {
        return $this->hasMany(EmployeeAttachment::class);
    }

    public function dependents()
    {
        return $this->hasMany(EmployeeDependent::class);
    }
}
