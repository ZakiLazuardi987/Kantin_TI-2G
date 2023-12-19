<div class="content">
  <div class="container-fluid">
    <div class="modal-body">    
    <div class="row">
      <!-- <div class="modal-body"> -->
        <!-- <div class="col-md-6"> -->
        <div class="card mx-auto" style="width: 400px; height: auto;">
          <ul class="list-group list-group-flush">
            <li class="list-group-item d-flex justify-content-between lh-sm" style="background: #F6E8C1;">
            <div>
              <h6 class="my-0"><strong>Tanggal Transaksi</strong></h6>
              <small class="text-body-secondary">Jumlah Transaksi: 5</small>
              
            </div>
            <span class="text-body-secondary"><h6>23-12-2023</h6></span>
            </li>
            <!-- <li class="list-group-item d-flex justify-content-between lh-sm">
            <div>
              
            <h6 class="my-0"><strong>ID</strong></h6>
              <small class="text-body-secondary" style="text-align: center;"><strong>Qty</strong></small>
            </div>
            
            <span class="text-body-secondary"><strong>Subtotal</strong></span>

            
            </li> -->

            <li class="list-group-item d-flex justify-content-between lh-sm">
                <div>
                    <h6 class="my-0 mb-2">ID</h6>
                    <h6 class="my-0 mb-2">Total Qty</h6>
                    <h6 class="my-0">Total Bayar</h6>
                </div>
                <div>
              <!-- Assuming the relevant part of your existing code looks like this -->

              <!-- Line 36 -->
              <span class="text-body-secondary mb-2"><h6 align="right"><?= isset($data['transaksi']['id_transaksi']) ? $data['transaksi']['id_transaksi'] : 'N/A' ?></h6></span>
              <!-- Line 37 -->
              <span class="text-body-secondary mb-2"><h6 align="right"><?= isset($data['transaksi']['total_qty']) ? $data['transaksi']['total_qty'] : 'N/A' ?></h6></span>
              <!-- Line 38 -->
              <span class="text-body-secondary"><h6 align="right"><?= isset($data['transaksi']['total_bayar']) ? 'Rp. ' . number_format($data['transaksi']['total_bayar'], 0, ',', '.') : 'N/A' ?></h6></span>

              <!-- Add the provided code block after the existing code -->

            <?php
            // Check if the key "transaksi" exists in the $data array
            if (isset($data['transaksi']) && is_array($data['transaksi'])) {
                $transaksi = $data['transaksi'];

                // Now you can safely access the values without warnings
                $id_transaksi = $transaksi['id_transaksi'] ?? '';
                $total_qty = $transaksi['total_qty'] ?? '';
                $total_bayar = $transaksi['total_bayar'] ?? '';

                // Output the values
                echo 'ID Transaksi: ' . $id_transaksi . '<br>';
                echo 'Total Qty: ' . $total_qty . '<br>';
                echo 'Total Bayar: ' . $total_bayar;
            } else {
                echo 'No transaction data available.';
            }
            ?>

                </div>
            </li>

            <li class="list-group-item d-flex justify-content-between lh-sm" style="background: #F6E8C1;">
            <div>
              <h6 class="my-0 mb-2"><strong>Total Barang Terjual</strong></h6>
              <h6 class="my-0"><strong>Total Penjualan</strong></h6>
              
            </div>
            <div>
              <span class="text-body-secondary mb-2"><strong><h6 align="right">100</strong></h6></span>
              <span class="text-body-secondary"><strong><h6 align="right">Rp. 150.000</h6></strong></span>
            </div>
            
            
            </li>
          </ul>
        </div>
        <!-- </div> -->

        
  </div>
</div>
</div>
</div>
  


