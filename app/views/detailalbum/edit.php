<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<link rel="stylesheet" href="/binotify-app/public/styles/home.css">
<link rel="stylesheet" href="/binotify-app/public/styles/music.css">
<link rel="stylesheet" href="/binotify-app/public/styles/tambah.css">
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
          <li><a href="#"> 
            <?php 
            echo  $username;?> 
            </a></li>
          <li><a href="/binotify-app/public/home/logout"> Logout </a></li>
      </ul>
</header>
<div class="container">

  
  <h3>Edit Album</h3>


  <!-- <table class="table">
    <tbody>
      <?php 
      // include 'read.php'; 
      ?>
    </tbody>
  </table> -->
  <div class="outer">
    <div class="middle">
      <div class="inner">
        <h1>Edit Album</h1>
        <p class="fail-upload" id="fail-upload"></p>
      <p>
        <form id="mainform" action="/binotify-app/public/detailalbum/submitedit/<?php echo $data["judul"] ?>" method="POST" enctype="multipart/form-data">
        <label for="judul">Judul:</label>
        <input type="text"  id="judul" name="judul" value="<?php echo $data["judul"] ?>">
        <input type="hidden"  id="judul_lama" name="judul_lama" value="<?php echo $data["judul"] ?>">

        <label for="penyanyi">Penyanyi:</label>
        <input type="text"  id="penyanyi" name="penyanyi" value="<?php echo $data["penyanyi"] ?>" readonly>

        <label for="tanggal_terbit">Tanggal terbit:</label>
        <input name="tanggal_terbit" id="tanggal_terbit" type="date" value=<?php echo $data["tanggal_terbit"] ?>>

        <label for="Genre">Genre:</label>
        <input type="text"  id="genre" name="genre" value="<?php echo $data["genre"] ?>">

        <label for="img" class="custom-file-upload"><i class="fa fa-cloud-upload"></i>Image Upload
          <input type="file"  id="img" name="img_file">
        </label>

        <div class="buttons row-flex">
            <input type="button" id="add-button" value="Update"></input>
          </div>
      </form></p>
    </div>
  </div>
</div>
</div>
<script src="/binotify-app/public/js/editalbum.js"></script>
</body>
</html>