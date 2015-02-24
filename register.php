<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title></title>

        <!-- Bootstrap -->
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <link href="css/custom.css" rel="stylesheet">
        
        <link type="text/css" href="styles.css" />
        <script type="text/javascript" src="js/register1.js"></script>
        
        <style>
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
            ?>
            <form name="registerform" 
                  action="checkRegister.php" 
                  method="POST"
                  onsubmit="return validateRegistrationForm(this);">
                <table border="0">
                    <tbody>
                        <tr>
                            <td style="padding: 5px;">Username</td>
                            <td style="padding: 5px;">
                                <input type="text" name="username"  id="username" value="" />
                                <span id="usernameError" class="error"></span>
                            </td>
                        </tr>
                        <tr>
                            <td style="padding: 5px;">Password</td>
                            <td style="padding: 5px;">
                                <input type="password" name="password" id="password" value="" />
                                <span id="passwordError" class="error"></span>
                            </td>
                        </tr>
                        <tr>
                            <td style="padding: 5px;">Confirm Password</td>
                            <td style="padding: 5px;">
                                <input type="password" name="password2" id="password2" value="" />
                                <span id="password2Error" class="error"></span>
                            </td>
                        </tr>
                        <tr>
                            <td></td>
                            <td>
                                <input class="but" type="submit" value="Register" name="register" />
                            </td>
                        </tr>
                    </tbody>
                </table>

            </form>       
        </div>
        <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
        <!-- Include all compiled plugins (below), or include individual files as needed -->
        <script src="js/bootstrap.min.js"></script>
    </body>
</html>
