<?php

$koneksi = mysqli_connect("localhost", "root", "", "db_mt8_weblembagapelatihan");

mysqli_select_db($koneksi, "db_mt8_weblembagapelatihan");


//login
if(isset($_POST['login'])) {
    $username = $_POST['uname'];
    $password = $_POST['psw'];

    $cekuser = mysqli_query($koneksi, "SELECT * FROM users WHERE username = '$username' AND password = '$password'");
    $hitung = mysqli_num_rows($cekuser);

    if($hitung > 0) {
        $ambildatarole = mysqli_fetch_array($cekuser);
        $role = $ambildatarole['role'];
        
        if($role == 'admin') {
        
            $_SESSION['log'] = 'Logged'; 
            $_SESSION['role'] = 'admin';
            header('location:admin');

        }else if($role == 'user') {
            $_SESSION['log'] = 'Logged';
            $_SESSION['role'] = 'user';
            header('location:user');
        }

    }else{
        echo 'data tidak ditemukan';
    }
};

//register
if(isset($_POST['register'])) {
    $username = $_POST['uname'];
    $email = $_POST['remail'];
    $password = $_POST['psw'];

    $cekuser = mysqli_query($koneksi, "SELECT * FROM users WHERE username = '$username' AND email = '$email' AND password = '$password'");
    $hitung = mysqli_num_rows($cekuser);

    if($hitung > 0) {
        $ambildatarole = mysqli_fetch_array($cekuser);
        $role = $ambildatarole['role'];
        
        if($role == 'admin') {
        
            $_SESSION['reg'] = 'Regged';
            $_SESSION['role'] = 'admin';
            header('location:./login.php');

        }else if($role == 'user') {
            $_SESSION['reg'] = 'Regged';
            $_SESSION['role'] = 'user';
            header('location:./login.php');
        }

    }else{
        echo 'data tidak ditemukan';
    }
};

//fungsi tambah pendafaran
if(isset($_POST['tambahPendaftaran'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];
    $date = $_POST['date'];
    $age = $_POST['age'];
    $gender = $_POST['gender'];
    $program = $_POST['program'];
    $photo = $_POST['photo'];

    $tambahpendaftaran = mysqli_query($koneksi, "INSERT INTO tb_pendaftaran (name, email, phone, address, date, age, gender, program, photo) VALUES ('$name', '$email', '$phone', '$address', '$date', '$age', '$gender', '$program', '$photo')");   

    if($addnewpendaftaran){
        header('location:../admin');
    }else{
        header('location:../admin');
    }

//fungsi tambah Kontak Kami
if(isset($_POST['tambahKontakKami'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $message = $_POST['message'];

    $tambahKontakKami = mysqli_query($koneksi, "INSERT INTO tb_kontak_kami (name, email, message) VALUES ('$name', '$email', '$message')");   

    if($addnewMessageKontak){
        header('location:../admin/dataMessageKontak.php');
    }else{
        header('location:../admin/dataMessageKontak.php');
    }
}

//kelola ber


}
?>