<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Home</h1>
            </div><!-- /.col -->
            <div class="col-sm-6 d-flex justify-content-end align-items-center">
                <div class="dropdown ml-4">
                    <button class="btn btn-secondary dropdown-toggle" type="button" data-toggle="dropdown" style="padding: 5px 7px; font-size: 12px; background: #3D72AA">
                        Kategori
                    </button>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="#">Semua</a></li>
                        <li><a class="dropdown-item" href="#">Makanan</a></li>
                        <li><a class="dropdown-item" href="#">Minuman</a></li>
                    </ul>
                </div>
                <ol class="breadcrumb ml-4 mr-3">
                    <li><a class="btn btn-warning" style="padding: 7px 9px; font-size: 15px;" href="#"><i class="fa fa-shopping-cart"></i> Keranjang</a></li>
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
        <table class="table table-bordered">
                    <thead class="table-info">
                        <tr>
                        <th scope="col">Pilih</th>
                        <th scope="col">Nama</th>
                        <th scope="col">Harga</th>
                        <th scope="col">Stok</th>
                        <th scope="col">Gambar</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                    foreach($data['data'] as $row){
                        echo "<tr>";
                        echo "<td>no</td>";
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
