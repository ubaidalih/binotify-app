<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Home</title>
    <link rel="stylesheet" href="/binotify-app/public/styles/login.css">
    <link rel="stylesheet" href="/binotify-app/public/styles/home.css">

</head>
<body>
    <div class="login-container">
        <div class="title">
            <h1>not Spotify</h1>
            <br><br><br><br>
            <p>Aplikasi musik terbaik sekampung.</p>
        </div>
        <div class="login-card">
            <div class="box">
                <div class="header-logo">
                    <img src="/binotify-app/public/img/spotify-logo.png" style="display: block;
  margin-left: auto;
  margin-right: auto;
  width: 50%;"/>
                </div>
                <h2 style="text-align: center;">Log in to continue.</h2>
            </div>
            <div class="box">
                <p class="fail-upload" id="fail-upload"></p>
            </div>
            <div class="box">
                <form action="/binotify-app/public/login/logic" method="post" class="column-flex" id="login-form">
                    <div id="kiri" >
                        <div id="atas">   
                            <label for="email" style=" color: white; font-size: 1rem; ">Email</label>
                        </div>
                        <div id="bawah" >   
                            <label for="password" style="color: white; font-size: 1rem;">Password</label>
                        </div>
                    </div>
                    <div id="kanan">
                        <div id="atas">   
                            <input type="text" class="valid" id="email" name="email"><br>
                        </div>
                        <div id="bawah">   
                            <input type="password" class="valid" id="password" name="password">
                    </div>
                    </div>
                    <div class="buttons row-flex">
                        <input type="button" value="LOG IN" id="login-button">
                        <span style="color: grey; font-family: 'Roboto', sans-serif;"> Dont have an account? Register now! </span>
                        <br>
                        <br>
                        <br>
                        <a href="/binotify-app/public/register/index">Register</a> <br>
                        <br>
                        <br>
                        <a class="login-as-guest" href="/binotify-app/public/Home/user ">Login as Guest </a> <br>
                    </div>
                </form>
                
            </div>
        </div>  
    </div>
    <!-- <div class="background">&dbsp</div> -->

    <script src="/binotify-app/public/js/login.js"></script>
</body>
</html>