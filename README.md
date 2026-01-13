## Teknologi yang Digunakan

- **Framework:** Laravel 12.x
- **Database:** MySQL
- **Frontend:** Blade Templates
- **Bahasa:** PHP 8.2+

## Persyaratan Sistem

Sebelum memulai, pastikan Anda telah memenuhi persyaratan berikut:

- PHP >= 8.2
- Composer
- Node.js & NPM
- MySQL
- Git

## Instalasi

Ikuti langkah-langkah berikut untuk mengatur proyek secara lokal:

### 1. Clone Repository

```bash
git clone https://github.com/username-anda/nama-repo-anda.git
cd nama-repo-anda
```

### 2. Install Dependensi PHP

```bash
composer install
```

### 3. Install Dependensi JavaScript

```bash
npm install
```

### 4. Konfigurasi Environment

Duplikasi file `.env.example` dan ubah namanya menjadi `.env`:

```bash
cp .env.example .env
```

Kemudian konfigurasi kredensial database Anda di file `.env`:

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=nama_database_anda
DB_USERNAME=
DB_PASSWORD=
```

### 5. Generate Application Key

```bash
php artisan key:generate
```

### 6. Jalankan Migrasi Database

```bash
php artisan migrate
```

### 7. Jalankan Seeder Database

```bash
php artisan db:seed
```

### 8. Jalankan Development Server

Buka dua terminal/tab:

**Terminal 1** - Jalankan server Laravel:
```bash
php artisan serve
```

**Terminal 2** - Jalankan server Vite:
```bash
npm run dev
```

### 9. Akses Aplikasi

Buka browser dan kunjungi:
```
http://localhost:8000
```

## Kredensial Login Default

### Akun Admin
- **Email:** admin@example.com
- **Password:** password

### Akun Pengguna Biasa
- **Email:** user@example.com
- **Password:** password