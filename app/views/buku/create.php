<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Buku</title>
    <link rel="stylesheet" href="assets/style.css">
</head>
<body>
    <h2>Tambah Buku</h2>

    <form method="POST" action="index.php?page=buku&action=store">
        <label>ISBN</label>br
        <input type="text" name="isbn" maxlength="20" required><br><br>

        <label>Judul</label>br
        <input type="text" name="judul" maxlength="150" required><br><br>

        <label>Penulis</label>br
        <input type="text" name="penulis" maxlength="100" required><br><br>
        
        <label>Penerbit</label>br
        <input type="text" name="penerbit" maxlength="100" required><br><br>

        <label>Tahun Terbit</label>br
        <input type="number" name="tahun_terbit" min="1901" maxlength="2155" required><br><br>

        <label>Kategori</label>br
        <input type="text" name="kategori" maxlength="50" required><br><br>

        <label>Stok</label>br
        <input type="number" name="stok" min="0" required><br><br>

        <button type="submit">Simpan</button>
        <a href="index.php?page=buku">Kembali</a>
    </form>
    
</body>
</html>