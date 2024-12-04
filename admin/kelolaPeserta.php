<!DOCTYPE html>

<?php
  require '../function.php';

  $id_pendaftaran = '';
  $name = '';
  $email = '';
  $phone = '';
  $address = '';
  $date = '';
  $age = '';
  $gender = '';
  $program = '';

  if (isset($_GET['ubah'])) {
    $id_pendaftaran = $_GET['ubah'];

    // Perbaikan klausa WHERE
    $query = "SELECT * FROM tb_pendaftaran WHERE id_pendaftaran = '$id_pendaftaran'";
    $sql = mysqli_query($koneksi, $query);

    if ($sql && mysqli_num_rows($sql) > 0) {
      $result = mysqli_fetch_assoc($sql);

      $name = $result['name'];
      $email = $result['email'];
      $phone = $result['phone'];
      $address = $result['address'];
      $date = $result['date'];
      $age = $result['age'];
      $gender = $result['gender'];
      $program = $result['program'];
    } else {
      echo "Data tidak ditemukan.";
    }
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
          <form method="post" action="prosesPeserta.php" enctype="multipart/form-data">
          <input type="hidden" value="<?php echo $id_pendaftaran; ?>" name="id_pendaftaran">
            <div class="row">
            <div>
                <label for="name">Nama lengkap</label>
                <input required type="text" id="name" name="name" placeholder="Masukkan Nama" value="<?php echo $name; ?>">
            </div>
            </div>
            <div class="row">
            <div>
                <label for="email">Email</label>
                <input required type="email" id="email" name="email" placeholder="Masukkan Email" value="<?php echo $email; ?>">
            </div>
            </div>
            <div class="row">
            <div>
                <label for="phone">Telepon</label>
                <input required type="tel" id="phone" name="phone" placeholder="Masukkan Nomor Telepon" value="<?php echo $phone; ?>">
            </div>
            </div>
            <div class="row">
            <div>
                <label for="address">Alamat</label>
                <input required type="text" id="address" name="address" placeholder="Masukkan Alamat" value="<?php echo $address; ?>">
            </div>
            </div>
            <div class="row">
            <div>
                <label for="date">Tanggal</label>
                <input required type="date" id="date" name="date" value="<?php echo $date; ?>">
            </div>
            </div>
            <div class="row">
            <div>
                <label for="age">Umur</label>
                <input required type="number" id="age" name="age" placeholder="Masukkan Umur" value="<?php echo $age; ?>">
            </div>
            </div>
            <div class="row">
            <div>
                <label for="gender">Jenis Kelamin</label>
                <select required id="gender" name="gender">
                <option value="" disabled selected>Pilih Jenis Kelamin</option>
                <option value="Laki-laki" <?php echo ($gender == 'Laki-laki') ? 'selected' : ''; ?>>Laki-laki</option>
                <option value="Perempuan" <?php echo ($gender == 'Perempuan') ? 'selected' : ''; ?>>Perempuan</option>
                </select>
            </div>
            </div>
            <div class="row">
            <div>
              <label for="program">Program</label>
                <select required id="program" name="program">
                    <option value="" disabled selected>Pilih Program</option>
                    <option value="quran" <?php echo ($program == 'quran') ? 'selected' : ''; ?>>Qur'an</option>
                    <option value="hadith" <?php echo ($program == 'hadith') ? 'selected' : ''; ?>>Hadits</option>
                    <option value="aqidah" <?php echo ($program == 'aqidah') ? 'selected' : ''; ?>>Aqidah</option>
                    <option value="fiqih" <?php echo ($program == 'fiqih') ? 'selected' : ''; ?>>Fiqih</option>
                    <option value="pendidikan" <?php echo ($program == 'pendidikan') ? 'selected' : ''; ?>>Pendidikan Islam</option>
                    <option value="arab" <?php echo ($program == 'arab') ? 'selected' : ''; ?>>Bahasa Arab</option>
                </select>

            </div>
            </div>

            <div class="mb-3">
                <label for="photo">Upload Photo</label>
                <input <?php if (!isset($_GET['ubah'])) {echo 'required';} ?>  class="form-control" type="file" name="photo" id="photo" accept="image/*">
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
                    <a href="peserta.php" type="button" class="btn btn-danger">
                        Batal
                    </a>    
                </div>
            </div>
          </form>
        </div>
        
        </body>
        </html>
        