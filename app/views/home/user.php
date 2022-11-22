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
            <div class="search-bar">
                <input type = "text" name = "searchkey" id = "searchkey" autocomplete="off">
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
    <div id = "search-container">
        <section>
            <h2>Songs</h2>
            <?php if ($data == false) :?>
                <div class="no-result">
                    <h3>No song found</h3>
                </div>
            <?php else:?>
                <?php foreach($data as $index => $song) : ?>
                    <a href="/binotify-app/public/detaillagu/user/<?php echo $song[0] ?>">
                        <div class="music-card">
                            <div class="info">
                                <h4> <?php echo $index + 1;?> </h4>
                                <img src = "<?php echo $song[4];?>"/>
                                <div class="detail">
                                    <h4> <?php echo $song[0]?></h4>
                                    <h4 class="artist-name"> <?php echo $song[2]?></h4>
                                </div>
                                <div class="detail-other"><h4><?php echo $song[1]?></h4></div>
                                <div class="detail-other"><h4><?php echo $song[3]?></h4></div>
                            </div>
                        </div>
                    </a>
                <?php endforeach; ?>
            <?php endif;?>
        </section>
    </div>
    </div>
    <script src="/binotify-app/public/js/search.js"></script>
</body>
</html>