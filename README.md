🚀 Setup PostgreSQL dengan Docker & DBeaver di macOS

Panduan ini akan membantu Anda membuat database PostgreSQL menggunakan Docker dan mengelolanya melalui DBeaver di macOS. Database ini akan berisi tabel mahasiswa dan digunakan oleh aplikasi PHP.

⸻

🐳 Langkah 1: Jalankan PostgreSQL dengan Docker

Buka Terminal dan jalankan perintah berikut untuk membuat container PostgreSQL:

docker run --name postgres-mahasiswa \
  -e POSTGRES_USER=macbook \
  -e POSTGRES_PASSWORD=110904 \
  -e POSTGRES_DB=db_mahasiswa \
  -p 5432:5432 \
  -d postgres

Penjelasan:
	•	--name: Nama container.
	•	-e POSTGRES_USER: Username untuk PostgreSQL.
	•	-e POSTGRES_PASSWORD: Password pengguna PostgreSQL.
	•	-e POSTGRES_DB: Nama database yang akan dibuat saat container dijalankan.
	•	-p 5432:5432: Mengekspos port 5432 ke host.
	•	-d postgres: Jalankan image postgres di background.

⸻

🐘 Langkah 2: Hubungkan PostgreSQL di DBeaver
	1.	Buka DBeaver di Mac.
	2.	Klik Database > New Database Connection.
	3.	Pilih PostgreSQL.
	4.	Masukkan informasi koneksi:
	•	Host: localhost
	•	Port: 5432
	•	Database: db_mahasiswa
	•	Username: macbook
	•	Password: 110904
	5.	Klik Test Connection → pastikan berhasil.
	6.	Klik Finish.

⸻

🧱 Langkah 3: Buat Tabel mahasiswa

Setelah terhubung ke database di DBeaver, jalankan query SQL berikut:

CREATE TABLE mahasiswa (
    nim VARCHAR(10) PRIMARY KEY,
    nama VARCHAR(100),
    jurusan VARCHAR(100),
    angkatan INT,
    email VARCHAR(100)
);


⸻

⚙️ Langkah 4: Konfigurasi config.php (PHP)

Buat file config.php di dalam proyek Anda dan isi dengan konfigurasi berikut:

<?php
define('DB_HOST', 'localhost');
define('DB_PORT', '5432');
define('DB_NAME', 'db_mahasiswa');
define('DB_USER', 'macbook');
define('DB_PASS', '110904'); // Ganti jika password PostgreSQL Anda berbeda


⸻

✅ Selesai!

Database PostgreSQL Anda sudah siap digunakan! Anda bisa mulai mengembangkan aplikasi PHP yang terhubung ke database ini menggunakan konfigurasi di atas.

