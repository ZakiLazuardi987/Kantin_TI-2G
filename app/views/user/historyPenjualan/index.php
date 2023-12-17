<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Data History Penjualan</h1>
                </div><!-- /.col -->
                <div class="col-sm-6 d-flex justify-content-end align-items-center">
                <form method="post" action="<?= BASEURL ?>/History_User/index">
                    <ol class="breadcrumb ml-2 mr-3">
                        <li><input name="tanggal" class="form-control me-2" type="date" placeholder="Tanggal" aria-label="Tanggal"></li>
                    </ol>
                    <ol class="breadcrumb ml-2 mr-3">
                        <li><button type="submit" name="filter" class="btn btn-primary" style="margin-left: 2px; margin: auto; padding: 5px 6px; font-size: 12px;"><strong>Filter</strong></button></li>
                    </ol>
                </form>

                <!-- <ol class="breadcrumb ml-1">
                    <li class="breadcrumb-item active"><a href="<?= BASEURL?>/Home_User">Home</a></li>
                </ol> -->
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
            <!-- <div class="row mb-2">
                <div class="col-sm-6">
                    <button type="button" class="btn btn-success" data-toggle="modal" data-target="#exampleModal"
                        onclick="tambahdata()">
                        <i class="fa fa-plus mr-2"></i> Tambah Pegawai
                    </button>
                </div>
            </div> -->


            <!-- Tabel -->
            <div class="container">
                <table class="table table-bordered">
                    <thead style="background: #F6E8C1">
                        <tr>
                            <th>ID</th>
                            <th>Tanggal</th>
                            <th>Total Qty</th>
                            <th>Total Bayar</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($data['data'] as $item) : ?>
                            <tr>
                                <td><?= $item['id_transaksi'] ?></td>
                                <td><?= $item['tgl_order'] ?></td>
                                <td><?= $item['total_qty'] ?></td>
                                <td><?= $item['total_bayar'] ?></td>
                                <td>
                                    <button type="button" class="btn btn-success" data-toggle="modal" data-target="#exampleModal" onclick="detail()" style="background: #1A2A46; margin: auto; padding: 5px 6px; font-size: 12px;">
                                        Lihat Detail
                                    </button>
                                    
                                </td>
                            </tr>
                            <?php endforeach ?>
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
    function detail(){
        $('.modal-title').html('Detail History Penjualan');
        let url = '<?=BASEURL?>/History_User/detail';
        $.post(url, function(data, success){
            $('.modal-body').html(data);
        });
        // $('.tombol').html('<a href="#" class="btn btn-secondary" style="background: #A52222">Reset</a>');
    }
</script>