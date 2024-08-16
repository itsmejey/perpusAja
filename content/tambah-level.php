<?php

if (isset($_GET['editLevel'])) {
    $id = $_GET['editLevel'];
    $editLevel = mysqli_query($koneksi, "SELECT * FROM level WHERE id = '$id'");
    // var_dump($editlevel);
    $rowLevel = mysqli_fetch_assoc($editLevel); //mysqli_fetch_assoc mengambil data dari hasil query dalam bentuk data
}
if (isset($_POST['simpan'])) {
    // jika param edit ada maka update, selian itu maka tambah
    $id = isset($_GET['editLevel']) ? $_GET['editLevel'] : '';
    $nama_level = $_POST['nama_level'];
    $keterangan = $_POST['keterangan'];

    if (!$id) {
        $insert = mysqli_query($koneksi, "INSERT INTO level (nama_level, keterangan) VALUES ('$nama_level', '$keterangan')");
    } else {
        $update = mysqli_query($koneksi, "UPDATE level SET nama_level = '$nama_level', keterangan = '$keterangan' WHERE id = '$id'");
    }


    header("location:?pg=level&tambah=berhasil");
}

if (isset($_GET['delete'])) {
    $id = $_GET['delete'];

    $delete = mysqli_query($koneksi, "DELETE FROM level WHERE id = '$id'");
    header("location:?pg=level&hapus=berhasil");
}
?>
<div class="container mt-5">
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header bg-secondary text-white">Data Level</div>
                <div class="card-body">
                    <form action="" method="post">
                        <div class="mb-3">
                            <label for="" class="form-label">Nama</label>
                            <input value="<?php echo ($rowLevel['nama_level'] ?? '') ?>" type="text" class="form-control" name="nama_level">
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">Keterangan</label>
                            <input value="<?php echo ($rowLevel['keterangan'] ?? '') ?>" type="text" class="form-control" name="keterangan">
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