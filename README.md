# TOKOKU ( E-Commerce )

Kelompok 1

## Stack Yang Digunakan

1. Template Bootsrap 5
2. PHP native
3. HTML, CSS dan JavaScript

![HTML5](https://img.shields.io/badge/html5-%23E34F26.svg?style=for-the-badge&logo=html5&logoColor=white) ![CSS3](https://img.shields.io/badge/css3-%231572B6.svg?style=for-the-badge&logo=css3&logoColor=white) ![JavaScript](https://img.shields.io/badge/javascript-%23323330.svg?style=for-the-badge&logo=javascript&logoColor=%23F7DF1E) ![PHP](https://img.shields.io/badge/php-%23777BB4.svg?style=for-the-badge&logo=php&logoColor=white) ![Bootstrap](https://img.shields.io/badge/bootstrap-%23563D7C.svg?style=for-the-badge&logo=bootstrap&logoColor=white)

## Cara Menjalakan Aplikasi Web

### 1. Jalankan Perintah pada CMD

```
composer install
composer require doctrine/dbal
composer require realrashid/sweet-alert
```

Perintah ini digunakan untuk menginstall package-package yang digunakan.

### 2. Copy folder env.example kemudian rename dengan nama .env menggunakan perintah

```
cp .env.example .env
```

### 3. Jalankan perintah pada CMD

```
php artisan key:generate
```

Perintah ini digunakan mengenerate random string yang digunakan sebagai key yang diperlukan untuk semua proses enkripsi dan dekripsi pada aplikasi kita.

### 4. Setting database di foler .env sesuai dengan settingan database yang anda buat

```php
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=tokoku
DB_USERNAME=root
DB_PASSWORD=
```

### 5. Jalankan perintah pada CMD

```
php artisan migrate
```

Perintah ini digunakan untuk membuat tabel-tabel di database.

### 6. Jalankan perintah pada CMD

```
php artisan db:seed
```

Perintah ini digunakan untuk mengisi tabel user,category,dan product di database.

### 7. Jalankan perintah pada CMD

```
php artisan serve
```

Perintah ini digunakan untuk menjalankan aplikasi.
