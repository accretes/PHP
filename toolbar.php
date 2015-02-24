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
        
        <script type="text/javascript" src="js/validateLogin.js"></script>
        <style>
            .navbar {
                margin-top: 30px;
            }
        </style>
    </head>
    <body>
        <nav class="navbar navbar-default">
        <div class="container-fluid">
          <!-- Brand and toggle get grouped for better mobile display -->
          <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
              <span class="sr-only">Toggle navigation</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#">Innocent Homes</a>
          </div>

          <!-- Collect the nav links, forms, and other content for toggling -->
          <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
              <li>
                <?php
                    $sessionId = session_id();
                    if ($sessionId == "") {
                        session_start();
                    }
                    if (isset($_SESSION['username'])) {
                        echo '<a href="home.php"><span class="glyphicon glyphicon-home"></span></a>';
                    }
                    else {
                        echo '<a href="index.php"><span class="glyphicon glyphicon-home" aria-hidden="true"></span></a>';
                    }
                ?>
              </li>
              <li>
                <?php
                    $sessionId = session_id();
                    if ($sessionId == "") {
                        session_start();
                    }
                    if (isset($_SESSION['username'])) {
                        echo '<a href="logout.php">Logout</a>';
                    }
                    else {
                        echo '<a href="login.php">Login</a>';
                    }
                ?>
              </li>
            </ul>
            
          </div><!-- /.navbar-collapse -->
        </div><!-- /.container-fluid -->
      </nav>

        <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
        <!-- Include all compiled plugins (below), or include individual files as needed -->
        <script src="js/bootstrap.min.js"></script>
    </body>
</html>







