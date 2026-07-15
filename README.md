# 📖 MemoNest

A modern, secure, and responsive **Personal Diary Web Application** built with **PHP** and **MySQL**. MemoNest provides users with a private space to write, organize, and manage their daily thoughts and memories while ensuring data security through authentication and session management.

---

## ✨ Features

### 🔐 Authentication
- User Registration
- User Login
- Secure Logout
- Session Management
- Password Hashing (`password_hash()`)
- Password Verification (`password_verify()`)

### 📝 Diary Management
- Create New Diary Entries
- View All Entries
- View Individual Entry
- Edit Existing Entries
- Delete Entries
- Each user can only access their own diary entries

### 👤 User Management
- User Profile
- Edit Profile
- Change Password

### 🎨 User Interface
- Modern Dark Theme
- Responsive Design
- Clean Navigation
- Mobile Friendly
- Premium Glassmorphism UI

---

# 🛠️ Tech Stack

- HTML5
- CSS3
- JavaScript
- PHP (Procedural)
- MySQL
- Tailwind CSS
- XAMPP (Development)
- InfinityFree (Deployment)

---

# 📂 Project Structure

```
MemoNest/
│
├── includes/
│   ├── auth.php
│   ├── config.php
│   ├── footer.php
│   ├── header.php
│   └── navbar.php
│
├── uploads/
│
├── about.php
├── add_entry.php
├── change_pass.php
├── dashboard.php
├── delete_entry.php
├── edit_entry.php
├── edit_profile.php
├── features.php
├── index.php
├── login.php
├── logout.php
├── profile.php
├── signup.php
├── view_entries.php
├── view_entry.php
│
├── .gitignore
└── README.md
```

---

# 🗄️ Database

The project uses two main tables.

## users

| Column | Type |
|---------|------|
| id | INT |
| username | VARCHAR |
| email | VARCHAR |
| password | VARCHAR |
| created_at | TIMESTAMP |

---

## diary_entries

| Column | Type |
|---------|------|
| id | INT |
| user_id | INT |
| title | VARCHAR |
| content | TEXT |
| mood | VARCHAR |
| created_at | TIMESTAMP |
| updated_at | TIMESTAMP |

---

# 🔒 Security Features

- Prepared Statements
- Password Hashing
- Password Verification
- Session Authentication
- Authorization Checks
- Input Validation
- User Data Isolation

---

# 🚀 Installation

### 1. Clone the repository

```bash
git clone https://github.com/your-username/MemoNest.git
```

### 2. Move the project to XAMPP

Copy the project folder to:

```
xampp/htdocs/
```

### 3. Create Database

Create a MySQL database:

```
diary
```

### 4. Import SQL

Import the provided SQL file into phpMyAdmin.

### 5. Configure Database

Create the file:

```
includes/config.php
```

Example:

```php
<?php

$host = "localhost";
$username = "root";
$password = "";
$database = "diary";

$conn = mysqli_connect($host,$username,$password,$database);

if(!$conn){
    die("Connection Failed");
}
```

### 6. Start XAMPP

Start:

- Apache
- MySQL

### 7. Visit

```
http://localhost/MemoNest
```

---

# 🌐 Deployment

The project is deployed using:

- InfinityFree
- PHP
- MySQL

---

# 📌 Future Improvements

- Search Entries
- Mood Analytics
- Calendar View
- Export to PDF
- Pin Important Entries
- Tags
- Archive Entries
- Rich Text Editor
- Two-Factor Authentication
- Email Verification

---

# 👨‍💻 Developer

**Uday Pratap Raghav**

BCA Student | Full Stack Web Development Learner

GitHub: https://github.com/raghavuday98

---

# 📄 License

This project is created for educational purposes and personal learning.

Feel free to fork, modify, and learn from it.
