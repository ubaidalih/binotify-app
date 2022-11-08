<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="/binotify-app/public/styles/home.css">
    <link rel="stylesheet" href="/binotify-app/public/styles/music.css">
</head>
<body>
    <header>
        <div class="header-container">
            <div class="header-logo">
                <a href="/binotify-app/public/home/admin/"><img src="/binotify-app/public/img/spotify-logo.png" /></a>
            </div>
            <ul class="navbar-desktop">
                <li><a href="/binotify-app/public/tambahlagu/index"> Tambah lagu </a></li>
                <li><a href="/binotify-app/public/tambahalbum/index"> Tambah album </a></li>
                <li><a href="/binotify-app/public/daftaralbum/admin/1"> Daftar album </a></li>
                <li><a href="/binotify-app/public/daftaruser/index"> Daftar user </a></li>
                <li role="separator"> </li>
                <div class="profpict-logo">
                    <img src="/binotify-app/public/img/profpict.png"/>
                </div>
                <?php
                    $username = $_COOKIE['username'];
                ?>
                <li><a href="#"> <?php echo  $username; ?> </a></li>
                <li><a href="/binotify-app/public/home/logout"> Logout </a></li>
            </ul>
    </header>
    <div class="musicContainer">
            <div class="card">
                <div class="container">
            
                    
                    <img src="<?= $data["detail_song"][0][4]; ?>" alt="" style="width:100%">
                    
                    <div class="card-text-container">
                        <h6> <?php echo $data["detail_song"][0][0]; ?> </h6>
                        <span> <?php echo $data["detail_song"][0][1]; ?></span> <br>
                        <span><?php 
                                $minutes = sprintf("%02d", (floor($data["detail_song"][0][2]/60)));
                                $seconds = sprintf("%02d", ($data["detail_song"][0][2] % 60));
                        echo $minutes.":".$seconds; ?></span><br>
                         <span><?php echo $data["detail_song"][0][3]; ?></span><br>
                         <span><?php echo $data["detail_song"][0][5]; ?></span><br>
                         </h6>
                    </div>
                </div>
                <div class="audio-container">
                    <audio controls preload = "metadata">
                        <source src=<?php echo $data["detail_song"][0][6]; ?> type="audio/mpeg" >
                        Your browser does not support the audio element.
                    </audio>
                    <div class="audio-container-styled">
                    </div>
                    <script type="module" src="/binotify-app/public/js/music.js"></script>
                </div>
                <div class="button-container">
                            <div id="boxes"><a href="/binotify-app/public/detaillagu/edit/<?php echo $data["detail_song"][0][0]; ?>">Edit</a></div>
                            <div id="boxes"><a href="/binotify-app/public/detaillagu/delete/<?php echo $data["detail_song"][0][0]; ?>/<?php echo $_SERVER['HTTP_REFERER']; ?>">Delete</a></div>
                    </div>
            </div>
        </div>
</body>
</html>