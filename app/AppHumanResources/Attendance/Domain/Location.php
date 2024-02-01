<?php

namespace App\AppHumanResources\Attendance\Domain;

use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    protected $fillable = ['name', 'address'];

    public function schedules()
    {
        return $this->hasMany(Schedule::class);
    }
}
