# ShopHub — Multi-Vendor E-Commerce Platform

ShopHub is a full-stack multi-vendor marketplace platform designed to simulate real-world e-commerce systems where multiple vendors can manage products, customers can purchase items, and administrators can control platform operations, transactions, and user workflows.

The platform focuses on centralized marketplace management while maintaining isolated vendor workflows, structured transaction handling, and scalable product discovery.

> Built independently as a complete end-to-end marketplace system.

---

## 🌐 Live Demo

🔗 Demo: https://shophub.zya.me

---

## 📸 Screenshots

### Homepage
![Homepage](./screenshots/homepage.png)

### Product Listing
![Products](./screenshots/products.png)

### Product Details
![Product Details](./screenshots/product-details.png)

### Vendor Dashboard
![Vendor Dashboard](./screenshots/vendor-dashboard.png)

### Admin Panel
![Admin Panel](./screenshots/admin-panel.png)

### Order Management
![Orders](./screenshots/orders.png)

---

## 🧠 Architecture Diagram

<p align="center">
  <img src="./screenshots/architecture.png" alt="ShopHub Architecture Diagram" width="100%" />
</p>

---

## 🚀 Core Features

### Marketplace System
- Multi-vendor marketplace architecture
- Vendor-specific product management
- Centralized platform administration
- Product categorization and inventory handling

### User Role System
- Customer, Vendor, and Admin roles
- Role-based access control
- Separate workflows and dashboards
- Protected administrative operations

### Product & Discovery
- Dynamic product search
- Category-based filtering
- Vendor-based product organization
- Optimized product browsing experience

### Order & Transaction System
- Complete order lifecycle management
- Centralized payment workflow
- Vendor earnings tracking
- Transaction and settlement handling

### Administration
- Admin dashboard
- User and vendor management
- Product moderation
- Transaction monitoring
- Order management system

---

## 🏗️ Project Overview

ShopHub was designed to replicate real-world marketplace systems where multiple vendors operate within a centralized platform managed by administrators.

The system enables:
- vendors to manage products and orders
- customers to browse and purchase items
- administrators to oversee transactions, users, and marketplace operations

The architecture focuses on structured role isolation, scalable product management, and centralized transaction control.

---

## 🧠 System Architecture

ShopHub follows a modular Laravel MVC architecture with separated business logic, data handling, and presentation layers.

### Frontend
- Blade Templating Engine
- Bootstrap
- JavaScript

### Backend
- Laravel
- MVC Architecture
- Role-Based Middleware
- Eloquent ORM

### Database
- MySQL relational database

### Deployment
- cPanel Hosting Environment
- phpMyAdmin
- Environment-based configuration

---

## ⚙️ Tech Stack

### Frontend
- Blade
- Bootstrap
- JavaScript

### Backend
- Laravel
- PHP
- Eloquent ORM

### Database
- MySQL

### Deployment & Infrastructure
- cPanel Hosting
- phpMyAdmin

---

## 🧩 Core Systems

### Product & Catalog System
Structured marketplace system supporting:
- category-based organization
- vendor product management
- product filtering
- scalable catalog browsing

---

### User Role System
Role-isolated workflows for:
- customers
- vendors
- administrators

Each role operates through dedicated access control and dashboard systems.

---

### Order & Payment System
Centralized transaction workflow where:
- customers complete purchases
- admin manages transaction flow
- vendor settlements occur after order completion

---

### Vendor Management System
Vendor-focused dashboard enabling:
- product management
- order tracking
- sales management
- earnings overview

---

### Admin Management System
Administrative controls for:
- users
- products
- categories
- transactions
- marketplace operations

---

### Search & Filtering System
Optimized discovery architecture featuring:
- dynamic product search
- category filtering
- vendor filtering
- efficient query handling

---

## 🧠 Technical Challenges Solved

### Managing Multi-Role Authorization
Implemented structured role-based middleware and isolated workflows for customers, vendors, and administrators.

### Efficient Product Filtering & Search
Built optimized query logic using Eloquent ORM for scalable filtering and product discovery.

### Designing Centralized Payment Flow
Implemented controlled transaction architecture where admin manages settlement flow between customers and vendors.

### Maintaining Relational Data Consistency
Designed normalized database schema with foreign key constraints for users, products, orders, and transactions.

### Managing Monolithic Application Complexity
Structured application modules and separated responsibilities within Laravel MVC architecture for maintainability.

---

## 📁 Project Structure

```bash
multi-vendor-ecommerse/
├── app/
├── bootstrap/
├── config/
├── database/
├── public/
├── resources/
│   ├── views/
│   ├── js/
│   └── css/
├── routes/
├── storage/
└── tests/
```

---

## 🛠️ Installation

### Clone Repository

```bash
git clone https://github.com/thappamkkumar/multi-vendor-ecommerse.git
```

---

### Backend Setup

```bash
composer install
cp .env.example .env
php artisan key:generate
```

Configure database credentials in `.env`

Run migrations:

```bash
php artisan migrate
```

Start development server:

```bash
php artisan serve
```

---

### Frontend Setup

Install dependencies:

```bash
npm install
```

Compile frontend assets:

```bash
npm run dev
```

---

## 🔐 Authentication & Authorization

- Role-based authentication system
- Customer, Vendor, and Admin access separation
- Protected routes and middleware handling
- Secure transaction workflows

---

## 📈 Engineering Highlights

- Independently built full-stack marketplace architecture
- Designed multi-role system with isolated workflows
- Implemented centralized transaction management
- Built optimized product search and filtering system
- Structured scalable relational database schema
- Managed complete deployment and server configuration
- Developed modular Laravel MVC architecture

---

## 📌 Future Improvements

- Payment gateway integration
- Real-time order updates
- Notification system
- Redis caching
- Advanced analytics dashboard
- Docker-based deployment
- Recommendation engine

---

## 👨‍💻 Author

Mukesh Kumar

- Portfolio: https://mukeshkumar.vercel.app/
- GitHub: https://github.com/thappamkkumar
