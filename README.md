# Appointment Booking System

A simple yet powerful **Laravel-based Appointment Booking System** that allows managing appointments with pagination, formatted dates, error handling, and a clean UI.  
Built with scalability in mind, it demonstrates best practices in Laravel development.

---

## 🚀 Features

- Add, view, and manage appointments.
- Pagination with Laravel's built-in paginator.
- Display **human-readable date & time** formats.
- Error handling and flash messages.
- Empty state handling with animations when no data is available.
  
---

## 📂 Project Structure

- `app/Models/Appointment.php` → Appointment model.
- `app/Http/Controllers/AppointmentController.php` → Business logic for appointments.
- `resources/views/appointment/index.blade.php` → Appointment list view.
- `routes/web.php` → Application routes.
- `database/migrations/` → Database migrations for appointments table.

---

## ⚙️ Installation & Setup

### 1. Clone the Repository
```bash
git clone https://github.com/osamanisar-dev/Appointment-Booking-System.git
cd Appointment-Booking-System
```

### 2. Install Composer
```bash
composer install
```

### 3. Configure Environment
```bash
cp .env.example .env
```

### 4. Generate App Key
```bash
php artisan key:generate
```

### 5. Run Migrations
```bash
php artisan migrate
```

### 6. Start the Application
```bash
php artisan serve
```

## 📖 Usage

- Navigate to /appointments to view and manage appointments.
- Appointments are shown with pagination (10 per page).
- Dates & times are automatically formatted into human-readable format.
- If no appointments exist, a beautiful animated "No Data Available" message is shown.

## 🛠️ Tech Stack

- Backend: Laravel 12
- Frontend: Blade, Bootstrap
- Database: MySQL
