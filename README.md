
# 🍽️ Restaurant Management System (RMS)

> A web-based system for managing menu item, sales, users, and reports in or restaurant environments.

<p align="center">
  <img src="https://img.shields.io/badge/PHP-7.4+-8892BF?style=flat-square&logo=php" alt="PHP Badge"/>
  <img src="https://img.shields.io/badge/MySQL/MariaDB-10.4+-4479A1?style=flat-square&logo=mysql" alt="MySQL Badge"/>
  <img src="https://img.shields.io/badge/Bootstrap-5.3.0-7952B3?style=flat-square&logo=bootstrap" alt="Bootstrap Badge"/>
  <img src="https://img.shields.io/badge/License-Custom-lightgrey?style=flat-square" alt="License Badge"/>
</p>

---

## 📋 Project Overview

This is a **Retail/Restaurant Management System (RMS)** built using PHP and MySQL/MariaDB. It supports multiple roles including **admin** and **branch-level users**. The system allows you to:

* 💼 Manage products and inventory
* 🛒 Process sales and generate receipts
* 📊 Access and export reports
* 👥 Create and manage user accounts

---

## ✨ Features

### 🔑 Admin Role

* ➕ Add new users (branches or staff)
* 👥 Manage user list
* 📊 View admin dashboard

### 👤 User Role

* 🛍️ Manage and process orders
* 📦 View and manage inventory items
* 🧾 Access sales reports and print invoices
* ⚙️ Configure local settings

---

## 🛠️ Technologies Used

| Technology    | Purpose                 |
| ------------- | ----------------------- |
| PHP           | Server-side scripting   |
| MySQL/MariaDB | Database management     |
| Bootstrap 5.3 | Responsive UI framework |
| HTML/CSS/JS   | Frontend functionality  |

---

## 🗂️ Database Schema

The system uses the following key tables:

| Table      | Description                                                |
| ---------- | ---------------------------------------------------------- |
| `users`    | Stores user credentials and roles (`admin`, `user`)        |
| `products` | Product name, quantity, and price                          |
| `item`     | Item info with unit and price (may differ from `products`) |
| `cart`     | Tracks current order items and payment method              |
| `orders`   | Records completed orders                                   |
| `payment`  | Stores payment method, value, and date                     |

---

## ⚙️ Setup Instructions

1. 📥 **Import the SQL file:**
   Import `rms.sql` into your MySQL/MariaDB server.

2. 🛠️ **Configure DB credentials:**
   Edit `components/dbconnect.php` with your DB host, username, and password.

3. 🚀 **Deploy the project:**
   Place the project files in your web server's root (e.g., `htdocs` for XAMPP).

4. 🔐 **Login:**
   Visit `signin.php` to log in as either an **admin** or **user**.

---

## 💡 Usage Guide

* **Admins** can add/manage users and access the admin dashboard.
* **Users** can process orders, manage inventory, and access reports.
* The interface is designed for usability with clear navigation and dashboard buttons.

---

## 🖼️ Screenshots

> Screenshots for:

* 🔐 Login Page
* 🧑‍💼 Admin Dashboard
* 🧾 Sales/User Dashboard

...are available in the `image/` directory.

---

## 📄 License

This project is provided **as-is** without warranty.
You're free to modify and use it for personal or business purposes.

---

## 📬 Contact

For questions or support, please contact the project maintainer.

---

Would you like me to export this into a `README.md` file for direct use in your project folder?
