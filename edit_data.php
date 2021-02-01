<?php
    include "koneksi.php";
    $id = $_GET['NPM'];
    $ambilData = mysqli_query($koneksi, "SELECT * FROM tblmhs WHERE NPM='$id'");
    $data=mysqli_fetch_array($ambilData);
?>

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
    <div class="container col-md-6">
    <div class="card-header bg-primary text-white">
        Input Data Mahasiswa
    </div>   

<div class="card-body">
    <form action="" method="POST" class="form-item">
    <form>
    <div class="form-group">
    <label for="NPM"> NPM MAHASISWA </label>
    <input type="number" name="NPM" value="<?php echo $data['NPM']?>"class="form-control col-md-9" placeholder="Masukkan NPM">
    </div>

    <div class="form-group">
    <label for="NAMA"> NAMA MAHASISWA </label>
    <input type="text" name="NAMA"value="<?php echo $data['NAMA']?>" class="form-control col-md-9" placeholder="Masukkan NAMA">
    </div>

    <div class="form-group">
    <label for="TEMPAT_LAHIR"> TEMPAT LAHIR </label>
    <input type="text" name="TEMPAT_LAHIR" value="<?php echo $data['TEMPAT_LAHIR']?>" class="form-control col-md-9" placeholder="Masukkan TEMPAT LAHIR">
    </div>

    <div class="form-group">
    <label for="TANGGAL_LAHIR"> TANGGAL_LAHIR </label>
    <input type="date" name="TANGGAL_LAHIR"value="<?php echo $data['TANGGAL_LAHIR']?>" class="form-control col-md-9" placeholder="Masukkan TANGGAL LAHIR">
    </div>

    <div class="form-group">
    <label for="JENIS_KELAMIN"> JENIS KELAMIN </label>
    <br>
    <label><input type="radio" name="JENIS_KELAMIN" value="L"<?php if ($data['JENIS_KELAMIN'] == 'L')echo 'checked'?>>LAKI - LAKI</label>
    <label><input type="radio" name="JENIS_KELAMIN" value="P"<?php if ($data['JENIS_KELAMIN'] == 'P')echo 'checked'?>>PEREMPUAN</label>
    </div>

    <div class="form-group">
    <label for="ALAMAT"> ALAMAT </label>
    <input type="text" name="ALAMAT" value="<?php echo $data['ALAMAT']?>" class="form-control col-md-9" placeholder="Masukkan ALAMAT">
    </div>

    <div class="form-group">
    <label for="KODE_POS"> KODE POS </label>
    <input type="text" name="KODE_POS" value="<?php echo $data['KODE_POS']?>" class="form-control col-md-9" placeholder="Masukkan KODE POS">

    <button type="submit" class="btn btn-primary" name="simpan">SIMPAN</button>
    <button type="reset" class="btn btn-danger">BATAL</button>
    </form>
</body>
</html>

<?php
    include "koneksi.php";
    if(isset($_POST['simpan']))
    {
        $NPM            = $_POST['NPM'];
        $NAMA           = $_POST['NAMA'];
        $TEMPAT_LAHIR   = $_POST['TEMPAT_LAHIR'];
        $TANGGAL_LAHIR  = $_POST['TANGGAL_LAHIR'];
        $JENIS_KELAMIN  = $_POST['JENIS_KELAMIN'];
        $ALAMAT         = $_POST['ALAMAT'];
        $KODE_POS       = $_POST['KODE_POS'];
        
        mysqli_query($koneksi, "UPDATE tblmhs 
            SET NPM='$NPM,', NAMA='$NAMA', TEMPAT_LAHIR='$TEMPAT_LAHIR', JENIS_KELAMIN='$JENIS_KELAMIN', ALAMAT='$ALAMAT', KODE_POS='$KODE_POS'
            WHERE NPM='$id'") or die(mysqli_error($koneksi));
            
        echo "<div align='center'><h5> Silahkan Tunggu, Data Sedang DiUpdate....</h5></div>";
        echo "<meta http-equiv='refresh' content='1;url=http://localhost/web/data_mahasiswa.php'>";
    }

?>
