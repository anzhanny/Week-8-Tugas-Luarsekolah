<?php
require '../function.php';


$query = "SELECT * FROM tb_pendaftaran";
$sql = mysqli_query($koneksi, $query);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Peserta</title>
    <link rel="stylesheet" href="dashboard.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link href='https://fonts.googleapis.com/css?family=Poppins' rel='stylesheet'>
    <style>
        table {
        border-collapse: collapse;
        border-spacing: 0;
        width: 100%;
        border: 1px solid #ddd;
        font-size: 12px;
        }

        .thead{
          background-color: #005F80;
          color: white;
        }

        th, td {
        text-align: left;
        padding: 8px;
        }

        tr:nth-child(even){background-color: #daf0ff}

        .table-content{
            width: 100%;
            padding: 20px;
            position: relative;
        }
    </style>
</head>
<body>
    <?php
        include 'index.php';
    ?>

<div class="main-content">
    <div class="container">
      <div class="table-content">
        <h2 align="center">Kelola Data Peserta</h2>
        <button style="background-color: #008CBA; border: none; color: white; padding: 10px 27px; text-align: center; text-decoration: none; display: inline-block; font-size: 12px; border-radius: 5px">
          <a href="kelolaPeserta.php" style="color: white; text-decoration: none ">
            + Add Data Peserta</a></button> 
          <br><br>
            <div style="overflow-x:auto;">
              <table>
                <thead class="thead">
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
                    while($result = mysqli_fetch_assoc($sql)){
                    ?>
                        <tr>
                        <td><?php echo $result['name']; ?></td>
                        <td><?php echo $result['email']; ?></td>
                        <td><?php echo $result['phone']; ?></td>
                        <td><?php echo $result['address']; ?></td>
                        <td><?php echo $result['date']; ?></td>
                        <td><?php echo $result['age']; ?></td>
                        <td><?php echo $result['gender']; ?></td>
                        <td><?php echo $result['program']; ?></td>
                        <td><img src="asset/imgPeserta/<?php echo $result['photo'];?>" style="width: 100px; height: 150px;"></td>
                        <td>
                            <a href="kelolaPeserta.php?ubah=<?php echo $result['id_pendaftaran'];?>"  >
                            <i class="fa-solid fa-pen-to-square"style="color: #04AA6D;" ></i>
                            </a>
                            <a href="prosesPeserta.php?hapus=<?php echo $result['id_pendaftaran'];?>">
                                    <i class="fa-solid fa-trash"  style="color: #f44336;" onClick="return confirm('Apakah anda yakin ingin menghapus data ini?')"> </i>
                            </a>
                        </td>
                        </tr>

                        <?php
                        };
                        ?>

                    </tbody>
                </table>
                </div>
            </div>
        </div>

    </div>
</body>
</html>