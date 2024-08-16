<?php

if (isset($_GET['editKategori'])) {
    $id = $_GET['editKategori'];
    $editKategori = mysqli_query($koneksi, "SELECT * FROM kategori WHERE id = '$id'");
    // var_dump($editlevel);
    $rowKategori = mysqli_fetch_assoc($editKategori); //mysqli_fetch_assoc mengambil data dari hasil query dalam bentuk data
}
if (isset($_POST['simpan'])) {
    // jika param edit ada maka update, selian itu maka tambah
    $id = isset($_GET['editKategori']) ? $_GET['editKategori'] : '';
    $nama_kategori = $_POST['nama_kategori'];
    $keterangan = $_POST['keterangan'];

    if (!$id) {
        $insert = mysqli_query($koneksi, "INSERT INTO kategori (nama_kategori, keterangan) VALUES ('$nama_kategori', '$keterangan')");
    } else {
        $update = mysqli_query($koneksi, "UPDATE kategori SET nama_kategori = '$nama_kategori', keterangan = '$keterangan' WHERE id = '$id'");
    }


    header("location:?pg=kategori&tambah=berhasil");
}

if (isset($_GET['delete'])) {
    $id = $_GET['delete'];

    $delete = mysqli_query($koneksi, "DELETE FROM kategori WHERE id = '$id'");
    header("location:?pg=kategori&hapus=berhasil");
}
?>
<div class="container mt-5">
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header bg-secondary text-white">Data Kategori</div>
                <div class="card-body">
                    <form action="" method="post">
                        <div class="mb-3">
                            <label for="" class="form-label">Nama</label>
                            <input value="<?php echo ($rowKategori['nama_kategori'] ?? '') ?>" type="text" class="form-control" name="nama_kategori">
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">Keterangan</label>
                            <input value="<?php echo ($rowKategori['keterangan'] ?? '') ?>" type="text" class="form-control" name="keterangan">
                        </div>
                        <div class="mb-3">
                            <input type="submit" class="btn btn-primary" name="simpan" value="Simpan">
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>