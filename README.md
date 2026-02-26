# 💼 Job Board

A full-featured job board web application built with Laravel 12, Tailwind CSS 4, and Alpine.js. Browse job listings, apply with CV uploads, or register as an employer to post jobs.

## ✨ Features

- **Job Browsing** — Browse and search jobs with advanced filters (keyword, salary range, experience level, category)
- **User Authentication** — Register, login, logout with remember-me functionality
- **Job Applications** — Apply to jobs with expected salary and CV upload (PDF)
- **Employer Dashboard** — Register as an employer, post/edit/delete jobs, view applicants and download CVs
- **My Applications** — Track your job applications with stats (applicant count, average salary)
- **Smart Filtering** — Filter by search text, salary range, experience (Entry/Intermediate/Senior), and category (IT/Finance/Sales/Marketing)
- **Soft Deletes** — Employers can delete and restore job postings
- **Authorization** — Policy-based access control (apply once per job, edit only your own jobs, CV download restricted to employers/applicants)
- **Pagination** — Paginated listings with filter persistence across pages

## 🛠 Tech Stack

| Technology | Purpose |
|---|---|
| **Laravel 12** | PHP backend framework |
| **Tailwind CSS 4** | Utility-first CSS framework |
| **Alpine.js** | Lightweight JavaScript framework |
| **SQLite** | Database |
| **Vite** | Frontend build tool |

## 📦 Installation

### Prerequisites
- PHP 8.2+
- Composer
- Node.js & npm

### Setup

```bash
# Clone the repository
git clone <repository-url>
cd job-board

# Install PHP dependencies
composer install

# Install JavaScript dependencies
npm install

# Environment setup
cp .env.example .env
php artisan key:generate

# Create database and run migrations
touch database/database.sqlite
php artisan migrate

# (Optional) Seed with sample data
php artisan db:seed

# Build frontend assets
npm run build

# Start the development server
php artisan serve
```

Visit `http://localhost:8000` to view the application.

### Development

```bash
# Run Vite dev server with hot reload
npm run dev

# Run PHP development server
php artisan serve
```

## 📁 Project Structure

```
app/
├── Http/
│   ├── Controllers/      # Auth, Job, Employer, Application controllers
│   ├── Middleware/        # Employer middleware
│   └── Requests/         # Form request validation
├── Models/               # User, Job, Employer, JobApplication
├── Policies/             # Job and Employer authorization policies
└── View/Components/      # Blade components (TextInput, RadioGroup, etc.)
resources/views/
├── auth/                 # Login & Register pages
├── components/           # Reusable UI components (layout, card, job-card, etc.)
├── employer/             # Employer registration
├── job/                  # Job listing & detail pages
├── job_application/      # Job application form
├── my_job/               # Employer job management (CRUD)
└── my_job_application/   # User's application tracking
```

## 🔑 Demo Credentials

After running `php artisan db:seed`:

| Role | Email | Password |
|---|---|---|
| User | yasser@gmail.com | password |

## 📄 License

This project is open-sourced under the [MIT License](https://opensource.org/licenses/MIT).
