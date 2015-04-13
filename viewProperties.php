<?php
require_once 'Connection.php';
require_once 'PropertyTableGateway.php';

require 'ensureUserLoggedIn.php';

if (isset($_GET) && isset($_GET['sortOrder'])) {
    $sortOrder = $_GET['sortOrder'];
    $columnNames = array("Property_Address", "Property_Description", "Property_Rent", "Property_NoOfRooms", "Tenant_Name");
    if (!in_array($sortOrder, $columnNames)) {
        $sortOrder = 'Property_Address';
    }
}
else {
    $sortOrder = 'Property_Address';
}
if (isset($_GET) && isset($_GET['filterName'])) {
    $filterName = filter_input(INPUT_GET, 'filterName', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
}
else {
    $filterName = NULL;
}

$connection = Connection::getInstance();
$propertyGateway = new PropertyTableGateway($connection);

$properties = $propertyGateway ->getProperties($sortOrder, $filterName);
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
            <div class="row">
                <div class="col-md-2">
                    <form class="form-horizontal" role="form" action="viewProgrammers.php?sortOrder=<?php echo $sortOrder; ?>" method="GET">
                        <div class="form-group">
                            <label class="control-label" for="filterName">Address</label>
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
                                <th id="id"><a href="viewProperties.php?sortOrder=Property_Address">Address</a></th>
                                <th id="id"><a href="viewProperties.php?sortOrder=Property_Description">Description</a></th>
                                <th id="id"><a href="viewProperties.php?sortOrder=Property_Rent">Monthly Rent</a></th>
                                <th id="id"><a href="viewProperties.php?sortOrder=Property_NoOfRooms">No. of bedrooms</a></th>
                                <th id="id"><a href="viewProperties.php?sortOrder=Tenant_Name">Tenant Name</a></th>
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
                </div>
            </div>
        </div>
        <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
        <!-- Include all compiled plugins (below), or include individual files as needed -->
        <script src="js/bootstrap.min.js"></script>
    </body>
</html>
