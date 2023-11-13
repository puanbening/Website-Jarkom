<?php include("inc_header.php")?>
<?php
$Judul      ="";
$Kutipan    ="";
$Isi        ="";
$error      ="";
$success    ="";

if(isset($_GET['ID'])){
    $ID = $_GET['ID'];
}else {
    $ID = "";
}

if($ID != ""){
    $sql1   = "select * from halaman where ID = '$ID'";
    $q1     = mysqli_query($conn, $sql1);
    $r1     = mysqli_fetch_array($q1);
    $Judul  = $r1['Judul'];
    $Kutipan = $r1['Kutipan'];
    $Isi     = $r1['Isi'];

    if($Isi == ''){
        $error = "Data tidak ditemukan";
    }

}

if(isset($_POST['Simpan'])){
    $Judul      = $_POST['Judul'];
    $Isi        = $_POST['Isi'];
    $Kutipan    = $_POST['Kutipan'];

    if($Judul == '' or $Isi == ''){
        $error = "Masukkan data Judul dan Isi!!";
    }

    if (empty($error)) {
        if($ID !=""){
            $sql1   = "UPDATE halaman set Judul = '$Judul', Kutipan = '$Kutipan', Isi = '$Isi', Tgl_isi=now() where ID = '$ID'";
        }else{
            $sql1   = "INSERT INTO halaman (Judul, Kutipan, Isi) VALUES ('$Judul', '$Kutipan', '$Isi')";
        }
        $q1     = mysqli_query($conn, $sql1);
    
        if ($q1) {
            $success = "Sukses memasukkan data";
        } else {
            $error = "Gagal memasukkan data: " . mysqli_error($conn);
        }
    }
}

?>
<h1> Halaman Input Data </h1>
<div>
    <a href="halaman.php"> << Kembali ke Home </a>
</div>

<?php
if($error){
?>
    <div class="alert alert-danger" role="alert">
        <?php echo $error ?>
    </div>
<?php
}
if($success){
?>
    <div class="alert alert-primary" role="alert">
        <?php echo $success ?>
    </div>
<?php
}
?>

<form action="" method="post">
    <div class="mb-3 row">
        <label for="Judul" class="col-sm-2 col-form-label">Judul</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" ID="Judul" value="<?php echo $Judul ?>" name="Judul">
        </div>
    </div>
    <div class="mb-3 row">
        <label for="Kutipan" class="col-sm-2 col-form-label">Kutipan</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" ID="Kutipan" value="<?php echo $Kutipan ?>" name="Kutipan">
        </div>
    </div>
    <div class="mb-3 row">
        <label for="Isi" class="col-sm-2 col-form-label">Isi</label>
        <div class="col-sm-10">
            <textarea name="Isi" class="form-control" ID="summernote"><?php echo $Isi ?></textarea>
        </div>
    </div>
    <div class="mb-3 row">
        <div class="col-sm-2"></div>
        <div class="col-sm-10">
            <input type="Submit" name="Simpan" value="Simpan data" class="btn btn-primary"/>
        </div>
    </div>
</form>
<?php include("inc_footer.php")?>