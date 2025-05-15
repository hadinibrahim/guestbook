# Aplikasi Buku Tamu Sederhana - CodeIgniter 3

Aplikasi buku tamu sederhana menggunakan **PHP** dan **CodeIgniter 3**.
Pengunjung dapat mengisi data buku tamu (Nama, Email, Pesan) lalu data disimpan di database, dan dapat dilihat oleh admin tanpa login.

---

## Fitur

- Form input buku tamu (siapa saja bisa isi)
- Daftar pesan (hanya untuk admin, tanpa login dulu)
- Database sederhana untuk menyimpan data tamu

## Optional Fitur

- Validasi input dengan form_validation
- Tambahkan filter berdasarkan tanggal
- Export data tamu ke CSV

---

## Teknologi

- PHP 7.4+
- CodeIgniter 3
- MySQL
- XAMPP (atau server lokal dengan PHP & MySQL)

---

## Instalasi

1. **Clone atau download** project ini ke folder 'htdocs' (XAMPP) atau folder localhost

2. **Buat database MySQL**

buka phpMyAdmin, jalankan query SQL berikut :

```SQL
CREATE DATABASE guestbook_db;

   USE guestbook_db;

   CREATE TABLE guests (
       id INT AUTO_INCREMENT PRIMARY KEY,
       name VARCHAR(100) NOT NULL,
       email VARCHAR(100) NOT NULL,
       message TEXT NOT NULL,
       created_at DATETIME DEFAULT CURRENT_TIMESTAMP
   );
```

## Jalankan aplikasi

Buka browser dan akses

- Form tamu: http://localhost/guestbook/index.php/guestbook
- Halaman admin daftar pesan: http://localhost/guestbook/index.php/guestbook/admin
