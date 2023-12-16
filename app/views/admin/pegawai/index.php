<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Data Pegawai</h1>
                </div><!-- /.col -->
                <div class="col-sm-6 d-flex justify-content-end align-items-center">
                <!-- <form class="d-flex" role="search">
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-primary" type="submit">Search</button>
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
            <div class="row mb-2">
                <div class="col-sm-6">
                    <button type="button" class="btn" style="background: #F6E8C1;" data-toggle="modal" data-target="#exampleModal"
                        onclick="tambahdata()">
                        <i class="fa fa-plus mr-2"></i> Tambah Pegawai
                    </button>
                </div>
            </div>

            <!-- Tambahkan jarak antara tombol dan tabel -->
            <div class="mb-4"></div>

            <!-- Tabel -->
            <div class="container mb-2">
                <table id="example" class="table table-bordered">
                    <thead style="background: #F6E8C1;">
                        <tr>
                            <th>ID</th>
                            <th>Nama</th>
                            <th>Jenis Kelamin</th>
                            <th>Alamat</th>
                            <th>No Telp</th>
                            <th>Username</th>
                            <th>Level</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($data['data'] as $pegawai) { ?>
                            <tr>
                                <td><?php echo $pegawai['id_user']; ?></td>
                                <td><?php echo $pegawai['nama_user']; ?></td>
                                <td><?php echo $pegawai['jenis_kelamin']; ?></td>
                                <td><?php echo $pegawai['alamat']; ?></td>
                                <td><?php echo $pegawai['no_telp']; ?></td>
                                <td><?php echo $pegawai['username']; ?></td>
                                <td><?php echo $pegawai['level']; ?></td>
                                <td>
                                    <button type="button" class="btn btn-primary" style="background: #1A2A46; margin: auto;" data-toggle="modal" data-target="#exampleModal" onclick="ubahdata('<?= $pegawai['id_user']; ?>')"><i class="fa fa-edit"></i></button>
                                    <button type="button" class="btn btn-secondary" style="padding: 5px 7px; font-size: 12px; margin: auto;" data-toggle="modal" data-target="#exampleModal" onclick="hapusdata('<?= $pegawai['id_user']; ?>')"><i class="fa fa-trash"></i></button>
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
            '" class="btn btn-secondary" style="background: #0595F7">Hapus</a>');
        $('#close').html('Batal');
    }
</script>
