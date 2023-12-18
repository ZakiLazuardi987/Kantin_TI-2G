<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Data Pengajuan</h1>
                </div><!-- /.col -->
                <div class="col-sm-6 d-flex justify-content-end align-items-center">
                <ol class="breadcrumb ml-2 mr-3">
                    <li><input class="form-control me-2" type="date" placeholder="Tanggal" aria-label="Tanggal"></li>
                </ol>
      <ol class="breadcrumb ml-2 mr-3">
                    <li><button type="button" class="btn btn-primary" style="margin-left: 2px; margin: auto; padding: 5px 6px; font-size: 12px;"><strong>Filter</strong></button></li>
                </ol>
                    <!-- <ol class="breadcrumb ml-4 mr-3">
                        <li class="breadcrumb-item active">Admin</li>
                    </ol> -->
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
        <div class="container-fluid">
            <!-- Tabel -->
            <div class="container">
                <table class="table table-bordered">
                    <thead style="background: #F6E8C1">
                        <tr>
                            <th>ID</th>
                            <th>Nama Kategori</th>
                            <th>Nama Produk</th>
                            <th>Harga</th>
                            <th>Gambar</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($data['dataPengajuan'] as $pengajuan) : ?>
                            <tr>
                                <td><?php echo $pengajuan['id_pengajuan']; ?></td>
                                <td><?php echo $pengajuan['nama_kategori']; ?></td>
                                <td><?php echo $pengajuan['nama_produk']; ?></td>
                                <td><?php echo $pengajuan['harga']; ?></td>
                                <td><img style="width: 50px;" src="<?= BASEURL?>/app/img/pengajuan/<?php echo $pengajuan['gambar_produk']; ?>"></td>
                                <td>
                                    <form method="post">
                                        <input type="hidden" name="pengajuanId" value="<?php echo $pengajuan['id_pengajuan']; ?>">
                                        <button type="submit" name="accButton" class="statusButton btn btn-success me-2">ACC</button>
                                    </form>
                                    <button class="statusButton btn btn-danger" data-id="<?php echo $pengajuan['id_pengajuan']; ?>">TOLAK</button>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
        <!-- /.content -->
    </div>

</div>
<!-- /.content-wrapper -->
<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['accButton'])) {
    // Get the pengajuan data from the database
    $id_pengajuan = $_POST['id_pengajuan'];
    $pengajuan = getPengajuanById($id_pengajuan);

    // Insert the pengajuan data into the produk table in the database
    $result = insertDataPengajuan($pengajuan['nama_produk'], $pengajuan['harga'], $pengajuan['gambar_produk']);

    // Display an alert if the operation is successful
    if ($result) {
        echo '<script>alert("Data pengajuan berhasil di-ACC dan ditambahkan ke dalam tabel produk!");</script>';
    }
}
?> 