<?php
require_once 'property.php';
require_once 'tenant.php';
require_once 'Connection.php';
require_once 'PropertyTableGateway.php';
require_once 'TenantTableGateway.php';

require 'ensureUserLoggedIn.php';

$connection = Connection::getInstance();
$gateway = new PropertyTableGateway($connection);
$tenantgateway = new TenantTableGateway($connection);

$statement = $gateway->getProperties();
$tenantstatement = $tenantgateway->getTenants();
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
                        <th id="options">Options</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $row = $statement->fetch(PDO::FETCH_ASSOC);
                    while ($row) {
                        echo '<td>' . $row['Property_Address'] . '</td>';
                        echo '<td>' . $row['Property_Description'] . '</td>';
                        echo '<td>' . $row['Property_Rent'] . '</td>';
                        echo '<td>' . $row['Property_NoOfRooms'] . '</td>';
                        echo '<td>'
                        . '<a href="viewProperty.php?id='.$row['Property_ID'].'">View</a> '
                        . ' | '        
                        . '<a href="editPropertyForm.php?id='.$row['Property_ID'].'">Edit</a> '
                        . ' | '          
                        . '<a href="deleteProperty.php?id='.$row['Property_ID'].'">Delete</a> '
                        . '</td>';
                        echo '</tr>';

                        $row = $statement->fetch(PDO::FETCH_ASSOC);
                    }
                    ?>
                </tbody>
            </table>
            <p><a class="btn btn-primary" href="createPropertyForm.php">Create Property</a></p>
            <br>
            <h1 id="header">List of Tenants</h1>
            <table>
                <thead>
                    <tr>
                        <th id="id">Name</th>
                        <th id="id">Age</th>
                        <th id="id">Gender</th>
                        <th id="id">Email</th>
                        <th id="id">Phone</th>
                        <th id="id">Property Address</th>
                        <th id="id">Lease Information</th>
                        <th id="options">Options</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $row = $tenantstatement->fetch(PDO::FETCH_ASSOC);
                    while ($row) {
                        echo '<td>' . $row['Tenant_fName'] . ' ' . $row['Tenant_lName'] . '</td>';
                        echo '<td>' . $row['Tenant_Age'] . '</td>';
                        echo '<td>' . $row['Tenant_Gender'] . '</td>';
                        echo '<td>' . $row['Tenant_Email'] . '</td>';
                        echo '<td>' . $row['Tenant_Phone'] . '</td>';
                        echo '<td>' . '<a href="viewProperty.php?id='.$row['Property_ID'].'">View Property</a>';
                        echo '<td>' . $row['Lease_ID'] . '</td>'; /*' <a href="viewProperty.php?id='.$row['Property_ID'].'">View Property</a>' */ 
                        echo '<td>'
                        . '<a href="viewTenant.php?id='.$row['Tenant_ID'].'">View</a> '
                        . ' | '        
                        . '<a href="editTenantForm.php?id='.$row['Tenant_ID'].'">Edit</a> '
                        . ' | '          
                        . '<a href="deleteTenant.php?id='.$row['Tenant_ID'].'">Delete</a> '
                        . '</td>';
                        echo '</tr>';

                        $row = $tenantstatement->fetch(PDO::FETCH_ASSOC);
                    }
                    ?>
                </tbody>
            </table>
            <p><a class="btn btn-primary" href="createTenantForm.php">Create Tenant</a></p>        
        </div>
        
        <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
        <!-- Include all compiled plugins (below), or include individual files as needed -->
        <script src="js/bootstrap.min.js"></script>
    </body>
</html>