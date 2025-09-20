<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Appointment Booking App</title>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Round" rel="stylesheet">
    <link id="pagestyle" href="{{asset('assets/css/material-dashboard.css')}}" rel="stylesheet"/>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body class="g-sidenav-show  bg-gray-200">
<aside
    class="sidenav navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-3   bg-gradient-dark"
    id="sidenav-main">
    <div class="sidenav-header">
        <i class="fas fa-times p-3 cursor-pointer text-white opacity-5 position-absolute end-0 top-0 d-none d-xl-none"
           aria-hidden="true" id="iconSidenav"></i>
        <a class="navbar-brand m-0" href=" https://demos.creative-tim.com/material-dashboard/pages/dashboard "
           target="_blank">
            <span class="ms-1 font-weight-bold text-white">Admin Panel</span>
        </a>
    </div>
    <hr class="horizontal light mt-0 mb-2">
    <div class="collapse navbar-collapse  w-auto " id="sidenav-collapse-main">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link text-white active bg-gradient-primary" href="../pages/tables.html">
                    <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="material-icons opacity-10">table_view</i>
                    </div>
                    <span class="nav-link-text ms-1">Appointments</span>
                </a>
            </li>
        </ul>
    </div>
</aside>

<main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
    <div class="container-fluid py-4">
        @if(session('success'))
            <div class="alert alert-success text-white">
                {{ session('success') }}
            </div>
        @endif
        <div class="col-12 text-end pt-3" style="padding-right: 19px">
            <!-- Button trigger modal -->
            <a class="btn bg-gradient-dark mb-0" href="javascript:;" data-bs-toggle="modal"
               data-bs-target="#appointmentModal">
                <i class="material-icons text-sm">add</i>&nbsp;&nbsp;New Appointment
            </a>
        </div>

        <div class="modal fade"
             id="appointmentModal"
             tabindex="-1"
             aria-labelledby="appointmentModalLabel"
             data-bs-backdrop="static" data-bs-keyboard="false">
            <div class="modal-dialog">
                <div class="modal-content">

                    <!-- Modal Header -->
                    <div class="modal-header">
                        <h5 class="modal-title" id="appointmentModalLabel">Create New Appointment</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>

                    <!-- Form -->
                    <form action="{{ route('appointment.store') }}" method="POST">
                        @csrf
                        <div class="modal-body">
                            <div class="mb-3">
                                <label for="patientName" class="form-label">Patient Name</label>
                                <input type="text" class="form-control @error('name') is-invalid @enderror"
                                       id="patientName" name="name" value="{{ old('name') }}">
                                @error('name')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="serviceName" class="form-label">Service Name</label>
                                <input type="text" class="form-control @error('service_name') is-invalid @enderror"
                                       id="serviceName" name="service_name" value="{{ old('service_name') }}">
                                @error('service_name')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="appointmentDate" class="form-label">Appointment Date</label>
                                <input type="date" class="form-control @error('date') is-invalid @enderror"
                                       id="appointmentDate" name="date" value="{{ old('date') }}">
                                @error('date')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="appointmentTime" class="form-label">Appointment Time</label>
                                <input type="time" class="form-control @error('time') is-invalid @enderror"
                                       id="appointmentTime" name="time" value="{{ old('time') }}">
                                @error('time')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <!-- Modal Footer -->
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn bg-gradient-primary">Save</button>
                        </div>
                    </form>

                </div>
            </div>
        </div>


        <div class="row pt-4">
            <div class="col-12">
                <div class="card my-4">
                    <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                        <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                            <h6 class="text-white text-capitalize ps-3">Appointments</h6>
                        </div>
                    </div>
                    <div class="card-body px-0 pb-2">
                        <div class="table-responsive p-0">
                            <table class="table align-items-center mb-0">
                                <thead>
                                <tr>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Name
                                    </th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                        Service Name
                                    </th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Date
                                    </th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Time
                                    </th>
                                    <th class="text-secondary opacity-7"></th>
                                </tr>
                                </thead>
                                <tbody>
                                @forelse($appointments as $appointment)
                                    <tr>
                                        <td class="align-middle text-center text-sm">
                                            {{ $appointment->name }}
                                        </td>
                                        <td class="align-middle text-center text-sm">
                                            {{ $appointment->service_name }}
                                        </td>
                                        <td class="align-middle text-center text-sm">
                                            {{ $appointment->date_formatted }}
                                        </td>
                                        <td class="align-middle text-center text-sm">
                                            {{ $appointment->time_formatted }}
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="4">
                                            <div class="no-data-container">
                                                <p class="no-data-text">✨ No appointments found ✨</p>
                                            </div>
                                        </td>
                                    </tr>
                                @endforelse
                                </tbody>
                            </table>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="pt-4">
            {{ $appointments->links() }}
        </div>
    </div>
</main>

<script>
    // Get today's date in YYYY-MM-DD format
    const today = new Date().toISOString().split('T')[0];
    document.getElementById("appointmentDate").setAttribute("min", today);
</script>
@if (session('showModal') || $errors->any())
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            var myModal = new bootstrap.Modal(document.getElementById('appointmentModal'));
            myModal.show();
        });
        document.getElementById('appointmentModal').addEventListener('hidden.bs.modal', function () {
            document.querySelectorAll('.is-invalid').forEach(el => el.classList.remove('is-invalid'));
            document.querySelectorAll('.invalid-feedback').forEach(el => el.remove());
        });
    </script>
@endif
</body>
</html>
