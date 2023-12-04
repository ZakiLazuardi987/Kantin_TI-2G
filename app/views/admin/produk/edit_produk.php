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
              <li class="breadcrumb-item"><a href="Home_Admin">Home</a></li>
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
      <div class="modal-body">
                    <form action="<?= BASEURL?>/Produk_Admin/prosesUbah" method="POST" enctype="multipart/form-data">

                    <?php foreach ($data['ubahdata'] as $ubah) { ?>
                    
                    
            <div class="form-group">
                <label for="kategori">Pilih Kategori:</label>
                <select name="id_kategori" id="id_kategori" class="form-control">
                    <option></option>
                    <?php
                    foreach($data['kategori'] as $kategori) {
                        ?>
                    <option value="<?= $kategori['id_kategori'] ?>" <?= ($ubah['id_kategori'] == $kategori['id_kategori']) ? 'selected' : '' ?>><?= $kategori['nama_kategori'] ?></option>
                    <?php
                    }
                    ?>
                </select>
            </div>
            <div class="form-group">
            <input type="hidden" name="id_produk" value="<?php echo $ubah['id_produk']; ?>">
                <label for="nama_produk">Nama Produk:</label>
                <input type="text" name="nama_produk" id="nama_produk" class="form-control" value="<?php echo $ubah['nama_produk']; ?>">
            </div>
            <div class="form-group">
                <label for="harga">Harga:</label>
                <input type="text" name="harga" id="harga" class="form-control" value="<?php echo $ubah['harga']; ?>">
            </div>
            <!-- <div class="form-group">
                <label for="stok">Stok:</label>
                <input type="text" name="stok" id="stok" class="form-control" required>
            </div> -->
            <div class="form-group">
                <label for="gambar_produk">Gambar Produk:</label>
                <img src="<?php echo BASEURL ?>/img/produk/<?php echo $ubah['gambar_produk']; ?>" alt="Gambar Produk" class="img-fluid" style="max-width: 100px; max-height: 100px;">
                <input type="file" name="gambar_produk" id="gambar_produk" class="form-control">
            </div>

            <?php } ?>
            <button type="submit" name="submit" class="btn btn-primary" style="font-size: 15px; padding: 8px 10px;">Edit Menu</button>
            
                        </form>

                    </div>
                </div>
            </div>
    <!-- /.content -->
        </div>
    </div>
  <!-- /.content-wrapper -->