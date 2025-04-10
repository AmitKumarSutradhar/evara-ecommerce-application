# 🛍️ Evara Ecommerce Application

**Evara** is a full-featured Laravel-based e-commerce application with an admin panel and a customer-facing frontend. The project allows admins to manage products, categories, orders, and generate invoices, while customers can browse products, register, and place orders through a clean, responsive UI.

## 🚀 Features

### 🔧 Admin Panel
- ✅ Secure Admin Login
- 🗂️ Category and Subcategory Management
- 📦 Product Management (Create, Edit, Delete)
- 🧾 Order Management
- 📄 Generate Invoice as PDF
- 👤 Customer List Management

### 🛒 Customer System
- 📝 Customer Registration and Login
- 🔐 Secure Authentication
- 🛍️ Product Browsing and Shopping
- 🧾 Order Placement & History

### 💻 Frontend
- 🎨 Eye-Catching UI using **HTML**, **CSS**, and **Bootstrap**
- 📱 Fully Responsive Design
- 🔍 Product Listings with Category Filters
- 🛒 Shopping Cart System

---

## 🧰 Tech Stack

- **Backend**: Laravel 10+
- **Frontend**: HTML, CSS, Bootstrap
- **PDF Generation**: barryvdh/laravel-dompdf
- **Database**: MySQL
- **Authentication**: Laravel Breeze / Jetstream (mention which one if applicable)

---

## 📦 Installation

```bash
git clone https://github.com/your-username/evara-ecommerce.git
cd evara-ecommerce
composer install
cp .env.example .env
php artisan key:generate
php artisan migrate
php artisan serve
