<?php
include 'koneksi.php'; // Menghubungkan ke file koneksi

// Cek apakah pengguna sudah login
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit;
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Pegawai</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container">
    <h2 class="my-4">Data Pegawai</h2>
    <a href="tambah_pegawai.php" class="btn btn-primary mb-3">Tambah Pegawai</a>
    <table class="table table-bordered">
        <thead>
        <tr>
            <th>NIK</th>
            <th>Nama</th>
            <th>Alamat</th>
            <th>Jenis Kelamin</th>
            <th>No Telepon</th>
            <th>Jabatan</th>
            <th>Aksi</th>
        </tr>
        </thead>
        <tbody>
        <?php
        // Query untuk menampilkan data pegawai
        $query = "SELECT Tabel_pegawai.*, Tabel_Jabatan.Nama_jabatan FROM Tabel_pegawai 
                  JOIN Tabel_Jabatan ON Tabel_pegawai.Jabatan_id = Tabel_Jabatan.id";
        $result = $connection->query($query);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>{$row['nik']}</td>";
                echo "<td>{$row['nama']}</td>";
                echo "<td>{$row['alamat']}</td>";
                echo "<td>{$row['jenis_kelamin']}</td>";
                echo "<td>{$row['no_tlp']}</td>";
                echo "<td>{$row['Nama_jabatan']}</td>";
                echo "<td>
                        <a href='ubah.php?id={$row['id']}' class='btn btn-warning btn-sm'>Ubah</a>
                        <a href='hapus.php?id={$row['id']}' class='btn btn-danger btn-sm' onclick='return confirm(\"Apakah Anda yakin ingin menghapus data ini?\")'>Hapus</a>
                      </td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='7'>Tidak ada data</td></tr>";
        }
        ?>
        </tbody>
    </table>
</div>
</body>
</html>
