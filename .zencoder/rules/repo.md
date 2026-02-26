---
description: Repository Information Overview
alwaysApply: true
---

# Sipenjalu Information

## Summary
Sipenjalu is a complaint management web application built with PHP, utilizing a MySQL/MariaDB database for data storage. It includes features for complainants to submit reports, administrators to manage them, and integrations with Google Maps for location services and WhatsApp for notifications.

## Structure
- **pengadu/**: Contains complainant-related functionalities, including complaint submission, viewing, editing, and deletion.
- **admin/**: Houses administrative functions for managing users, complaints, types, and API integrations.
- **default/**: Default pages for different user roles (tasks, complainant, admin).
- **inc/**: Includes database connection file (koneksi.php) and SQL dump (sipangkat.sql) for database setup.
- **assets/**: Static assets including JavaScript (maps.js), CSS (style1.css), and images.
- **foto/**: Directory for uploaded images and photos related to complaints.

## Language & Runtime
**Language**: PHP  
**Version**: 8.0.25  
**Runtime**: PHP with MySQL/MariaDB 10.4.27  
**Build System**: None (direct PHP execution)  
**Package Manager**: None

## Dependencies
**Main Dependencies**:
- MySQL/MariaDB database server
- Google Maps API (for mapping features)
- WhatsApp Fonnte API (for messaging integration)

## Build & Installation
To set up the application:
1. Ensure PHP 8.0+ and MySQL/MariaDB are installed on the server.
2. Import the `inc/sipangkat.sql` file into a MySQL database named "sipangkat".
3. Update `inc/koneksi.php` with correct database credentials if necessary.
4. Place the project files in a web-accessible directory.
5. Access the application via a web browser; default login credentials are admin=123, petugas=123.

## Main Files & Resources
**Entry Points**:
- `index.php`: Main dashboard after login, handles session management and API key retrieval.
- `login.php`: User login page.
- `loginAdmin.php`: Admin login page.

**Configuration Files**:
- `inc/koneksi.php`: Database connection configuration.