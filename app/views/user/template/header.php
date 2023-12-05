<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>User | Dashboard</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="<?= BASEURL?>/assets/plugins/fontawesome-free/css/all.min.css">
  <!-- IonIcons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?= BASEURL?>/assets/dist/css/adminlte.min.css">

  <style>
    .sidebar {
          height: 100vh; /* 100% tinggi viewport */
          overflow-y: auto; /* Biarkan ada scrollbar jika konten melebihi tinggi */
        }
        .nav-item {
        margin-bottom: 100px; /* Sesuaikan jarak antar menu sesuai kebutuhan */
        }
        /* Memberi ukuran gambar yang seragam */
        .card-img-top {
        height: 50%;
        width: 50%;
        object-fit: cover; /* Biar gambar tidak terlalu terdistorsi */
        margin-right: 48px; /* Jarak kanan antara card */
        margin-left: 50px;
        margin-top: 10px;
        }

        /* Mengatur ukuran card */
        .card {
        width: 210px;
        height: 280px; /* Atur ukuran card */
        } 

        #card-dashboard {
          width: 300px;
          height: 150px;
        }

        /* Memberikan jarak antara card */
        .card-spacing {
        margin-right: 24px; /* Jarak kanan antara card */
        margin-left: 15px; /* Jarak kiri antara card */
        margin-top: 10px;
        margin-bottom: 10px;
        }

        .btn-success {
          margin-left: 15px;
          padding: 10px 10px; /* Ubah padding tombol */
            font-size: 15px;
        }

        .btn-primary, .btn-danger {
            padding: 5px 7px; /* Ubah padding tombol */
            font-size: 12px; /* Ubah ukuran font tombol */
            margin-top: 15px; /* Tambahkan margin atas agar terpisah dari teks */
            /* Tampilkan tombol sebagai blok agar memiliki lebar penuh */
        }

        /* Mengatur jarak terakhir agar tidak ada margin di tombol terakhir */
        .btn-primary:last-child,
        .btn-danger:last-child {
            margin-right: 0; /* Menghapus margin di tombol terakhir */
        }

        .b-example-divider {
        width: 100%;
        height: 3rem;
        background-color: rgba(0, 0, 0, .1);
        border: solid rgba(0, 0, 0, .15);
        border-width: 1px 0;
        box-shadow: inset 0 .5em 1.5em rgba(0, 0, 0, .1), inset 0 .125em .5em rgba(0, 0, 0, .15);
      }

  </style>
</head>