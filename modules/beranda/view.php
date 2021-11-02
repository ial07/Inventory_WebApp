<!-- Aplikasi Persediaan barang pada Apotek
*******************************************************
* Developer    : Indra Styawantoro
* Company      : Indra Studio
* Release Date : 1 April 2017
* Website      : www.indrasatya.com
* E-mail       : indra.setyawantoro@gmail.com
* Phone        : +62-856-6991-9769
-->

<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    <i class="fa fa-home icon-title"></i> Beranda
  </h1>
  <ol class="breadcrumb">
    <li><a href="?module=beranda"><i class="fa fa-home"></i> Beranda</a></li>
  </ol>
</section>

<!-- Main content -->
<section class="content">
  <div class="row">
    <div class="col-lg-12 col-xs-12">
      <div class="alert alert-info alert-dismissable">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        <p style="font-size:15px">
          <i class="icon fa fa-user"></i> Selamat datang <strong><?php echo $_SESSION['nama_user']; ?></strong> di Aplikasi Persediaan barang.
        </p>
      </div>
    </div>
  </div>

  <!-- Small boxes (Stat box) -->
  <div class="row">
    <div class="col-lg-3 col-xs-6">
      <!-- small box -->
      <div style="background-color:#00c0ef;color:#fff" class="small-box">
        <div class="inner">
          <?php
          // fungsi query untuk menampilkan data dari tabel barang
          $query = mysqli_query($mysqli, "SELECT COUNT(kode_barang) as jumlah FROM is_barang")
            or die('Ada kesalahan pada query tampil Data barang: ' . mysqli_error($mysqli));

          // tampilkan data
          $data = mysqli_fetch_assoc($query);
          ?>
          <h3><?php echo $data['jumlah']; ?></h3>
          <p>Data barang</p>
        </div>
        <div class="icon">
          <i class="fa fa-folder"></i>
        </div>
        <?php
        if ($_SESSION['hak_akses'] != 'Manajer') { ?>
          <a href="?module=form_barang&form=add" class="small-box-footer" title="Tambah Data" data-toggle="tooltip"><i class="fa fa-plus"></i></a>
        <?php
        } else { ?>
          <a class="small-box-footer"><i class="fa"></i></a>
        <?php
        }
        ?>
      </div>
    </div><!-- ./col -->

    <div class="col-lg-3 col-xs-6">
      <!-- small box -->
      <div style="background-color:gray;color:#fff" class="small-box">
        <div class="inner">
          <?php
          // fungsi query untuk menampilkan data dari tabel barang
          $query = mysqli_query($mysqli, "SELECT COUNT(id_sales) as jumlah FROM sales")
            or die('Ada kesalahan pada query tampil Data Sales: ' . mysqli_error($mysqli));

          // tampilkan data
          $data = mysqli_fetch_assoc($query);
          ?>
          <h3><?php echo $data['jumlah']; ?></h3>
          <p>Data Sales</p>
        </div>
        <div class="icon">
          <i class="fa fa-folder"></i>
        </div>
        <?php
        if ($_SESSION['hak_akses'] != 'Manajer') { ?>
          <a href="?module=form_barang&form=add" class="small-box-footer" title="Tambah Data" data-toggle="tooltip"><i class="fa fa-plus"></i></a>
        <?php
        } else { ?>
          <a class="small-box-footer"><i class="fa"></i></a>
        <?php
        }
        ?>
      </div>
    </div><!-- ./col -->

    <div class="col-lg-3 col-xs-6">
      <!-- small box -->
      <div style="background-color:#00a65a;color:#fff" class="small-box">
        <div class="inner">
          <?php
          // fungsi query untuk menampilkan data dari tabel barang masuk
          $query = mysqli_query($mysqli, "SELECT COUNT(kode_transaksi) as jumlah FROM is_barang_masuk")
            or die('Ada kesalahan pada query tampil Data barang Masuk: ' . mysqli_error($mysqli));

          // tampilkan data
          $data = mysqli_fetch_assoc($query);
          ?>
          <h3><?php echo $data['jumlah']; ?></h3>
          <p>Data Barang Masuk</p>
        </div>
        <div class="icon">
          <i class="fa fa-sign-in"></i>
        </div>
        <?php
        if ($_SESSION['hak_akses'] != 'Manajer') { ?>
          <a href="?module=form_barang_masuk&form=add" class="small-box-footer" title="Tambah Data" data-toggle="tooltip"><i class="fa fa-plus"></i></a>
        <?php
        } else { ?>
          <a class="small-box-footer"><i class="fa"></i></a>
        <?php
        }
        ?>
      </div>
    </div><!-- ./col -->

    <div class="col-lg-3 col-xs-6">
      <!-- small box -->
      <div style="background-color:red;color:#fff" class="small-box">
        <div class="inner">
          <?php
          // fungsi query untuk menampilkan data dari tabel barang masuk
          $query = mysqli_query($mysqli, "SELECT COUNT(kode_transaksi) as jumlah FROM is_barang_keluar")
            or die('Ada kesalahan pada query tampil Data barang Keluar: ' . mysqli_error($mysqli));

          // tampilkan data
          $data = mysqli_fetch_assoc($query);
          ?>
          <h3><?php echo $data['jumlah']; ?></h3>
          <p>Data Barang Keluar</p>
        </div>
        <div class="icon">
          <i class="fa fa-sign-out"></i>
        </div>
        <?php
        if ($_SESSION['hak_akses'] != 'Manajer') { ?>
          <a href="?module=form_barang_keluar&form=add" class="small-box-footer" title="Tambah Data" data-toggle="tooltip"><i class="fa fa-plus"></i></a>
        <?php
        } else { ?>
          <a class="small-box-footer"><i class="fa"></i></a>
        <?php
        }
        ?>
      </div>
    </div><!-- ./col -->

    <div class="col-lg-3 col-xs-6">
      <!-- small box -->
      <div style="background-color:#f39c12;color:#fff" class="small-box">
        <div class="inner">
          <?php
          // fungsi query untuk menampilkan data dari tabel barang
          $query = mysqli_query($mysqli, "SELECT COUNT(kode_barang) as jumlah FROM is_barang")
            or die('Ada kesalahan pada query tampil Data barang: ' . mysqli_error($mysqli));

          // tampilkan data
          $data = mysqli_fetch_assoc($query);
          ?>
          <h3><?php echo $data['jumlah']; ?></h3>
          <p>Laporan Stok barang</p>
        </div>
        <div class="icon">
          <i class="fa fa-file-text-o"></i>
        </div>
        <a href="?module=lap_stok" class="small-box-footer" title="Cetak Laporan" data-toggle="tooltip"><i class="fa fa-print"></i></a>
      </div>
    </div><!-- ./col -->

    <div class="col-lg-3 col-xs-6">
      <!-- small box -->
      <div style="background-color:green;color:#fff" class="small-box">
        <div class="inner">
          <?php
          // fungsi query untuk menampilkan data dari tabel barang masuk
          $query = mysqli_query($mysqli, "SELECT COUNT(kode_transaksi) as jumlah FROM is_barang_masuk")
            or die('Ada kesalahan pada query tampil Data barang Masuk: ' . mysqli_error($mysqli));

          // tampilkan data
          $data = mysqli_fetch_assoc($query);
          ?>
          <h3><?php echo $data['jumlah']; ?></h3>
          <p>Laporan Barang Masuk</p>
        </div>
        <div class="icon">
          <i class="fa fa-clone"></i>
        </div>
        <a href="?module=lap_barang_masuk" class="small-box-footer" title="Cetak Laporan" data-toggle="tooltip"><i class="fa fa-print"></i></a>
      </div>
    </div><!-- ./col -->

    <div class="col-lg-3 col-xs-6">
      <!-- small box -->
      <div style="background-color:#dd2b38;color:#fff" class="small-box">
        <div class="inner">
          <?php
          // fungsi query untuk menampilkan data dari tabel barang masuk
          $query = mysqli_query($mysqli, "SELECT COUNT(kode_transaksi) as jumlah FROM is_barang_keluar")
            or die('Ada kesalahan pada query tampil Data barang Keluar: ' . mysqli_error($mysqli));

          // tampilkan data
          $data = mysqli_fetch_assoc($query);
          ?>
          <h3><?php echo $data['jumlah']; ?></h3>
          <p>Laporan Barang Keluar</p>
        </div>
        <div class="icon">
          <i class="fa fa-clone"></i>
        </div>
        <a href="?module=lap_barang_keluar" class="small-box-footer" title="Cetak Laporan" data-toggle="tooltip"><i class="fa fa-print"></i></a>
      </div>
    </div><!-- ./col -->
  </div><!-- /.row -->
</section><!-- /.content -->