<?php

namespace App\AppHumanResources\Attendance\Domain;

use Illuminate\Database\Eloquent\Model;

class AttendanceFault extends Model
{
    protected $fillable = ['attendance_id', 'description'];

    public function attendance()
    {
        return $this->belongsTo(Attendance::class);
    }
}
