<?php
  require '../function.php';


  $query = "SELECT * FROM tb_program";
  $sql = mysqli_query($koneksi, $query);

  // $no = 0;

?>

<!DOCTYPE html>
<html>
<head>
    <title>Data-Program</title>
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
        <h2 align="center">Kelola Data Program</h2>
          <button style="background-color: #008CBA; border: none; color: white; padding: 10px 27px; text-align: center; text-decoration: none; display: inline-block; font-size: 12px; border-radius: 5px">
          <a href="kelolaProgram.php" style="color: white; text-decoration: none ">
            + Add Data Program</a></button> 
          <br><br>
            <div style="overflow-x:auto;">
              <table>
                <thead class="thead">
                  <tr>
                    <th>Urutan Program</th>
                    <th>Nama Program</th>
                    <th width="50%">Detail Program</th>
                    <th>Aksi</th>
                  </tr>
                </thead>

                <tbody>
                  <?php
                    while($result = mysqli_fetch_assoc($sql)){
                  ?>
                  <tr>
                    <td>
                      <?php echo $result['urutan_program'];?>
                    </td>
                    <td>
                      <?php echo $result['nama_program'];?></td>
                    <td>
                        <?php echo $result['detail_program'];?></td>
                    </td>
                    <td>
                      <a href="kelolaProgram.php?ubah=<?php echo $result['id_program'];?>"  >
                      <i class="fa-solid fa-pen-to-square"style="color: #04AA6D;" ></i>
                      </a>
                      <a href="prosesProgram.php?hapus=<?php echo $result['id_program'];?>">
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