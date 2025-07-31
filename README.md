# Employee Room Access Management - Laravel Test Task

## Overview
A Laravel 12 application that manages employee access permissions to rooms with time and day constraints.

---

## Features
- Add employees
- Add rooms
- Assign room access rights for specific days and time slots
- Prevent overlapping access by employee or room
- Check available rooms for an employee at a given time
- Check free rooms at a given time
- Access is managed per weekday (Monday to Sunday) with time ranges.

---

## Tech Stack
- Laravel 12
- PHP 8.2+
- MySQL
- Git

---

## Database Constraints

- A **unique composite index** prevents duplicate room access for the same employee, room, day, and time.
- A **MySQL trigger `prevent_room_access_overlap`** blocks overlapping access during `INSERT`.
- A **MySQL trigger `prevent_room_access_overlap_update`** blocks overlapping access during `UPDATE`.
- These database-level protections guarantee time-slot integrity even if PHP validation is bypassed.

## Installation

1. Clone the repository:

   ```bash
   git clone https://github.com/yourusername/employee-access.git
   cd employee-access

2. Install dependencies:

   ```bash
   composer install

3. Setup .env file and migrate:

    ```bash
    cp .env.example .env
    php artisan key:generate
    php artisan migrate

| Method | Endpoint                      | Description                               |
| ------ | ----------------------------- | ----------------------------------------- |
| POST   | /api/employees                | Add a new employee                        |
| POST   | /api/rooms                    | Add a new room                            |
| POST   | /api/room-accesses            | Assign room access to an employee         |
| GET    | /api/employee-available-rooms | List rooms available for employee at time |
| GET    | /api/free-rooms               | List all free rooms at a given time       |

## API Testing

Postman collection available at `postman/EmployeeRoomAccess.postman_collection.json`  
Import and use it with a `{{host}}` environment variable pointing to your local backend.

---

## Git Strategy for Submission

- Make clean commits with descriptive messages, e.g.:
