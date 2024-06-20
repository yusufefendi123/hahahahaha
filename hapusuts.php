<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hapus Data Matkul</title>
</head>
<body>
    <h2>Data Matkul yang Tersimpan</h2>
    <?php
    if (isset($_SESSION['data']) && count($_SESSION['data']) > 0) {
        echo "<form method='post' action='hapusuts.php'>";
        echo "<table border='1'>";
        echo "<tr><th>No Matkul</th><th>Nama Matkul</th><th>SKS</th><th>Semester</th><th>Prodi</th><th>Teori/Praktek</th><th>Aksi</th></tr>";
        foreach ($_SESSION['data'] as $key => $matkul) {
            echo "<tr>";
            echo "<td>{$matkul['no']}</td>";
            echo "<td>{$matkul['nama']}</td>";
            echo "<td>{$matkul['sks']}</td>";
            echo "<td>{$matkul['semester']}</td>";
            echo "<td>{$matkul['prodi']}</td>";
            echo "<td>{$matkul['pilih']}</td>";
            echo "<td><button type='submit' name='hapus' value='$key'>Hapus</button></td>";
            echo "</tr>";
        }
        echo "</table>";
        echo "</form>";
    } else {
        echo "Tidak ada data matkul yang tersimpan.";
    }
    ?>

    <br>
    <a href="homeuts.php">Kembali ke Menu Utama</a>
</body>
</html>

<?php
// Proses penghapusan data
if (isset($_POST['hapus'])) {
    $key = $_POST['hapus'];
    if (isset($_SESSION['data'][$key])) {
        unset($_SESSION['data'][$key]);
        // Reindex array to maintain continuous indexes
        $_SESSION['data'] = array_values($_SESSION['data']);
    }
    // Redirect to prevent form resubmission
    header('Location: hapusuts.php');
    exit;
}
?>
