<!-- Main content -->
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="modal-body">
                <!-- Inside your form for stokTambah -->
                <form action="<?= BASEURL ?>/Stok_User/prosesTambah" method="post">
                    <!-- ... other form elements ... -->
                    <input type="hidden" name="id_produk" value="<?= $data['id_produk'] ?>">
                    <label for="stok_Tambah">Masukkan Jumlah Stok:</label>
                    <input type="text" name="stok_Tambah" id="stok_Tambah" class="form-control" autocomplete="off" required>
                    <button type="submit" name="submit" class="btn btn-primary" style="font-size: 15px; padding: 8px 10px;">Submit</button>
                    <!-- ... other form elements ... -->
                </form>
            </div>
        </div>
    </div>
    <!-- /.content -->
</div>