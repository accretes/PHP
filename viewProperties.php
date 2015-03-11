<?php
require_once 'Connection.php';
require_once 'PropertyTableGateway.php';

require 'ensureUserLoggedIn.php';

$connection = Connection::getInstance();
$propertyGateway = new PropertyTableGateway($connection);


$properties = $propertyGateway ->getProperties();
?>
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
        
    </head>
    <body>
        <div class="container">
            <?php require 'toolbar.php'; ?>
            <?php require 'mainMenu.php'; ?>
            <?php 
            if (isset($message)) {
                echo '<p>'.$message.'</p>';
            }
            ?>
            <h1 id="header">List of Properties</h1>
            <table>
                <thead>
                    <tr>
                        <th id="id">Address</th>
                        <th id="id">Description</th>
                        <th id="id">Monthly Rent</th>
                        <th id="id">No. of bedrooms</th>
                        <th id="id">Tenant Name</th>
                        <th id="options">Options</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $row = $properties->fetch(PDO::FETCH_ASSOC);
                    while ($row) {
                        echo '<td>' . $row['Property_Address'] . '</td>';
                        echo '<td>' . $row['Property_Description'] . '</td>';
                        echo '<td>' . $row['Property_Rent'] . '</td>';
                        echo '<td>' . $row['Property_NoOfRooms'] . '</td>';
                        echo '<td>' . $row['Tenant_Name'] . '</td>';
                        echo '<td>'
                        . '<a href="viewProperty.php?id='.$row['Property_ID'].'">View</a> '
                        . ' | '        
                        . '<a href="editPropertyForm.php?id='.$row['Property_ID'].'">Edit</a> '
                        . ' | '          
                        . '<a href="deleteProperty.php?id='.$row['Property_ID'].'">Delete</a> '
                        . '</td>';
                        echo '</tr>';

                        $row = $properties->fetch(PDO::FETCH_ASSOC);
                    }
                    ?>
                </tbody>
            </table>
            <p><a class="btn btn-primary" href="createPropertyForm.php">Create Property</a></p>
        <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
        <!-- Include all compiled plugins (below), or include individual files as needed -->
        <script src="js/bootstrap.min.js"></script>
    </body>
</html>
