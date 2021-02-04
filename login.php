<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="css/sb-admin.css" rel="stylesheet">
</head>
<body class="">

<div class="container">
<div class="card card-login mx-auto mt-5">
<div class="card-header">LOGIN</div>
<form action="" method="POST">
<div class="form-group">
<div class="form-label-group">
</div>
<label for="inputUser">Username</label>
<input type="username" id="inputUser" class="form-control" placeholder="username" required="require" name="inputUser">
</div>
<label for="inputPassword">Password</label>
<input type="password" id="inputPassword" class="form-control" placeholder="Password" required="require" name="inputPassword">
<button type="submit" class="btn btn-primary btn-block" name="sumbit">LOGIN</button>

    <center>apakah anda tidak memiliki akun ? silahkan register 
    <br>
    <a href="http://localhost/web/proseslogin.php" name="daftar" class="btn btn-danger btn-sm">Daftar</a>
    <br>
    </form>
</body>
</html>

<?php
    include "koneksi.php";
    if(isset($_POST['sumbit']))
    {
        $inputUser  = $_POST['inputUser'];
        $inputPassword = $_POST['inputPassword'];

        $inputUser = mysqli_query($koneksi, "SELECT * FROM user WHERE 
        inputUser='$inputUser' and inputPassword='$inputPassword'");
        $chek = mysqli_num_rows($inputUser);
        if($chek>0)
        {
            echo "<div align='center'><h5> Silahkan Tunggu, Loading....</h5></div>";
            echo "<meta http-equiv='refresh' content='1;url=http://localhost/web/data_mahasiswa.php'>";
        }else
        echo "password salah !!!";
    }
    if(isset($_POST['daftar']))
    {
        header("location:proseslogin.php");
    }

?>