<?php
require_once 'Connection.php';
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
$gateway = new TenantTableGateway($connection);

$statement = $gateway->getTenantsById($id);
if ($statement->rowCount() !== 1) {
    die("Illegal request");
}
$row = $statement->fetch(PDO::FETCH_ASSOC);
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
        <h1>Edit Property Form</h1>
        <?php
        if (isset ($errorMessage)) {
            echo '<p>Error: ' . $errorMessage . '</p>';
        }
        ?>
        <form action="editTenant.php"
              method="POST"
              onsubmit="return validateEditTenant(this);">
            <input type="hidden" name="Tenant_ID" value="<?php echo $id; ?>" />
            <table border="0">
                <tbody>
                    <tr>
                        <td>First Name</td>
                        <td>
                            <input type="text" name="Tenant_fName" value="<?php
                                if (isset($_POST) && isset($_POST['Tenant_fName'])) {
                                    echo $_POST['Tenant_fName'];
                                }
                                else echo $row['Tenant_fName'];
                            ?>" />
                            <span id="fNameError" class="error">
                                <?php 
                                if (isset($errorMessage) && isset($errorMessage['Tenant_fName'])) {
                                    echo $errorMessage['Tenant_fName'];
                                }
                                ?>
                            </span>
                        </td>
                    </tr>
                    <tr>
                        <td>Surname</td>
                        <td>
                            <input type="text" name="Tenant_lName" value="<?php
                                if (isset($_POST) && isset($_POST['Tenant_lName'])) {
                                    echo $_POST['Tenant_lName'];
                                }
                                else echo $row['Tenant_lName'];
                            ?>" />
                            <span id="lNameError" class="error">
                                <?php 
                                if (isset($errorMessage) && isset($errorMessage['Tenant_lName'])) {
                                    echo $errorMessage['Tenant_lName'];
                                }
                                ?>
                            </span>
                        </td>
                    </tr>
                    <tr>
                        <td>Rent</td>
                        <td>
                            <input type="text" name="Tenant_Age" value="<?php
                                if (isset($_POST) && isset($_POST['Tenant_Age'])) {
                                    echo $_POST['Tenant_Age'];
                                }
                                else echo $row['Tenant_Age'];
                            ?>" />
                            <span id="ageError" class="error">
                                <?php 
                                if (isset($errorMessage) && isset($errorMessage['Tenant_Age'])) {
                                    echo $errorMessage['Tenant_Age'];
                                }
                                ?>
                            </span>
                        </td>
                    </tr>
                    <tr>
                        <td>Gender</td>
                        <td>
                            <input type="text" name="Tenant_Gender" value="<?php
                                if (isset($_POST) && isset($_POST['Tenant_Gender'])) {
                                    echo $_POST['Tenant_Gender'];
                                }
                                else echo $row['Tenant_Gender'];
                            ?>" />
                            <span id="genderError" class="error">
                                <?php 
                                if (isset($errorMessage) && isset($errorMessage['Tenant_Gender'])) {
                                    echo $errorMessage['Tenant_Gender'];
                                }
                                ?>
                            </span>
                        </td>
                    </tr>
                    <tr>
                        <td>Email</td>
                        <td>
                            <input type="text" name="Tenant_Email" value="<?php
                                if (isset($_POST) && isset($_POST['Tenant_Email'])) {
                                    echo $_POST['Tenant_Email'];
                                }
                                else echo $row['Tenant_Email'];
                            ?>" />
                            <span id="emailError" class="error">
                                <?php 
                                if (isset($errorMessage) && isset($errorMessage['Tenant_Email'])) {
                                    echo $errorMessage['Tenant_Email'];
                                }
                                ?>
                            </span>
                        </td>
                    </tr>
                    <tr>
                        <td>Phone</td>
                        <td>
                            <input type="text" name="Tenant_Phone" value="<?php
                                if (isset($_POST) && isset($_POST['Tenant_Phone'])) {
                                    echo $_POST['Tenant_Phone'];
                                }
                                else echo $row['Tenant_Phone'];
                            ?>" />
                            <span id="phoneError" class="error">
                                <?php 
                                if (isset($errorMessage) && isset($errorMessage['Tenant_Phone'])) {
                                    echo $errorMessage['Tenant_Phone'];
                                }
                                ?>
                            </span>
                        </td>
                    </tr>
                    <tr>
                        <td>Property</td>
                        <td>
                            <input type="text" name="Property_ID" value="<?php
                                if (isset($_POST) && isset($_POST['Property_ID'])) {
                                    echo $_POST['Property_ID'];
                                }
                                else echo $row['Property_ID'];
                            ?>" />
                            <span id="propertyError" class="error">
                                <?php 
                                if (isset($errorMessage) && isset($errorMessage['Property_ID'])) {
                                    echo $errorMessage['Property_ID'];
                                }
                                ?>
                            </span>
                        </td>
                    </tr>
                    <tr>
                        <td>Lease</td>
                        <td>
                            <input type="text" name="Lease_ID" value="<?php
                                if (isset($_POST) && isset($_POST['Lease_ID'])) {
                                    echo $_POST['Lease_ID'];
                                }
                                else echo $row['Lease_ID'];
                            ?>" />
                            <span id="leaseError" class="error">
                                <?php 
                                if (isset($errorMessage) && isset($errorMessage['Lease_ID'])) {
                                    echo $errorMessage['Lease_ID'];
                                }
                                ?>
                            </span>
                        </td>
                    </tr>
                        <td></td>
                        <td>
                            <input type="submit" value="Edit Tenant" name="editTenant" />
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


