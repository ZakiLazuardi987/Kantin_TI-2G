<div class="content-wrapper">
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
        <div class="container-fluid">
            <h1 class="m-0">Daftar Menu</h1>
            <div class="row">
                <div class="col-md-12 mb-3">
                    <button type="button" class="btn btn-success" data-toggle="modal" data-target="#formTambahModal">Tambah</button>
                </div>
                <?php foreach ($data['data'] as $produk) { ?>
                    <div class="card card-spacing">
                        <img src="<?= BASEURL ?>/img/produk/<?php echo $produk['gambar_produk']; ?>" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title"><strong><?php echo $produk['nama_produk']; ?></strong></h5>
                            <p class="card-text" style="margin-bottom: 5px;">Rp. <?php echo $produk['harga']; ?></p>
                            <div class="d-flex justify-content-between align-items-center">
                                <p class="card-text">Stok: <?php echo $produk['stok']; ?></p>
                                <div>
                                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" onclick="ubahdata('<?= $produk['id_produk']; ?>')"><i class="fa fa-edit"></i>Edit</button>
                                    <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#exampleModal" onclick="hapusdata('<?= $produk['id_produk']; ?>')"><i class="fa fa-trash"></i>Hapus</button>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </div>
        <!-- /.content -->
    </div>
</div>
<!-- /.content-wrapper -->

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
    <label for="kategori">Kategori:</label>
    <input type="text" name="kategori" id="kategori" class="form-control" required>
</div>
                    <div class="form-group">
                        <label for="nama_produk">Nama Produk:</label>
                        <input type="text" name="nama_produk" id="nama_produk" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="harga">Harga:</label>
                        <input type="text" name="harga" id="harga" class="form-control" required>
                    </div>
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

<script>
    function ubahdata(x) {
        $('.modal-title').html('Ubah Data Produk');
        let url = '<?=BASEURL?>/Produk_Admin/formUbah';
        $.post(url, {
            id_produk: x
        }, function (data, success) {
            $('.modal-body').html(data);
        });
    }

    function hapusdata(x) {
        $('.modal-title').html('Hapus Data Produk');
        $('.modal-body').html('Apakah Anda Yakin Akan Menghapus Data ini?');
        $('.tombol').html('<a href="<?= BASEURL?>/Produk_Admin/prosesHapus/' + x + '" class="btn btn-secondary" style="background: #A52222">Hapus</a>');
        $('#close').html('Batal');
    }
</script>
