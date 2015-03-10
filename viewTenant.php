<?php
require_once 'Connection.php';
require_once 'TenantTableGateway.php';

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
$gateway = new TenantTableGateway($connection);

$statement = $gateway->getTenantsById($id);
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
                        . '<td>' . $row['Tenant_ID'] . '</td>';
                        echo '</tr>';
                        echo '<tr>';
                        echo '<tr>';
                        echo '<td>First Name</td>'
                        . '<td>' . $row['Tenant_fName'] . '</td>';
                        echo '</tr>';
                        echo '<tr>';
                        echo '<td>Surname</td>'
                        . '<td>' . $row['Tenant_lName'] . '</td>';
                        echo '</tr>';
                        echo '<tr>';
                        echo '<td>Age</td>'
                        . '<td>' . $row['Tenant_Age'] . '</td>';
                        echo '</tr>';
                        echo '<tr>';
                        echo '<td>Gender</td>'
                        . '<td>' . $row['Tenant_Gender'] . '</td>';
                        echo '</tr>';
                        echo '<tr>';
                        echo '<td>Email</td>'
                        . '<td>' . $row['Tenant_Email'] . '</td>';
                        echo '</tr>';
                        echo '<tr>';
                        echo '<td>Phone</td>'
                        . '<td>' . $row['Tenant_Phone'] . '</td>';
                        echo '</tr>';
                        echo '<tr>';
                        echo '<td>Property</td>'
                        . '<td>' . $row['Property_ID'] . '</td>';
                        echo '</tr>';
                        echo '<tr>';
                        echo '<td>Lease</td>'
                        . '<td>' . $row['Lease_ID'] . '</td>';
                        echo '</tr>';
                    ?>
                </tbody>
            </table>
            <p>
                <a href="editTenantForm.php?id=<?php echo $row['Tenant_ID']; ?>">
                    Edit Tenant</a>
                <a href="deleteTenant.php?id=<?php echo $row['Tenant_ID']; ?>">
                    Delete Tenant</a>
            </p>
        </div>
        
        <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
        <!-- Include all compiled plugins (below), or include individual files as needed -->
        <script src="js/bootstrap.min.js"></script>
    </body>
</html>
