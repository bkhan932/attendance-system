<?php

namespace App\AppHumanResources\Attendance\Domain;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Attendance extends Model
{
    use HasFactory;
    protected $fillable = ['employee_id', 'checkin', 'checkout', 'status'];

    public function employee()
    {
        return $this->belongsTo(Employee::class);
    }
}
