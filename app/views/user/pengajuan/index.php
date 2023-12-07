<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Pengajuan</h1>
                </div><!-- /.col -->
                <div class="col-sm-6 d-flex justify-content-end align-items-center">
                <form class="d-flex" role="search">
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success" type="submit">Search</button>
      </form>
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
                <div class="col-sm-6">
                    <button type="button" class="btn btn-success" data-toggle="modal" data-target="#exampleModal"
                        onclick="tambahdata()">
                        <i class="fa fa-plus mr-2"></i> Buat Pengajuan
                    </button>
                </div>
            </div>

            <!-- Tambahkan jarak antara tombol dan tabel -->
            <div class="mb-4"></div>

            <!-- Tabel -->
            <div class="container">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nama Produk</th>
                            <th>Harga</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- <?php foreach ($dataPengajuan as $pengajuan) : ?> -->
                            <tr>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td>
                                    <button type="button" class="btn btn-warning" onclick="ubahdata(<?= $pengajuan['id_pengajuan']; ?>)">
                                        Edit
                                    </button>
                                    <button type="button" class="btn btn-danger" onclick="hapusdata(<?= $pengajuan['id_pengajuan']; ?>)">
                                        Hapus
                                    </button>
                                </td>
                            </tr>
                        <!-- <?php endforeach; ?> -->
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
        $('.modal-title').html('pengajuan');
        let url = '<?=BASEURL?>/Pengajuan_User/formTambah';
        $.post(url, function (data, success) {
            $('.modal-body').html(data);
        });
    }

    function ubahdata(x) {
        $('.modal-title').html('Ubah Data Pengajuan');
        let url = '<?=BASEURL?>/Pengajuan_User/formUbah';
        $.post(url, {
            id_user: x
        }, function (data, success) {
            $('.modal-body').html(data);
        });
    }

    function hapusdata(x) {
        $('.modal-title').html('Hapus Data Pengajuan');
        $('.modal-body').html('Apakah Anda Yakin Akan Menghapus Data ini?');
        $('.tombol').html('<a href="<?= BASEURL?>/Pengajuan_User/prosesHapus/' + x +
            '" class="btn btn-secondary" style="background: #A52222">Hapus</a>');
        $('#close').html('Batal');
    }
</script>