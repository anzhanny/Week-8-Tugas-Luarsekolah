<!DOCTYPE html>

<?php
  require '../function.php';

  $id_pelatih = '';
  $nama_pelatih = '';
  $nip = '';
  $jabatan = '';

  

  if (isset($_GET['ubah'])) {
    $id_pelatih = $_GET['ubah'];

    $query = "SELECT * FROM tb_pelatih WHERE id_pelatih = '$id_pelatih'";
    $sql = mysqli_query($koneksi, $query);

    $result = mysqli_fetch_assoc($sql);

    $nama_pelatih = $result['nama_pelatih'];
    $nip = $result['nip'];
    $jabatan = $result['jabatan'];
    
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
          <form method="post" action="prosesPelatih.php" enctype="multipart/form-data">
            <input type="hidden" value="<?php echo $id_pelatih;?>" name="id_pelatih">
            <div class="row">
              <div >
                <label for="name_pelatih">Nama Pelatih</label>
                <input required type="text" id="name_pelatih" name="nama_pelatih" placeholder="Masukan Nama Pelatih" value="<?php echo $nama_pelatih; ?>">
              </div>
            </div>
            <div class="row">
              <div>
                <label for="nip">NIP</label>
                <input required type="text" id="nip" name="nip" placeholder="Masukan NIP" value="<?php echo $nip; ?>">
              </div>
            </div>
            <div class="row">
              <div>
                <label for="jabatan" > Pilih Jabatan </label>
                <select required name="jabatan" id="jb" class="form-select">
                  <option <?php if ($jabatan == 'Pelatih Al Quran') {echo 'selected';} ?> value="Pelatih Al Quran">Pelatih Al Quran</option>
                  <option  <?php if ($jabatan == 'Pelatih Hadits') {echo 'selected';} ?> value="Pelatih Hadits">Pelatih Hadits</option>
                  <option  <?php if ($jabatan == 'Pelatih Aqidah Fiqih') {echo 'selected';} ?> value="Pelatih Aqidah Fiqih">Pelatih Aqidah Fiqih</option>
                  <option  <?php if ($jabatan == 'Pelatih Pendidikan Islam') {echo 'selected';} ?> value="Pelatih Pendidikan Islam">Pelatih Pendidikan Islam</option>
                  <option  <?php if ($jabatan == 'Pelatih Bahasa Arab') {echo 'selected';} ?> value="Pelatih Bahasa Arab">Pelatih Bahasa Arab</option>
                </select>
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
                    <a href="pelatih.php" type="button" class="btn btn-danger">
                        Batal
                    </a>    
                </div>
            </div>
          </form>
        </div>
        
        </body>
        </html>
        