<?php

namespace App\Http\Controllers;

use App\Http\Requests\AppointmentRequest;
use App\Repositories\AppointmentRepository;

class AppointmentController extends Controller
{
    public function __construct(protected AppointmentRepository $repository)
    {
    }

    public function index()
    {
        $appointments = $this->repository->appointments();
        return view('appointment.index', compact('appointments'));
    }

    public function store(AppointmentRequest $request)
    {
        $this->repository->store($request->validated());
        return redirect()->back()->with('success', 'Appointment created successfully!');
    }
}
