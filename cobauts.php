<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="" method="post">
        <label for="no">No. Urut Matkul :</label><br>
        <input type="number" name="no" required><br>

        <label for="nama">Nama Matkul :</label><br>
        <input type="text" name="nama" required><br>

        <label for="sks">SKS :</label><br>
        <input type="number" name="sks" required><br>

        <label for="semester">Semester :</label><br>
        <input type="number" name="semester" required><br>

        <label for="prodi">Pilih Prodi :</label><br>
        <select name="prodi" required>
            <option selected>Pilih prodi</option>
            <option value="D3 Teknik Informatika">D3 Teknik Informatika</option>
            <option value="D3 Teknik Elektro">D3 Teknik Elektro</option>
            <option value="D3 Teknik Mesin">D3 Teknik Mesin</option>
            <option value="D3 Teknik Listrik">D3 Teknik Listrik</option>
            <option value="D4 Teknik Pengendalian Pencemaran Lingkungan">D4 Teknik Pengendalian Pencemaran Lingkungan</option>
            <option value="D4 Pengembangan Produk Agroindustri">D4 Pengembangan Produk Agroindustri</option>
        </select><br>

        <label for="pilih">Pilih Teori/Praktek :</label><br>
        <select name="pilih" required>
            <option selected>Pilih</option>
            <option value="Teori">Teori</option>
            <option value="Praktek">Praktek</option>
        </select><br>

        <label for="submit">Apakah ingin menambah data matkul lagi Y/T?</label><br>
        <input type="submit" name="submitY" value="Y">
        <input type="submit" name="submitT" value="T">
    </form>

    <?php
    if (isset($_POST['submitY'])){
        header('Location: homeuts.php');
        exit;
    }

    if (isset($_POST['submitT'])) {
        $no = $_POST['no'];
        $nama = $_POST['nama'];
        $sks = $_POST['sks'];
        $semester = $_POST['semester'];
        $prodi = $_POST['prodi'];
        $pilih = $_POST['pilih'];

        // Simpan data ke session
        $_SESSION['data'][] = [
            'no' => $no,
            'nama' => $nama,
            'sks' => $sks,
            'semester' => $semester,
            'prodi' => $prodi,
            'pilih' => $pilih
        ];
        echo "<hr>No. Urut Matkul : $no <br>";
        echo "Nama Matkul : $nama <br>";
        echo "SKS : $sks <br>";
        echo "Semester : $semester <br>";
        echo "Pilih Prodi : $prodi <br>";
        echo "Pilih Teori/praktek : $pilih <br>";

        echo '<form method="post" action="">';
        echo '<br>';
        echo '<label for="submit1">Apakah anda ingin kembali ke menu utama?</label><br>';
        echo '<input type="submit" name="submit1" value="Ya">';
        echo '&nbsp;';
        echo '<input type="submit" name="submit2" value="Tidak">';
        echo '</form>';
    }

    if (isset($_POST['submit2'])) {
        echo "Selesai!!!!...";
    } elseif (isset($_POST['submit1'])) {
        header('Location: homeuts.php');
        exit;
    }
    ?>
</body>
</html>
