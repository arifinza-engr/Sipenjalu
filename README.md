# Sipenjalu

A complaint management web application built with PHP, utilizing MySQL/MariaDB database for data storage. It includes features for complainants to submit reports, administrators to manage them, and integrations with Google Maps for location services and WhatsApp for notifications.

## Features

- Complaint submission, viewing, editing, and deletion for complainants
- Administrative functions for managing users, complaints, types, and API integrations
- Google Maps integration for location services
- WhatsApp integration for notifications
- User role management (complainant, admin)

## Technologies

- **Language**: PHP 8.0.25
- **Database**: MySQL/MariaDB 10.4.27
- **APIs**: Google Maps API, WhatsApp Fonnte API

## Installation

1. Ensure PHP 8.0+ and MySQL/MariaDB are installed on the server.
2. Import the `inc/sipangkat.sql` file into a MySQL database named "sipangkat".
3. Update `inc/koneksi.php` with correct database credentials if necessary.
4. Place the project files in a web-accessible directory.
5. Access the application via a web browser.

## Default Login Credentials

- Admin: `admin = 123`
- Petugas (Officer): `petugas = 123`

## Project Structure

- **pengadu/**: Complainant-related functionalities
- **admin/**: Administrative functions
- **default/**: Default pages for different user roles
- **inc/**: Database connection and SQL dump
- **assets/**: Static assets (JS, CSS, images)
- **foto/**: Uploaded images and photos

## Usage

- Login as admin or petugas using the provided credentials.
- Complainants can submit and manage their complaints.
- Administrators can manage users, complaints, and system settings.
