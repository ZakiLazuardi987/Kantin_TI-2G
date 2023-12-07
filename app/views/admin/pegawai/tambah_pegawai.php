<!-- Content Wrapper. Contains page content -->
    <!-- Main content -->
    <div class="content">
    <div class="container-fluid">
        
      <div class="row">
      <div class="modal-body">
                    <form action="<?= BASEURL?>/Pegawai_Admin/prosesTambah" method="POST" enctype="multipart/form-data">
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
                <label for="alamat">Alamat:</label>
                <input type="text" name="nama_pegawai" id="nama_pegawai" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="no_telepon">Nomor Telepon:</label>
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
                <label for="username">Username:</label>
                <input type="text" name="nama_pegawai" id="nama_pegawai" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="password">Password:</label>
                <input type="text" name="harga" id="harga" class="form-control" required>
            </div>
            <button type="submit" name="submit" class="btn btn-primary" style="font-size: 15px; padding: 8px 10px;">Tambah Pegawai</button>
                        </form>

                    </div>
                </div>
            </div>
    <!-- /.content -->
        </div>
  <!-- /.content-wrapper -->