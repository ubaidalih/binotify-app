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
        <div class="detail-album-container">
            <div class="detail-album-img">
                <img src="<?= $data["detail_album"][0][4]; ?>" alt="">
            </div>
            <div class="detail-album-info">
                <h3> Judul : <?php echo $data["detail_album"][0][0]; ?></h3>
                <p> Penyanyi : <?php echo $data["detail_album"][0][1]; ?></p>
                <p> Durasi : <?php echo $data["detail_album"][0][2]; ?></p>
                <p> Tahun Terbit : <?php echo $data["detail_album"][0][3]; ?></p>
                <p> Genre : <?php echo $data["detail_album"][0][5]; ?></p>
            </div>
        </div>
        <section>
            <h2>Choose Song To Add</h2>
            <!-- <div class="sort-filter-container">
                <a href="http://localhost/binotify-app/public/Home/user"> Sort by title</a> 
                <a href="http://localhost/binotify-app/public/Home/dateSorted"> Sort by Date</a>
            </div> -->
            <?php if ($data["list_of_song"] == false) :?>
                <div class="no-result">
                    <h3>No song can be added</h3>
                </div>
            <?php else:?>
                <?php foreach( $data["list_of_song"] as $index => $song ) : ?>
                    <a href="/binotify-app/public/detailalbum/submittambah/<?php echo $data["detail_album"][0][0]; ?>/<?php echo $song[0]; ?>">
                        <div class="music-card">
                            <div class="info">
                                <h4> <?php echo $index + 1;?> </h4>
                                <img src = "<?php echo $song[4];?>"/>
                                <div class="detail">
                                    <h4> <?php echo $song[0]?></h4>
                                    <h4 class="artist-name"> <?php echo $song[1]?></h4>
                                </div>
                                <div class="detail-other"><h4><?php echo $song[5]?></h4></div>
                                <div class="detail-other"><h4><?php echo $song[3]?></h4></div>
                            </div>
                        </div>
                    </a>
                <?php endforeach; ?>
            <?php endif;?>
        </section>
    </div>
</body>
</html>