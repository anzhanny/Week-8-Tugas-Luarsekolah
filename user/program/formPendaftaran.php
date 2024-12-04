<?php
require_once '../../function.php';

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



<!DOCTYPE html>
   <html lang="en">
   <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <link rel="stylesheet" href="assets/css/styles.css">
      <link rel="stylesheet" href="../asset/style.css">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
      <link href='https://fonts.googleapis.com/css?family=Poppins' rel='stylesheet'>
   </head>
   <body>
      <header id="header" class="header d-flex align-items-center sticky-top">
         <div class="container-fluid container-xl position-relative d-flex align-items-center justify-content-between">
             <a href="./../index.php" class="logo d-flex align-items-center">
                 <img src="../asset/img/icon deeniyat.png" alt="logo" >
             </a>
     
             <nav id="navmenu" class="navmenu">
                 <ul>
                     <li><a href="./../index.php" class="active">Home</a></li>
                     <li><a href="./../profile.html">Profile</a></li>
                     <li><a href="program.html">Program</a></li>
                     <li><a href="./../informasi.html">Informasi</a></li>
                     <li><a href="./../galeri.html">Galeri</a></li>
                     <li><a href="./../kontak.html">Kontak</a></li>
                     <li>
                         <input class="search-bar" type="text" placeholder="Search..." >
                     </li>
                 </ul>
             </nav>

            <!-- <div class="auth-links-logout" style="margin-right: 10px; margin-top: 38px;">
                <a href="./../logout.php" class="auth-link-logout" style="margin-right: 10px; ">
                    <i class="fa-solid fa-arrow-up-right-from-square"></i>                
            </div> -->
         </div>
     </header>

<div class="container-form-regist">
    <div class="content-pendaftaran">
        <div class="registration-form">
            <h2>Formulir Registrasi</h2>
            <form method="post" action="../../admin/prosesPeserta.php" enctype="multipart/form-data">
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
                        simpan
                    </button>  
                  <?php
                  }
                  ?>   
                </div>
            </div>
          </form>
        </div>
    </div>
</div>

<footer class="footer">
   <div class="container" style="height: 95px;">
       <div class="footer-content">
           <div class="footer-logo">
               <img src="../asset/img/icon deeniyat.png" alt="" width="80px">
           </div>
           <div class="footer-info">
               <h4>Deeniyat</h4>
               <p>
                   sebuah lembaga pelatihan yang hadir dengan tidak hanya melalui pengajaran teori,tetapi juga pendekatan praktis.
               </p>
           </div>
           <div class="footer-address">
               <a href="https://maps.app.goo.gl/JDwKuq8umiLVQ7wL8">
                   <i class="fa-solid fa-map-location-dot icon-social"></i>                </a>
               
               <p>
                   Jl. Sukaluyu Pasir Biru, Kec. Cibiru, Kota Bandung, Jawa Barat 40615
               </p>
           </div>
           
           <div class="footer-social">
               <h4>Follow us</h4>
               <p>
               <a href="https://www.instagram.com" target="_blank" class="social-icon">
                   <i class="fab fa-instagram icon-social"></i>                    <!-- <img src="icon/instagram.png" alt=""> -->
               </a>
               <a href="https://www.twitter.com" target="_blank" class="social-icon">
                   <i class="fab fa-twitter icon-social"></i>                    <!-- <img src="icon/instagram.png" alt=""> -->
               </a>
               <a href="https://wa.me/6281234567890" target="_blank" class="social-icon">
                   <i class="fab fa-whatsapp icon-social"></i>                    <!-- <img src="icon/instagram.png" alt=""> -->
               </a>
               <a href="https://www.youtube.com/" target="_blank" class="social-icon">
                   <i class="fab fa-youtube icon-social"></i>                    <!-- <img src="icon/instagram.png" alt=""> -->
               </a>
           </p>
           </div>
          
       </div>
   </div>
   </footer>
   </body>
</html>
