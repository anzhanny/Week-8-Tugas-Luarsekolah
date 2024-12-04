<?php
    require '../function.php';

    if (isset($_POST['aksi'])) {
        if ($_POST['aksi'] == "add") {

            $name =  $_POST['name'];
            $email =  $_POST['email'];
            $phone =  $_POST['phone'];
            $address =  $_POST['address'];
            $date = $_POST['date']; 
            $age = $_POST['age']; 
            $gender = $_POST['gender']; 
            $program =  $_POST['program'];
            $photo = $_FILES['photo']['name'];

            $dir = 'asset/imgPeserta/';
            $tmpFile = $_FILES['photo']['tmp_name'];

            move_uploaded_file($tmpFile, $dir . $photo);

            $query = "INSERT INTO tb_pendaftaran 
                        VALUES (null, '$name', '$email', '$phone', '$address', '$date', $age, '$gender', '$program', '$photo')";
            $sql = mysqli_query($koneksi, $query);

            if ($sql) {
                header("location:peserta.php");
            } else {
                echo mysqli_error($koneksi);
            }
        } else if ($_POST['aksi'] == "edit") {

            $id_pendaftaran = $_POST['id_pendaftaran'];
            $name =  $_POST['name'];
            $email =  $_POST['email'];
            $phone =  $_POST['phone'];
            $address =  $_POST['address'];
            $date = $_POST['date'];
            $age = $_POST['age'];
            $gender = $_POST['gender'];
            $program =  $_POST['program'];

            // Query untuk mengambil data lama
            $queryShow = "SELECT * FROM tb_pendaftaran WHERE id_pendaftaran = '$id_pendaftaran';";
            $sqlShow = mysqli_query($koneksi, $queryShow);
            $result = mysqli_fetch_assoc($sqlShow);

            // Jika foto tidak diganti
            if ($_FILES['photo']['name'] == "") {
                $photo = $result['photo'];
            } else {
                $photo = $_FILES['photo']['name'];

                // Menghapus foto lama
                if (file_exists('asset/imgPeserta/' . $result['photo'])) {
                    unlink('asset/imgPeserta/' . $result['photo']);
                }

                // Upload foto baru
                move_uploaded_file($_FILES['photo']['tmp_name'], 'asset/imgPeserta/' . $photo);
            }

            // Query untuk mengupdate data
            $query = "UPDATE tb_pendaftaran 
                      SET name='$name', email='$email', phone='$phone', address='$address', 
                          date='$date', age=$age, gender='$gender', program='$program', photo='$photo' 
                      WHERE id_pendaftaran='$id_pendaftaran';";
            $sql = mysqli_query($koneksi, $query);

            if ($sql) {
                header("location:peserta.php");
            } else {
                echo mysqli_error($koneksi);
            }
        }
    }

    if (isset($_GET['hapus'])) {
        $id_pendaftaran = $_GET['hapus'];

        // Query untuk mengambil data lama
        $queryShow = "SELECT * FROM tb_pendaftaran WHERE id_pendaftaran = '$id_pendaftaran'";
        $sqlShow = mysqli_query($koneksi, $queryShow);
        $result = mysqli_fetch_assoc($sqlShow);

        // Menghapus file foto
        if (file_exists('asset/img/' . $result['photo'])) {
            unlink('asset/img/' . $result['photo']);
        }

        // Query untuk menghapus data
        $query = "DELETE FROM tb_pendaftaran WHERE id_pendaftaran = '$id_pendaftaran';";
        $sql = mysqli_query($koneksi, $query);

        if ($sql) {
            header("location:peserta.php");
        } else {
            echo $query;
        }
    }
?>
