<!-- Content Wrapper. Contains page content -->
    <!-- Main content -->
    <div class="content">
    <div class="container-fluid">
        
      <div class="row">
      <div class="modal-body">
                    <form action="<?= BASEURL?>/Pegawai_Admin/prosesTambah" method="POST" enctype="multipart/form-data">
                <div class="form-group">
                <label for="nama_user">Nama Pegawai:</label>
                <input type="text" name="nama_user" id="nama_user" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="jenis_kelamin">Jenis Kelamin:</label>
                <select name="jenis_kelamin" id="jenis_kelamin" class="form-control" required>
            <option></option>
                <option value="L">Laki-laki</option>
                <option value="P">Perempuan</option>
            </select>
            </div>
            <div class="form-group">
                <label for="alamat_pegawai">Alamat:</label>
                <input type="text" name="alamat_pegawai" id="alamat_pegawai" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="no_telp_pegawai">Nomor Telepon:</label>
                <input type="text" name="no_telp_pegawai" id="no_telp_pegawai" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="level">Jabatan:</label>
                <select name="level" id="level" class="form-control" required>
            <option></option>
                <option value="admin">Admin</option>
                <option value="user">Pegawai</option>
            </select>
            </div>
            <div class="form-group">
                <label for="username">Username:</label>
                <input type="text" name="username" id="username" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="password">Password:</label>
                <input type="text" name="password" id="password" class="form-control" required>
            </div>
            <button type="submit" name="submit" class="btn btn-primary" style="font-size: 15px; padding: 8px 10px;">Tambah Pegawai</button>
                        </form>

                    </div>
                </div>
            </div>
    <!-- /.content -->
        </div>
  <!-- /.content-wrapper -->