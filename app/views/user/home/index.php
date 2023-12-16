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
        <div class="row mb-3" style="background: #F6E8C1; border-radius: 10px; box-shadow: 2px 2px 5px rgba(0, 0, 0, 0.2);">
            <div class="col-lg-4 mt-2 mb-2">
                <div class="box box-widget">
                    <div class="box-body">
                        <table width="100%">
                        <tr>
                                
                                <td style="vertical-align: top;">
                                <label for="barcode">Tanggal</label>
                                </td>
                                <td>
                                    <div class="form-group input-group">
                                    <input type="date" id="tanggal" class="form-control" style="width: 350px">

                                    </div>
                                </td>
                            </tr>
                            <tr>
                                
                                <td style="vertical-align: top;">
                                <label for="barcode">Produk</label>
                                </td>
                                <td>
                                    <div class="form-group input-group">
                                    <select class="form-control" id="select2" name="state" required>
                                        <option></option>
                                        <?php
                                        foreach($data['nama_produk'] as $nama_produk){
                                            echo "<option value='" . $nama_produk['nama_produk'] . "'>" . $nama_produk['nama_produk'] . "</option>";
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
                                        <input type="number" id="qty" value="1" min="1" class="form-control">

                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td></td>
                                <td>
                                    <button onclick="tambahProdukKeList()" type="button" id="add-cart" class="btn" style="padding: 5px 7px; font-size: 12px; background: #1A2A46; color: white">
                                        <i class="fa fa-plus"> Tambah</i>

                                    </button>
                                    <button type="button" id="add-cart" class="btn" data-toggle="modal" data-target="#exampleModal" onclick="bayar()" style="padding: 5px 7px; font-size: 12px; background: #F9CC41">
                                        <i class="fa fa-credit-card"> Bayar</i>

                                    </button>
                                </td>
                            
                            </tr>
                        </table>
                    </div>
                </div>
            </div>

            <div class="col-lg-8 mt-2 mb-2">
                <div class="box box-widget">
                    <div class="box-body">
                        <div align="right">
                            <h4><strong>Total Pembayaran</strong></h4>
                            <h3><span id="total" style="font-size: 40pt; color: #1A2A46;">Rp 10.000</span></h3>

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
                                    <tr>
                                        
                                    </tr>                                    
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

        </div>
        
        <!-- <div class ="row mt-3" style="background: #F6E8C1; border-radius: 10px; box-shadow: 2px 2px 5px rgba(0, 0, 0, 0.2);">
                <div class="col-lg-12 mt-2 mb-2">
                    <div class="box box-widget">
                        <div class="box-body table-responsive">
                            <table class="table table-bordered table-striped">
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
                                    <tr>
                                        <td colspan="9" class="text-center">Tidak ada item</td>
                                    </tr>

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div> -->

        </div>
        
      </div>
    <!-- /.content -->
</div>
  <!-- /.content-wrapper -->
<!-- Modal -->
<script>
    function tambahProdukKeList() {
        // Mendapatkan nilai produk yang dipilih dan kuantitasnya
        const selectedProduct = document.getElementById('select2').value;
        const quantity = document.getElementById('qty').value;

        // Mendapatkan tabel untuk menambahkan baris baru
        const cartTable = document.getElementById('cart-table');

        // Membuat baris baru dengan nilai yang dipilih
        const newRow = `
            <tr>
                <td>${selectedProduct}</td>
                <td>${quantity}</td>
                <!-- Menambahkan kolom lain sesuai kebutuhan -->
                <td>harga</td>
                <td>sub</td>
                <td>
                    <button type="button" class="btn btn-secondary" onclick="hapusItemDariList(this)">
                        <i class="fa fa-trash"></i>
                    </button>
                </td>
            </tr>
        `;

        // Menambahkan baris baru ke dalam tabel
        cartTable.innerHTML += newRow;
    }

    function hapusItemDariList(button) {
        // Hapus baris yang sesuai saat tombol hapus ditekan
        const row = button.closest('tr');
        row.remove();
    }


    // In your Javascript (external .js resource or <script> tag)
$(document).ready(function() {
    $('#select2').select2();
});

    function bayar(){
        $('.modal-title').html('Pembayaran');
        let url = '<?=BASEURL?>/Home_User/formBayar';
        $.post(url, function(data, success){
            $('.modal-body').html(data);
        });
        // $('.tombol').html('<a href="#" class="btn btn-secondary" style="background: #0595F7">Reset</a>');
    }

    
    // Mendapatkan elemen input tanggal
    const inputTanggal = document.getElementById('tanggal');

    // Mendapatkan tanggal hari ini dalam format YYYY-MM-DD
    const today = new Date().toISOString().split('T')[0];

    // Mengatur nilai input tanggal menjadi tanggal hari ini
    inputTanggal.value = today;

</script>

