<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Home</title>
    <link rel="stylesheet" href="/binotify-app/public/styles/register.css">
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
                <h2 style="text-align: center; margin-right: 5%;">Register your account</h2>
            </div>
            <div class="box">
                <p class="fail-upload" id="fail-upload"></p>
            </div>
            <div class="box">
                <form action="/binotify-app/public/register/logic" method="post" class="column-flex" id="register-form">
                <div id="kiri">
                        <div id="satu"> 
                            <label for="email">Email</label>
                        </div>
                        <div id="dua"> 
                            <label for="username">Username</label>
                        </div>
                        <div id="tiga"> 
                            <label for="password">Password</label>
                        </div>
                        <div id="empat"> 
                            <label for="confirm-password">Confirm Password</label><br><br><br>
                        </div> 
                    </div>
                    <div id="kanan">
                        <div id="satu"> 
                            <input type="text" class="valid" id="email" name="email">
                        </div>
                        <div id="dua">
                            <input type="text" class="valid" id="username" name="username">
                        </div>
                        <div id="tiga"> 
                            <input type="password" class="valid" id="password" name="password">
                        </div>
                        <div id="empat"> 
                            <input type="password" class="valid" id="confirm-password" name="confirm-password">
                        </div>
                    </div>
                    <br>         
                    <div class="buttons row-flex">
                        <input type="button" class="valid" value="Register" id="register-button"> 
                        <br> 
                        <span style="color: grey; font-family: 'Roboto', sans-serif;">Already have an account? Log In here. </span>
                        <br><br><br>
                        <a href="/binotify-app/public/login/index">Login</a>
                    </div>
                </form>
            </div>
        </div>  
    </div>
    <!-- <div class="background">&dbsp</div> -->

    <script src="/binotify-app/public/js/register.js"></script>
</body>
</html>