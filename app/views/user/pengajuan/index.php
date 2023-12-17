<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Pengajuan</h1>
                </div><!-- /.col -->
                <div class="col-sm-6 d-flex justify-content-end align-items-center">
                    
                <!-- <form class="d-flex" role="search">
                    <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-primary" type="submit">Search</button>
                </form> -->
                <!-- <ol class="breadcrumb ml-4 mr-3">
                    <li class="breadcrumb-item active"><a href="<?= BASEURL?>/Home_User">Home</a></li>
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
            <div class="row mb-2">
                <div class="col-sm-6">
                    <button type="button" class="btn" style="background: #F6E8C1;" data-toggle="modal" data-target="#exampleModal"
                        onclick="tambahdata()">
                        <i class="fa fa-plus mr-2"></i> Buat Pengajuan
                    </button>
                </div>
            </div>

            <!-- Tambahkan jarak antara tombol dan tabel -->
            <div class="mb-4"></div>

            <!-- Tabel -->
            <div class="container mb-2">
                <table id="example" class="table table-bordered">
                    <thead style="background: #F6E8C1">
                        <tr>
                            <th>ID</th>
                            <th>Nama Kategori</th>
                            <th>Nama Produk</th>
                            <th>Harga</th>
                            <th>Gambar</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    
                    <tbody>
                            <?php foreach ($data['dataPengajuan'] as $pengajuan) { ?>
                                <tr>
                                    <td><?php echo $pengajuan['id_pengajuan']; ?></td>
                                    <td><?php echo $pengajuan['nama_kategori']; ?></td>
                                    <td><?php echo $pengajuan['nama_produk']; ?></td>
                                    <td><?php echo $pengajuan['harga']; ?></td>
                                    <td><img style="width: 50px;" src="<?= BASEURL?>/img/produk/<?php echo $pengajuan['gambar_produk']; ?>"></td>
                                    <td><?php echo $pengajuan['status_pengajuan']; ?></td>
                                    <td>
                                    
                                        <button type="button" class="btn btn-primary" style="background: #1A2A46;" data-toggle="modal" data-target="#exampleModal" onclick="ubahdata(<?= $pengajuan['id_pengajuan']; ?>)">
                                            Edit
                                        </button>
                                        <button type="button" class="btn btn-secondary" style="padding: 5px 7px; font-size: 12px; margin-top: 15px;" data-toggle="modal" data-target="#exampleModal" onclick="hapusdata(<?= $pengajuan['id_pengajuan']; ?>)">
                                            Hapus
                                        </button>
                                    </td>
                                </tr>
                        
                        <?php } ?>
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
    function tambahdata() {
        $('.modal-title').html('Pengajuan');
        let url = '<?=BASEURL?>/Pengajuan_User/formTambah';
        
        // Set the initial value for "status_pengajuan" to 'on process'
        let initialData = { status_pengajuan: 'On Process' };

        $.post(url, initialData, function (data, success) {
            $('.modal-body').html(data);
        });
    }


    function ubahdata(x) {
        $('.modal-title').html('Ubah Data Pengajuan');
        let url = '<?=BASEURL?>/Pengajuan_User/formUbah';
        $.post(url, {
            id_pengajuan: x
        }, function (data, success) {
            $('.modal-body').html(data);
        });
    }

    function hapusdata(x) {
        $('.modal-title').html('Hapus Data Pengajuan');
        let url = '<?= BASEURL?>/Pengajuan_User/formHapus';
        $.post(url, {
            id_pengajuan: x
        }, function (data, success) {
            $('.modal-body').html(data);
            $('#hapusForm').attr('action', '<?= BASEURL?>/Pengajuan_User/prosesHapus/' + x);
        });
    }
</script>
