# 💻 Laptop Zone — Second Hand Laptop Store

A complete full-stack web application for selling second-hand laptops. Built with **PHP**, **MySQL**, and **Bootstrap/CSS3** — featuring a beautiful customer storefront with a hero slideshow, laptop detail pages, booking system, and a full-featured admin panel.

> ✅ Developed for a client running a second-hand laptop business in Pakistan.

---

## 🖥️ Live Preview

| Page | Description |
|---|---|
| `/index.php` | Homepage with hero slideshow + laptop grid |
| `/laptop.php?id=1` | Laptop detail page with specs |
| `/book.php?id=1` | Booking form for the customer |
| `/admin/login.php` | Admin panel login |
| `/admin/admin_dashboard.php` | Full admin dashboard |

---

## ✨ Features

### 🛍️ Customer Side
- **Hero Slideshow** — Auto-rotating laptop photos on homepage
- **Laptop Grid** — All laptops displayed with photo, name, model, price & status badge
- **Laptop Detail Page** — Full specs: Processor, RAM, Storage, Generation, Condition
- **Booking System** — Customer fills name, WhatsApp, email & address to book a laptop
- **WhatsApp Integration** — Direct WhatsApp contact button on every laptop
- **Responsive Design** — Works on mobile, tablet & desktop

### 🔧 Admin Panel
- **Secure Login** — Session-based authentication with MD5 password
- **Dashboard** — Stats cards: Total Laptops, Available, Sold, Total Orders at a glance
- **Laptops Table** — View all listings with Edit & Delete actions
- **Add Laptop** — Upload photo + fill all specs (name, model, price, processor, RAM, storage, generation, condition, status)
- **Edit Laptop** — Update any laptop info
- **Soft Delete / Trash System** — Deleted laptops move to trash (not permanently lost)
- **Restore from Trash** — Recover accidentally deleted laptops
- **Permanent Delete** — Remove from trash permanently
- **Orders Management** — View all orders with customer name, WhatsApp (clickable), Email (clickable), and laptop info

---

## 🗂️ Project Structure

```
Laptops/
│
├── index.php                  # Homepage — hero slideshow + laptop grid
├── laptop.php                 # Single laptop detail page
├── book.php                   # Booking form (customer fills info)
├── order.php                  # Processes the order & saves to DB
├── success.php                # Order success confirmation page
├── my.php                     # Extra page
├── cga.html                   # Static HTML page
│
├── include/
│   ├── header.php             # Global header + navbar (customer side)
│   └── footer.php             # Global footer (customer side)
│
├── admin/
│   ├── login.php              # Admin login page
│   ├── logout.php             # Session destroy + redirect
│   ├── admin_dashboard.php    # Main dashboard — stats + laptops + orders table
│   ├── all_laptops.php        # All laptops list view
│   ├── add_laptop.php         # Add new laptop form + photo upload
│   ├── edit_laptop.php        # Edit existing laptop
│   ├── delete.php             # Soft delete → moves to trash
│   ├── trash.php              # Trash — view soft-deleted laptops
│   ├── restore.php            # Restore laptop from trash
│   ├── parmanent_delete.php   # Permanently delete from trash
│   └── include/
│       ├── header.php         # Admin panel header
│       └── footer.php         # Admin panel footer
│
├── assest/
│   └── css/
│       └── style.css          # Main stylesheet (customer + admin shared)
│
├── uploads/                   # Laptop photos (auto-generated on add)
│   ├── 1.jpg
│   ├── 2.jpg
│   └── ...
│
├── laptopsdb.sql              # ✅ Database import file
├── config.example.php         # ✅ DB connection template (safe to share)
└── README.md
```

---

## 🗄️ Database Structure

**Database:** `laptopsdb`

| Table | Purpose |
|---|---|
| `laptops` | All laptop listings — specs, price, photo, status |
| `users` | Customers who placed orders |
| `orders` | Links users → laptops (FK relationships) |
| `admins` | Admin login credentials |
| `laptop_trash` | Soft-deleted laptops (recoverable) |

---

## ⚙️ Installation & Setup

### Requirements
- PHP 7.4+
- MySQL / MariaDB
- Apache (XAMPP or WAMP recommended)

---

### Step 1 — Clone or Download
```bash
git clone https://github.com/YOUR_USERNAME/laptop-zone.git
```
Or download ZIP and extract.

---

### Step 2 — Place in Server Folder
- **XAMPP:** Paste folder inside `C:/xampp/htdocs/`
- **WAMP:** Paste folder inside `C:/wamp64/www/`

---

### Step 3 — Import Database
1. Open **phpMyAdmin** → `http://localhost/phpmyadmin`
2. Click **"New"** → Create database named `laptopsdb`
3. Click **Import** → Select `laptopsdb.sql` → Click **Go**

---

### Step 4 — Configure Database Connection

All PHP files connect directly. If your MySQL password is not empty, update each `mysqli_connect` line — or create a central `config.php`:

```php
<?php
$conn = mysqli_connect("localhost", "root", "", "laptopsdb");
if (!$conn) die("Connection failed: " . mysqli_connect_error());
?>
```

Then replace `mysqli_connect(...)` lines in each file with `include('../config.php');` (adjust path as needed).

---

### Step 5 — Run the Project

Open your browser:
```
http://localhost/Laptops/
```

Admin Panel:
```
http://localhost/Laptops/admin/login.php

Username: admin
Password: admin  (or check admins table in DB)
```

---

## 🛡️ Security Notes

> ⚠️ This project was built for local/client use. Before deploying to a live server, consider these improvements:

- [ ] Move DB credentials to a single `config.php` (not hardcoded in every file)
- [ ] Add **prepared statements** to prevent SQL injection
- [ ] Upgrade password hashing from MD5 to `password_hash()` / `bcrypt`
- [ ] Validate and sanitize all form inputs server-side
- [ ] Restrict `uploads/` folder from direct PHP execution

---

## 🛠️ Tech Stack

| Layer | Technology |
|---|---|
| Frontend | HTML5, CSS3, Vanilla JS |
| UI Icons | Font Awesome 6 |
| Backend | PHP (Core — no framework) |
| Database | MySQL / MariaDB |
| Auth | PHP Sessions + MD5 |
| Server | Apache (XAMPP / WAMP) |

---

## 📸 Screenshots

> *(Add screenshots of homepage, laptop detail, booking form, and admin dashboard here)*

---

## 👨‍💻 Developer

**Abdul Mannan Gohar**  
📧 man325329@gmail.com  
🏠 Kotli, Pakistan

- Solo full-stack development
- Built for a real client — second-hand laptop business

---

## 📄 License

Built for client use. Free to fork and adapt for your own business.
