<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Data Pegawai</h1>
                </div><!-- /.col -->
                <div class="col-sm-6 d-flex justify-content-end align-items-center">
                    <ol class="breadcrumb ml-4 mr-3">
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
            <div class="row mb-2">
                <div class="col-sm-6">
                    <button type="button" class="btn btn-success" data-toggle="modal" data-target="#exampleModal"
                        onclick="tambahdata()">
                        <i class="fa fa-plus mr-2"></i> Tambah Pegawai
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
                            <th>Nama Pegawai</th>
                            <th>No Telp</th>
                            <th>Username</th>
                            <th>Level</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($dataPegawai as $pegawai) : ?>
                            <tr>
                                <td><?= $pegawai['id_user']; ?></td>
                                <td><?= $pegawai['nama_user']; ?></td>
                                <td><?= $pegawai['no_telp']; ?></td>
                                <td><?= $pegawai['username']; ?></td>
                                <td><?= $pegawai['level']; ?></td>
                                <td>
                                    <button type="button" class="btn btn-warning" onclick="ubahdata(<?= $pegawai['id_user']; ?>)">
                                        Edit
                                    </button>
                                    <button type="button" class="btn btn-danger" onclick="hapusdata(<?= $pegawai['id_user']; ?>)">
                                        Hapus
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
    function tambahdata() {
        $('.modal-title').html('Tambah Data Pegawai');
        let url = '<?=BASEURL?>/Pegawai_Admin/formTambah';
        $.post(url, function (data, success) {
            $('.modal-body').html(data);
        });
    }

    function ubahdata(x) {
        $('.modal-title').html('Ubah Data Pegawai');
        let url = '<?=BASEURL?>/Pegawai_Admin/formUbah';
        $.post(url, {
            id_user: x
        }, function (data, success) {
            $('.modal-body').html(data);
        });
    }

    function hapusdata(x) {
        $('.modal-title').html('Hapus Data Pegawai');
        $('.modal-body').html('Apakah Anda Yakin Akan Menghapus Data ini?');
        $('.tombol').html('<a href="<?= BASEURL?>/Pegawai_Admin/prosesHapus/' + x +
            '" class="btn btn-secondary" style="background: #A52222">Hapus</a>');
        $('#close').html('Batal');
    }
</script>
