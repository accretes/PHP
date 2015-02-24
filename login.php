<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        
        <script type="text/javascript" src="js/validateLogin.js"></script>
        
        <style>
        table {
        }
        
        td, th{
          padding: 20px;  
        }
        input {
            border: 5px solid white; 
            padding: 15px;
            background: NavajoWhite;
            margin: 0 0 10px 0;
        }
        .but {
            padding: 15px;
            background: #e7e7e7;
            margin: 0 0 10px 0;
        }
        #spacer {
            border-left: 20px;
        }
        </style>
    </head>
    <body>
        <div class="container">
            <?php require 'toolbar.php'; ?>
            <?php 
            if (isset($errorMessage)) {
                echo '<p>Error: ' . $errorMessage . '</p>';
            }
            if (!isset($username)) {
                $username = '';
            }
            ?>
            <form name="loginform" action="checkLogin.php" method="POST">
                <table border="0">
                    <tbody>
                        <tr>
                            <td style="padding: 5px;">Username</td>
                            <td style="padding: 5px;">
                                <input type="text" 
                                       name="username" 
                                       value="<?php echo $username; ?>" />
                            </td>
                        </tr>
                        <tr>
                            <td style="padding: 5px;">Password</td>
                            <td style="padding: 5px;"><input type="password" name="password" value="" /></td>
                        </tr>
                        <tr>
                            <td></td>
                            <td id="spacer">
                                <input class="but" type="submit" value="Login" name="login" onclick="javascript:return validateLogin();" />
                                <input class="but" type="button" 
                                       value="Register" 
                                       name="register" 
                                       onclick="document.location.href = 'register.php'"
                                       />
                                <input class="but" type="button" value="Forgot Password" name="forgot" />
                            </td>
                        </tr>
                    </tbody>
                </table>

            </form>
        </div>
    </body>
</html>
