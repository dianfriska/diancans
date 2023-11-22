<?php
$id = $_GET['id'];
$siswa = mysqli_query($koneksi,"SELECT * FROM siswa WHERE id_siswa= '$id'");
$data = mysqli_fetch_array($siswa);

?>

<legend>
    <h5>Form Ubah siswa</h5>
</legend>

<form action="" method="POST">
    <div class="form-group">
        <label for=""> Nisn </label>
        <input type="text" name="nisn" class="form-control" required value="<?= $data['nisn'] ?>">
    </div>

    <div class="form-group">
        <label for=""> Nis </label>
        <input type="text" name="nis" class="form-control" required value="<?= $data['nis'] ?>">
    </div>

    <div class="form-group">
        <label for=""> Nama </label>
        <input type="text" name="nama" class="form-control" required value="<?= $data['nama'] ?>">
    </div>

    <div class="form-group">
        <label for=""> Kelas </label>
        <input name = "kelas" id="" require class="form-control">
        <option value="">--Pilih Kelas--</option>
        <?php

        $kelas = mysqli_query($koneksi, "SELECT * FROM kelas")
        while($data= mysqli_fetch_array($kelas)){

            ?>
            <option value="<?=$data ['id_kelas'] ?>"><?=$data ['nama_kelas'] ?> || <?= $data ['kompetensi_keahlian'] ?></option>
            <?php } ?>

        </select>
    </div>

    <div class="form-group">
        <label for=""> alamat </label>
        <input type="text" name="alamat" class="form-control"></textarea">
    </div>

    <div class="form-group">
        <label for=""> No Telepon </label>
        <input type="text" name="no_telp" class="form-control" required value="<?= $data['no_telp'] ?>">
    </div>

    <div class="form-group">
        <label for="">Spp </label>
        <input name="spp"id="" require class="form-control">
        <option value="">--Pilih spp--</option>
        <?php

        $spp = mysqli_query($koneksi, "SELECT * FROM spp")
        while($data= mysqli_fetch_array($spp)){

            ?>
            <option value="<?=$data ['id_spp'] ?>"><?=$data ['tahun'] ?> || <?= $data ['nominal'] ?></option>
            <?php } ?>

        </select>
    </div>

    <button class="btn btn-tambah btn-save" name="ubah">
        ubah
    </button>

</form>

<?php

//cek apakah tombol ubah sudah di tekan
if(isset($_POST['ubah'])){
    //tampung setiap imputan
    $nisn = htmlspecialchars($_POST['nisn']);
    $nis = htmlspecialchars($_POST['nis']);
    $nama = htmlspecialchars($_POST['nama']);
    $kelas = htmlspecialchars($_POST['kelas']);
    $alamat = htmlspecialchars($_POST['alamat']);
    $no_telp = htmlspecialchars($_POST['no_telp']);
    $spp = htmlspecialchars($_POST['spp']);

    //maukkan kedalam database
    //koneksi
    //query
    $ubah= mysqli_query($koneksi, "UPDATE siswa SET nisn= '$nisn' ,  nis= '$nis' ,  nama= '$nama' , kelas= '$kelas' ,  alamat= '$alamat' , no_telp= '$no_telp' , spp= '$spp' WHERE id_siswa = '$id' ");
if($ubah){
    echo"<script>
        alert('Data Berhasil diubah');
    document.location.href='?menu=siswa';
    </script>";
}else{
    echo"<script>
    alert('Data Gagal diubah');

</script>";
    }
}