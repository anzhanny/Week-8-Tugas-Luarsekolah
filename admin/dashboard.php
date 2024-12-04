<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard-Admin</title>
    <link rel="stylesheet" href="dashboard.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link href='https://fonts.googleapis.com/css?family=Poppins' rel='stylesheet'>
</head>
<body>
    <div class="sidebar">
        <div class="top">
            <i class="fa-solid fa-bars" id="btn"></i>
            <div class="logo">
            <img src="asset/img/icon deeniyat.png" alt="" style="width: 80px; margin-left: 10px;">
            </div>
        </div>
        <div class="user">
            <i class="fa-solid fa-user"></i>
            <div>
                <p class="bold">Admin</p>
            </div>     
        </div>
        <ul>
            <li>
                <a href="dashboard.php">
                    <i class="fa-solid fa-house"></i>
                    <span class="nav-item">Dashboard</span>
                </a>
                <span class="tooltip">Dashboard</span>
            </li>
            <li>
                <a href="peserta.php">
                <i class="fa-solid fa-users"></i>                    
                <span class="nav-item">Peserta</span>
                </a>
                <span class="tooltip">Peserta</span>
            </li>
            <li>
                <a href="pelatih.php">
                    <i class="fa-solid fa-dumbbell"></i>
                    <span class="nav-item">Pelatih</span>
                </a>
                <span class="tooltip">Pelatih</span>
            </li>
            <li>
                <a href="program/program.php">
                    <i class="fa-solid fa-list-check"></i>
                    <span class="nav-item">Program</span>
                </a>
                <span class="tooltip">Program</span>
            </li>
            <li>
                <a href="berita.php">
                    <i class="fa-solid fa-book-open"></i>
                    <span class="nav-item">Berita</span>
                </a>
                <span class="tooltip">Berita</span>
            </li>
            <br><br><br><br><br><br>
            <li>
                <a href="../login.php">
                    <i class="fa-solid fa-right-from-bracket"></i>
                    <span class="nav-item">Logout</span>
                </a>
                <span class="tooltip">Logout</span>
            </li>
        </ul>
    </div>

    <div class="main-content">
        <div class="container">
            <h1>Dashboard</h1>
        </div>

    </div>
</body>

<script>
    let btn = document.querySelector('#btn');
    let sidebar = document.querySelector('.sidebar');

    btn.onclick = function(){
        sidebar.classList.toggle('active');
    };
</script>
</html>