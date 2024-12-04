<?php

require '../function.php';
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

<style>
table {
  border-collapse: collapse;
  border-spacing: 0;
  width: 100%;
  border: 1px solid #ddd;
}

th, td {
  text-align: left;
  padding: 8px;
}

tr:nth-child(even){background-color: #f2f2f2}
</style>
</head>
<body>
<h1 align="center">Form Pendaftaran Program</h1>

<div style="overflow-x:auto;">
  <table>
    <thead>
        <tr>
            <th>Nama</th>
            <th>email</th>
            <th>No Hp</th>
            <th>Alamat</th>
            <th>Tanggal Lahir</th>
            <th>Usia</th>
            <th>Jenis Kelamin</th>
            <th>Program</th>
            <th>Photo</th>
            <th>Aksi</th>
        </tr>
    </thead>

    <tbody>
    <?php
        $loop = mysqli_query($koneksi, "SELECT * FROM tb_pendaftaran");
        while($tb_pendaftaran = mysqli_fetch_array($loop)){
    ?>
        <tr>
            <td><?=$tb_pendaftaran['name']?></td>
            <td><?=$tb_pendaftaran['email']?></td>
            <td><?=$tb_pendaftaran['phone']?></td>
            <td><?=$tb_pendaftaran['address']?></td>
            <td><?=$tb_pendaftaran['date']?></td>
            <td><?=$tb_pendaftaran['age']?></td>
            <td><?=$tb_pendaftaran['gender']?></td>
            <td><?=$tb_pendaftaran['program']?></td>
            <td><?=$tb_pendaftaran['photo']?></td>
            <td><?=$tb_pendaftaran['aksi']?>
              create/edit
            </td>
        </tr>

        <?php
        };
        ?>

    </tbody>
  </table>

  <br><br>

    <h1>Tambah Data Pendaftaran</h1>
    <form method="post">
    <input type="text" name="name" class="form-control" placeholder="Masukan Nama">
    <input type="text" name="email" class="form-control" placeholder="Masukan Email">
    <input type="text" name="phone" class="form-control" placeholder="Masukan No Hp">
    <input type="text" name="address" class="form-control" placeholder="Masukan Alamat">
    <input type="text" name="date" class="form-control" placeholder="Date"> 
    <input type="text" name="age" class="form-control" placeholder="Masukan Usia">
    <input type="text" name="gender" class="form-control" placeholder="Gender">
    <input type="text" name="program" class="form-control" placeholder="Program">
    <input type="text" name="photo" class="form-control" placeholder="Photo">
    <button type="submit" name="tambahPendaftaran" class="btn btn-primary">Submit</button>
</div>

</body>
</html>