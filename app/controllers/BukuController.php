<?php
class BukuController
{
    public function __construct(private Buku $model) {}
    
    //menampilkan semua data buku
    public function index(): void
    {
        $buku = $this->model->getAll();
        require __DIR__ . '/../Views/buku/index.php';
    }

    //menampilkan form tambah buku
    public function create(): void
    {
        require __DIR__ . '/../Views/buku/create.php';
    }

    //menyimpan data buku baru
    public function store(): void
    {
        $data = $this->validateInput($_POST);
        $this->model->insert($data);

        header('Location: index.php?page=buku');
        exit;
    }

    //menampilkan form edit buku
    public function edit(): void{
        $id = (int) ($_GET['id'] ?? 0);
        $buku = $this->model->findById($id);

        if(!$buku){
            http_response_code(404);
            exit('Data buku tidak ditemukan.');
        }

        require __DIR__ . '/../Views/buku/edit.php';
    }

    //memperbarui data buku
    public function update(): void
    {
        $id = (int) ($_POST['id'] ?? 0);
        if($id <= 0 || !$this->model->findById($id)){
            http_response_code(404);
            exit('Data buku tidak ditemukan.');
        }

        $data = $this->validateInput($_POST);
        $this->model->update($id, $data);

        header('Location: index.php?page=buku');
        exit;
    }

    //menghapus data buku
    public function delete(): void
    {
        $id = (int) ($_POST['id'] ?? 0);

        if($id <= 0 || !$this->model->findById($id)){
            http_response_code(404);
            exit('Data buku tidak ditemukan.');
        }

        $this->model->delete($id);

        header('Location: index.php?page=buku');
        exit;
    }

    //memvalidasi input buku
    private function validateInput(array $input): array
    {
        $data = [
            'isbn' => trim($input['isbn'] ?? ''),
            'judul' => trim($input['judul'] ?? ''),
            'penulis' => trim($input['penulis'] ?? ''),
            'penerbit' => trim($input['penerbit'] ?? ''),
            'tahun_terbit' => trim($input['tahun_terbit'] ?? ''),
            'kategori' => trim($input['kategori'] ?? ''),
            'stok' => trim($input['stok'] ?? '')
        ];

        foreach ($data as $nilai){
            if($nilai === ''){
                exit('Semua field wajib diisi.');
            }
        }

        if(
            !ctype_digit($data['tahun_terbit']) ||
            (int) $data['tahun_terbit'] < 1901 ||
            (int) $data['tahun_terbit'] > 2155
        ){
            exit('Tahun terbit tidak valid.');
        }

         if (!ctype_digit($data['stok'])) {
            exit('Stok harus berupa bilangan bulat nonnegatif.');
        }
        $data['tahun_terbit'] = (int) $data['tahun_terbit'];
        $data['stok'] = (int) $data['stok'];

        if(
            strlen($data['isbn']) > 20 ||
            strlen($data['judul']) > 150 ||
            strlen($data['penulis']) > 100 ||
            strlen($data['penerbit']) > 100 ||
            strlen($data['kategori']) > 50
        ){
            exit('Panjang input melebihi batas yang ditentukan.');
        }
        return $data;

    }
}