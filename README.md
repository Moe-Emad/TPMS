[README.md](https://github.com/user-attachments/files/29382916/README.md)
# TPMS — Training Provider Management System

A web-based platform that connects **Training Providers**, **Instructors**, and **Students** for managing and enrolling in professional training courses. Built with PHP, MySQL, and vanilla CSS/JavaScript.

---

## Features

### For Students
- Register and log in to a personal account
- Browse and explore available courses
- Enroll in courses
- View enrolled courses and instructor availability
- Generate a **PDF certificate of completion** for any enrolled course

### For Instructors
- Dedicated login portal
- View courses they are assigned to
- Update their availability status per course

### For Training Providers
- Dashboard with course count overview
- Create new courses (title, description, price, category, dates, image, instructors)
- Edit and delete existing courses
- Assign multiple instructors to a course

---

## Tech Stack

| Layer      | Technology                        |
|------------|-----------------------------------|
| Backend    | PHP 8.2                           |
| Database   | MySQL / MariaDB 10.4              |
| PDF Export | [TCPDF](https://tcpdf.org/)       |
| Frontend   | HTML, CSS, Vanilla JavaScript     |
| Fonts      | Google Fonts (Righteous)          |
| Icons      | Font Awesome                      |
| Scrollbar  | SimpleBar.js                      |

---

## Project Structure

```
TPMS-main/
├── Templates/          # All PHP pages (views + logic)
│   ├── landing.php               # Student home — course browser
│   ├── Register.php              # Student registration form
│   ├── login_page.php            # Student login
│   ├── profile_page.php          # Student profile
│   ├── user_course.php           # Individual course view
│   ├── user_view_course.php      # Student's enrolled courses
│   ├── course_registered.php     # Enrolled course detail + certificate download
│   ├── instructor.php            # Instructor home page
│   ├── instructor_login_page.php # Instructor login
│   ├── instructor_course.php     # Instructor's course view
│   ├── Update_Availability_page.php  # Instructor availability form
│   ├── tp_dashboard.php          # Training Provider dashboard
│   ├── tp_login_page.php         # Training Provider login
│   ├── create_course_page.php    # Create new course form
│   ├── edit_course_page.php      # Edit existing course
│   ├── view_course_delete_page.php   # Delete a course
│   ├── AboutUs.php               # About page
│   ├── db_conn.php               # Database connection config
│   └── ...                       # Other processing scripts
├── Styles/             # CSS stylesheets (one per page)
├── Javascript/         # app.js (burger menu / nav toggle)
├── tcpdf/              # TCPDF library for PDF generation
└── training_system.sql # Full database schema + seed data
```

---

## Database Schema

The system uses 7 tables:

- **`user`** — Student accounts (name, email, password, DOB, gender, country)
- **`instructor`** — Instructor accounts
- **`training_providor`** — Training Provider accounts
- **`course`** — Course listings (title, description, price, dates, category, image URL)
- **`course_instructor`** — Many-to-many: courses ↔ instructors
- **`instructor_availability`** — Per-course availability status for each instructor
- **`user_course`** — Many-to-many: students ↔ enrolled courses
- **`certificate`** — Records of issued certificates

---

## Getting Started

### Prerequisites
- PHP 8.x
- MySQL / MariaDB
- A local server like [XAMPP](https://www.apachefriends.org/) or [Laragon](https://laragon.org/)

### Installation

1. **Clone the repository**
   ```bash
   git clone https://github.com/your-username/TPMS.git
   ```

2. **Set up the database**
   - Open phpMyAdmin (or any MySQL client)
   - Create a new database named `Training_System`
   - Import `training_system.sql` to create all tables and seed data

3. **Configure the database connection**
   - Open `Templates/db_conn.php`
   - Update the credentials if needed:
     ```php
     define('DB_HOST', 'localhost');
     define('DB_USER', 'root');
     define('DB_PASS', '');
     define('DB_NAME', 'Training_System');
     ```

4. **Serve the project**
   - Place the project folder inside your server's web root (e.g., `htdocs/` for XAMPP)
   - Visit `http://localhost/TPMS-main/Templates/login_page.php` in your browser

---

## Demo Accounts

These accounts are included in the seed data:

| Role              | Email              | Password  |
|-------------------|--------------------|-----------|
| Student           | Iskanth123@gmail.com | iskanth123 |
| Instructor        | Emad@gmail.com     | Emad123   |
| Training Provider | MMU@gmail.com      | 1234567   |

> ⚠️ Passwords are stored in plain text in this version. For any real deployment, use `password_hash()` and `password_verify()`.

---

## Course Categories

Courses are currently organized into three categories:
- Computer Science
- Finance
- E-Sport

---

## Known Limitations

- No password hashing — not suitable for production use as-is
- SQL queries use string concatenation (SQL injection risk) — consider using prepared statements
- No image upload — course images are set via external URL
- Sessions are used for authentication with no CSRF protection

---

## License

This project was built for educational purposes. Feel free to fork and extend it.
