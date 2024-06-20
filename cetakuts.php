<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cetak UTS</title>
</head>
<body>
    <h2>Data Matkul</h2>
    <?php
    function generateKodeMatkul($no, $prodi, $semester, $sks, $pilih) {
        $kodeProdi = substr(str_replace(' ', '', $prodi), 0, 3);
        $kodeSemester = str_pad($semester, 2, '0', STR_PAD_LEFT);
        $kodeSKS = str_pad($sks, 2, '0', STR_PAD_LEFT);
        $kodeTeoriPraktek = ($pilih === 'Teori') ? 'T' : 'P';

        return $no . $kodeProdi . $kodeSemester . $kodeSKS . $kodeTeoriPraktek;
    }

    if (isset($_SESSION['data']) && count($_SESSION['data']) > 0) {
        echo "<table border='1'>";
        echo "<tr><th>Kode Matkul</th><th>No Matkul</th><th>Nama Matkul</th><th>SKS</th><th>Semester</th><th>Prodi</th><th>Teori/Praktek</th></tr>";
        foreach ($_SESSION['data'] as $matkul) {
            $kodeMatkul = generateKodeMatkul($matkul['no'], $matkul['prodi'], $matkul['semester'], $matkul['sks'], $matkul['pilih']);
            echo "<tr>";
            echo "<td>{$kodeMatkul}</td>";
            echo "<td>{$matkul['no']}</td>";
            echo "<td>{$matkul['nama']}</td>";
            echo "<td>{$matkul['sks']}</td>";
            echo "<td>{$matkul['semester']}</td>";
            echo "<td>{$matkul['prodi']}</td>";
            echo "<td>{$matkul['pilih']}</td>";
            echo "</tr>";
        }
        echo "</table>";
    } else {
        echo "Tidak ada data matkul yang tersimpan.";
    }
    ?>

    <br>
    <a href="homeuts.php">Kembali ke Menu Utama</a>
</body>
</html>
