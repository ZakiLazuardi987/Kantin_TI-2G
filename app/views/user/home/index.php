<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Home</h1>
                </div><!-- /.col -->
                <div class="col-sm-6 d-flex justify-content-end align-items-center">
                    <ol class="breadcrumb ml-4 mr-3">
                        <li class="breadcrumb-item active"><i class="fa fa-shopping-cart"></i> Transaksi User</li>
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
            <div class="col-lg-6">
              <?php Flasher::flash(); ?>
            </div>
      </div>
        <div class="row mb-5" style="background: #F6E8C1; border-radius: 10px; box-shadow: 2px 2px 5px rgba(0, 0, 0, 0.7);">
            <div class="col-lg-4 mt-2 mb-2">
                <div class="box box-widget">
                    <div class="box-body">
                    
                    <form action="<?= BASEURL?>/Home_User/addToCart" method="post">
                        <table width="100%">
                        <tr>
                        <!-- <input type="hidden" id="id_akun" value="<?= $_data['id_akun']?>"> -->

                                <td style="vertical-align: top;">
                                <label for="barcode">Tanggal</label>
                                </td>
                                <td>
                                    <div class="form-group input-group">
                                    <input type="date" id="tgl_order" name="tgl_order" class="form-control" style="width: 250px">

                                    </div>
                                </td>
                            </tr>
                            <tr>
                                
                                <td style="vertical-align: top;">
                                <label for="barcode">Produk</label>
                                </td>
                                <td>
                                    <div class="form-group input-group">
                                    <select class="form-control" id="id_produk" name="id_produk" required>
                                        <option></option>
                                        <?php
                                        foreach($data['data'] as $nama_produk){
                                            echo "<option value='" . $nama_produk['id_produk'] . "'>" . $nama_produk['nama_produk'] . "</option>";
                                        }
                                        ?>
                                    </select>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                
                                <td style="vertical-align: top;">
                                <label for="qty">Qty</label>
                                </td>
                                <td>
                                    <div class="form-group">
                                        <input type="number" id="qty" value="1" min="1" name="qty" class="form-control">
                                        


                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td></td>
                                <td>
                                    <button type="submit" name="submit" id="add-cart" class="btn mb-3" style="padding: 5px 7px; font-size: 12px; background: #1A2A46; color: white">
                                        <i class="fa fa-plus"> Tambah</i>

                                    </button>
                                </td>
                            
                            </tr>
                            
                        </table>
                        </form>
                       
                    </div>
                </div>
            </div>

            
                <div class="col-lg-8 mt-2 mb-2">
                    <div class="box box-widget">
                        <div class="box-body">
                            <div align="right">
                                <h4><strong>Total Pembayaran</strong></h4>
                                
                                        <?php
                                        $total = 0;
                                        foreach ($data['keranjang'] as $item) {
                                            $total += $item['qty'] * $item['harga'];
                                        }?>
                                        <h3>
                                        <span id="total" data-total="<?= $total ?>" style="font-size: 40pt; color: #1A2A46;">
                                            <?php echo 'Rp. ' . $total; ?>
                                        </span>
                                    </h3>

                            </div>
                        </div>

                    </div>
                </div>

                <div class="col-lg-12 mt-3 mb-2">
                    <div class="box box-widget">
                        <div class="box-body table-responsive">
                            <table class="table table-bordered">
                                <thead style="background: #333f57">
                                    <tr>
                                        <th id="tabel-trans">Nama Produk</th>
                                        <th id="tabel-trans">Qty</th>
                                        <th id="tabel-trans">Harga</th>
                                        <th id="tabel-trans">Subtotal</th>
                                        <th id="tabel-trans">Action</th>
                                    </tr>
                                </thead>
                                <tbody id="cart-table" style="background: white">
                                    <?php foreach ($data['keranjang'] as $item) : ?>
                                        <tr>
                                            <td><?= $item['nama_produk'] ?></td>
                                            <td><?= $item['qty'] ?></td>
                                            <td><?= $item['harga'] ?></td>
                                            <td><?= $item['qty'] * $item['harga'] ?></td>
                                            <form action="<?= BASEURL?>/Home_User/deleteCart" method="post">
                                                <input type="hidden" name="id_keranjang" value="<?= $item['id_keranjang'] ?>">
                                                <td><button type="submit" class="btn btn-success" style="background: #1A2A46; margin: auto; padding: 5px 6px; font-size: 12px;">Hapus</button></td>
                                            </form>
                                        </tr>
                                    <?php endforeach ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 mt-2 mb-2">
                <div class="box box-widget">
                    <div class="box-body">
                        <h3><strong>Pembayaran</strong></h3>
                        <table width="100%">
                        <tr>
                        

                        <td style="vertical-align: top;">
                                <label for="cashAmount">Nominal</label>
                                </td>
                                    </tr>
                                    <tr>
                                <td>
                                    <div class="form-group">
                                    <input type="text" class="form-control" id="cashAmount" required>
                                    </div>
                                </td>
                                <td>
                                <button class="btn" style="background: #333f57; padding: 5px 7px; font-size: 15px; color: white;" onclick="hitungKembalian()">Kembalian</button>
                                <p id="kembalian"></p>
                                        
                                </td>
                                    </tr>
                
                        <form action="<?= BASEURL?>/Home_User/prosesTransaksi" method="post">
                    <?php foreach($data['keranjang'] as $item) { ?>
                        <input type="hidden" name="keranjang[<?= $item['id_keranjang'] ?>][id_keranjang]" value="<?= $item['id_keranjang'] ?>"> <!-- Menambahkan input id_keranjang -->
                        <input type="hidden" name="keranjang[<?= $item['id_keranjang'] ?>][id_produk]" value="<?= $item['id_produk'] ?>">
                        <input type="hidden" name="keranjang[<?= $item['id_keranjang'] ?>][tgl_order]" value="<?= $item['tgl_order'] ?>">
                        <input type="hidden" name="keranjang[<?= $item['id_keranjang'] ?>][qty]" value="<?= $item['qty'] ?>">
                    <?php } ?>
                    <input type="hidden" name="total_pembayaran" id="total_pembayaran"> 
                    <input type="hidden" name="cashAmount" id="cashAmountInput">
                    <input type="hidden" name="kembalian" id="kembalian">
                        <tr>
                            
                                <td>
                                <button type="submit" name="submit" id="selesai" class="btn" onclick="validatePayment()" style="padding: 5px 7px; font-size: 12px; background: #F9CC41">
                                        <i class="fa fa-credit-card"> Bayar</i>

                                    </button>
                                </td>
                            </tr>
                            </form>
                        </table>
                    
                    </div>
                </div>
            </div>
            </div>
            


        </div>

    </div>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
