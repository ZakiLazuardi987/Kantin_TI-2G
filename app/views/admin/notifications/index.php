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
                                <button 
                                    class="btn btn-success statusButton" 
                                    data-toggle="modal" 
                                    data-target="#exampleModal" 
                                    data-id="<?= $pengajuan['id_pengajuan']; ?>" 
                                    style="background: #1A2A46; margin: auto; padding: 5px 6px; font-size: 12px;">
                                    <?= $pengajuan['status_pengajuan'] == 'Belum Dibaca' ? 'ACC' : 'Tidak Diacc'; ?>
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
    function updateStatus(idPengajuan, newStatus) {
        var button = document.querySelector('.statusButton[data-id="' + idPengajuan + '"]');
        var buttonText = button.innerText;

        // Change the button text and send an AJAX request to update the status on the server
        if (newStatus === "ACC") {
            button.innerText = "Tolak";
            button.style.background = "#8B929C";
            // Add logic to handle when the status is changed to "ACC"
        } else {
            button.innerText = "ACC";
            button.style.background = "#1A2A46";
            // Add logic to handle when the status is changed to "Tolak"
        }
    }

    document.addEventListener("DOMContentLoaded", function() {
        // Add event listener for the status buttons
        document.querySelectorAll('.statusButton').forEach(function(button) {
            button.addEventListener('click', function() {
                var idPengajuan = this.getAttribute('data-id');
                var newStatus = this.innerText === 'ACC' ? 'Tolak' : 'ACC';
                updateStatus(idPengajuan, newStatus);
            });
        });
    });

</script>

