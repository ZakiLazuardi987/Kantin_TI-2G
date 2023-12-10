<div class="content">
  <div class="container-fluid">
    <div class="modal-body">    
    <div class="row">
      <!-- <div class="modal-body"> -->
        <!-- <div class="col-md-6"> -->
        <div class="card mx-auto" style="width: 400px; height: 400px; overflow: auto;">
          <ul class="list-group list-group-flush">
            <li class="list-group-item d-flex justify-content-between lh-sm" style="background: #F6E8C1;">
            <div>
              <h5 class="my-0"><strong>TOTAL PEMBAYARAN</strong></h5>
              <!-- <small class="text-body-secondary">Brief description</small> -->
              
            </div>
            <span class="text-body-secondary"><h3>Rp 17.000</h3></span>
            </li>
            <li class="list-group-item d-flex justify-content-between lh-sm">
            <div>
              
            <h6 class="my-0"><strong>Nama</strong></h6>
              <small class="text-body-secondary" style="text-align: center;"><strong>Qty</strong></small>
            </div>
            
            <span class="text-body-secondary"><strong>Subtotal</strong></span>

            
            </li>
            <li class="list-group-item d-flex justify-content-between lh-sm">
            <div>
              <h6 class="my-0">risol mayo</h6>
              <span class="text-body-secondary"><input type="number" class="form-control form-control-sm" value="1" min="1"></span>
              
            </div>
            
            <span class="text-body-secondary">Rp 6.000</span>

            
            </li>
            <li class="list-group-item d-flex justify-content-between lh-sm">
            <div>
              <h6 class="my-0">Pop Mie Bakso</h6>
              <span class="text-body-secondary"><input type="number" class="form-control form-control-sm" value="1" min="1"></span>
              
            </div>
            
            <span class="text-body-secondary">Rp 7.000</span>

            
            </li>

            <li class="list-group-item d-flex justify-content-between lh-sm">
            <div>
              <h6 class="my-0">risol mayo</h6>
              <span class="text-body-secondary"><input type="number" class="form-control form-control-sm" value="1" min="1"></span>
            </div>
            <span class="text-body-secondary">Rp 6.000</span>
            </li>

            <li class="list-group-item d-flex justify-content-between lh-sm">
            <div>
              <h6 class="my-0">risol mayo</h6>
              <span class="text-body-secondary"><input type="number" class="form-control form-control-sm" value="1" min="1"></span>
            </div>
            <span class="text-body-secondary">Rp 6.000</span>
            </li>

            <li class="list-group-item d-flex justify-content-between lh-sm">
            <div>
              <h6 class="my-0">risol mayo</h6>
              <span class="text-body-secondary"><input type="number" class="form-control form-control-sm" value="1" min="1"></span>
            </div>
            <span class="text-body-secondary">Rp 6.000</span>
            </li>

            
            
          </ul>
        </div>
        <!-- </div> -->

        <!-- <div class="col-md-6 ml-1"> -->
        <div class="card mx-auto" style="width: 400px; height: 150px; overflow: auto;">
    <div class="card-header" style="background: #F6E8C1;"><strong>METODE PEMBAYARAN</strong></div>
    <div class="card-body">
        <div class="form-check">
            <input class="form-check-input" type="checkbox" value="cash" id="cashCheck">
            <label class="form-check-label" for="cashCheck">Cash</label>
            <div id="cashInput" style="display: none;">
            <label for="cashAmount" class="mr-2">Jumlah Nominal:</label>
                <input type="text" class="form-control form-control-sm mr-2" id="cashAmount" style="width: 80px;">
                <button class="btn btn-warning btn-sm" onclick="hitungKembalian()">Hitung Kembalian</button>
            <p id="kembalian"></p>
        </div>
        </div>
        <div class="form-check">
            <input class="form-check-input" type="checkbox" value="qrish" id="qrishCheck">
            <label class="form-check-label" for="qrishCheck" onclick="nominal()">QRish</label>
          
        </div>
        
    </div>
</div>
</div>
<button type="submit" name="submit" class="btn btn-warning d-block mx-auto" style="font-size: 12px; padding: 7px 9px;" onclick="return validatePayment()"><strong>TRANSAKSI SELESAI</strong></button>       
  </div>
</div>
</div>
</div>
  
<script>
    // Function to calculate change
    function hitungKembalian() {
        const total = 17000; // Ganti dengan total pembayaran yang sebenarnya
        const cash = document.getElementById('cashAmount').value;
        const kembalian = cash - total;
        document.getElementById('kembalian').innerText = `Kembalian: Rp ${kembalian}`;
    }
    
    // Mengatur perilaku checkbox
    document.getElementById('cashCheck').addEventListener('change', function() {
        const cashInput = document.getElementById('cashInput');
        if (this.checked) {
            cashInput.style.display = 'block';
            document.getElementById('qrishCheck').disabled = true;
        } else {
            cashInput.style.display = 'none';
            document.getElementById('qrishCheck').disabled = false;
        }
    });

    document.getElementById('qrishCheck').addEventListener('change', function() {
        if (this.checked) {
            const total = 17000; // Ganti dengan total pembayaran yang sebenarnya
            document.getElementById('cashAmount').value = total;
            document.getElementById('cashCheck').disabled = true;
        } else {
            document.getElementById('cashCheck').disabled = false;
        }
    });

    function validatePayment() {
    const cashChecked = document.getElementById('cashCheck').checked;
    const qrishChecked = document.getElementById('qrishCheck').checked;

    if (!(cashChecked || qrishChecked)) {
      alert('Harap pilih metode pembayaran sebelum menyelesaikan transaksi!');
      return false; // Mencegah pengiriman form jika tidak ada yang dipilih
    }

    return true; // Lanjutkan proses konfirmasi jika salah satu dipilih
  }
</script>

