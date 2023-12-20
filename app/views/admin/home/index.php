<?php
// Include model
require_once 'app/models/Dashboard_Model.php';

// Create model instance
$dashboardModel = new Dashboard_Model();

// Get data from the model
$totalProducts = $dashboardModel->getTotalProducts();
$totalStock = $dashboardModel->getTotalStock();
$lastSales = $dashboardModel->getLastSales();
$todayTransactions = $dashboardModel->getTodayTransactions();
?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Dashboard</h1>
            </div><!-- /.col -->
            <div class="col-sm-6 d-flex justify-content-end align-items-center">
                    <ol class="breadcrumb ml-4 mr-3">
                        <li class="breadcrumb-item active">Dashboard Admin</li>
                    </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>

    <!-- /.content-header -->

    <!-- Main content -->
    
      <div class="container-fluid">
      <!-- <main class="col-md-9 ms-sm-auto col-lg-12 px-md-4"> -->
                    <div class="row">
                        <div class="col-sm-6">
                        <div class="info-box">
                            <span class="info-box-icon elevation-1" style="background: #F6E8C1"><i class="fas fa-box"></i></span>

                            <div class="info-box-content">
                                <span class="info-box-text"><strong>Produk</strong></span>
                                <span class="info-box-number">
                                
                                <small>Total Produk sebanyak <?= $totalProducts['jumlah_produk']; ?> produk.</small>
                                </span>
                            </div>
                                <!-- /.info-box-content -->
                        </div>
                        </div>

                        <div class="col-sm-6">
                        <div class="info-box">
                            <span class="info-box-icon elevation-1" style="background: #F6E8C1"><i class="fas fa-warehouse"></i></span>

                            <div class="info-box-content">
                                <span class="info-box-text"><strong>Stok</strong></span>
                                <span class="info-box-number">
                                
                                <small>Total Stok Keseluruhan sebanyak <?= $totalStock['jumlah_stok']; ?> item.</small>
                                </span>
                            </div>
                                <!-- /.info-box-content -->
                        </div>
                        </div>

                        <div class="col-sm-6">
                        <div class="info-box">
                            <span class="info-box-icon elevation-1" style="background: #F6E8C1"><i class="fas fa-cart-plus"></i></span>

                            <div class="info-box-content">
                                <span class="info-box-text"><strong>Penjualan</strong></span>
                                <span class="info-box-number">
        
                                <small>Total Penjualan terakhir sebesar Rp. <?= number_format($lastSales['total_sales'], 2); ?>.</small>
                                </span>
                            </div>
                                <!-- /.info-box-content -->
                        </div>

                        </div>

                        <div class="col-sm-6">
                        <div class="info-box">
                            <span class="info-box-icon elevation-1" style="background: #F6E8C1"><i class="fas fa-exchange-alt"></i></span>

                            <div class="info-box-content">
                                <span class="info-box-text"><strong>Transaksi</strong></span>
                                <span class="info-box-number">
                                
                                <small>Total Transaksi hari ini sebanyak <?= $todayTransactions['jumlah_transaksi']; ?> transaksi.</small>
                                </span>
                            </div>
                                <!-- /.info-box-content -->
                        </div>
                        </div>
                    
                    </div>
                    <div class="row mt-2">
                    <div class="col-sm-6">
                    <h4 class="m-0" style="color: #333f57;"><em>Top 5 Produk Terlaris</em></h4>
                    </div>
                    </div>
                    <div class="row mt-2" id="produkContainer">
          <?php
          foreach($data['dataTop'] as $produk) { ?>
          <div class="card card-spacing" style="border-radius: 10px; box-shadow: 2px 2px 5px rgba(0, 0, 0, 0.2);">
          <img src="<?= BASEURL ?>/img/produk/<?php echo $produk['gambar_produk']; ?>" class="card-img-top" alt="...">
            <div class="card-body">
            <h5 class="card-title" style="text-transform: uppercase; overflow: hidden; text-overflow: ellipsis; white-space: nowrap;"><strong><?php echo $produk['nama_produk']; ?></strong></h5>
                <p class="card-text" style="margin-bottom: 5px;">Rp. <?php echo $produk['harga']; ?></p>
                <div class="d-flex justify-content-between align-items-center">
                  <p class="card-text">Stok: <?php echo $produk['stok']; ?></p>
                  <div>
                  <!-- <a href="<?= BASEURL?>/Produk_Admin/formUbah/<?php echo $produk['id_produk']; ?>" class="btn btn-primary"><i class="fa fa-edit"></i>Edit</a> -->
                  <!-- <button type="button" class="btn btn-primary" style="background: #1A2A46;" data-toggle="modal" data-target="#exampleModal" onclick="ubahdata('<?= $produk['id_produk']; ?>')"><i class="fa fa-edit"></i></button>
                  <button type="button" class="btn btn-secondary" style="padding: 5px 7px; font-size: 12px; margin-top: 15px;" data-toggle="modal" data-target="#exampleModal" onclick="hapusdata('<?= $produk['id_produk']; ?>')"><i class="fa fa-trash"></i></button> -->
                    <!-- <a href="Produk_Admin/prosesHapus?action=delete&id_produk=<?php echo $produk['id_produk']; ?>" class="btn btn-danger"><i class="fa fa-trash"></i>Hapus</a> -->

                  </div>
                </div>
            </div>
                            
          </div>
          <?php } ?>
        </div>
                <!-- </main> -->

        
    </div>
</div>
  <!-- /.content-wrapper -->
<!-- Modal -->
