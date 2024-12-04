<?php

require '../function.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="stylesheet" href="asset/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link href='https://fonts.googleapis.com/css?family=Poppins' rel='stylesheet'>
</head>
<body>
    <header id="header" class="header d-flex align-items-center sticky-top">
        <div class="container-fluid container-xl position-relative d-flex align-items-center justify-content-between">
            <a href="index.php" class="logo d-flex align-items-center">
                <img src="asset/img/icon deeniyat.png" alt="logo" >
            </a>
    
            <nav id="navmenu" class="navmenu">
                <ul>
                    <li><a href="index.php" class="active">Home</a></li>
                    <li><a href="profile.html">Profile</a></li>
                    <li><a href="./program/program.html">Program</a></li>
                    <li><a href="informasi.html">Informasi</a></li>
                    <li><a href="galeri.html">Galeri</a></li>
                    <li><a href="kontak.html">Kontak</a></li>
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
    
    <main class="main">
        <section id="slideshow">
            <div class="slideshow-slides">
                <div class="slide" style="background-image: url('asset/img/slidshow1.jpg');"></div>
                <div class="slide" style="background-image: url('asset/img/slidshow2.jpg');"></div>
                <div class="slide" style="background-image: url('asset/img/slidshow3.jpg');"></div>
                
            </div>
            <div class="container slideshow-content">
                <h2 class="fade-in">Selamat Datang di Lembaga Pelatihan Deeniyat</h2>
                <button class="slideshow-button">
                    <a href="./program/program.html" style="text-decoration: none; color: white">Daftar Program</a>
                </button>

            </div>
        </section>
        
        <section id="home" class="home section">
            <div id="home-content" class="home-content">
                <h1>Selamat Datang, </h1>
                <h3>Lembaga Pendidikan Deeniyat</h3>
                <p>
                    <b>Deeniyat</b> adalah sebuah lembaga pelatihan pendidikan agama yang menyelenggarakan Program Pembinaan Intensif untuk anak-anak, remaja, hingga dewasa.
                    <!-- <a href="profile.html">Lihat Selengkapnya</a> -->
                </p>
                <p>
                    Program Deeniyat bertujuan untuk membekali para peserta dengan pemahaman agama yang lebih dalam, tidak hanya melalui pengajaran teori, tetapi juga dengan pendekatan praktis. Pembelajaran yang diberikan meliputi:
                    <ul>
                        <li>
                            Pembacaan dan hafalan ayat-ayat Al-Qur'an sesuai tingkat kemampuan peserta.
                        </li>
                        <li>
                            Pengenalan dasar-dasar akhlak Islami dan penerapannya dalam kehidupan sehari-hari.
                        </li>
                        <!-- <li>.... <a href="program.html">Lihat Selengkapnya</a></li> -->
                        
                    </ul>
                </p>
                    Dengan metode pengajaran yang adaptif dan mendalam, Deeniyat memastikan bahwa setiap peserta dapat menginternalisasi nilai-nilai agama dengan cara yang mudah dipahami dan sesuai dengan tahapan perkembangan mereka.
                    <!-- <a href="informasi.html">Lihat Selengkapnya</a> -->
                </p>
            </div>
            <div class="video-container">
                <iframe width="100%" height="315" src="https://www.youtube.com/embed/ZqKuuxBVC4g" frameborder="0" allowfullscreen></iframe>
            </div>
            
        </section>

    </main>
    
    <footer class="footer">
    <div class="container">
        <div class="footer-content">
            <div class="footer-logo">
                <img src="asset/img/icon deeniyat.png" alt="" width="80px">
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
                    <i class="fab fa-instagram icon-social"></i>                    
                <a href="https://www.twitter.com" target="_blank" class="social-icon">
                    <i class="fab fa-twitter icon-social"></i>                    
                </a>
                <a href="https://wa.me/6281234567890" target="_blank" class="social-icon">
                    <i class="fab fa-whatsapp icon-social"></i>                    
                </a>
                <a href="https://www.youtube.com/" target="_blank" class="social-icon">
                    <i class="fab fa-youtube icon-social"></i>                    
                </a>
            </p>
            </div>
           
        </div>
    </div>
    </footer>
    <script>
        const slides = document.querySelectorAll('.slide');
        let currentIndex = 0;

        function showNextSlide() {
            currentIndex = (currentIndex + 1) % slides.length;
            document.querySelector('.slideshow-slides').style.transform = `translateX(-${currentIndex * 100}%)`;
        }

        setInterval(showNextSlide, 3000);
    </script>

</body>
</html>