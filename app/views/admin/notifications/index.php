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
                                <td><img style="width: 50px;" src="<?= BASEURL?>/img/produk/<?php echo $pengajuan['gambar_produk']; ?>"></td>
                                <td>
                                    <button id="statusButton" type="button" class="btn btn-success" data-toggle="modal" data-target="#exampleModal" onclick="detail_notif()" style="background: #1A2A46; margin: auto; padding: 5px 6px; font-size: 12px;">
                                        <?= $pengajuan['status_pengajuan'] == 'Belum Dibaca' ? 'Belum Dibaca' : 'Sudah Dibaca'; ?>
                                    </button>
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

<!-- Modal -->

<script>

    function detail_notif() {
        $('.modal-title').html('Detail Data Pengajuan');
        let url = '<?=BASEURL?>/Notifications_Admin/notifications';
        $.post(url, function(data, success){
            $('.modal-body').html(data);
        });

    var button = document.getElementById('statusButton');
    var buttonText = button.innerText;

    if (buttonText === "Belum Dibaca") {
        button.innerText = "Sudah Dibaca";
        button.style.background = "#8B929C"; // Change to your desired color for 'Sudah Dibaca'
    } else {
        button.innerText = "Belum Dibaca";
        button.style.background = "#1A2A46"; // Change to your desired color for 'Belum Dibaca'
    }
    // Additional actions or logic as needed...

    document.addEventListener("DOMContentLoaded", function() {
    var status = localStorage.getItem('status');
    if (status === 'sudah dibaca') {
        var button = document.getElementById('statusButton');
        button.innerText = "sudah dibaca";
        button.style.background = "#8B929C"; // Change to your desired color for 'sudah dibaca'
    }
});
}


</script>
