# Laravel Travel Management System

## 📌 Deskripsi
Proyek ini masih dalam pengembangan dan terdiri dari dua bagian utama:
1. **travel-admin** → Aplikasi backend berbasis Laravel untuk mengelola jadwal perjalanan.
2. **travel-client** → Aplikasi frontend yang memungkinkan pengguna mencari dan melihat jadwal perjalanan berdasarkan tujuan dan tanggal tertentu.

## 🛠️ Teknologi yang Digunakan
- **Laravel** (Backend & API - travel-admin)
- **Vue.js** (Frontend interaktif - travel-client)
- **Bootstrap 5** (UI Styling)
- **MySQL** (Database)

## 📂 Struktur Direktori
```
├── travel-admin/
│   ├── app/
│   │   ├── Http/
│   │   │   ├── Controllers/
│   │   │   │   ├── ScheduleController.php
│   │   │   │   ├── Api/
│   │   │   │   │   ├── ScheduleApiController.php
│   ├── resources/
│   │   ├── views/
│   │   │   ├── schedules/
│   │   │   │   ├── index.blade.php
│   │   │   │   ├── details.blade.php
│   │   │   │   ├── card.blade.php
│   ├── routes/
│   │   ├── web.php
│   │   ├── api.php
│
├── travel-client/
│   ├── public/
│   ├── src/
│   │   ├── components/
│   │   │   ├── SearchForm.vue
│   │   │   ├── ScheduleList.vue
│   ├── routes/
│   │   ├── index.js
│   ├── App.vue
│   ├── main.js
```

## 🚀 Cara Instalasi
### **Backend (travel-admin)**
1. **Clone Repository**
   ```sh
   git clone https://github.com/username/repo-name.git](https://github.com/GiandaAtthariq/travelz.git
   ```

2. **Install Dependencies**
   ```sh
   composer install
   npm install
   ```

3. **Konfigurasi Environment**
   ```sh
   cp .env.example .env
   ```
   - Atur koneksi database di `.env`

4. **Generate Key & Migrasi Database**
   ```sh
   php artisan key:generate
   php artisan migrate --seed
   ```

5. **Jalankan Server**
   ```sh
   php artisan serve
   ```

### **Frontend (travel-client)**
1. **Pindah ke folder travel-client**
   ```sh
   cd ../travel-client
   ```
2. **Install Dependencies**
   ```sh
   npm install
   ```
3. **Jalankan Aplikasi**
   ```sh
   npm run dev
   ```

## 🔍 Fitur Utama
✅ Cari jadwal berdasarkan tujuan & tanggal (travel-client)<br>
✅ Manajemen jadwal perjalanan (travel-admin)<br>
✅ API terintegrasi antara backend dan frontend<br>
✅ Tampilan responsif menggunakan Bootstrap 5

## 🎯 Cara Menggunakan
1. **Jalankan backend dan frontend secara bersamaan**
2. **Buka `http://127.0.0.1:5173/` untuk client**
3. **Gunakan form pencarian untuk mencari jadwal berdasarkan tujuan atau tanggal.**
4. **Klik tombol "Cari" untuk menampilkan hasil yang difilter.**
5. **Klik detail jadwal untuk melihat informasi lengkap.**

## 📄 API Endpoint
- **Ambil semua jadwal** → `GET /api/schedules`
- **Ambil detail jadwal** → `GET /api/schedules/{id}`
- **Tambah jadwal** → `POST /api/schedules`
- **Edit jadwal** → `PUT /api/schedules/{id}`
- **Hapus jadwal** → `DELETE /api/schedules/{id}`

## 📝 Info
Sistem masih dalam pengembangan, Silakan digunakan dan dikembangkan lebih lanjut!

