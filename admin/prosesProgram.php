<?php
    require '../function.php';

    if(isset($_POST['aksi'])) {
    if ($_POST['aksi'] == "add") {


        $urutan_program = $_POST['urutan_program'];
        $nama_program = $_POST['nama_program'];
        $detail_program = $_POST['detail_program'];

        $query = "INSERT INTO tb_program VALUES (null, '$urutan_program', '$nama_program', '$detail_program')";
        $sql = mysqli_query($koneksi, $query);

        if($sql) {
            header("location:program.php");
        } else {
            echo $query;
        }


    } else if ($_POST['aksi'] == 'edit'){


        $id_program = $_POST['id_program'];
        $urutan_program = $_POST['urutan_program'];
        $nama_program = $_POST['nama_program'];
        $detail_program = $_POST['detail_program'];

        $query = "UPDATE tb_program SET urutan_program='$urutan_program', nama_program='$nama_program', detail_program='$detail_program';";    
        $sql = mysqli_query($koneksi, $query);

        if($sql) {
            header("location:program.php");
        } else {
            echo mysqli_error($koneksi);
        }

    }        

}

if(isset($_GET['hapus'])) {
    $id_program = $_GET['hapus'];

    $queryShow = "SELECT * FROM tb_program WHERE id_program = '$id_program'";
    $sqlShow = mysqli_query($koneksi, $queryShow);
    $result = mysqli_fetch_assoc($sqlShow);
    
    $query = "DELETE FROM tb_program WHERE id_program = '$id_program';";
    $sql = mysqli_query($koneksi, $query);

    if($sql) {
        header("location:program.php");
    } else {
        echo $query;
    }
    // echo "Hapus Data <a href='berita.php'>[berita]</a>";
}
?>