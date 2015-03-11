<?php
require_once 'Connection.php';
require_once 'PropertyTableGateway.php';
require_once 'TenantTableGateway.php';

$sessionId = session_id();
if ($sessionId == "") {
    session_start();
}

require 'ensureUserLoggedIn.php';

if (!isset($_GET) || !isset($_GET['id'])) {
    die('Invalid request');
}
$id = $_GET['id'];

$connection = Connection::getInstance();
$gateway = new PropertyTableGateway($connection);
$tenantGateway = new TenantTableGateway($connection);

$properties = $gateway->getPropertyById($id);
if ($statement->rowCount() !== 1) {
    die("Illegal request");
}
$property = $properties->fetch(PDO::FETCH_ASSOC);

$tenants = $tenantGateway->getTenants();
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
        <?php require 'toolbar.php'; ?>
        <?php require 'mainMenu.php'; ?>
        <h1>Edit Property Form</h1>
        <?php
        if (isset ($errorMessage)) {
            echo '<p>Error: ' . $errorMessage . '</p>';
        }
        ?>
        <form action="editProperty.php"
              method="POST"
              onsubmit="return validateEditProperty(this);">
            <input type="hidden" name="Property_ID" value="<?php echo $id; ?>" />
            <table border="0">
                <tbody>
                    <tr>
                        <td>Address</td>
                        <td>
                            <input type="text" name="Property_Address" value="<?php
                                if (isset($_POST) && isset($_POST['Property_Address'])) {
                                    echo $_POST['Property_Address'];
                                }
                                else echo $row['Property_Address'];
                            ?>" />
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
                            <input type="text" name="Property_Description" value="<?php
                                if (isset($_POST) && isset($_POST['Property_Description'])) {
                                    echo $_POST['Property_Description'];
                                }
                                else echo $row['Property_Description'];
                            ?>" />
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
                            <input type="text" name="Property_Rent" value="<?php
                                if (isset($_POST) && isset($_POST['Property_Rent'])) {
                                    echo $_POST['Property_Rent'];
                                }
                                else echo $row['Property_Rent'];
                            ?>" />
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
                            <input type="text" name="Property_NoOfRooms" value="<?php
                                if (isset($_POST) && isset($_POST['Property_NoOfRooms'])) {
                                    echo $_POST['Property_NoOfRooms'];
                                }
                                else echo $row['Property_NoOfRooms'];
                            ?>" />
                            <span id="bedroomError" class="error">
                                <?php 
                                if (isset($errorMessage) && isset($errorMessage['Property_NoOfRooms'])) {
                                    echo $errorMessage['Property_NoOfRooms'];
                                }
                                ?>
                            </span>
                        </td>
                    </tr>
                    <tr>
                        <td>Tenant</td>
                        <td>
                            <select name="Tenant_ID">
                                <option value="-1">No Tenant</option>
                                <?php
                                    $t = $tenants->fetch(PDO::FETCH_ASSOC);
                                    while ($t) {
                                        $selected = "";
                                        if ($t['Tenant_ID'] ==  $property['Tenant_ID']) {
                                            $selected = "selected";
                                        }
                                        echo '<option value="' . $t['Tenant_ID'] . '" ' . $selected . '>' . $t['Tenant_fName'] . ' ' . $t['Tenant_lName'] . '</option>';
                                        $t = $tenants->fetch(PDO::FETCH_ASSOC);
                                    }
                                ?>
                            </select>
                        </td>
                    </tr>
                        <td></td>
                        <td>
                            <input type="submit" value="Edit Property" name="editProperty" />
                        </td>
                    </tr>
                </tbody>
            </table>
        </form>
        
        <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
        <!-- Include all compiled plugins (below), or include individual files as needed -->
        <script src="js/bootstrap.min.js"></script>
    </body>
</html>


