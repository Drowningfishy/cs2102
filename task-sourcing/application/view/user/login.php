<?php

//require 'config.php';


?>
<html>
    <head>
        <title>Log In11111</title>
    </head>
    <body>
        <div class="content">
            <h2>Log In111</h2>
            <?php
            if (isset($msg)) {
                echo "<h2>{$msg[0]}</h2><p>{$msg[1]}</p>";
            }
            ?>
            <form action="<?php echo URL; ?>user/login" method="POST" style="margin:0px auto;display:table;" data-ajax="false">
                <label>
                    <p>Usernam1212e / E-Mail</p>
                    <input name="login" type="text"/>
                </label><br/>
                <label>
                    <p>Password</p>
                    <input name="password" type="password"/>
                </label><br/>
                <label>
                    <p>
                        <input type="checkbox" name="remember_me"/> Remember Me
                    </p>
                </label>
                <div clear></div>
                <button style="width:150px;" name="action_login">Log In</button>
            </form>
            <style>
                input[type=text], input[type=password]{
                    width: 230px;
                }
            </style>
            <p>
                <p>Don't have an account ?</p>
                <a class="button" href="<?php echo URL; ?>user/register">Register</a>
            </p>
            <p>
                <p>Forgot Your Password ?</p>
                <a class="button" href="reset.php">Reset Password</a>
            </p>
        </div>
    </body>
</html>
