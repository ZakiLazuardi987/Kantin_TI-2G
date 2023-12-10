<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Home</h1>
            </div><!-- /.col -->
            <div class="col-sm-6 d-flex justify-content-end align-items-center">
            <form class="d-flex" role="search">
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-primary" type="submit">Search</button>
      </form>
                <div class="dropdown ml-4">
                    <button class="btn btn-secondary dropdown-toggle" type="button" data-toggle="dropdown" style="padding: 5px 7px; font-size: 12px; background: #F9CC41; color: black;">
                        Kategori
                    </button>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="#">Semua</a></li>
                        <li><a class="dropdown-item" href="#">Makanan</a></li>
                        <li><a class="dropdown-item" href="#">Minuman</a></li>
                    </ul>
                </div>
                <ol class="breadcrumb ml-4 mr-3">
                    <li><button type="button" class="btn" style="padding: 4px 4px; font-size: 12px; background: #F6E8C1; color: black;" data-toggle="modal" data-target="#exampleModal" onclick="transaksi()"><strong>Checkout</strong><i class="fa fa-cart-plus"></i></button></li>
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
            <div class="col-sm-2">
                <input class="form-control me-2" type="date" id="tanggal" placeholder="Tanggal" aria-label="Tanggal">
            </div>
        </div>
        <div class="row mb-2">
           
        <table class="table table-bordered">
                    <thead style="background: #F6E8C1;">
                        <tr>
                        <th>Pilih</th>
                        <th>Nama</th>
                        <th>Harga</th>
                        <th>Stok</th>
                        <th>Gambar</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                    foreach($data['data'] as $row){
                        echo "<tr>";
                        echo "<td><input type='checkbox' name='id_produk'></td>";
                        echo "<td>" . $row['nama_produk'] . "</td>";
                        echo "<td>" . $row['harga'] . "</td>";
                        echo "<td>" . $row['stok'] . "</td>";
                        echo "<td><img style='width: 50px;' src='" . BASEURL . "/img/produk/" . $row['gambar_produk'] . "'></td>";
                        echo "</tr>";
                    }
                    ?>
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
    function transaksi(){
        $('.modal-title').html('Transaksi');
        let url = '<?=BASEURL?>/Home_User/formTransaksi';
        $.post(url, function(data, success){
            $('.modal-body').html(data);
        });
        $('.tombol').html('<a href="#" class="btn btn-secondary" style="background: #0595F7">Reset</a>');
    }

    
    // Mendapatkan elemen input tanggal
    const inputTanggal = document.getElementById('tanggal');

    // Mendapatkan tanggal hari ini dalam format YYYY-MM-DD
    const today = new Date().toISOString().split('T')[0];

    // Mengatur nilai input tanggal menjadi tanggal hari ini
    inputTanggal.value = today;

</script>

