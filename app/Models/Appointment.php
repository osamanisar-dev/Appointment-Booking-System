<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
     protected $fillable = [
        'name',
        'service_name',
        'date',
        'time',
    ];

    public function getDateFormattedAttribute(): string
    {
        return Carbon::parse($this->attributes['date'])->format('F j, Y');
    }

    public function getTimeFormattedAttribute(): string
    {
        return Carbon::parse($this->attributes['time'])->format('h:i A');
    }
}
