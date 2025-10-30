# SHEMSTARTUP - Aplikasi Manajemen Pegawai

Sebuah sistem manajemen karyawan (Employee Management System) yang futuristik dan modern, dibangun menggunakan Laravel. Aplikasi ini dirancang untuk mengelola data inti sumber daya manusia dalam sebuah perusahaan, mulai dari data karyawan, absensi, hingga penggajian.

![app-pegawai/employees](images/screenshot-aplikasi.png)

## 🚀 Fitur Utama

Aplikasi ini mencakup modul-modul penting untuk manajemen HR:

* **Manajemen Karyawan:** Mengelola (CRUD) data karyawan, termasuk informasi pribadi, email, nomor telepon, alamat, tanggal masuk, dan status (aktif, tidak aktif, cuti).
* **Manajemen Departemen:** Mengelola daftar departemen yang ada di perusahaan.
* **Manajemen Jabatan:** Mengelola daftar jabatan, termasuk penetapan `gaji_pokok` (gaji dasar) untuk setiap jabatan.
* **Manajemen Absensi:** Mencatat absensi harian karyawan, termasuk `waktu_masuk`, `waktu_keluar`, dan `status_absensi` (hadir, izin, sakit, alpha).
* **Manajemen Gaji:** Menghitung gaji bulanan karyawan berdasarkan gaji pokok, `tunjangan`, dan `potongan`.
* **Slip Gaji Sederhana:** Menampilkan rincian slip gaji (take home pay) untuk setiap karyawan per bulan.
* **Tampilan Futuristik:** Menggunakan layout master dengan tema *space* / futuristik gelap.

## 🛠️ Tumpukan Teknologi (Tech Stack)

* **Backend:** Laravel
* **Frontend:** Blade Templates, Bootstrap 5
* **Asset Bundling:** Vite
* **Database:** Dikonfigurasi untuk MySQL (default `app_pegawai`)

## 📦 Instalasi dan Penyiapan

1.  **Clone repositori ini:**
    ```bash
    git clone https://github.com/Wisam23-am/app-pegawai.git
    cd app-pegawai
    ```

2.  **Instal dependensi PHP (Composer):**
    ```bash
    composer install
    ```

3.  **Instal dependensi Node.js (NPM):**
    ```bash
    npm install
    ```

4.  **Siapkan file `.env`:**
    ```bash
    cp .env.example .env
    ```

5.  **Generate kunci aplikasi Laravel:**
    ```bash
    php artisan key:generate
    ```

6.  **Konfigurasi Database:**
    Buka file `.env` dan sesuaikan pengaturan database (DB_DATABASE, DB_USERNAME, DB_PASSWORD) sesuai dengan setup lokal Anda.

7.  **Jalankan Migrasi Database:**
    Ini akan membuat semua tabel yang diperlukan (employees, departments, positions, attendance, salaries, dll.).
    ```bash
    php artisan migrate
    ```

8.  **Jalankan server pengembangan:**
    * Mulai server Vite:
        ```bash
        npm run dev
        ```
    * Di terminal lain, mulai server Laravel:
        ```bash
        php artisan serve
        ```

9.  **Selesai!**
    Aplikasi sekarang seharusnya berjalan di `http://127.0.0.1:8000`.

## 🗺️ Rute Aplikasi (Modul)

Berikut adalah rute utama yang didefinisikan dalam aplikasi ini:

* `/employees` - (Manajemen Karyawan)
* `/departments` - (Manajemen Departemen)
* `/positions` - (Manajemen Jabatan)
* `/attendances` - (Manajemen Absensi)
* `/salaries` - (Manajemen Gaji)
