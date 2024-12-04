<?php
    require '../function.php';

    if(isset($_POST['aksi'])) {
    if ($_POST['aksi'] == "add") {


        $nama_pelatih = $_POST['nama_pelatih'];
        $nip = $_POST['nip'];
        $jabatan = $_POST['jabatan'];

        $query = "INSERT INTO tb_pelatih VALUES (null, '$nama_pelatih', '$nip', '$jabatan')";
        $sql = mysqli_query($koneksi, $query);

        if($sql) {
            header("location:pelatih.php");
        } else {
            echo $query;
        }


    } else if ($_POST['aksi'] == 'edit'){


        $id_pelatih = $_POST['id_pelatih'];
        $nama_pelatih = $_POST['nama_pelatih'];
        $nip = $_POST['nip'];
        $jabatan = $_POST['jabatan'];

        $query = "UPDATE tb_pelatih SET nama_pelatih='$nama_pelatih', nip='$nip', jabatan='$jabatan' WHERE id_pelatih='$id_pelatih';";    
        $sql = mysqli_query($koneksi, $query);

        if($sql) {
            header("location:pelatih.php");
        } else {
            echo mysqli_error($koneksi);
        }

    }        

}

if(isset($_GET['hapus'])) {
    $id_pelatih = $_GET['hapus'];

    $queryShow = "SELECT * FROM tb_pelatih WHERE id_pelatih = '$id_pelatih'";
    $sqlShow = mysqli_query($koneksi, $queryShow);
    $result = mysqli_fetch_assoc($sqlShow);
    
    $query = "DELETE FROM tb_pelatih WHERE id_pelatih = '$id_pelatih';";
    $sql = mysqli_query($koneksi, $query);

    if($sql) {
        header("location:pelatih.php");
    } else {
        echo $query;
    }
    // echo "Hapus Data <a href='berita.php'>[berita]</a>";
}
?>