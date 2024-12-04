<!DOCTYPE html>

<?php
  require '../function.php';

  $id_program = '';
  $urutan_program = '';
  $nama_program = '';
  $detail_program = '';
  

  if (isset($_GET['ubah'])) {
    $id_program = $_GET['ubah'];

    $query = "SELECT * FROM tb_program WHERE id_program = '$id_program'";
    $sql = mysqli_query($koneksi, $query);

    $result = mysqli_fetch_assoc($sql);

    $urutan_program = $result['urutan_program'];
    $nama_program = $result['nama_program'];
    $detail_program = $result['detail_program'];
    
    // $gambar = $result['gambar'];

    // var_dump($result);

    // die();
  }
?>

<html>
<head>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link href='https://fonts.googleapis.com/css?family=Poppins' rel='stylesheet'>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style>
        * {
          box-sizing: border-box;
        }
        
        input[type=text], select, textarea {
          width: 100%;
          padding: 12px;
          border: 1px solid #ccc;
          border-radius: 4px;
          resize: vertical;
        }
        
        label {
          padding: 12px 12px 12px 0;
          display: inline-block;
        }
        
        input[type=submit] {
          background-color: #04AA6D;
          color: white;
          padding: 12px 20px;
          border: none;
          border-radius: 4px;
          cursor: pointer;
          float: right;
        }
        
        input[type=submit]:hover {
          background-color: #45a049;
        }
        
        .container {
          border-radius: 5px;
          background-color: #f2f2f2;
          padding: 20px;
        }
        
        .col-25 {
          float: left;
          width: 25%;
          margin-top: 6px;
        }
        
        .col-75 {
          float: left;
          width: 75%;
          margin-top: 6px;
        }
        
        .row:after {
          content: "";
          display: table;
          clear: both;
        }
        
        @media screen and (max-width: 600px) {
          .col-25, .col-75, input[type=submit] {
            width: 100%;
            margin-top: 0;
          }
        }
        </style>
        </head>
        <body>        
        <div class="container">
          <form method="post" action="prosesProgram.php" enctype="multipart/form-data">
            <input type="hidden" value="<?php echo $id_program;?>" name="id_program">
            <div class="row">
              <div >
                <label for="noprogram">Urutan Program</label>
                <input required type="text" id="noprogram" name="urutan_program" placeholder="Masukan Urutan Program" value="<?php echo $urutan_program; ?>">
              </div>
            </div>
            <div class="row">
              <div >
                <label for="nameprogram">Nama Program</label>
                <input required type="text" id="nameprogram" name="nama_program" placeholder="Masukan Nama Program" value="<?php echo $nama_program; ?>">
              </div>
            </div>
            <div class="row">
              <div>
                <label for="det-program">Detail Program</label>
                <textarea required name="detail_program" id="det-program" placeholder="Masukan Detail Program" ><?php echo $detail_program; ?></textarea>
              </div>
            </div>
            
            <div class="row mb-3 mt-3">
                <div class="col">
                  <?php
                  if (isset($_GET['ubah'])) {
                  ?>
                  
                    <button type="submit" name="aksi" value="edit" class="btn btn-success">
                        Update
                    </button>  
                  <?php
                  } else {
                  ?>
                  <button type="submit" name="aksi" value="add" class="btn btn-primary">
                        Tambahkan
                    </button>  
                  <?php
                  }
                  ?>
                    <a href="program.php" type="button" class="btn btn-danger">
                        Batal
                    </a>    
                </div>
            </div>
          </form>
        </div>
        
        </body>
        </html>
        