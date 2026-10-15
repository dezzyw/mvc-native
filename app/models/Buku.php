<?php
class Buku
{
    public function __construct(private PDO $db) {}

    //mengambil semua data buku
    public function getAll(): array
    {
        $stmt = $this->db->query(
            'SELECT id, isbn, judul, penulis, penerbit, tahun_terbit, kategori, stok, created_at 
            FROM buku 
            ORDER BY judul'
        );

        return $stmt->fetchAll();
    }

    //mengambil satu buku berdasarkan id
    public function findById(int $id): array|false
    {
        $stmt =$this->db->prepare(
            'SELECT id, isbn, judul, penulis, penerbit, tahun_terbit, kategori, stok, created_at FROM buku WHERE id = :id'
        );

        $stmt->execute([':id' => $id]);

        return $stmt->fetch();
    }

    //menambahkan data buku baru
    public function insert(array $data): bool
    {
        $sql = 'INSERT INTO buku (isbn, judul, penulis, penerbit, tahun_terbit, kategori, stok) 
        VALUES (:isbn, :judul, :penulis, :penerbit, :tahun_terbit, :kategori, :stok)';

        $stmt = $this->db->prepare($sql);

        return $stmt->execute([
            ':isbn' => $data['isbn'],
            ':judul' => $data['judul'],
            ':penulis' => $data['penulis'],
            ':penerbit' => $data['penerbit'],
            ':tahun_terbit' => $data['tahun_terbit'],
            ':kategori' => $data['kategori'],
            ':stok' => $data['stok']
        ]);
    }

    //memperbarui data buku
    public function update(int $id, array $data): bool
    {
        $sql = 'UPDATE buku 
        SET isbn = :isbn, 
        judul = :judul, 
        penulis = :penulis, 
        penerbit = :penerbit, 
        tahun_terbit = :tahun_terbit, 
        kategori = :kategori, 
        stok = :stok
        WHERE id = :id';

        $stmt = $this->db->prepare($sql);

        return $stmt->execute([
            ':id' => $id,
            ':isbn' => $data['isbn'],
            ':judul' => $data['judul'],
            ':penulis' => $data['penulis'],
            ':penerbit' => $data['penerbit'],
            ':tahun_terbit' => $data['tahun_terbit'],
            ':kategori' => $data['kategori'],
            ':stok' => $data['stok']
        ]);
    }

    //menghapus data buku
    public function delete(int $id): bool
    {
        $stmt = $this->db->prepare(
            'DELETE FROM buku WHERE id = :id'
        );

        return $stmt->execute([':id' => $id]);
    }
}