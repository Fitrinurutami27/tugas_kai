![food](https://github.com/user-attachments/assets/55d6fb9e-cee1-490e-9fd2-455294737d3a)
![create club](https://github.com/user-attachments/assets/52467630-270e-402f-976a-52573695c739)
![enkclub](https://github.com/user-attachments/assets/15ea0181-2681-49a4-89fe-b2b5535cb945)

- Gambar Tampilan "Club Football - List" (admin/clubs)
Ini adalah tampilan daftar data club sepakbola pada panel admin Filament.
Menampilkan kolom:
Nama club
Tahun berdiri
Negara
Terdapat tombol New Club untuk menambahkan data baru.
Data ditampilkan dalam format tabel dan bisa diedit lewat tombol Edit di kanan.

- Gambar Tampilan "Create Club" (admin/clubs/create)
Ini adalah form input data klub baru.
Field yang harus diisi:
Nama club (wajib)
Tahun berdiri (opsional)
Negara (wajib)
Terdapat tombol Create, Cancel, dan Create & create another untuk menyimpan data.
Setelah disubmit, data akan diproses dan disimpan ke database.

- Gambar Tampilan Tabel Database (select * from clubs)
Ini menunjukkan hasil query dari tabel clubs di database MariaDB.
Semua data yang diinput melalui form telah dienkripsi, terlihat dari format string panjang (base64/AES).
Field seperti nama_club, tahun_berdiri, dan negara tidak disimpan dalam bentuk plaintext, melainkan dalam bentuk terenkripsi.
Hal ini membuktikan bahwa enkripsi berhasil diimplementasikan dengan benar di sisi aplikasi sebelum data disimpan ke database.

![karysmw](https://github.com/user-attachments/assets/0e366c28-c346-4590-9a77-a2011c5924bf)
![create karyawan](https://github.com/user-attachments/assets/157223f8-0233-42bd-855f-4cf75d9eff41)
![enkrpkar](https://github.com/user-attachments/assets/42ba89e1-3a02-468c-a4b1-54f0eb24ba1c)

- Gambar Tampilan "Karyawan - List" (admin/karyawans)
Ini adalah halaman daftar data karyawan di admin panel.
Data yang ditampilkan meliputi:
Nama karyawan
Umur
Nomor telepon
Jabatan
Club Kesukaan
Tersedia tombol New Karyawan untuk menambahkan data baru.
Terdapat fitur search, serta tombol Edit di setiap baris untuk mengubah data karyawan.

- Gambar Tampilan "Create Karyawan" (admin/karyawans/create)
Ini adalah form isian untuk menambahkan data karyawan.
Field yang disediakan:
Nama karyawan
Umur
Alamat
Nomor telepon
Jabatan
Club kesukaan (dropdown dari entitas klub sepak bola)
Semua field diberi validasi input (required) untuk menjaga konsistensi data.
Tombol aksi: Create, Create & create another, dan Cancel.

- Gambar Tampilan Tabel Database (select * from karyawans)
Ini menunjukkan hasil query dari tabel karyawans di database menggunakan MariaDB.
Seluruh kolom yang sensitif, seperti:
nama_karyawan, alamat, nomor_telepon, dan jabatan
telah terenkripsi, terbukti dari tampilan berupa string panjang dalam format base64.
Field club_id mengacu pada relasi ke tabel club (foreign key).
Data tetap aman walau database diakses langsung, karena tidak ditampilkan dalam bentuk teks asli (plaintext).
