<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="/tugas-besar-1/public/styles/home.css">
    <link rel="stylesheet" href="/tugas-besar-1/public/styles/music.css">
</head>
<body>
    <header>
        <div class="header-container">
            <div class="header-logo">
                <a href="/tugas-besar-1/public/home/user/"><img src="/tugas-besar-1/public/img/spotify-logo.png" /></a>
            </div>
            <ul class="navbar-desktop">
                <li><a href="/tugas-besar-1/public/daftaralbum/user/1"> Daftar Album </a></li>
                <li role="separator"> </li>
                <div class="profpict-logo">
                    <img src="/tugas-besar-1/public/img/profpict.png"/>
                </div>
                <?php if(isset($_COOKIE['username'])) :?>
                    <?php
                        $username = $_COOKIE['username'];
                    ?>
                    <li><a href="#"> <?php echo  $username; ?> </a></li>
                    <li><a href="/tugas-besar-1/public/home/logout"> Logout </a></li>
                <?php else:?>
                    <li><a>Guest</a></li>
                    <li><a href="/tugas-besar-1/public/login"> Login </a></li>
                <?php endif;?>
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
                    <audio controls >
                        <source src=<?php echo $data["detail_song"][0][6]; ?> type="audio/mpeg" >
                        Your browser does not support the audio element.
                    </audio>
                </div>
            </div>
    </div>
</body>
</html>