<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-compatible" content="ie=edge">
    <title>Registrasi</title>
    <link rel="stylesheet" href="css/bootstrap.css">
    <script src="js/jquery-3.4.1.min.js"></script>
</head>
<body>
    <div class="container col-md-6">
    <div class="card-header bg-primary text-white">
        Input Registrasi
    </div>   

<div class="card-body">
    <form action="" method="POST" class="form-item">
    <form>
    <div class="form-group">
    <label for="inputUser">  USERNAME </label>
    <input type="text" name="inputUser" class="form-control col-md-9" placeholder="Masukkan USERNAME">
    </div>

    <div class="form-group">
    <label for="inputPassword"> PASSWORD </label>
    <input type="text" name="inputPassword" class="form-control col-md-9" placeholder="Masukkan PASSWORD">
    </div>


    <button type="submit" class="btn btn-primary" name="simpan">SIMPAN</button>
    <button type="reset" class="btn btn-danger">BATAL</button>
    </form>
</body>
</html>

<?php
    include "koneksi.php";
    if(isset($_POST['simpan']))
    {
        $inputUser           = $_POST['inputUser'];
        $inputPassword       = $_POST['inputPassword'];

        mysqli_query($koneksi, "INSERT INTO user VALUES(
        '$inputUser','$inputPassword')") or die(mysqli_error($koneksi));

        echo "<div align='center'><h5> Silahkan Tunggu, Data Sedang Disimpan....</h5></div>";
        echo "<meta http-equiv='refresh' content='1;url=http://localhost/web/login.php'>";
    }

?>
