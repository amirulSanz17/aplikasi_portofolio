# PBW – Aplikasi Portofolio (PHP Native)

## Deskripsi Singkat

Proyek ini merupakan aplikasi web untuk **pengelolaan portofolio** (CRUD: tambah, tampilkan/detail, ubah, hapus) dengan autentikasi login pengguna. Aplikasi dibuat menggunakan **PHP native + MySQLi (tanpa framework)**, HTML/CSS, serta sedikit JavaScript untuk kebutuhan tampilan.

Proyek ini ditujukan untuk tugas perkuliahan **PBW (Pemrograman Berbasis Web)**.

---

## Fitur

- Registrasi & Login pengguna
- Dashboard / halaman daftar portofolio pengguna
- Tampilkan detail portofolio
- Ubah data portofolio
- Hapus data portofolio
- Manajemen jenis portofolio & pengguna (bagian admin)

---

## Struktur Folder

Berikut struktur utama yang relevan:

```
aplikasi_portofolio/
│
├─ index.php
├─ config/
│  └─ koneksi.php
│
├─ auth/
│  ├─ login.php
│  ├─ logout.php
│  └─ register.php
│
├─ includes/
│  ├─ header.php
│  ├─ navbar.php
│  └─ footer.php
│
├─ assets/
│  ├─ css/
│  │  ├─ layout.css
│  │  ├─ header.css
│  │  ├─ login.css
│  │  ├─ register.css
│  │  ├─ tambah.css
│  │  └─ tampilan.css
│  └─ image/
│     ├─ portofolio/
│     └─ users/
│
├─ modules/
│  ├─ index.php    (daftar portofolio pengguna)
│  ├─ tambah.php
│  ├─ simpan.php
│  ├─ tampilkan.php
│  ├─ edit.php
│  ├─ ubah.php
│  └─ hapus.php
│
└─ admin/
   ├─ index.php
   ├─ includes/
   │  ├─ header.php
   │  ├─ navbar.php
   │  └─ sidebar.php
   ├─ css/styles.css
   ├─ js/scripts.js
   └─ modules_admin/
      ├─ pages/
      │  ├─ dashboard_admin.php
      │  ├─ pengguna.php
      │  └─ jenis_portofolio.php
      └─ controller/
         ├─ tambah_jenis.php
         ├─ simpan_jenis.php
         ├─ ubah_jenis_portofolio.php
         ├─ hapus_jenis_portofolio.php
         ├─ edit_pengguna.php
         ├─ ubah_pengguna.php
         └─ hapus_pengguna.php
```

---

## Skema Database (Ringkas)

Catatan: struktur tabel dapat menyesuaikan dengan file SQL yang Anda miliki. Namun dari query yang dipakai di source, tabel yang digunakan minimal:

- `pengguna` (id, username, password, dll.)
- `jenis_portofolio` (id, nama_jenis, dll.)
- `portofolio` (id, id_pengguna, id_jenis, judul, deskripsi, link, bukti, created_at, dll.)

Relasi:

- `portofolio.id_pengguna` → `pengguna.id`
- `portofolio.id_jenis` → `jenis_portofolio.id`

---

## Penjelasan File Kunci

### 1) Autentikasi

- `auth/register.php`: proses registrasi akun
- `auth/login.php`: proses login & validasi session
- `auth/logout.php`: mengakhiri session

### 2) Koneksi Database

- `config/koneksi.php`: membuat koneksi MySQL menggunakan MySQLi

### 3) UI Bersama (Header/Footer)

- `includes/header.php`: bagian header umum pengguna
- `includes/navbar.php`: navigasi
- `includes/footer.php`: footer umum

### 4) Modul CRUD Portofolio

- `modules/index.php`: halaman daftar portofolio pengguna
- `modules/tambah.php`: form tambah portofolio
- `modules/simpan.php`: menyimpan portofolio baru + upload bukti
- `modules/tampilkan.php`: halaman detail portofolio
- `modules/edit.php`: form ubah portofolio (ambil data berdasarkan id)
- `modules/ubah.php`: update portofolio + (opsional) upload bukti baru
- `modules/hapus.php`: hapus portofolio

### 5) Admin

- `admin/index.php`: entry/admin router sederhana
- `admin/modules_admin/pages/dashboard_admin.php`: dashboard admin (tabel portofolio)
- `admin/modules_admin/pages/pengguna.php`: daftar & aksi pengguna
- `admin/modules_admin/pages/jenis_portofolio.php`: daftar & aksi jenis
- `admin/modules_admin/controller/*`: controller CRUD admin

---

## Styling

- `assets/css/layout.css`: styling utama halaman (grid card dashboard, komponen umum)
- `assets/css/tampilan.css`: styling khusus halaman detail portofolio (`modules/tampilkan.php`)

---

## Cara Menjalankan

1. Pastikan server lokal (mis. Laragon/XAMPP) sudah aktif.
2. Import database (sesuaikan dengan file SQL/struktur Anda).
3. Pastikan konfigurasi koneksi di `config/koneksi.php` sudah benar.
4. Buka:
   - `http://localhost/aplikasi_portofolio/index.php`

---

## Catatan Performa & Praktik

- Penggunaan session untuk pembatasan akses (`modules/tampilkan.php`, `modules/edit.php`, dll.)
- Upload file menggunakan `enctype="multipart/form-data"` pada form.
- Pemisahan CSS untuk halaman detail.

---

## Penutup

Aplikasi ini memenuhi kebutuhan tugas PBW berupa pengimplementasian:

- Auth (login/register dengan session)
- CRUD data (portofolio)
- Pemisahan modul & view
- Desain database relasional dan penggunaan MySQLi

Jika ingin menambahkan fitur lanjutan (mis. validasi form lebih ketat, sanitasi input, dan peningkatan keamanan), bisa diterapkan setelah dasar proyek selesai.
