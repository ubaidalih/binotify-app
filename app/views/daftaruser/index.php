<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="/tugas-besar-1/public/styles/home.css">
    <link rel="stylesheet" href="/tugas-besar-1/public/styles/music.css">
    <link rel="stylesheet" href="/tugas-besar-1/public/styles/daftaruser.css">
</head>
<body>
    <header>
        <div class="header-container">
            <div class="header-logo">
                <a href="/tugas-besar-1/public/home/admin/"><img src="/tugas-besar-1/public/img/spotify-logo.png" /></a>
            </div>
            <ul class="navbar-desktop">
                <li><a href="/tugas-besar-1/public/tambahlagu/index"> Tambah lagu </a></li>
                <li><a href="/tugas-besar-1/public/tambahalbum/index"> Tambah album </a></li>
                <li><a href="/tugas-besar-1/public/daftaralbum/admin/1"> Daftar album </a></li>
                <li><a href="/tugas-besar-1/public/daftaruser/index"> Daftar user </a></li>
                <li role="separator"> </li>
                <div class="profpict-logo">
                    <img src="/tugas-besar-1/public/img/profpict.png"/>
                </div>
                <?php
                    $username = $_COOKIE['username'];
                ?>
                <li><a href="#"> <?php echo  $username; ?> </a></li>
                <li><a href="/tugas-besar-1/public/home/logout"> Logout </a></li>
            </ul>
    </header>
    <div class="user-container">
        <table>
            <tr>
                <th>Email</th>
                <th>Username</th>
            </tr>
            <?php foreach($data as $index => $user) : ?>
                <tr>
                    <td><?php echo $user[1] ?></td>
                    <td><?php echo $user[0] ?></td>
                </tr>
            <?php endforeach; ?>
        </table>
    </div>
</body>
</html>