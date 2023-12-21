<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Menu Produk</h1>
            </div><!-- /.col -->
            <div class="col-sm-6 d-flex justify-content-end align-items-center">
            <div class="dropdown mr-4">
                    <button class="btn btn-secondary dropdown-toggle" type="button" data-toggle="dropdown" style="padding: 5px 7px; font-size: 12px; background: #F9CC41; color: black;">
                        Kategori
                    </button>
                    <ul class="dropdown-menu">
                    <li><a class="dropdown-item" onclick="getkategori('semua', 'Semua')">Semua</a></li>
                    <?php
                    foreach($data['kategori'] as $kategori){ ?>
                        
                        <li><a class="dropdown-item" onclick="getkategori('<?= $kategori['id_kategori']; ?>', '<?= $kategori['nama_kategori']; ?>')"><?php echo $kategori['nama_kategori']; ?></a></li>
                      <?php } ?>
                    </ul>
                </div>

                <form action="<?= BASEURL?>/Produk_Admin" method="post" class="d-flex" role="search" id="searchForm">
                  <input class="form-control" type="text" name="search" placeholder="Search" autocomplete="off">
                  <button class="btn btn-outline-primary" type="submit" id="tombolCari">Search</button>

                </form>
                
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
        <div class="row mb-2">
            <div class="col-sm-6">
        <button type="button" class="btn" style="background: #F6E8C1;" data-toggle="modal" data-target="#exampleModal" onclick="tambahdata()"><i class="fa fa-plus"></i> Tambah Produk</button>
        </div>
        </div>
        <div class="row" id="produkContainer">
          <?php
          foreach($data['data'] as $produk) { ?>
          <div class="card card-spacing" style="border-radius: 10px; box-shadow: 2px 2px 5px rgba(0, 0, 0, 0.2);">
          <img src="<?= BASEURL ?>/img/produk/<?php echo $produk['gambar_produk']; ?>" class="card-img-top <?php echo ($produk['stok'] == 0) ? 'stok-habis' : ''; ?>" alt="...">
            <div class="card-body">
            <h5 class="card-title" style="text-transform: uppercase; overflow: hidden; text-overflow: ellipsis; white-space: nowrap;"><strong><?php echo $produk['nama_produk']; ?></strong></h5>
                <p class="card-text" style="margin-bottom: 5px;">Rp. <?php echo $produk['harga']; ?></p>
                <div class="d-flex justify-content-between align-items-center">
                  <p class="card-text">Stok: <?php echo $produk['stok']; ?></p>
                  <div>
                  <!-- <a href="<?= BASEURL?>/Produk_Admin/formUbah/<?php echo $produk['id_produk']; ?>" class="btn btn-primary"><i class="fa fa-edit"></i>Edit</a> -->
                  <button type="button" class="btn btn-primary" style="background: #1A2A46;" data-toggle="modal" data-target="#exampleModal" onclick="ubahdata('<?= $produk['id_produk']; ?>')"><i class="fa fa-edit"></i></button>
                  <button type="button" class="btn btn-secondary" style="padding: 5px 7px; font-size: 12px; margin-top: 15px;" data-toggle="modal" data-target="#exampleModal" onclick="hapusdata('<?= $produk['id_produk']; ?>')"><i class="fa fa-trash"></i></button>
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
    function tambahdata(){
        $('.modal-title').html('Tambah Data Produk');
        let url = '<?=BASEURL?>/Produk_Admin/formTambah';
        $.post(url, function(data, success){
            $('.modal-body').html(data);
        });
    }
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
        let url = '<?= BASEURL?>/Produk_Admin/formHapus';
        $.post(url, {
            id_produk: x
        }, function (data, success) {
            $('.modal-body').html(data);
            $('#hapusForm').attr('action', '<?= BASEURL?>/Produk_Admin/prosesHapus/' + x);
        });
  }
  
  // Memperbarui teks pada tombol dropdown saat item dipilih
function setDropdownText(text) {
    $('.dropdown-toggle').html(text);
}

  function getkategori(x, nama_kategori){
    setDropdownText(nama_kategori);
        let url = '<?=BASEURL?>/Produk_Admin/filterKategori/' + x;
        $.post(url, function(data, success){
          var produk = JSON.parse(data);

        // Mengosongkan container produk
        $('#produkContainer').empty();

        // Memproses setiap produk dalam data JSON dan menambahkannya ke dalam container
        produk.forEach(function(item) {
            var card = `
                <div class="card card-spacing">
                    <img src="<?= BASEURL?>/img/produk/${item.gambar_produk}" class="card-img-top ${item.stok === 0 ? 'stok-habis' : ''}" alt="...">
                    <div class="card-body">
                        <h5 class="card-title" style="text-transform: uppercase; overflow: hidden; text-overflow: ellipsis; white-space: nowrap;"><strong>${item.nama_produk}</strong></h5>
                        <p class="card-text" style="margin-bottom: 5px;">Rp. ${item.harga}</p>
                        <div class="d-flex justify-content-between align-items-center">
                            <p class="card-text">Stok: ${item.stok}</p>
                            <div>
                                <button type="button" class="btn btn-primary" style="background: #1A2A46;" data-toggle="modal" data-target="#exampleModal" onclick="ubahdata('${item.id_produk}')"><i class="fa fa-edit"></i></button>
                                <button type="button" class="btn btn-secondary" style="padding: 5px 7px; font-size: 12px; margin-top: 15px;" data-toggle="modal" data-target="#exampleModal" onclick="hapusdata('${item.id_produk}')"><i class="fa fa-trash"></i></button>
                            </div>
                        </div>
                    </div>
                </div>
            `;
            // Menambahkan card produk ke dalam container
            $('#produkContainer').append(card);
        });
    });
  }


</script>