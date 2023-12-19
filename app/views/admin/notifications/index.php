<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Data Pengajuan</h1>
                </div><!-- /.col -->
                <div class="col-sm-6 d-flex justify-content-end align-items-center">
                <!-- <form method="post" action="<?= BASEURL ?>/Notifications_Admin/index">
                <ol class="breadcrumb ml-2 mr-3">
                    <li><input class="form-control me-2" type="date" placeholder="Tanggal" aria-label="Tanggal"></li>
                </ol>
                <ol class="breadcrumb ml-2 mr-3">
                    <li><button type="button" class="btn btn-primary" style="margin-left: 2px; margin: auto; padding: 5px 6px; font-size: 12px;"><strong>Filter</strong></button></li>
                </ol>
                </form> -->
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
            <div class="row" style="background: white; border-radius: 10px; box-shadow: 2px 2px 5px rgba(0, 0, 0, 0.5);">
                <div class="col-lg-12 mt-2">
                <div class="box box-widget">
                    <div class="box-body">
                    <table class="table">
                    <thead>
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
                            <tr class= "ini">
                                <td><?php echo $pengajuan['id_pengajuan']; ?></td>
                                <td><?php echo $pengajuan['nama_kategori']; ?></td>
                                <td><?php echo $pengajuan['nama_produk']; ?></td>
                                <td><?php echo $pengajuan['harga']; ?></td>
                                <td><img style="width: 100px;" src="<?= BASEURL?>/app/img/pengajuan/<?php echo $pengajuan['gambar_produk']; ?>"></td>
                                <td>
                                <button class="statusButton btn btn-primary" style="background: #1A2A46;" onclick="addPengajuanToProduk('<?php echo $pengajuan['id_pengajuan']; ?>')"><i class="fas fa-check"></i>ACC</button>                                    
                                <button class="statusButton btn btn-secondary" style="padding: 5px 7px; font-size: 12px; margin-top: 15px;" data-id="<?php echo $pengajuan['id_pengajuan']; ?>"><i class="fas fa-times"></i>TOLAK</button>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
                            </div>
                                <!-- /.info-box-content -->
                        </div>
                </div>

            </div>
    </div>
            <!-- Tabel -->
            <!-- <div class="container">
                <table class="table">
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
                            <tr class= "ini">
                                <td><?php echo $pengajuan['id_pengajuan']; ?></td>
                                <td><?php echo $pengajuan['nama_kategori']; ?></td>
                                <td><?php echo $pengajuan['nama_produk']; ?></td>
                                <td><?php echo $pengajuan['harga']; ?></td>
                                <td><img style="width: 50px;" src="<?= BASEURL?>/app/img/pengajuan/<?php echo $pengajuan['gambar_produk']; ?>"></td>
                                <td>
                                <button class="statusButton btn btn-success me-2" onclick="addPengajuanToProduk('<?php echo $pengajuan['id_pengajuan']; ?>')">ACC</button>                                    
                                <button class="statusButton btn btn-danger" data-id="<?php echo $pengajuan['id_pengajuan']; ?>">TOLAK</button>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div> -->
        </div>
        <!-- /.content -->
    </div>

</div>
<!-- /.content-wrapper -->
<script>
    function addPengajuanToProduk(x) {
        let url = '<?=BASEURL?>/Notifications_Admin/addFromPengajuan';
        $.post(url, {id_pengajuan: x}, function (dataPengajuan, success) {
            alert("Data berhasil ditambahkan");
        });
    }

// function insertFromPengajuan(idPengajuan) {
//     // Panggil AJAX request untuk insert data pengajuan ke dalam tabel produk
//     $.ajax({
//         url: 'Notifications_Admin/insertDataPengajuan',
//         type: 'POST',
//         data: {
//             id_pengajuan: idPengajuan
//         },
//         success: function(response) {
//             // Handle the response if needed
//             console.log(response);
//             // Refresh the page or update the table as needed
//             location.reload(); // This will reload the current page
//         },
//         error: function(error) {
//             console.error("Error inserting data:", error);
//             // Handle the error as needed
//         }
//     });
// }
</script>