<?php
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
            <?php require 'mainMenu.php' ?>
            <div class="col-lg-6">
                <h1>Welcome</h1>
                <p>A property management company looks after the maintenance and rental 
                    of properties for their owners. For each property, the company needs
                    to record the address, a description, the monthly rent, and the 
                    number of bedrooms. If the property is rented, the company needs to 
                    record the following details of each of the tenants: name, age, 
                    gender, email address, and mobile phone number. Tenants can only 
                    rent one property at a time. If the property is rented, the company
                    also needs to know the date the lease starts on and the duration of 
                    the lease.</p>

                <p>The company organises properties into areas. For each area, the 
                    company needs to be able to record the name of the area and a 
                    description of the facilities available in the area. Each property 
                    is assigned to a particular area and each area can have several 
                    properties assigned to it.</p>

                <p>Finally, the company needs to record the details of the owners of 
                    each property. For each owner, the name, address, mobile phone 
                    number and email address needs to be stored. Each property can have 
                    more than one owner, and each owner can own more than one property. 
                    The company also needs to record how the rental income for a 
                    property should be divided between the owners of the property. 
                    In other words, what percentage of the rental income each owner 
                    should receive.</p>
            </div>
        </div>
        
        <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
        <!-- Include all compiled plugins (below), or include individual files as needed -->
        <script src="js/bootstrap.min.js"></script>
    </body>
</html>
