<div class="content">
    <div class="container-fluid">
        <div class="modal-body">
            <div class="row">
                <!-- <div class="modal-body"> -->
                <!-- <div class="col-md-6"> -->

                <!-- <div class="col-md-6 ml-1"> -->
                <div class="card mx-auto" style="width: 400px; height: 200px; background: #F6E8C1; border-radius: 10px; box-shadow: 2px 2px 5px rgba(0, 0, 0, 0.2);">
                    <!-- <div class="card-header" style="background: #F6E8C1;"><strong>METODE PEMBAYARAN</strong></div> -->
                    <div class="card-body">
                        <label for="cashAmount" class="mr-2">Jumlah Nominal:</label>
                        <input type="text" class="form-control" id="cashAmount">

                        <div class="d-flex justify-content-between lh-sm">
                            <div>
                                <label for="cashAmount" class="mr-2 mt-2">Kembali:</label>
                                <p id="kembalian"></p>
                            </div>
                            <span><button class="btn btn-primary btn-sm mt-2" style="background: #333f57; padding: 5px 6px; font-size: 12px; color: white;" onclick="hitungKembalian()">Hitung</button></span>
                        </div>
                    </div>


                </div>
            </div>
        </div>
        <form action="<?= BASEURL?>/Home_User/prosesTransaksi" method="post" onsubmit="return validatePayment()">
            <?php foreach($data['keranjang'] as $item) { ?>
                <input type="hidden" name="id_keranjang" value="<?= $item['id_keranjang'] ?>">
                <input type="hidden" name="id_produk" value="<?= $item['id_produk'] ?>">
                <input type="hidden" name="tgl_order" value="<?= $item['tgl_order'] ?>">
                <input type="hidden" name="qty" value="<?= $item['qty'] ?>">
           <?php } ?>
           <input type="hidden" name="total_pembayaran" id="total_pembayaran">
            
            <button type="submit" name="submit" class="btn btn-warning d-block mx-auto mb-3" style="font-size: 12px; padding: 7px 9px; background: #F9CC41;"><strong>TRANSAKSI SELESAI</strong></button>
        </form>
    </div>
</div>


<script>
    // Function to calculate change
    function hitungKembalian() {
    const totalElement = document.getElementById('total');
    const totalData = totalElement.dataset.total;
    const total = parseFloat(totalData);

    const cashInput = document.getElementById('cashAmount').value;
    const cash = parseFloat(cashInput);

    console.log('Nilai cash:', cash); // Cetak nilai cash ke konsol
    console.log('Nilai total:', total); // Cetak nilai total ke konsol

    const kembalian = cash - total;

    if (kembalian < 0) {
        alert('Jumlah nominal yang dimasukkan kurang.');
        return;
    }

    document.getElementById('kembalian').innerText = `Rp ${kembalian}`;
}
 
function validatePayment() {
    let cashAmount = document.getElementById('cashAmount').value;
    let totalPembayaran = document.getElementById('total').getAttribute('data-total');

    document.getElementById('total_pembayaran').value = totalPembayaran;

    if (cashAmount === '') {
        alert('Mohon masukkan jumlah nominal untuk menyelesaikan transaksi.');
        return false;
    }

    // Reset data tabel ke default
    resetTable();
    // Reset nilai total pembayaran
    resetTotal();

    alert('Terimakasih!! Proses Transaksi Sudah Selesai.');

    return true;
}

function resetTable() {
    const cartTable = document.getElementById('cart-table');
    cartTable.innerHTML = ''; // Mengosongkan isi tabel
}

function resetTotal() {
    const totalElement = document.getElementById('total');
    totalElement.innerText = 'Rp. 0'; // Set nilai total ke nol
}

</script>