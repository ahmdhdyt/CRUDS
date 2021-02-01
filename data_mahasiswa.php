<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-compatible" content="ie=edge">
    <title>Data Mahasiswa</title>
    <link rel="stylesheet" href="css/bootstrap.css">
    <script src="js/jquery-3.4.1.min.js"></script>
</head>
<body>
    <div class="container col-md-10">
    <div class="card-header bg-primary text-white">
        Table Data Mahasiswa
    </div>   
    <form method="GET" action="">
        Cari Nama <input type="text" name="s">
        <input type="submit" value="cari">
    </form>
        <div class="card-body">
            <a href="index.php" class="btn btn-primary">Tambah Data</a>
            <table class="table table-bordered">
                <tr>
                    <th>NO</th>
                    <th>NPM</th>
                    <th>NAMA</th>
                    <th>TEMPAT LAHIR</th>
                    <th>TANGGAL LAHIR</th>
                    <th>JENIS KELAMIN</th>
                    <th>ALAMAT</th>
                    <th>KODE POS</th>
                    <th>AKSI</th>
                </tr>
            <?php
                include "koneksi.php";
                $no = 1;
                $NAMA = "";
                if (isset($_GET['s']))
                {
                    $NAMA = $_GET['s'];
                    $tampil = mysqli_query($koneksi, "SELECT * FROM tblmhs WHERE NAMA LIKE '%$NAMA'");
                }else
                $tampil = mysqli_query($koneksi, "SELECT * FROM tblmhs");
                while ($data = mysqli_fetch_array($tampil))
                {

            ?>
            <tr>
                    <td><?php echo $no++;?> </td>
                    <td><?php echo $data ['NPM']?></td>
                    <td><?php echo $data ['NAMA']?></td>
                    <td><?php echo $data ['TEMPAT_LAHIR']?></td>
                    <td><?php echo $data ['TANGGAL_LAHIR']?></td>
                    <td><?php echo $data ['JENIS_KELAMIN']?></td>
                    <td><?php echo $data ['ALAMAT']?></td>
                    <td><?php echo $data ['KODE_POS']?></td>
            <td>
                    <a href="edit_data.php?NPM=<?php echo $data['NPM'];?>" class="btn btn-sm btn-warning">Edit</a>
                    <a href="hapus_data.php?NPM=<?php echo $data['NPM'];?>" class="btn btn-sm btn-danger">Hapus</a>
            </td>
            </tr>

            <?php } ?>
            </table>
        </div>
    </body>
</html>