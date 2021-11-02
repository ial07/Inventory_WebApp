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
    <i class="fa fa-file-text-o icon-title"></i> Laporan Data Barang Keluar

    <a class="btn btn-primary btn-social pull-right" href="cetak2.php" target="_blank">
      <i class="fa fa-print"></i> Cetak
    </a>
  </h1>

</section>
<br>
<div class="box box-primary">
  <div class="box-body">
    <!-- tampilan tabel barang -->
    <table class="table table-bordered table-striped table-hover">
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