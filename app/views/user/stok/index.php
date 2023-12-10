<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Stok Produk</h1>
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
                    <li class="breadcrumb-item active"><a href="<?= BASEURL?>/Home_User">Home</a></li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>


    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
        
        <div class="row">
          <?php
          foreach($data['data'] as $produk) { ?>
          <div class="card card-spacing">
            <img src="<?= BASEURL?>/img/produk/<?php echo $produk['gambar_produk']; ?>" class="card-img-top" alt="...">
            <div class="card-body">
            <h5 class="card-title" style="text-transform: uppercase; overflow: hidden; text-overflow: ellipsis; white-space: nowrap;"><strong><?php echo $produk['nama_produk']; ?></strong></h5>
                <p class="card-text" style="margin-bottom: 5px;">Rp. <?php echo $produk['harga']; ?></p>
                <div class="d-flex justify-content-between lh-sm">
                  <p class="card-text">Stok: <?php echo $produk['stok']; ?></p>
                  <div>
                  <!-- <a href="<?= BASEURL?>/Produk_Admin/formUbah/<?php echo $produk['id_produk']; ?>" class="btn btn-primary"><i class="fa fa-edit"></i>Edit</a> -->
                  <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" onclick="tambahstok('<?= $produk['id_produk']; ?>')"><i class="fa fa-plus"></i></button>
                  <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#exampleModal" onclick="kurangistok('<?= $produk['id_produk']; ?>')"><i class="fa fa-minus"></i></button>
                    <!-- <a href="Produk_Admin/prosesHapus?action=delete&id_produk=<?php echo $produk['id_produk']; ?>" class="btn btn-danger"><i class="fa fa-trash"></i>Hapus</a> -->

                  </div>
                </div>
            </div>
                            
          </div>
          <?php } ?>
        </div>
      </div>
    <!-- /.content -->
    </div>
</div>
  <!-- /.content-wrapper -->
<!-- Modal -->
<

<script>
    
    function tambahstok(x){
    $('.modal-title').html('Stok Masuk');
    let url = '<?=BASEURL?>/Stok_User/formStokTambah';
    $.post(url, {
        id_produk: x
    }, function(data, success){
        $('.modal-body').html(data);
    });
}


function kurangistok(x) {
  $('.modal-title').html('Stok Keluar');
  let url = '<?=BASEURL?>/Stok_User/formStokKurang';
  $.post(url, {
    id_produk: x
  }, function (data, success) {
    $('.modal-body').html(data);
  });
}


  
</script>