<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <?php if ($data['title'] !== 'Menu Produk') : ?>
                        <h1 class="m-0">Menu Produk</h1>
                    <?php endif; ?>
                </div><!-- /.col -->
                <div class="col-sm-6 d-flex justify-content-end align-items-center">
                    <ol class="breadcrumb ml-3">
                        <li class="breadcrumb-item active">Admin</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>

    <!-- Main content -->
    <div class="content">
        <div class="container-fluid">
            <?php if ($data['title'] === 'Menu Produk') : ?>
                <div class="row">
                    <?php foreach ($data['data'] as $produk) : ?>
                        <div class="card card-spacing">
                            <!-- ... (rest of your card content) -->
                        </div>
                    <?php endforeach; ?>
                </div>
            <?php endif; ?>
        </div>
    </div>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
<!-- Modal -->
<

<script>
  function ubahdata(x){
    $('.modal-title').html('Ubah Data Produk');
    let url = '<?=BASEURL?>/Produk_Admin/formUbah';
    $.post(url,
    {
      id_produk : x
    }, function(data, success){
      $('.modal-body').html(data);
    });
  }

  function hapusdata(x){
    $('.modal-title').html('Hapus Data Produk');
    $('.modal-body').html('Apakah Anda Yakin Akan Menghapus Data ini?');
    $('.tombol').html('<a href="<?= BASEURL?>/Produk_Admin/prosesHapus/' + x + '" class="btn btn-secondary" style="background: #A52222">Hapus</a>');
    $('#close').html('Batal');
  } 
</script>

