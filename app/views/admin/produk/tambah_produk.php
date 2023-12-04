<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Tambah Produk</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?= BASEURL ?>/Home_Admin">Home</a></li>
                        <li class="breadcrumb-item active">Admin</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12 mb-3">
                    <!-- Button to trigger the Form Tambah Produk modal -->
                    <button type="button" class="btn btn-success" data-toggle="modal" data-target="#formTambahModal">Tambah</button>
                </div>
            </div>

            <!-- Display product details -->
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title"><?= $data['ubahdata'][0]['nama_produk']; ?></h5>
                    <p class="card-text">Harga: Rp. <?= $data['ubahdata'][0]['harga']; ?></p>
                    <p class="card-text">Stok: <?= $data['ubahdata'][0]['stok']; ?></p>
                </div>
                <div class="card-footer">
                    <!-- Button for edit (you can customize the link) -->
                    <a href="<?= BASEURL ?>/Produk_Admin/formUbah/<?= $data['ubahdata'][0]['id_produk']; ?>" class="btn btn-primary">Edit</a>
                    <!-- Button for delete (you can customize the link or add a confirmation modal) -->
                    <a href="<?= BASEURL ?>/Produk_Admin/prosesHapus/<?= $data['ubahdata'][0]['id_produk']; ?>" class="btn btn-danger">Hapus</a>
                </div>
            </div>
        </div>

        <!-- Modal for Form Tambah -->
        <div class="modal fade" id="formTambahModal" tabindex="-1" role="dialog" aria-labelledby="formTambahModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="formTambahModalLabel">Tambah Produk</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="<?= BASEURL ?>/Produk_Admin/prosesTambah" method="POST" enctype="multipart/form-data">
                            <div class="form-group">
                                <label for="kategori">Pilih Kategori:</label>
                                <select name="id_kategori" id="id_kategori" class="form-control" required>
                                    <option></option>
                                    <?php
                                    foreach ($data['kategori'] as $kategori) {
                                        echo "<option value='" . $kategori['id_kategori'] . "'>" . $kategori['nama_kategori'] . "</option>";
                                    }
                                    ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="nama_produk">Nama Produk:</label>
                                <input type="text" name="nama_produk" id="nama_produk" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="harga">Harga:</label>
                                <input type="text" name="harga" id="harga" class="form-control" required>
                            </div>
                            <!-- <div class="form-group">
                                <label for="stok">Stok:</label>
                                <input type="text" name="stok" id="stok" class="form-control" required>
                            </div> -->
                            <div class="form-group">
                                <label for="gambar_produk">Gambar Produk:</label>
                                <input type="file" name="gambar_produk" id="gambar_produk" class="form-control" required>
                            </div>
                            <button type="submit" name="submit" class="btn btn-primary" style="font-size: 15px; padding: 8px 10px;">Tambah Menu</button>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /.content -->
</div>
</div>
<!-- /.content-wrapper -->
