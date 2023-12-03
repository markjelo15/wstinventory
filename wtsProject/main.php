<?php 
include ("db_connection.php")
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title>title</title>
        <link rel="stylesheet" href="style.css" />
    </head>
    <body>
        <header>
            <h2 class="logo">Logo</h2>
            <nav class="navigation">
                <a href="#">Home</a>
                <a href="#">AboutUs</a>
                <a href="#">Contact</a>
                <button class="btnLogin-popup">Login</button>
            </nav>
        </header>
        <div class="wrapper">
            <span class="icon-close">
                <ion-icon name="close"></ion-icon>
            </span>
            <div class="form-box login">
                <h2>LOGIN</h2>
                <form action="login.php" method="POST">
                    <div class="inputbox">
                         <span class="icon">
                            <ion-icon name="person"></ion-icon>
                         </span>
                         <input type="username" name="username" required>
                        <label>Username</label>
                    </div>
                    <div class="inputbox">
                        <span class="icon">
                        <ion-icon name="lock-closed"></ion-icon>
                        </span>
                        <input type="password" name="password" required>
                        <label>Password</label>
                    </div>
        
                    <button type="submit" class="btn">Login</button>
                    <div class="loginregister">
                        <p>Dont have an account?<a 
                        href="#" class="registerlink">Register</a> </p>
                    </div>
                </form>
            </div>

            <div class="form-box register">
                <h2>REGISTRATION</h2>
                <form action="#">
                    <div class="inputbox">
                         <span class="icon">
                            <ion-icon name="person"></ion-icon>
                         </span>
                         <input type="username"required>
                        <label>Username</label>
                    </div>
                    <div class="inputbox">
                        <span class="icon">
                        <ion-icon name="lock-closed"></ion-icon>
                        </span>
                        <input type="password"required>
                        <label>Password</label>
                    </div>
        
                    <button type="submit" class="btn">Register</button>
                    <div class="loginregister">
                        <p>Already have an account?<a 
                        href="#" class="loginlink">Login</a></p>
                    </div>
                </form>
            </div>
            
        </div>
        <script src="script.js"></script>
        <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
    </body>
</html>
