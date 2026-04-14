<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Overtime extends Model
{
    protected $fillable = ['employee_id', 'ot_date', 'hours', 'purpose', 'status'];

    public function employee()
    {
        return $this->belongsTo(Employee::class);
    }
}
