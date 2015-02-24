<?php
require 'ensureUserLoggedIn.php';
?>
<!DOCTYPE>
<html>
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title></title>

        <!-- Bootstrap -->
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <link href="css/custom.css" rel="stylesheet">
        <script type="text/javascript" src="js/register.js"></script>
        
    </head>
    
    <body>
        <div class="container">
            <?php require 'toolbar.php'; ?>
            <h1 id="header">Create Property Form</h1>
            <?php
            if (isset ($errorMessage)) {
                echo '<p>Error: ' . $errorMessage . '</p>';
            }
            ?>
            <form action="createProperty.php"
                  method="POST"
                  onsubmit="return validateCreateProperty(this);">
                <table border="0">
                    <tbody>
                        <tr>
                            <td>Address</td>
                            <td>
                                <input type="text" name="Property_Address" value="" />
                                <span id="addressError" class="error">
                                    <?php 
                                    if (isset($errorMessage) && isset($errorMessage['Property_Address'])) {
                                        echo $errorMessage['Property_Address'];
                                    }
                                    ?>
                                </span>
                            </td>
                        </tr>
                        <tr>
                            <td>Description</td>
                            <td>
                                <input type="text" name="Property_Description" value="" />
                                <span id="descriptionError" class="error">
                                    <?php 
                                    if (isset($errorMessage) && isset($errorMessage['Property_Description'])) {
                                        echo $errorMessage['Property_Description'];
                                    }
                                    ?>
                                </span>
                            </td>
                        </tr>
                        <tr>
                            <td>Rent</td>
                            <td>
                                <input type="text" name="Property_Rent" value="" />
                                <span id="rentError" class="error">
                                    <?php 
                                    if (isset($errorMessage) && isset($errorMessage['Property_Rent'])) {
                                        echo $errorMessage['Property_Rent'];
                                    }
                                    ?>
                                </span>
                            </td>
                        </tr>
                        <tr>
                            <td>No. of bedrooms</td>
                            <td>
                                <input type="text" name="Property_NoOfRooms" value="" />
                                <span id="bedroomError" class="error">
                                    <?php 
                                    if (isset($errorMessage) && isset($errorMessage['Property_NoOfRooms'])) {
                                        echo $errorMessage['Property_NoOfRooms'];
                                    }
                                    ?>
                                </span>
                            </td>
                        </tr>
                            <td></td>
                            <td>
                                <input type="submit" value="Create Property" name="createProperty" />
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


