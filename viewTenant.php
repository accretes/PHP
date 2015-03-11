<?php
require_once 'Connection.php';
require_once 'TenantTableGateway.php';
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
$tenantGateway = new TenantTableGateway($connection);
$propertyGateway = new PropertyTableGateway($connection);

$tenants = $tenantGateway->getTenantsById($id);
$properties = $propertyGateway->getPropertiesByTenantId($id);
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
            <?php require 'mainMenu.php.php' ?>
            <?php 
            if (isset($message)) {
                echo '<p>'.$message.'</p>';
            }
            ?>
            <table>
                <tbody>
                    <?php
                    $tenant = $tenants->fetch(PDO::FETCH_ASSOC);
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
            <h3>View Properties for <?php echo $tenant['Tenant_fName'] + " " + $tenant['Tenant_lName'];?> </h3>
            <?php if ($properties->rowCount() != 0) { ?>
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
            <?php } else { ?>
            <p>This tenant doesn't live in any Properties.</p>
            <?php } ?>
        </div>
        
        <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
        <!-- Include all compiled plugins (below), or include individual files as needed -->
        <script src="js/bootstrap.min.js"></script>
    </body>
</html>
