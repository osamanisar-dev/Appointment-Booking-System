<?php
namespace App\Repositories;

use App\Models\Appointment;
use Illuminate\Pagination\LengthAwarePaginator;

class AppointmentRepository
{
    public function appointments():LengthAwarePaginator {
      return Appointment::latest('created_at')->paginate(10);
    }

    public function store($data):Appointment {
       return Appointment::create($data);
    }
}
