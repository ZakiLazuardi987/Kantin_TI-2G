<div class="content">
  <div class="container-fluid">
    <div class="modal-body">    
      <div class="row">
        <div class="card mx-auto" style="width: 400px; height: auto;">
          <ul class="list-group list-group-flush">
          <?php foreach ($data['detail'] as $item) { ?>
            <?php } ?>
            <li class="list-group-item d-flex justify-content-between lh-sm" style="background: #F6E8C1;">
            <div>
              <h6 class="my-0"><strong>Tanggal Transaksi</strong></h6>
              <small class="text-body-secondary">Id: <?= $item['id_transaksi']?></small>
              
            </div>
            <span class="text-body-secondary"><h6><?= $item['tgl_order']?></h6></span>
            </li>
            <li class="list-group-item d-flex justify-content-between lh-sm">
            <div>
              
            <h6 class="my-0"><strong>Nama</strong></h6>
              <small class="text-body-secondary" style="text-align: center;"><strong>Qty</strong></small>
            </div>
            
            <span class="text-body-secondary"><strong>Subtotal</strong></span>

            
            </li>
            <?php foreach ($data['detail'] as $item) { ?>
            <li class="list-group-item d-flex justify-content-between lh-sm">
            <div>
              <h6 class="my-0"><?= $item['nama_produk']?></h6>
              <small class="text-body-secondary" style="text-align: center;"><?= $item['qty']?></small>
              
            </div>
            
            <span class="text-body-secondary"><?= $item['subtotal']?></span>

            
            </li>
            <?php } ?>

            <li class="list-group-item d-flex justify-content-between lh-sm">
            <div>
              <h6 class="my-0"><strong>Total Qty</strong></h6>
              
            </div>
            <span class="text-body-secondary"><h6><strong><?= $item['total_qty']?></strong></h6></span>
            
            </li>

            <li class="list-group-item d-flex justify-content-between lh-sm" style="background: #F6E8C1;">
            <div>
              <h6 class="my-0 mb-2"><strong>Total Bayar</strong></h6>
              <h6 class="my-0 mb-2"><strong>Cash</strong></h6>
              <h6 class="my-0"><strong>Kembalian</strong></h6>
              
            </div>
            <div>
              <span class="text-body-secondary mb-2"><h6><strong><?= $item['total_bayar']?></strong></h6></span>
              <span class="text-body-secondary mb-2"><h6><strong><?= $item['nominal_bayar']?></strong></h6></span>
              <span class="text-body-secondary"><h6><strong><?= $item['kembalian']?></strong></h6></span>
            </div>
            
            
            </li>

          </ul>
        </div>
      </div>
    </div>
  </div>
</div>
