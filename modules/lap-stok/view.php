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
    <i class="fa fa-file-text-o icon-title"></i> Laporan Stok Barang

    <a class="btn btn-primary btn-social pull-right" href="cetak.php" target="_blank">
      <i class="fa fa-print"></i> Cetak
    </a>
  </h1>

</section>

<!-- Main content -->
<section class="content">
  <div class="row">
    <div class="col-md-12">
      <div class="box box-primary">
        <div class="box-body">
          <!-- tampilan tabel barang -->
          <table id="dataTables1" class="table table-bordered table-striped table-hover">
            <!-- tampilan tabel header -->
            <thead>
              <tr>
                <th class="center">No.</th>
                <th class="center">Kode barang</th>
                <th class="center">Nama barang</th>
                <th class="center">Harga Beli</th>
                <th class="center">Harga Jual</th>
                <th class="center">Stok</th>
                <th class="center">Ukuran</th>
              </tr>
            </thead>
            <!-- tampilan tabel body -->
            <tbody>
              <?php
              $no = 1;
              // fungsi query untuk menampilkan data dari tabel barang
              $query = mysqli_query($mysqli, "SELECT * FROM is_barang ORDER BY nama_barang ASC")
                or die('Ada kesalahan pada query tampil Data barang: ' . mysqli_error($mysqli));

              // tampilkan data
              while ($data = mysqli_fetch_assoc($query)) {
                $harga_beli = format_rupiah($data['harga_beli']);
                $harga_jual = format_rupiah($data['harga_jual']);
                // menampilkan isi tabel dari database ke tabel di aplikasi
                echo "<tr>
                      <td width='30' class='center'>$no</td>
                      <td width='80' class='center'>$data[kode_barang]</td>
                      <td width='180'>$data[nama_barang]</td>
                      <td width='100' align='right'>Rp. $harga_beli</td>
                      <td width='100' align='right'>Rp. $harga_jual</td>
                      <td width='80' align='right'>$data[stok]</td>
                      <td width='80' class='center'>$data[satuan]</td>
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