<?php
if (isset($_POST['submit'])) {
    $nama = $_POST['nama'];
    $komentar = $_POST['komentar'];

    $myFile = "guestbook.txt";
    $fh = fopen($myFile, 'a') or die("can't open file");

    $stringData = $nama . ";" . $komentar . "\n";
    fwrite($fh, $stringData);

    fclose($fh);
}

$data = file("guestbook.txt");
?>

<!DOCTYPE html>
<html>
<head>
    <title>Buku Tamu</title>
</head>
<body>
    <h2>Buku Tamu</h2>

    <form method="post" action="">
        Nama:<br>
        <input type="text" name="nama" required><br><br>

        Komentar:<br>
        <textarea name="komentar" required></textarea><br><br>

        <input type="submit" name="submit" value="Kirim">
    </form>

    <h2>Daftar Buku Tamu</h2>

    <?php
    foreach ($data as $baris) {
        $pecah = explode(";", $baris);

        if (count($pecah) >= 2) {
            echo "Nama: " . htmlspecialchars($pecah[0]) . "<br>";
            echo "Komentar: " . htmlspecialchars($pecah[1]) . "<br><br>";
        }
    }
    ?>
</body>
</html>