# Course Enrollment System

A web-based Course Enrollment System developed using Laravel and MySQL. The system allows administrators to manage users, courses, and course enrollments through a web interface, while also providing RESTful APIs for user authentication and management.

## Features

### Authentication
- User login and logout
- Authentication middleware
- Laravel Passport API authentication
- API login with access tokens
- Password change functionality

### User Management
- Create users
- View users
- View user details
- Update users
- Delete users
- Manage user roles
- Manage user status
- Profile management
- Profile image upload

### Course Management
- Create courses
- View courses
- View course details
- Update courses
- Delete courses
- Assign course leaders
- Manage course status
- Course start and end dates
- Course description

### Course Enrollment
- Enroll students in courses
- View enrollments
- View enrollment details
- Update enrollments
- Delete enrollments
- Manage enrollment status
- Track enrollment and completion dates

### REST API
- API authentication
- User listing API
- User creation API
- Standard API response structure
- Request validation
- Error handling
- Welcome email notification after user creation

## Technologies Used

- **Backend:** Laravel 13
- **Programming Language:** PHP 8.4
- **Database:** MySQL
- **Authentication:** Laravel Passport
- **Frontend:** Blade, Bootstrap
- **API:** RESTful API
- **Version Control:** Git & GitHub
- **Development Environment:** XAMPP

## Project Structure

The project follows Laravel's MVC architecture along with the Repository Pattern.

```text
app/
├── Http/
│   ├── Controllers/
│   │   ├── API/
│   │   ├── CourseController.php
│   │   ├── CourseEnrollmentController.php
│   │   ├── LoginController.php
│   │   └── UserController.php
│   │
│   └── Middleware/
│
├── Models/
│   ├── User.php
│   ├── Course.php
│   └── CourseEnrollment.php
│
├── Repositories/
│   ├── Contracts/
│   ├── CourseRepository.php
│   ├── CourseEnrollmentRepository.php
│   └── UserRepository.php
│
├── Providers/
│   └── RepositoryServiceProvider.php
│
└── Traits/
    └── ResponseTrait.php

database/
├── migrations/
└── seeders/

resources/
└── views/
    ├── auth/
    ├── users/
    ├── courses/
    └── enrollments/

routes/
├── web.php
└── api.php
