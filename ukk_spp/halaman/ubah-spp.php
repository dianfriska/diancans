<?php
$id = $_GET['id'];
$spp = mysqli_query($koneksi,"SELECT * FROM spp WHERE id_spp= '$id'");
$data = mysqli_fetch_array($spp);

?>

<legend>
    <h5>Form Ubah Spp</h5>
</legend>

<form action="" method="POST">
    <div class="form-group">
        <label for="">Tahun</label>
        <input type="text" name="tahun" class="form-control" required value="<?= $data['tahun'] ?>">
    </div>

    <div class="form-group">
        <label for="">Nominal</label>
        <input type="text" name="nominal" class="form-control" required value="<?= $data['nominal'] ?>">
    </div>

    <button class="btn btn-ubah btn-save" name="ubah">
        ubah
    </button>

</form>

<?php

//cek apakah tombol ubah sudah di tekan
if(isset($_POST['ubah'])){
    //tampung setiap imputan
    $tahun = htmlspecialchars($_POST['tahun']);
    $nominal = htmlspecialchars($_POST['nominal']);

    //maukkan kedalam database
    //koneksi
    //query
    $ubah= mysqli_query($koneksi, "UPDATE spp SET tahun= '$tahun' , nominal= '$nominal' WHERE id_spp = '$id' ");
if($ubah){
    echo"<script>
        alert('Data Berhasil diubah');
    document.location.href='?menu=spp';
    </script>";
}else{
    echo"<script>
    alert('Data Gagal diubah');

</script>";
    }
}