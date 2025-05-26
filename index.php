<?php
require_once __DIR__ . '/src/mahasiswa.php';

$mahasiswa = new Mahasiswa();

// Proses update data
if (isset($_POST['update'])) {
    $mahasiswa->update(
        $_POST['nim'],
        $_POST['nama'],
        $_POST['jurusan'],
        $_POST['angkatan'],
        $_POST['email']
    );
    header("Location: index.php");
    exit;
}

// Ambil data untuk form edit jika ada parameter edit
$editData = null;
if (isset($_GET['edit'])) {
    $editData = $mahasiswa->getByNim($_GET['edit']);
}

// Tambah data
if (isset($_POST['add'])) {
    $mahasiswa->add(
        $_POST['nim'],
        $_POST['nama'],
        $_POST['jurusan'],
        $_POST['angkatan'],
        $_POST['email']
    );
    header("Location: index.php");
    exit;
}

// Hapus data berdasarkan nim
if (isset($_GET['delete'])) {
    $mahasiswa->delete($_GET['delete']);
    header("Location: index.php");
    exit;
}

// Ambil semua data mahasiswa
$data = $mahasiswa->getAll();
?>
<!DOCTYPE html>
<html>
<head>
    <title>Data Mahasiswa</title>
</head>
<body>
    <h2>Tambah Mahasiswa</h2>
    <form method="post">
        NIM: <input type="text" name="nim" required>
        Nama: <input type="text" name="nama" required>
        Jurusan: <input type="text" name="jurusan" required>
        Angkatan: <input type="number" name="angkatan" required>
        Email: <input type="email" name="email" required>
        <button type="submit" name="add">Tambah</button>
    </form>

    <h2>Daftar Mahasiswa</h2>
    <table border="1" cellpadding="5">
        <tr>
            <th>NIM</th>
            <th>Nama</th>
            <th>Jurusan</th>
            <th>Angkatan</th>
            <th>Email</th>
            <th>Aksi</th>
        </tr>
        <?php foreach ($data as $mhs): ?>
        <tr>
            <td><?= htmlspecialchars($mhs['nim']) ?></td>
            <td><?= htmlspecialchars($mhs['nama']) ?></td>
            <td><?= htmlspecialchars($mhs['jurusan']) ?></td>
            <td><?= htmlspecialchars($mhs['angkatan']) ?></td>
            <td><?= htmlspecialchars($mhs['email']) ?></td>
            <td>
                <a href="?edit=<?= urlencode($mhs['nim']) ?>">Edit</a> |
                <a href="?delete=<?= urlencode($mhs['nim']) ?>" onclick="return confirm('Hapus data?')">Hapus</a>
            </td>
        </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>