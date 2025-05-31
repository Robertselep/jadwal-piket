<?php
include 'db.php';

$hari = $_GET['hari'] ?? '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nama = $_POST['nama'];
    $hari = $_POST['hari'];
    mysqli_query($conn, "INSERT INTO piket (nama, hari) VALUES ('$nama', '$hari')");
    header("Location: index.php");
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Tambah Piket</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="p-5">
    <div class="container">
        <h2>Tambah Piket Hari <?= htmlspecialchars($hari) ?></h2>
        <form method="POST">
            <input type="hidden" name="hari" value="<?= htmlspecialchars($hari) ?>">
            <div class="mb-3">
                <label for="nama" class="form-label">Nama Siswa:</label>
                <input type="text" name="nama" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-primary">Simpan</button>
            <a href="index.php" class="btn btn-secondary">Kembali</a>
        </form>
    </div>
</body>
</html>
