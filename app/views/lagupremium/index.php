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
        <div class="detail-album-container">
            <div class="detail-album-info">
                <p> Penyanyi : <?php echo $data["name"]; ?></p>
                <p> Jumlah Lagu : <?php echo count($data['list_of_song']) ?> </p>
            </div>
        </div>
    <div id="pagination-container">
        <section>
            <h2>Song</h2>
            <?php if ($data["list_of_song"] == false) :?>
                <div class="no-result">
                    <h3>No song found</h3>
                </div>
            <?php else:?>
                <?php for( $index = 0; $index < count($data['list_of_song']); $index++) : ?>
                    <div class="music-card">
                        <div class="info">
                            <h4> <?php echo $index + 1;?> </h4>
                            <div class="detail">
                                <h4> <?php echo $data["list_of_song"][$index]->judul ?></h4>
                                <h4 class="artist-name"> <?php echo $data["name"] ?></h4>
                            </div>
                            <div class="detail-other">
                                <audio controls>
                                    <!-- <source src="http://localhost:3000/binotify-rest-service/public/audio/TULUS - Sewindu (Official Music Video)_wpst_4m_c-E.mp3" type="audio/mpeg" > -->
                                    <source src= <?php echo $data["list_of_song"]->audio_path; ?> type="audio/mpeg" >
                                    Your browser does not support the audio element.
                                </audio>
                            </div>
                        </div>
                    </div>
                <?php endfor; ?>
                <div class="pag-section">
                <?php for($i=1;$i<=$data['pageTotal'];$i++):?>
                    <button name="subject" type="submit" id="page" onclick="goToSongPage(<?=$i?>)"><?= $i?></button>
                <?php endfor;?>
                </div>
            <?php endif;?>
        </section>
    </div>
    </div>
    <script src="/binotify-app/public/js/pagination-song.js"></script>
</body>
</html>