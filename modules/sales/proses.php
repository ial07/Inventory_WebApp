

<?php
session_start();

// Panggil koneksi database.php untuk koneksi database
require_once "../../config/database.php";

// fungsi untuk pengecekan status login user 
// jika user belum login, alihkan ke halaman login dan tampilkan pesan = 1
if (empty($_SESSION['username']) && empty($_SESSION['password'])) {
    echo "<meta http-equiv='refresh' content='0; url=index.php?alert=1'>";
}
// jika user sudah login, maka jalankan perintah untuk insert, update, dan delete
else {
    if ($_GET['act'] == 'insert') {
        if (isset($_POST['simpan'])) {
            // ambil data hasil submit dari form
            $kode_sales  = mysqli_real_escape_string($mysqli, trim($_POST['kode_sales']));
            $nama_sales  = mysqli_real_escape_string($mysqli, trim($_POST['nama_sales']));
            $jk  = mysqli_real_escape_string($mysqli, trim($_POST['jk']));
            $alamat     = mysqli_real_escape_string($mysqli, trim($_POST['alamat']));
            $hp     = mysqli_real_escape_string($mysqli, trim($_POST['hp']));

            $created_user = $_SESSION['id_user'];

            // perintah query untuk menyimpan data ke tabel sales
            $query = mysqli_query($mysqli, "INSERT INTO sales(id_sales,nama_sales,jk,alamat,no_hp) VALUES('$kode_sales','$nama_sales','$jk','$alamat','$hp')")
                or die('Ada kesalahan pada query insert : ' . mysqli_error($mysqli));

            // cek query
            if ($query) {
                // jika berhasil tampilkan pesan berhasil simpan data
                header("location: ../../main.php?module=sales&alert=1");
            }
        }
    } elseif ($_GET['act'] == 'update') {
        if (isset($_POST['simpan'])) {
            if (isset($_POST['kode_sales'])) {
                // ambil data hasil submit dari form
                $kode_sales  = mysqli_real_escape_string($mysqli, trim($_POST['kode_sales']));
                $nama_sales  = mysqli_real_escape_string($mysqli, trim($_POST['nama_sales']));
                $jk  = mysqli_real_escape_string($mysqli, trim($_POST['jk']));
                $alamat     = mysqli_real_escape_string($mysqli, trim($_POST['alamat']));
                $hp     = mysqli_real_escape_string($mysqli, trim($_POST['hp']));

                $updated_user = $_SESSION['id_user'];

                // perintah query untuk mengubah data pada tabel sales
                $query = mysqli_query($mysqli, "UPDATE is_sales SET  nama_sales       = '$nama_sales',
                                                                    jk      = '$jk',
                                                                    alamat      = '$alamat',
                                                                    no_hp          = '$no_hp'
                                                              WHERE id_sales       = '$kode_sales'")
                    or die('Ada kesalahan pada query update : ' . mysqli_error($mysqli));

                // cek query
                if ($query) {
                    // jika berhasil tampilkan pesan berhasil update data
                    header("location: ../../main.php?module=sales&alert=2");
                }
            }
        }
    } elseif ($_GET['act'] == 'delete') {
        if (isset($_GET['id'])) {
            $kode_sales = $_GET['id'];

            // perintah query untuk menghapus data pada tabel sales
            $query = mysqli_query($mysqli, "DELETE FROM sales WHERE id_sales='$kode_sales'")
                or die('Ada kesalahan pada query delete : ' . mysqli_error($mysqli));

            // cek hasil query
            if ($query) {
                // jika berhasil tampilkan pesan berhasil delete data
                header("location: ../../main.php?module=sales&alert=3");
            }
        }
    }
}
?>