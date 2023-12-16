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
                        <input type="number" class="form-control" id="cashAmount">

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
        <form action="/Kantin_TI-2G/Home_User/bayar" method="post" onsubmit="return validatePayment()">
            <input type="hidden" name="id_akun" value="<?= $_POST['id_akun'] ?>">
            <input type="hidden" name="tgl_order" value="<?= $_POST['tgl_order'] ?>">
            <button type="submit" class="btn btn-warning d-block mx-auto mb-3" style="font-size: 12px; padding: 7px 9px; background: #F9CC41;"><strong>TRANSAKSI SELESAI</strong></button>
        </form>
    </div>
</div>


<script>
    // Function to calculate change
    function hitungKembalian() {
        const total = <?= $_POST['totalPembayaran'] ?>; // Ganti dengan total pembayaran yang sebenarnya
        const cash = document.getElementById('cashAmount').value;
        const kembalian = cash - total;
        if (kembalian < 0) {
            alert('Jumlah nominal yang dimasukkan kurang.');
            return;
        }
        document.getElementById('kembalian').innerText = `Rp ${kembalian}`;
    }

    // Mengatur perilaku checkbox
    // document.getElementById('cashCheck').addEventListener('change', function() {
    //     const cashInput = document.getElementById('cashInput');
    //     if (this.checked) {
    //         cashInput.style.display = 'block';
    //         document.getElementById('qrishCheck').disabled = true;
    //     } else {
    //         cashInput.style.display = 'none';
    //         document.getElementById('qrishCheck').disabled = false;
    //     }
    // });

    // document.getElementById('qrishCheck').addEventListener('change', function() {
    //     if (this.checked) {
    //         const total = 17000; // Ganti dengan total pembayaran yang sebenarnya
    //         document.getElementById('cashAmount').value = total;
    //         document.getElementById('cashCheck').disabled = true;
    //     } else {
    //         document.getElementById('cashCheck').disabled = false;
    //     }
    // });

    function validatePayment() {
        // Ambil nilai dari input jumlah nominal
        let cashAmount = document.getElementById('cashAmount').value;

        // Periksa apakah nilai jumlah nominal kosong atau tidak
        if (cashAmount === '') {
            alert('Mohon masukkan jumlah nominal untuk menyelesaikan transaksi.');
            return false; // Hentikan transaksi jika jumlah nominal kosong
        }

        // Lanjutkan proses transaksi jika jumlah nominal diisi
        // Tambahkan proses transaksi lainnya di sini (jika ada)

        // Jika semua syarat terpenuhi, kembalikan true untuk melanjutkan transaksi
        return true;
    }
</script>