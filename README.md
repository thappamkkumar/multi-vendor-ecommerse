# 🛒 ShopHub – Multi-Vendor E-Commerce Platform

A full-stack multi-vendor marketplace system where multiple sellers can manage products and orders, customers can discover and purchase items, and administrators control the entire platform including transactions and settlements.

---

## 🚀 Overview

**ShopHub** is a scalable e-commerce marketplace designed to simulate real-world platforms like Amazon or Flipkart. It supports multiple vendors operating within a single system while maintaining centralized control over transactions, users, and product lifecycle.

The system focuses on **role-based architecture**, **controlled payment flow**, and **efficient product discovery**.

---

## ✨ Features

### 👤 Customer

* Browse and filter products by category
* Search products dynamically
* View detailed product information
* Add to cart and place orders
* Track order history and manage profile

### 🏪 Vendor

* Add, update, and manage products
* Select and manage product categories
* Track orders and sales
* View earnings and payment status
* Manage vendor profile

### 🛠️ Admin

* Dashboard for complete platform overview
* Manage users (customers & vendors)
* Manage products and categories
* Monitor orders and delivery status
* Track payments and transactions
* Filter data by vendor, customer, and products

---

## 🏗️ System Architecture

ShopHub is built using a **modular MVC architecture** with clear separation of concerns:

* **Frontend:** Blade templating (role-based UI rendering)
* **Backend:** Laravel (business logic & request lifecycle)
* **Database:** MySQL (relational schema)
* **ORM:** Eloquent ORM

### 🔄 Data Flow

Customer / Vendor / Admin → Frontend → Backend → Database

### 💳 Payment Flow (Core Logic)

Customer → Admin (Payment Holding) → Vendor (After Commission Deduction)

---

## ⚙️ Tech Stack

* **Backend:** Laravel
* **Frontend:** Blade
* **Database:** MySQL
* **ORM:** Eloquent
* **Server Environment:** cPanel-based hosting

---

## 🧠 Key Concepts Implemented

* Multi-role system (Customer, Vendor, Admin)
* Role-based access control
* Multi-vendor product management system
* Centralized payment and settlement system
* Order lifecycle management
* Advanced filtering and search system

---

## ⚡ Technical Highlights

* Designed scalable relational database schema for multi-vendor system
* Implemented role-based middleware for access control
* Built dynamic product filtering using optimized queries
* Designed centralized transaction system for secure payment handling
* Structured backend using Laravel MVC for maintainability

---

## 🚀 Deployment

The application was deployed on a **cPanel-based hosting environment** with full manual configuration:

* Laravel application deployed manually
* MySQL database configured using phpMyAdmin
* Environment setup and server configuration handled independently
* Backend and database integrated within hosting environment

---

## 📂 Project Structure (Simplified)

```
app/
├── Models/
├── Http/
│   ├── Controllers/
│   └── Middleware/
resources/
├── views/ (Blade templates)
routes/
├── web.php
database/
├── migrations/
```
 
---

## 🎯 What This Project Demonstrates

* Ability to build a real-world multi-vendor marketplace system
* Strong understanding of role-based architecture and workflows
* Experience designing secure payment and settlement systems
* Efficient handling of complex database relationships
* Full-stack development and deployment experience

---
 

## 👨‍💻 Author

Mukesh Kumar

Portfolio: https://mukeshkumar.vercel.app
  
