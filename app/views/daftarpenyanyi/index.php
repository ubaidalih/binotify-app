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
                <a href="/binotify-app/public/home/user/"><img src="/binotify-app/public/img/spotify-logo.png" /></a>
            </div>
            <ul class="navbar-desktop">
                <li><a href="/binotify-app/public/daftaralbum/user/1"> Daftar Album </a></li>
                <li><a href="/binotify-app/public/daftarpenyanyi/user/1"> Penyanyi Premium </a></li>
                <li role="separator"> </li>
                <div class="profpict-logo">
                    <img src="/binotify-app/public/img/profpict.png"/>
                </div>
                <?php if(isset($_COOKIE['username'])) :?>
                    <?php
                        $username = $_COOKIE['username'];
                    ?>
                    <li><a href="#"> <?php echo  $username; ?> </a></li>
                    <li><a href="/binotify-app/public/home/logout"> Logout </a></li>
                <?php else:?>
                    <li><a>Guest</a></li>
                    <li><a href="/binotify-app/public/login"> Login </a></li>
                <?php endif;?>
            </ul>
    </header>
    <div class="musicContainer">
    <div id="pagination-container">
        <section>
            <h2>Penyanyi</h2>
            <?php if ($data == false) :?>
                <div class="no-result">
                    <h3>No singer found</h3>
                </div>
            <?php else:?>
                <?php for($index = 0; $index < count($data['data']); $index++) : ?>
                    <div class="music-card">
                        <div class="info">
                            <h4> <?php echo $index + 1;?> </h4>
                            <div class="detail">
                                <h4 class="artist-name"> <?php echo $data['data'][$index]->name ?></h4>
                            </div>
                            <?php if ($data['data'][$index]->subscribed == false) :?>
                                <button name="subject" type="submit" id="penyanyi" onclick=""><?= "Subscribe" ?></button>
                            <?php else:?>
                                <button name="subject" type="submit" id="penyanyi" onclick='location.href="http://localhost/binotify-app/public/lagupremium/index/<?php echo $data['data'][$index]->user_id ?>/"'><?= "View" ?></button>
                            <?php endif;?> 
                        </div>
                    </div>
                <?php endfor; ?>
                <div class="pag-section">
                <?php for($i=1;$i<=$data['pageTotal'];$i++):?>
                    <button name="subject" type="submit" id="page" onclick="goToPenyanyiPage(<?=$i?>)"><?= $i?></button>
                <?php endfor;?>
                </div>
            <?php endif;?>
        </section>
    </div>
    </div>
    <script src="/binotify-app/public/js/pagination-penyanyi.js"></script>
</body>
</html>