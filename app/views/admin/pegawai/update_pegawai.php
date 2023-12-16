<!-- update_pegawai.php -->
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="modal-body">
                <form action="<?= BASEURL?>/Pegawai_Admin/prosesUbah" method="POST" enctype="multipart/form-data">
                    <?php foreach ($data['ubahdata'] as $ubah) { ?>
                        <div class="form-group">
                            <input type="hidden" name="id_user" value="<?php echo $ubah['id_user']; ?>">
                            <label for="nama_user">Nama:</label>
                            <input type="text" name="nama_user" id="nama_user" class="form-control" value="<?php echo $ubah['nama_user']; ?>">
                        </div>
                        <div class="form-group">
                            <label for="jenis_kelamin">Jenis Kelamin:</label>
                            <select name="jenis_kelamin" id="jenis_kelamin" class="form-control" required>
                                <option value="L" <?php echo ($ubah['jenis_kelamin'] == 'L') ? 'selected' : ''; ?>>Laki-laki</option>
                                <option value="P" <?php echo ($ubah['jenis_kelamin'] == 'P') ? 'selected' : ''; ?>>Perempuan</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="alamat_pegawai">Alamat:</label>
                            <input type="text" name="alamat_pegawai" id="alamat_pegawai" class="form-control" value="<?php echo $ubah['alamat']; ?>">
                        </div>
                        <div class="form-group">
                            <label for="no_telp_pegawai">Nomor Telepon:</label>
                            <input type="text" name="no_telp_pegawai" id="no_telp_pegawai" class="form-control" value="<?php echo $ubah['no_telp']; ?>">
                        </div>
                        <div class="form-group">
                            <label for="level">Jabatan:</label>
                            <select name="level" id="level" class="form-control" required>
                                <option value="admin" <?php echo ($ubah['level'] == 'admin') ? 'selected' : ''; ?>>Admin</option>
                                <option value="user" <?php echo ($ubah['level'] == 'user') ? 'selected' : ''; ?>>Pegawai</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="username">Username:</label>
                            <input type="text" name="username" id="username" class="form-control" value="<?php echo $ubah['username']; ?>">
                        </div>
                        <div class="form-group">
                            <label for="password">Password:</label>
                            <input type="text" name="password" id="password" class="form-control" required>
                        </div>
                    <?php } ?>
                    <button type="submit" name="submit" class="btn btn-primary" style="font-size: 15px; padding: 8px 10px;">Edit Pegawai</button>
                </form>
            </div>
        </div>
    </div>
</div>
