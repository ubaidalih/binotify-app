# Deskripsi

Binotify merupakan aplikasi streaming musik online berbasis web. Aplikasi ini dibuat menggunakan bahasa PHP pada server side dan HTML, CSS, serta Javascript pada client side. Aplikasi ini memiliki 2 role yaitu user (sebagai pengguna) dan admin (sebagai pengelola). Terdapat 3 fitur utama yang dapat dibreakdown menjadi fitur-fitur lainnya, yaitu:

1. Autentikasi Pengguna
2. Pengelolaan Lagu dan Album (Admin)
3. Pencarian Lagu (Admin dan User)

# Requirement

- XAMPP(X (tempat sistem operasi apapun), Apache, MySQL, PHP dan Perl)
- HTML, CSS, Javascript

# Cara Instalasi

Install XAMPP, pastikan port untuk Apache dan MySQL tersedia.

# Cara Menjalankan Server

1. Clone repository pada folder `xampp/htdocs/`
2. Nyalakan Apache dan MySQL pada XAMPP Control Panel
3. Setup database dengan mengimport database pada `data/tubes-wbd.sql` (disarankan menggunakan phpmyadmin)
4. Setting host, nama, username dan password database pada `app/models/Config.php`
5. Jalankan http://localhost/binotify-app/public

# Screenshot

## Halaman Login

![image.png](./screenshot/image.png)

## Halaman Register

![image-1.png](./screenshot/image-1.png)

## Halaman Home

![image-2.png](./screenshot/image-2.png)

## Halaman Daftar Album

![image-3.png](./screenshot/image-3.png)

## Halaman Search, Sort, and Filter

![image-4.png](./screenshot/image-4.png)

## Halaman Detail Lagu

![image-5.png](./screenshot/image-5.png)
![image-5-1.png](./screenshot/image-5-1.png)

## Halaman Detail Album

![image-6.png](./screenshot/image-6.png)
![image-6-1.png](./screenshot/image-6-1.png)

## Halaman Tambah Lagu dan Album

![image-7.png](./screenshot/image-7.png)
![image-8.png](./screenshot/image-8.png)

## Halaman Daftar User

![image-9.png](./screenshot/image-9.png)

## Halaman Penyanyi Premium

![image_subs.png](./screenshot/image_subs.png)

# Pembagian Tugas

## Server Side

1. Halaman Login : 13520085
2. Halaman Register : 13520085
3. Halaman Home : 13520148
4. Halaman Daftar Album : 13520148
5. Halaman Search, Sort, and Filter : 13520148
6. Halaman Detail Lagu : 13520085
7. Halaman Detail Album : 13520085
8. Halaman Tambah Lagu dan Album : 13520061
9. Halaman Daftar User : 13520061

## Client Side

1. Halaman Login : 13520061
2. Halaman Register : 13520061
3. Halaman Home : 13520148
4. Halaman Daftar Album : 13520148
5. Halaman Search, Sort, and Filter : 13520148
6. Halaman Detail Lagu : 13520085
7. Halaman Detail Album : 13520085
8. Halaman Tambah Lagu dan Album : 13520061
9. Halaman Daftar User : 13520061
