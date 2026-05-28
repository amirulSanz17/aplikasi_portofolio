# TODO - Grid Portofolio + Detail Tampilkan

- [x] Ubah `modules/dashboard.php` dari tabel menjadi grid card.
  - [x] Tampilkan foto, created_at, tombol Tampilkan ke `tampilkan.php?id=...`.
  - [x] Tampilkan tombol Edit dan Delete pada setiap card.
  - [x] Jika tidak ada data, tampilkan teks: "Belum ada portofolio".

- [x] Ubah `modules/tampilkan.php` menjadi halaman detail portofolio.
  - [x] Ambil portofolio berdasarkan `id`.
  - [x] Tampilkan foto, created_at, judul, deskripsi, jenis, link.
  - [x] Tombol Edit (`edit.php?id=...`) dan Delete (`hapus.php?id=...`).

- [x] Tambahkan styling grid/card ke `assets/css/layout.css`.

- [x] Testing manual:
  - [x] Case user tanpa portofolio.
  - [x] Case user punya portofolio (grid tampil).
  - [x] Klik tombol Tampilkan menuju halaman detail.
  - [x] Klik Edit/Delete dari card dan halaman detail.
