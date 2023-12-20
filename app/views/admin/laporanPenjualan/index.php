<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Data Laporan Penjualan</h1>
                </div><!-- /.col -->
                <div class="col-sm-6 d-flex justify-content-end align-items-center">
                <form method="post" action="<?= BASEURL ?>/History_User">
                        <div class="input-group">
                            <input name="tanggal" class="form-control me-2" type="date" placeholder="Tanggal" aria-label="Tanggal">
                            <button type="submit" name="filter" class="btn btn-primary" style="margin-left: 2px; margin: auto; padding: 5px 6px; font-size: 12px;"><strong>Filter</strong></button>
                        </div>
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
            <div class="row mb-2" style="background: white; border-radius: 10px; box-shadow: 2px 2px 5px rgba(0, 0, 0, 1.0);">
                <div class="col-lg-12 mt-2">
                <div class="box box-widget">
                    <div class="box-body">
                    <table class="table table-striped">
                    <thead style="background: white">
                    <tr>
                            <th>Tanggal</th>
                            <th>Jumlah Transaksi</th>
                            <th>Total Produk Terjual</th>
                            <th>Total Penjualan</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                        // Check if 'data' key exists and is not null
                        if (isset($data['data']) && is_array($data['data'])) {
                            foreach ($data['data'] as $item) :
                        ?>
                            <tr>
                                <td><?= $item['Tanggal'] ?></td>
                                <td><?= $item['Jumlah Transaksi'] ?></td>
                                <td><?= $item['Total Produk Terjual'] ?></td>
                                <td><?= $item['Total Penjualan'] ?></td>
                                <td>
                                    <button type="button" class="btn btn-success" data-toggle="modal" data-target="#exampleModal" onclick="detail('<?= $item['Tanggal'] ?>')" style="background: #1A2A46; margin: auto; padding: 5px 6px; font-size: 12px;">
                                        Lihat Detail
                                    </button>
                                </td>
                            </tr>
                        <?php
                            endforeach;
                        } else {
                            // Handle the case when 'data' key is not set or is null
                            echo '<tr><td colspan="5">No data available</td></tr>';
                        }
                    ?>
                    </tbody>
                </table>
                    </div>
                </div>
                </div>
            </div>
    </div>

            <!-- Tabel -->
            
        <!-- /.content -->
    </div>
</div>
<!-- /.content-wrapper -->

<!-- Modal -->

<script>
    function detail(x) {
        
        $('.modal-title').html('Detail Laporan Penjualan');

        // Assuming you have a route in your controller to handle fetching details based on the date
        let url = '<?=BASEURL?>/Laporan_Admin/detail'
        $.post(url,
        {
        tanggal : x
        }, function(data, success) {
            $('.modal-body').html(data);
        });
    }
</script>

