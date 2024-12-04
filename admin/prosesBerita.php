<?php
    require '../function.php';

    if(isset($_POST['aksi'])) {
    if ($_POST['aksi'] == "add") {


        $judul = $_POST['judul'];
        $deskripsi = $_POST['deskripsi'];
        $gambar = $_FILES['gambar']['name'];

        $dir = 'asset/img/';
        $tmpFile = $_FILES['gambar']['tmp_name'];

        move_uploaded_file($tmpFile, $dir.$gambar);

        // die();

        $query = "INSERT INTO tb_berita VALUES (null, '$judul', '$deskripsi', '$gambar')";
        $sql = mysqli_query($koneksi, $query);

        if($sql) {
            header("location:berita.php");
        } else {
            echo $query;
        }

    } else if ($_POST['aksi'] == 'edit'){
        // echo "Edit Data <a href='berita.php'>[berita]</a>";
        // var_dump($_POST);


        $id_berita = $_POST['id_berita'];
        $judul = mysqli_real_escape_string($koneksi, $_POST['judul']);
        $deskripsi = mysqli_real_escape_string($koneksi, $_POST['deskripsi']);
        
        $queryShow = "SELECT * FROM tb_berita WHERE id_berita = '$id_berita';";
        $sqlShow = mysqli_query($koneksi, $queryShow);
        $result = mysqli_fetch_assoc($sqlShow);
        
        if ($_FILES['gambar']['name'] == "") {
            $gambar = $result['gambar'];
        } else {
            $gambar = $_FILES['gambar']['name'];
            if (file_exists('asset/img/' . $result['gambar'])) {
                unlink('asset/img/' . $result['gambar']);
            }
            move_uploaded_file($_FILES['gambar']['tmp_name'], 'asset/img/' . $gambar);
        }
        
        $query = "UPDATE tb_berita SET judul='$judul', deskripsi='$deskripsi', gambar='$gambar' WHERE id_berita='$id_berita';";
        $sql = mysqli_query($koneksi, $query);
        
        if ($sql) {
            header("location:berita.php");
        } else {
            echo mysqli_error($koneksi);
        }

    }        

}

if(isset($_GET['hapus'])) {
    $id_berita = $_GET['hapus'];

    $queryShow = "SELECT * FROM tb_berita WHERE id_berita = '$id_berita'";
    $sqlShow = mysqli_query($koneksi, $queryShow);
    $result = mysqli_fetch_assoc($sqlShow);

    unlink('asset/img/'.$result['gambar']);
    
    $query = "DELETE FROM tb_berita WHERE id_berita = '$id_berita';";
    $sql = mysqli_query($koneksi, $query);

    if($sql) {
        header("location:berita.php");
    } else {
        echo $query;
    }
    // echo "Hapus Data <a href='berita.php'>[berita]</a>";
}
?>