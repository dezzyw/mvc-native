<?php
/** @var array $buku */
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Buku</title>
    <link rel="stylesheet" href="assets/style.css">
</head>
<body>
    <h2>Edit Buka</h2>

    <form method="POST" action="index.php?page=buku&action=update">
        <input type="hidden" name="id" value="<?= (int) $buku['id'] ?>">

        <label>ISBN</label><br>
        <input type="text" name="isbn"
               value="<?= htmlspecialchars($buku['isbn']) ?>"
               maxlength="20" required><br><br>
        <label>Judul</label><br>
        <input type="text" name="judul"
               value="<?= htmlspecialchars($buku['judul']) ?>"
               maxlength="150" required><br><br>

        <label>Penulis</label><br>
        <input type="text" name="penulis"
               value="<?= htmlspecialchars($buku['penulis']) ?>"
               maxlength="100" required><br><br>

        <label>Penerbit</label><br>
        <input type="text" name="penerbit"
               value="<?= htmlspecialchars($buku['penerbit']) ?>"
               maxlength="100" required><br><br>

        <label>Tahun Terbit</label><br>
        <input type="number" name="tahun_terbit"
               value="<?= htmlspecialchars((string) $buku['tahun_terbit']) ?>"
               min="1901" max="2155" required><br><br>

        <label>Kategori</label><br>
        <input type="text" name="kategori"
               value="<?= htmlspecialchars($buku['kategori']) ?>"
               maxlength="50" required><br><br>

        <label>Stok</label><br>
        <input type="number" name="stok"
               value="<?= (int) $buku['stok'] ?>"
               min="0" required><br><br>

        <button type="submit">Update</button>
        <a href="index.php?page=buku">Kembali</a>
    
    </form>
</body>
</html>