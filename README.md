# Kelompok 5
- Marchelino Benediktus Leintan (535220107)
- Matthew Alexander Tjahjadi (535220117)
- Gilang Samudro Suwarjono (535229202)

# Website Management System LBUT (Liga Bulutangkis Universitas Tarumanagara)

Website Management System LBUT adalah sistem manajemen berbasis web yang dirancang untuk mengelola berbagai aspek dari Liga Bulutangkis Universitas Tarumanagara. Proyek ini bertujuan untuk mempermudah pengorganisasian dan pengelolaan liga, termasuk pendaftaran pemain, jadwal pertandingan, pencatatan skor, dan pelaporan hasil.

## Daftar Isi
1. [Persiapan](#persiapan)
2. [Instalasi](#instalasi)

## Persiapan

Sebelum melakukan instalasi, buatlah file `.env` terlebih dahulu lalu masukan kode berikut:

```plaintext
APP_NAME=Laravel
APP_ENV=local
APP_KEY=base64:xh/xWPDk204b/fjYzJhWWnKSfCyfB2PLExAP33RaDyA=
APP_DEBUG=true
APP_URL=http://localhost

LOG_CHANNEL=stack
LOG_DEPRECATIONS_CHANNEL=null
LOG_LEVEL=debug

DB_CONNECTION=pgsql
DB_HOST=127.0.0.1
DB_PORT=5432
DB_DATABASE=lbud // masukan sesuai nama database postgre kalian
DB_USERNAME=postgres //masukan sesuai username database postgre kalian
DB_PASSWORD=admin123 //masukan sesuai password database postgre kalian

BROADCAST_DRIVER=log
CACHE_DRIVER=file
FILESYSTEM_DISK=local
QUEUE_CONNECTION=sync
SESSION_DRIVER=file
SESSION_LIFETIME=120

MEMCACHED_HOST=127.0.0.1

REDIS_HOST=127.0.0.1
REDIS_PASSWORD=null
REDIS_PORT=6379

MAIL_MAILER=smtp
MAIL_HOST=mailpit
MAIL_PORT=1025
MAIL_USERNAME=null
MAIL_PASSWORD=null
MAIL_ENCRYPTION=null
MAIL_FROM_ADDRESS="hello@example.com"
MAIL_FROM_NAME="${APP_NAME}"

AWS_ACCESS_KEY_ID=
AWS_SECRET_ACCESS_KEY=
AWS_DEFAULT_REGION=us-east-1
AWS_BUCKET=
AWS_USE_PATH_STYLE_ENDPOINT=false

PUSHER_APP_ID=
PUSHER_APP_KEY=
PUSHER_APP_SECRET=
PUSHER_HOST=
PUSHER_PORT=443
PUSHER_SCHEME=https
PUSHER_APP_CLUSTER=mt1

VITE_PUSHER_APP_KEY="${PUSHER_APP_KEY}"
VITE_PUSHER_HOST="${PUSHER_HOST}"
VITE_PUSHER_PORT="${PUSHER_PORT}"
VITE_PUSHER_SCHEME="${PUSHER_SCHEME}"
VITE_PUSHER_APP_CLUSTER="${PUSHER_APP_CLUSTER}"
```

## Instalasi

Ikuti langkah-langkah berikut untuk menginstal dan mengatur proyek ini di pc/laptop Anda:

#### Instalasi NPM

Jalankan perintah berikut untuk menginstal dependensi NPM:

```plaintext
npm install
```
#### Build Aplikasi

Setelah instalasi dependensi selesai, jalankan perintah berikut untuk membangun aplikasi:

```plaintext
npm run build
```
#### Instalasi Composer

Selanjutnya, instal dependensi PHP menggunakan Composer:

```plaintext
composer install
```
#### Migrasi Database

Untuk menyiapkan database, jalankan migrasi dengan perintah berikut:

```plaintext
php artisan migrate
```
### Seed Database

```plaintext
php artisan migrate:fresh --seed
```

Setelah mengikuti langkah-langkah di atas, proyek ini akan siap digunakan. Pastikan semua konfigurasi pada file .env sudah benar sesuai dengan lingkungan pengembangan Anda.

Dengan README.md ini, pengguna akan memiliki panduan yang jelas untuk menyiapkan lingkungan dan menginstal proyek dengan benar.
