<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Buku</title>
    <link rel="stylesheet" href="assets/style.css">
</head>
<body>
    <h2>Daftar Buku</h2>

    <a href="index.php?page=buku&action=create" class="tambah"> + Tambah Data</a>

    <table>
        <thead>
            <tr>
                <th>ISBN</th>
                <th>Judul</th>
                <th>Penulis</th>
                <th>Penerbit</th>
                <th>Tahun Terbit</th>
                <th>kategori</th>
                <th>Stok</th>
                <th>Aksi</th>
            </tr>
        </thead>

        <tbody>
            <?php if (empty($buku)):?>
                <tr>
                    <td colspan="8">Belum ada data buku.</td>
                </tr>
            <?php else: ?>
                <?php foreach ($buku as $item): ?>
                    <tr>
                        <td><?= htmlspecialchars($item['isbn']) ?></td>
                        <td><?= htmlspecialchars($item['judul']) ?></td>
                        <td><?= htmlspecialchars($item['penulis']) ?></td>
                        <td><?= htmlspecialchars($item['penerbit']) ?></td>
                        <td><?= htmlspecialchars((string) $item['tahun_terbit']) ?></td>
                        <td><?= htmlspecialchars($item['kategori']) ?></td>
                        <td><?= htmlspecialchars((string) $item['stok']) ?></td>
                        <td>
                            <a href="index.php?page=buku&action=edit&id=<?= (int) $item['id'] ?>"
                                class="edit">Edit</a>

                            <form action="index.php?page=buku&action=delete"
                                method="POST"
                                onsubmit="return confirm('Yakin ingin menghapus data buku ini?');">

                                <input type="hidden"
                                    name="id"
                                    value="<?= (int) $item['id'] ?>">
                                
                                    <button type="submit" class="hapus">Hapus</button>
                            </form>
                        </td>
                    </tr>
                <?php endforeach; ?>
                <?php endif; ?>
        </tbody>
    </table>
    
</body>
</html>