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
    <div id="pagination-container">
        <section>
            <h2>Albums</h2>
            <?php if ($data == false) :?>
                <div class="no-result">
                    <h3>No album found</h3>
                </div>
            <?php else:?>
                <?php foreach($data['data'] as $index => $album) : ?>
                    <a href="/binotify-app/public/detailalbum/admin/<?php echo $album[0] ?>">
                        <div class="music-card">
                            <div class="info">
                                <h4> <?php echo $index + 1;?> </h4>
                                <img src = "<?php echo $album[3];?>"/>
                                <div class="detail">
                                    <h4> <?php echo $album[0]?></h4>
                                    <h4 class="artist-name"> <?php echo $album[1]?></h4>
                                </div>
                                <div class="detail-other"><h4><?php echo $album[2]?></h4></div>
                                <div class="detail-other"><h4><?php echo $album[4]?></h4></div>
                            </div>
                        </div>
                    </a>
                <?php endforeach; ?>
                <div class="pag-section">
                <?php for($i=1;$i<=$data['pageTotal'];$i++):?>
                    <button name="subject" type="submit" id="page" onclick="goToAlbumPage(<?=$i?>)"><?= $i?></button>
                <?php endfor;?>
                </div>
            <?php endif;?>
        </section>
    </div>
    </div>
    <script src="/binotify-app/public/js/pagination-album-admin.js"></script>
    <script src="/binotify-app/public/js/album.js"></script>
</body>
</html>