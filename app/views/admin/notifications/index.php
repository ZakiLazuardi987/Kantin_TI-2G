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
        <div class="row mb-2">
            <div class="col-lg-6">
              <?php Flasher::flash(); ?>
            </div>
      </div>
            <div class="row" style="background: white; border-radius: 10px; box-shadow: 2px 2px 5px rgba(0, 0, 0, 0.5);">
                <div class="col-lg-12 mt-2">
                <div class="box box-widget">
                    <div class="box-body">
                        
                        <h4 align="center" style="color: #333f57; margin-bottom: 8px;"><b>Data Pengajuan Masuk</b></h4>
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
                    <?php if (!empty($data['pengajuanMasuk'])) : ?>
                        <?php foreach ($data['pengajuanMasuk'] as $pengajuan) : ?>
                            <tr class= "ini">
                                <td><?php echo $pengajuan['id_pengajuan']; ?></td>
                                <td><?php echo $pengajuan['nama_kategori']; ?></td>
                                <td><?php echo $pengajuan['nama_produk']; ?></td>
                                <td><?php echo $pengajuan['harga']; ?></td>
                                <td><img style="width: 100px;" src="<?= BASEURL?>/app/img/pengajuan/<?php echo $pengajuan['gambar_produk']; ?>"></td>
                                <td>
                                <form action="<?= BASEURL?>/Notifications_Admin/prosesPengajuan" method="post">
                                <input type="hidden" name="id_pengajuan" value="<?php echo $pengajuan['id_pengajuan']; ?>">
                                <button type="submit" name="acc" class="statusButton btn btn-primary" style="background: #1A2A46;"><i class="fas fa-check"></i>ACC</button>                                    
                                <button type="submit" name="tolak" class="statusButton btn btn-secondary" style="padding: 5px 7px; font-size: 12px; margin-top: 15px;"><i class="fas fa-times"></i>TOLAK</button>
                                </form>
                                </td>
                            </tr>
                            <?php endforeach; ?>
                        <?php else : ?>
                            <!-- Penanganan jika $data['pengajuanMasuk'] tidak terdefinisi atau tidak berupa array -->
                            <tr>
                                <td colspan="6" align="center">Data pengajuan tidak tersedia.</td>
                            </tr>
                            
                        <?php endif; ?>
                    </tbody>
                        
                </table>
                            </div>
                                <!-- /.info-box-content -->
                                <!-- onclick="addPengajuanToProduk('<?php echo $pengajuan['id_pengajuan']; ?>')" data-id="<?php echo $pengajuan['id_pengajuan']; ?>"-->
                        </div>
                </div>

            </div>

            <div class="row mt-3 mb-5" style="background: white; border-radius: 10px; box-shadow: 2px 2px 5px rgba(0, 0, 0, 0.5);">
                <div class="col-lg-12 mt-2">
                <div class="box box-widget">
                    <div class="box-body">
                    <h4 align="center" style="color: #333f57; margin-bottom: 8px;"><b>History Pengajuan</b></h4>
                    
                    <table id="example" class="table">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nama Kategori</th>
                            <th>Nama Produk</th>
                            <th>Harga</th>
                            <th>Gambar</th>
                            <th>Status</th>
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
                                <!-- <td>
                                <button class="statusButton btn btn-primary" style="background: #1A2A46;" onclick="addPengajuanToProduk('<?php echo $pengajuan['id_pengajuan']; ?>')"><i class="fas fa-check"></i>ACC</button>                                    
                                <button class="statusButton btn btn-secondary" style="padding: 5px 7px; font-size: 12px; margin-top: 15px;" data-id="<?php echo $pengajuan['id_pengajuan']; ?>"><i class="fas fa-times"></i>TOLAK</button>
                                </td> -->
                                <td><?php echo $pengajuan['status_pengajuan']; ?></td>
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
           
    </div>

</div>
<!-- /.content-wrapper -->
<script>
    function ubahdata(x){
    let url = '<?=BASEURL?>/Notifications_Admin/prosesPengajuan';
    $.post(url,
    {
      id_pengajuan : x
    }, function(data, success){
      $('.modal-body').html(data);
    });
  }

    function addPengajuanToProduk(x) {
        let url = '<?=BASEURL?>/Notifications_Admin/addFromPengajuan';
        $.post(url, {id_pengajuan: x}, function (dataPengajuan, success) {
            accPengajuan(x);
        });
    }

    function accPengajuan(x){
        let url = '<?=BASEURL?>/Notifications_Admin/acc';
        $.post(url, {id_pengajuan: x}, function (dataPengajuan, success) {
            alert("Data berhasil ditambahkan");
        });
    }

    function rejectPengajuan(x){
        let url = '<?=BASEURL?>/Notifications_Admin/tolak';
        $.post(url, {id_pengajuan: x}, function (dataPengajuan, success){
            alert("Data berhasil ditolak");
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