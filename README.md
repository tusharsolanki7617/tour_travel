# 🌍 Tour & Travel Booking System

![PHP](https://img.shields.io/badge/PHP-7.4+-777BB4?style=flat&logo=php&logoColor=white)
![MySQL](https://img.shields.io/badge/MySQL-5.7+-4479A1?style=flat&logo=mysql&logoColor=white)
![CSS3](https://img.shields.io/badge/CSS3-Styled-1572B6?style=flat&logo=css3&logoColor=white)
![JavaScript](https://img.shields.io/badge/JavaScript-ES6-F7DF1E?style=flat&logo=javascript&logoColor=black)

### 🌐 Live Demo

> **[👉 Click here to visit the live site → https://traveltrek.wuaze.com/home.php](https://traveltrek.wuaze.com/home.php)**

---

tour_travel is a full-stack PHP web application that allows users to browse travel packages, book tours, manage their profile, and contact support — while admins manage packages, orders, and user accounts from a dedicated dashboard.

---

## ✨ Features

### 👤 User Side
- User Registration & Login with session management
- Browse & search travel packages
- Quick view package details
- Add packages to **Cart** or **Wishlist**
- Place bookings via **Checkout**
- View order history
- Edit profile (name, email, password)
- Send enquiries via Contact form
- Browse photo **Gallery**

### 🛠️ Admin Side
- Secure Admin Login
- Dashboard overview
- Add / Edit / Delete travel packages
- Manage placed orders
- View registered users
- Read customer contact messages
- Register new admin accounts

---

## 📁 Project Structure

```
tour_travel/
├── admin/                     # Admin panel pages
│   ├── admin_login.php
│   ├── dashboard.php
│   ├── packages.php
│   ├── placed_orders.php
│   ├── users_accounts.php
│   ├── admin_accounts.php
│   ├── messages.php
│   ├── register_admin.php
│   ├── update_product.php
│   └── update_profile.php
│
├── components/                # Reusable PHP components
│   ├── connect.php            # DB connection
│   ├── user_header.php
│   ├── admin_header.php
│   ├── footer.php
│   ├── user_logout.php
│   ├── admin_logout.php
│   └── wishlist_cart.php
│
├── css/                       # Stylesheets
│   ├── style.css
│   ├── admin_style.css
│   ├── responsive.css
│   ├── normalize.css
│   ├── stylee.css
│   └── utility.css
│
├── js/                        # JavaScript files
│   ├── script.js
│   └── admin_script.js
│
├── assets/                    # Static images (hotel banners)
├── images/                    # General site images
├── uploaded_img/              # Package images uploaded by admin
├── image/                     # Gallery/video assets
├── project images/            # Screenshots (add your own)
│
├── home.php                   # Landing / Home page
├── packages.php               # Browse all packages
├── quick_view.php             # Package detail view
├── search_page.php            # Search results
├── category.php               # Category filter page
├── cart.php                   # Shopping cart
├── checkout.php               # Booking checkout
├── wishlist.php               # User wishlist
├── orders.php                 # Order history
├── update_user.php            # Edit profile
├── contact.php                # Contact form
├── about.php                  # About page
├── gallery.php                # Photo gallery
├── user_login.php             # User login
├── user_register.php          # User registration
└── shop_db.sql                # Database schema
```

---

## 🚀 Getting Started

### Prerequisites

- **XAMPP** / **WAMP** / **LAMP** stack
- PHP **7.4+**
- MySQL **5.7+**
- A web browser

### Installation

1. **Clone or download** this project:
   ```bash
   git clone https://github.com/tusharsolanki7617/tour_travel.git
   ```

2. **Move the folder** to your server root:
   - XAMPP → `C:/xampp/htdocs/tour_travel`
   - WAMP → `C:/wamp/www/tour_travel`

3. **Create the database:**
   - Open `phpMyAdmin` → `http://localhost/phpmyadmin`
   - Create a new database named `shop_db`
   - Click **Import** and select `shop_db.sql`

4. **Configure DB connection** in `components/connect.php`:
   ```php
   $db = mysqli_connect("localhost", "root", "", "shop_db");
   ```
   Update `root` and the empty password field if your MySQL has different credentials.

5. **Start your server** (Apache + MySQL) from XAMPP/WAMP control panel.

6. **Open the app** in your browser:
   ```
   http://localhost/tour_travel/home.php
   ```

---

## 🗄️ Database Tables

| Table | Description |
|-------|-------------|
| `users` | Registered user accounts |
| `admins` | Admin accounts |
| `packages` | Travel packages with name, description, price, images |
| `cart` | Items added to user carts |
| `wishlist` | Packages saved to wishlist |
| `orders` | Placed bookings / orders |
| `messages` | Contact form submissions |

---

## 📄 Pages Overview

| Page | Access | Description |
|------|--------|-------------|
| `home.php` | Public | Landing page with featured destinations |
| `packages.php` | Public | Browse all travel packages |
| `quick_view.php` | Public | Package detail / quick view |
| `search_page.php` | Public | Search packages by keyword |
| `category.php` | Public | Filter packages by category |
| `about.php` | Public | About the company |
| `gallery.php` | Public | Photo gallery of destinations |
| `contact.php` | Public | Send enquiry to admin |
| `user_register.php` | Public | Create a user account |
| `user_login.php` | Public | User login |
| `cart.php` | User | View and manage cart |
| `checkout.php` | User | Place booking / order |
| `wishlist.php` | User | View saved packages |
| `orders.php` | User | View booking history |
| `update_user.php` | User | Edit profile details |
| `admin/admin_login.php` | Admin | Admin login |
| `admin/dashboard.php` | Admin | Admin overview dashboard |
| `admin/packages.php` | Admin | Add / Edit / Delete packages |
| `admin/placed_orders.php` | Admin | Manage all orders |
| `admin/users_accounts.php` | Admin | View all registered users |
| `admin/messages.php` | Admin | Read contact form messages |

---

## 🔄 How It Works

### User Booking Flow

```
Register → Login → Browse Packages → Add to Cart → Checkout → View Orders
```

1. **Register** at `user_register.php` with name, email & password
2. **Login** at `user_login.php`
3. **Browse** packages on `packages.php` or use the search bar
4. **Quick View** a package for details, images & price
5. **Add to Cart** or save to **Wishlist**
6. Go to **Cart** → proceed to **Checkout** → confirm booking
7. View your **Orders** anytime from your profile
8. **Edit Profile** — update your name, email or password via `update_user.php`
9. **Contact Us** — send a message or enquiry via `contact.php`

### Admin Management Flow

```
Admin Login → Dashboard → Manage Packages / Orders / Users / Messages
```

1. Login at `admin/admin_login.php`
2. View the **Dashboard** for a quick overview
3. **Add packages** with name, description, price, duration, and multiple images
4. **Edit or delete** existing packages
5. **View orders** placed by users and update their status
6. **Browse user accounts** and manage if needed
7. **Read messages** sent by users through the contact form

---

## 🖼️ Screenshots

> Add your project screenshots inside the `project images/` folder and update the paths below.

```
![Home Page](project%20images/home.png)
![Packages Page](project%20images/packages.png)
![Cart](project%20images/cart.png)
![Admin Dashboard](project%20images/dashboard.png)
```

---

## 🛡️ Security Notes

- Sessions are used for authentication — users and admins are kept separate.
- Admin pages check for admin session before loading.
- Passwords should be hashed using `password_hash()` for production use.
- Use prepared statements or PDO for production to prevent SQL injection.

---

## 🤝 Contributing

Pull requests are welcome. For major changes, please open an issue first to discuss what you would like to change.

---

## 📜 License

This project is created for **educational purposes**. Feel free to use, modify, and learn from it.

---

<p align="center">Tushar Solanki — Tour & Travel Booking System</p>
