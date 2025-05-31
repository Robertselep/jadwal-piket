<?php include 'db.php'; ?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Jadwal Piket</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background: linear-gradient(to right, #1e3c72, #2a5298);
            color: white;
            min-height: 100vh;
            padding-top: 30px;
        }
        .jadwal-box {
            background: linear-gradient(to bottom right, #4facfe, #00f2fe);
            border-radius: 15px;
            padding: 20px;
            min-height: 150px;
            color: #fff;
            font-weight: bold;
            box-shadow: 0 4px 6px rgba(0,0,0,0.2);
        }
        .jadwal-box small {
            font-weight: normal;
            font-size: 0.9rem;
            display: block;
        }
        .judul {
            font-size: 2rem;
            font-weight: bold;
            margin-bottom: 40px;
        }
        .btn-add {
            margin-top: 10px;
        }
    </style>
</head>
<body>
<div class="container text-center">
    <div class="judul">Jadwal Piket</div>
    <div class="row g-4 justify-content-center">

    <?php
    $hariList = ['Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat'];

    foreach ($hariList as $hari) {
        echo '<div class="col-md-2">
                <div class="jadwal-box">
                    ' . $hari . '<br>';

        $result = mysqli_query($conn, "SELECT id, nama FROM piket WHERE hari='$hari'");

        while ($row = mysqli_fetch_assoc($result)) {
            echo "<small>- " . htmlspecialchars($row['nama']) . 
                 ' <a href="edit.php?id=' . $row['id'] . '" class="text-warning">✏️</a>
                   <a href="hapus.php?id=' . $row['id'] . '" class="text-danger" onclick="return confirm(\'Yakin ingin menghapus?\')">🗑️</a>
                  </small>';
        }

        echo '<a href="tambah.php?hari=' . $hari . '" class="btn btn-sm btn-light btn-add">Tambah</a>';
        echo '</div></div>';
    }
    ?>

    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
