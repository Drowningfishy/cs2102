<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>CS2102 Team49</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- JS -->
    <!-- please note: The JavaScript files are loaded in the footer to speed up page construction -->
    <!-- See more here: http://stackoverflow.com/q/2105327/1114320 -->

    <!-- CSS -->
    <link href="<?php echo URL; ?>css/style.css" rel="stylesheet">
</head>
<body>
    <!-- navigation -->
    <div class = "bar">
            <div class="bartext">
                <div class='logo'>Logo</div>
                <div class="hyperlink"> 
                    <a class="startup page" id="startup page" href="<?php echo URL; ?>">SplashScreen</a>
                    <a class="home" id="home" href="<?php echo URL; ?>user/index">Home</a>
                    <a class="alltasks" id="home" href="<?php echo URL; ?>task/index">All Tasks</a>
                    <a class="login" id="login" href="<?php echo URL; ?>user/index">Login</a>
                    <a class="logout" id="logout" href="<?php echo URL; ?>user/logout">Logout</a>
                </div>
         </div>

    </div>
    <!--
    <h1> <?php if (isset($_SESSION['message'])) {
        echo '123test';
        echo $_SESSION['message']['status']. '   '.$_SESSION['message']['message'];
        unset($_SESSION['message']);
    } else {
        echo 'no message';
    } ?> </h1>
    -->