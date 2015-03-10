<?php
require_once 'Connection.php';
require_once 'PropertyTableGateway.php';
require 'ensureUserLoggedIn.php';

$id = session_id();
if ($id == "") {
    session_start();
}

if (!isset($_GET) || !isset($_GET['id'])) {
    die('Invalid request');
}
$id = $_GET['id'];

$connection = Connection::getInstance();
$gateway = new PropertyTableGateway($connection);

$statement = $gateway->getPropertyById($id);
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
            <?php require 'toolbar.php' ?>
            <?php 
            if (isset($message)) {
                echo '<p>'.$message.'</p>';
            }
            ?>
            <table>
                <tbody>
                    <?php
                    $row = $statement->fetch(PDO::FETCH_ASSOC);
                        echo '<tr>';
                        echo '<td>ID</td>'
                        . '<td>' . $row['Property_ID'] . '</td>';
                        echo '</tr>';
                        echo '<tr>';
                        echo '<tr>';
                        echo '<td>Address</td>'
                        . '<td>' . $row['Property_Address'] . '</td>';
                        echo '</tr>';
                        echo '<tr>';
                        echo '<td>Description</td>'
                        . '<td>' . $row['Property_Description'] . '</td>';
                        echo '</tr>';
                        echo '<tr>';
                        echo '<td>Monthly Rent</td>'
                        . '<td>' . $row['Property_Rent'] . '</td>';
                        echo '</tr>';
                        echo '<tr>';
                        echo '<td>No. of Bedrooms</td>'
                        . '<td>' . $row['Property_NoOfRooms'] . '</td>';
                        echo '</tr>';
                    ?>
                </tbody>
            </table>
            <p>
                <a href="editPropertyForm.php?id=<?php echo $row['Property_ID']; ?>">
                    Edit Programmer</a>
                <a href="deleteProperty.php?id=<?php echo $row['Property_ID']; ?>">
                    Delete Programmer</a>
            </p>
        </div>
        
        <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
        <!-- Include all compiled plugins (below), or include individual files as needed -->
        <script src="js/bootstrap.min.js"></script>
    </body>
</html>
