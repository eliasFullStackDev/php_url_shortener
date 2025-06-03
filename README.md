# 🔗 PHP URL Shortener

A simple and clean URL shortener built with PHP and MySQL. Easily convert long URLs into short, shareable links using a custom 3-character format like `A5Z`.

---

## 🚀 Features

- Shortens URLs to a format like `http://yourdomain.com/x/A5Z`
- Clean UI using Bootstrap 5
- Copy-to-clipboard button for easy sharing
- Tracks original URLs and clicks (extendable)
- Automatically generates unique 3-character short codes
- Fully open source and easy to customize

---

## 🛠️ Tech Stack

- **PHP** (core logic)
- **MySQL** (data storage)
- **Bootstrap 5** (frontend styling)
- **Apache `.htaccess`** (URL routing)

---

## 📁 Project Structure

```
url-shortener/
├── index.php          # Main form and frontend
├── shorten.php        # Handles URL shortening logic
├── redirect.php       # Redirects short URL to original
├── db.php             # Database connection
├── .htaccess          # URL rewrite rules
└── README.md          # Project overview
```

---

## 🧑‍💻 Setup Instructions

### 1. 📥 Clone or Download

```bash
git clone https://github.com/yourusername/url-shortener.git
cd url-shortener
```

### 2. 🛠 Create MySQL Database

Run this SQL in phpMyAdmin or MySQL CLI:

```sql
CREATE DATABASE url_shortener;

USE url_shortener;

CREATE TABLE urls (
  id INT AUTO_INCREMENT PRIMARY KEY,
  long_url TEXT NOT NULL,
  short_code VARCHAR(10) NOT NULL UNIQUE,
  clicks INT DEFAULT 0
);
```

### 3. ⚙️ Configure Database Connection

Edit `db.php`:

```php
$host = "localhost";
$user = "root";
$pass = ""; // Your MySQL password
$dbname = "url_shortener";
```

### 4. 🌐 Enable URL Rewriting

Ensure `.htaccess` is working by enabling mod_rewrite in Apache:

```bash
a2enmod rewrite
service apache2 restart
```

Your `.htaccess` file:

```
RewriteEngine On
RewriteRule ^x/([a-zA-Z0-9]+)$ redirect.php [L]
```

### 5. ✅ Run Locally

Open in browser:

```
http://localhost/url-shortener/
```

---

## Example

- **Original URL**: `https://www.example.com/some/very/long/url`
- **Short URL**: `http://localhost/x/A5Z`

Clicking the short link redirects back to the original URL.

---

## 💡 Customization Ideas

- Add QR code generation
- Track clicks per URL
- Add user login and history
- Expiry or deletion for links

---

## 🙌 Credits

Created by **Coding with Elias**  
YouTube: [@CodingWithElias](https://www.youtube.com/@CodingWithElias)  
GitHub: [github.com/codingWithElias](https://github.com/codingWithElias)

---

## License

MIT — free for personal and commercial use.
