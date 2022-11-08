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
        <div class="detail-album-container">
            <div class="detail-album-img">
                <img src="<?= $data["detail_album"][0][4]; ?>" alt="">
            </div>
            <div class="detail-album-info">
                <h3> Judul : <?php echo $data["detail_album"][0][0]; ?></h3>
                <p> Penyanyi : <?php echo $data["detail_album"][0][1]; ?></p>
                <p> Durasi : <?php echo sprintf("%02d", floor($data["detail_album"][0][2]/60)); ?>:<?php echo sprintf("%02d", $data["detail_album"][0][2]%60); ?></p>
                <p> Tahun Terbit : <?php echo $data["detail_album"][0][3]; ?></p>
                <p> Genre : <?php echo $data["detail_album"][0][5]; ?></p>
            </div>
        </div>
        <section>
            <h2>Albums</h2>
            <!-- <div class="sort-filter-container">
                <a href="http://localhost/tugas-besar-1/public/Home/user"> Sort by title</a> 
                <a href="http://localhost/tugas-besar-1/public/Home/dateSorted"> Sort by Date</a>
            </div> -->
            <?php if ($data["list_of_song"] == false) :?>
                <div class="no-result">
                    <h3>No song in album</h3>
                </div>
            <?php else:?>
                <?php foreach( $data["list_of_song"] as $index => $song ) : ?>
                    <a href="/tugas-besar-1/public/detaillagu/user/<?php echo $song[0] ?>">
                        <div class="music-card">
                            <div class="info">
                                <h4> <?php echo $index + 1;?> </h4>
                                <img src = "<?php echo $song[3];?>"/>
                                <div class="detail">
                                    <h4> <?php echo $song[0]?></h4>
                                    <h4 class="artist-name"> <?php echo $song[1]?></h4>
                                </div>
                                <div class="detail-other"><h4><?php echo $song[4]?></h4></div>
                                <div class="detail-other"><h4><?php echo $song[2]?></h4></div>
                            </div>
                        </div>
                    </a>
                <?php endforeach; ?>
            <?php endif;?>
        </section>
    </div>
</body>
</html>