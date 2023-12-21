
    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
        
      <div class="row">
      <div class="modal-body">
                    <form action="<?= BASEURL?>/Produk_Admin/prosesTambah" method="POST" enctype="multipart/form-data">
            <div class="form-group">
                <label for="kategori">Pilih Kategori:</label>
                <select name="id_kategori" id="id_kategori" class="form-control" required>
                    <option></option>
                    <?php
                    foreach($data['kategori'] as $kategori){
                        echo "<option value='" . $kategori['id_kategori'] . "'>" . $kategori['nama_kategori'] . "</option>";
                    }
                    ?>
                </select>
            </div>
            <div class="form-group">
                <label for="nama_produk">Nama Produk:</label>
                <input type="text" name="nama_produk" id="nama_produk" class="form-control" autocomplete="off" required>
            </div>
            <div class="form-group">
                <label for="harga">Harga:</label>
                <input type="text" name="harga" id="harga" class="form-control" autocomplete="off" required>
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
                </div>
            </div>
    <!-- /.content -->
        </div>
  



