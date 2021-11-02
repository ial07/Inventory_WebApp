<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    <i class="fa fa-sign-in icon-title"></i> Data barang Keluar

    <a class="btn btn-primary btn-social pull-right" href="?module=form_barang_keluar&form=add" title="Tambah Data" data-toggle="tooltip">
      <i class="fa fa-plus"></i> Tambah
    </a>
  </h1>

</section>

<!-- Main content -->
<section class="content">
  <div class="row">
    <div class="col-md-12">

      <?php
      // fungsi untuk menampilkan pesan
      // jika alert = "" (kosong)
      // tampilkan pesan "" (kosong)
      if (empty($_GET['alert'])) {
        echo "";
      }
      // jika alert = 1
      // tampilkan pesan Sukses "Data barang Masuk berhasil disimpan"
      elseif ($_GET['alert'] == 1) {
        echo "<div class='alert alert-success alert-dismissable'>
              <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
              <h4>  <i class='icon fa fa-check-circle'></i> Sukses!</h4>
              Data barang Masuk berhasil disimpan.
            </div>";
      }
      ?>

      <div class="box box-primary">
        <div class="box-body">
          <!-- tampilan tabel barang -->
          <table id="dataTables1" class="table table-bordered table-striped table-hover">
            <!-- tampilan tabel header -->
            <thead>
              <tr>
                <th class="center">No.</th>
                <th class="center">Kode</th>
                <th class="center">Tanggal</th>
                <th class="center">Kode barang</th>
                <th class="center">Nama barang</th>
                <th class="center">Jumlah Keluar</th>
                <th class="center">Nama Sales</th>
              </tr>
            </thead>
            <!-- tampilan tabel body -->
            <tbody>
              <?php
              $no = 1;
              // fungsi query untuk menampilkan data dari tabel barang
              $query = mysqli_query($mysqli, "SELECT * From is_barang_keluar Inner Join is_barang On is_barang.kode_barang = is_barang_keluar.kode_barang Inner Join sales On is_barang_keluar.id_sales = sales.id_sales ORDER BY kode_transaksi DESC")
                or die('Ada kesalahan pada query tampil Data barang Masuk: ' . mysqli_error($mysqli));

              // tampilkan data
              while ($data = mysqli_fetch_assoc($query)) {
                $tanggal         = $data['tanggal_keluar'];
                $exp             = explode('-', $tanggal);
                $tanggal_masuk   = $exp[2] . "-" . $exp[1] . "-" . $exp[0];

                // menampilkan isi tabel dari database ke tabel di aplikasi
                echo "<tr>
                      <td width='30' class='center'>$no</td>
                      <td width='100' class='center'>$data[kode_transaksi]</td>
                      <td width='80' class='center'>$tanggal_masuk</td>
                      <td width='80' class='center'>$data[kode_barang]</td>
                      <td width='200' class='center'>$data[nama_barang]</td>
                      <td width='100' align='right'>$data[jumlah_keluar]</td>
                      <td width='80' class='center'>$data[nama_sales]</td>
                    </tr>";
                $no++;
              }
              ?>
            </tbody>
          </table>
        </div><!-- /.box-body -->
      </div><!-- /.box -->
    </div>
    <!--/.col -->
  </div> <!-- /.row -->
</section><!-- /.content