<?php
require_once 'Connection.php';
require_once 'TenantTableGateway.php';

require 'ensureUserLoggedIn.php';

if (isset($_GET) && isset($_GET['sortOrder'])) {
    $sortOrder = $_GET['sortOrder'];
    $columnNames = array("Tenant_fName", "Tenant_lName", "Tenant_Age", "Tenant_Gender", "Tenant_Email", "Tenant_Phone", "Property_ID", "Lease_ID");
    if (!in_array($sortOrder, $columnNames)) {
        $sortOrder = 'Tenant_fName';
    }
}
else {
    $sortOrder = 'Tenant_fName';
}
if (isset($_GET) && isset($_GET['filterName'])) {
    $filterName = filter_input(INPUT_GET, 'filterName', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
}
else {
    $filterName = NULL;
}

$connection = Connection::getInstance();
$tenantGateway = new TenantTableGateway($connection);

$tenants = $tenantGateway->getTenants($sortOrder, $filterName);
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
            <h1 id="header">List of Tenants</h1>
            <div class="row">
                <div class="col-md-2">
                    <form class="form-horizontal" role="form" action="viewTenants.php?sortOrder=<?php echo $sortOrder; ?>" method="GET">
                        <div class="form-group">
                            <label class="control-label" for="filterName">Name</label>
                            <div>
                                <input type="text"
                                       name="filterName"
                                       class="form-control"
                                       value="<?php echo $filterName; ?>" />
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label"></label>
                            <div>
                                <button type="submit" name="filterBtn" id="filterBtn" class="btn btn-success">Filter</button>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="col-md-10">
                    <table>
                        <thead>
                            <tr>
                                <th id="id"><a href="viewTenants.php?sortOrder=Tenant_fName">First Name</a></th>
                                <th id="id"><a href="viewTenants.php?sortOrder=Tenant_lName">Last Name</a></th>
                                <th id="id"><a href="viewTenants.php?sortOrder=Tenant_Age">Age</a></th>
                                <th id="id"><a href="viewTenants.php?sortOrder=Tenant_Gender">Gender</a></th>
                                <th id="id"><a href="viewTenants.php?sortOrder=Tenant_Email">Email</a></th>
                                <th id="id"><a href="viewTenants.php?sortOrder=Tenant_Phone">Phone</a></th>
                                <th id="id"><a href="viewTenants.php?sortOrder=Property_ID">Property Address</a></th>
                                <th id="id"><a href="viewTenants.php?sortOrder=Lease_ID">Lease Information</a></th>
                                <th id="options">Options</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $row = $tenants->fetch(PDO::FETCH_ASSOC);
                            while ($row) {
                                echo '<td>' . $row['Tenant_fName'] . '</td>';
                                echo '<td>' . $row['Tenant_lName'] . '</td>';
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

                                $row = $tenants->fetch(PDO::FETCH_ASSOC);
                            }
                            ?>
                        </tbody>
                    </table>
                    <p><a class="btn btn-primary" href="createTenantForm.php">Create Tenant</a></p>        
                </div>
            </div>
        </div>
        
        <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
        <!-- Include all compiled plugins (below), or include individual files as needed -->
        <script src="js/bootstrap.min.js"></script>
    </body>
</html>
