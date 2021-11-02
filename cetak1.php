<html>
<?php include('config/database.php') ?>

<head>
    <title>Data Transaksi Barang Masuk PT AWS Padang</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/1.6.5/css/buttons.dataTables.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.js"></script>
</head>

<body>
    <div class="container">
        <h2>Data Transaksi Barang Masuk</h2>
        <h4>(PT AWS PADANG)</h4>
        <div class="data-tables datatable-dark">
            <a href="index.php" class="btn btn-secondary mb-2 float-sm-right">Kembali</a>

            <table class="table table-bordered table-striped table-hover" id="mauexport">
                <!-- tampilan tabel header -->
                <thead>
                    <tr>
                        <th class="center">No.</th>
                        <th class="center">Kode</th>
                        <th class="center">Tanggal</th>
                        <th class="center">Kode barang</th>
                        <th class="center">Nama barang</th>
                        <th class="center">Jumlah Masuk</th>
                        <th class="center">Ukuran</th>
                    </tr>
                </thead>
                <!-- tampilan tabel body -->
                <tbody>
                    <?php
                    $no = 1;
                    // fungsi query untuk menampilkan data dari tabel barang
                    $query = mysqli_query($mysqli, "SELECT *
                                            FROM is_barang_masuk as a INNER JOIN is_barang as b ON a.kode_barang=b.kode_barang ORDER BY kode_transaksi DESC")
                        or die('Ada kesalahan pada query tampil Data barang Masuk: ' . mysqli_error($mysqli));

                    // tampilkan data
                    while ($data = mysqli_fetch_assoc($query)) {
                        $tanggal         = $data['tanggal_masuk'];
                        $exp             = explode('-', $tanggal);
                        $tanggal_masuk   = $exp[2] . "-" . $exp[1] . "-" . $exp[0];

                        // menampilkan isi tabel dari database ke tabel di aplikasi
                        echo "<tr>
                      <td width='30' class='center'>$no</td>
                      <td width='100' class='center'>$data[kode_transaksi]</td>
                      <td width='80' class='center'>$tanggal_masuk</td>
                      <td width='80' class='center'>$data[kode_barang]</td>
                      <td width='200' class='center'>$data[nama_barang]</td>
                      <td width='100' align='right'>$data[jumlah_masuk]</td>
                      <td width='80' class='center'>$data[satuan]</td>
                    </tr>";
                        $no++;
                    }
                    ?>
                </tbody>
            </table>

        </div>
    </div>

    <script>
        $(document).ready(function() {
            $('#mauexport').DataTable({
                dom: 'Bfrtip',
                buttons: [
                    'excel', 'pdf', 'print'
                ]
            });
        });
    </script>

    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.6.5/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.6.5/js/buttons.flash.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.6.5/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.6.5/js/buttons.print.min.js"></script>



</body>

</html>