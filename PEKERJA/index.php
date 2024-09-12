<?php
include 'koneksi.php';

// Memeriksa apakah pengguna sudah login
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container">
    <h1 class="my-4">Dashboard</h1>
    
    <div class="mb-3">
        <a href="tambah_pegawai.php" class="btn btn-primary">Tambah Pegawai</a>
        <a href="tampil_data.php" class="btn btn-secondary">Lihat Data Pegawai</a>
        <a href="tambah_jabatan.php" class="btn btn-success">Tambah Jabatan</a>
        <a href="logout.php" class="btn btn-danger">Logout</a>
    </div>
    
    <div class="my-4">
        <h2>Selamat datang, <?php echo htmlspecialchars($_SESSION['username']); ?>!</h2>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>