<!-- Modal -->
<script>
    // In your Javascript (external .js resource or <script> tag)
$(document).ready(function() {
    $('#id_produk').select2();
});

// // Fungsi untuk validasi stok
// function validateStock() {
//     // Mendapatkan nilai qty yang diinputkan
//     let inputQty = parseInt(document.getElementById('qty').value);

//     // Mendapatkan nilai stok produk terpilih dari opsi select
//     let selectedProductIndex = document.getElementById('id_produk').selectedIndex;
//     let selectedProductStock = <?= json_encode($data['data']) ?>[selectedProductIndex]['stok']; // Mengganti 'stok' dengan kunci yang benar di dalam $data['data']

//     // Memeriksa apakah qty yang dimasukkan melebihi stok yang tersedia
//     if (inputQty > selectedProductStock) {
//         alert('Stok produk tidak mencukupi. Mohon masukkan jumlah yang lebih kecil.');
//         document.getElementById('qty').value = selectedProductStock; // Mengatur nilai qty menjadi stok yang tersedia
//     }
// }


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
    return kembalian;
}

// $(document).ready(function() {
//     $('#selesai').on('click', function() {
//         console.log("Tombol 'Selesai' diklik"); // Pastikan fungsi dijalankan

//         // Simpan data keranjang yang ada ke database sebelum mereset tampilan
//         $.ajax({
//             type: 'POST',
//             url: '<?= BASEURL?>/Home_User/addToCart', // Ganti dengan URL yang sesuai
//             data: {
//                 keranjang: <?php echo json_encode($data['keranjang']); ?> // Kirim data keranjang ke server
//             },
//             success: function(response) {
//                 console.log('Data keranjang berhasil disimpan ke database:', response);
//                 //validatePayment();
//                 resetDOM(); // Setelah disimpan, reset tampilan DOM
//             },
//             error: function(xhr, status, error) {
//                 console.error('Gagal menyimpan data ke database:', error);
//             }
//         });
//     });
// });

// function reset(){
//     let url = '<?=BASEURL?>/Home_User/reset';
//         $.post(url, function (success) {
//     });
// }

// // Mengosongkan tabel dan mereset total pembayaran
// function resetDOM() {
//     $('#cart-table tbody').empty(); // Menghapus semua baris dari tabel
//     document.getElementById('total').innerText = 'Rp. 0'; // Atur total pembayaran menjadi 0
// }

function validatePayment() {
    let cashAmount = document.getElementById('cashAmount').value;
    let totalPembayaran = document.getElementById('total').getAttribute('data-total');
    let kembalian = hitungKembalian();

    document.getElementById('total_pembayaran').value = totalPembayaran;
    document.getElementById('cashAmountInput').value = cashAmount;
    document.getElementById('kembalian').value = kembalian;

    if (cashAmount === '') {
        alert('Mohon masukkan jumlah nominal untuk menyelesaikan transaksi.');
        return false;
    }

    alert('Terimakasih!! Proses Transaksi Sudah Selesai.');

    return true;
    
}


    // Mendapatkan elemen input tanggal
    const inputTanggal = document.getElementById('tgl_order');

    // Mendapatkan tanggal hari ini dalam format YYYY-MM-DD
    const today = new Date().toISOString().split('T')[0];

    // Mengatur nilai input tanggal menjadi tanggal hari ini
    inputTanggal.value = today;
</script>