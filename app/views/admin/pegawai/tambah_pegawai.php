<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Tambah Pegawai</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?= BASEURL?>/Home_Admin">Home</a></li>
              <li class="breadcrumb-item active">Admin</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
        <div class="container">
        <h2>Bordered Table</h2>
        <p>The .table-bordered class adds borders on all sides of the table and the cells:</p>            
        <table class="table table-bordered">
            <thead>
            <tr>
                <th>Firstname</th>
                <th>Lastname</th>
                <th>Email</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td>John</td>
                <td>Doe</td>
                <td>john@example.com</td>
            </tr>
            <tr>
                <td>Mary</td>
                <td>Moe</td>
                <td>mary@example.com</td>
            </tr>
            <tr>
                <td>July</td>
                <td>Dooley</td>
                <td>july@example.com</td>
            </tr>
            </tbody>
        </table>
        </div> 
      <div class="row">
      <div class="modal-body">
                    <form action="<?= BASEURL?>/Produk_Admin/prosesTambah" method="POST" enctype="multipart/form-data">
            <div class="form-group">
                <label for="kategori">Pilih Kategori:</label>
                <select name="id_kategori" id="id_kategori" class="form-control" required>
                    <option></option>
                    <?php
                    foreach($data['kategori'] as $kategori){
                        echo "<option value='" . $kategori['id_kategori'] . "'>" . $kategori['nama_kategori'] . "</option>";
                    }
                    ?>
                </select>
                <div class="form-group">
                <label for="nama_pegawai">Nama Pegawai:</label>
                <input type="text" name="nama_pegawai" id="nama_pegawai" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="jenis_kelamin">Jenis Kelamin:</label>
                <select name="jenis_kelamin" id="jenis_kelamin" class="form-control" required>
            <option></option>
                <option value="laki-laki">Laki-laki</option>
                <option value="perempuan">Perempuan</option>
            </select>
            </div>
            <div class="form-group">
                <label for="nama_pegawai">Alamat:</label>
                <input type="text" name="nama_pegawai" id="nama_pegawai" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="harga">Nomor Telepon:</label>
                <input type="text" name="harga" id="harga" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="level">Level:</label>
                <select name="level" id="level" class="form-control" required>
            <option></option>
                <option value="admin">Admin</option>
                <option value="user">User</option>
            </select>
            </div>
            <div class="form-group">
                <label for="nama_pegawai">Username:</label>
                <input type="text" name="nama_pegawai" id="nama_pegawai" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="harga">Password:</label>
                <input type="text" name="harga" id="harga" class="form-control" required>
            </div>
            <button type="submit" name="submit" class="btn btn-primary" style="font-size: 15px; padding: 8px 10px;">Tambah Pegawai</button>
                        </form>

                    </div>
                </div>
            </div>
    <!-- /.content -->
        </div>
    </div>
  <!-- /.content-wrapper -->