<?php
require 'ensureUserLoggedIn.php';
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
        <div class="container">
            <?php require 'toolbar.php'; ?>
            <h1 id="header">Create Tenant Form</h1>
            
            
            <?php
            if (isset ($errorMessage)) {
                echo '<p>Error: ' . $errorMessage . '</p>';
            }
            ?>
            <form action="createTenant.php"
                  method="POST"
                  onsubmit="">
                <table border="0">
                    <tbody>
                        <tr>
                            <td>First Name</td>
                            <td>
                                <input type="text" name="Tenant_fName" value="" />
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
                            <td>Last Name</td>
                            <td>
                                <input type="text" name="Tenant_lName" value="" />
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
                            <td>Age</td>
                            <td>
                                <input type="text" name="Tenant_Age" value="" />
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
                                <input type="text" name="Tenant_Gender" value="" />
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
                                <input type="text" name="Tenant_Email" value="" />
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
                            <td>Phone Number</td>
                            <td>
                                <input type="text" name="Tenant_Phone" value="" />
                                <span id="genderError" class="error">
                                    <?php 
                                    if (isset($errorMessage) && isset($errorMessage['Tenant_Phone'])) {
                                        echo $errorMessage['Tenant_Phone'];
                                    }
                                    ?>
                                </span>
                            </td>
                        </tr>
                        <tr>
                            <td>Property Address</td>
                            <td>
                                <input type="text" name="Property_ID" value="" />
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
                                <input type="text" name="Lease_ID" value="" />
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
                                <input type="submit" value="Create Tenant" name="createTenant" />
                            </td>
                        </tr>
                    </tbody>
                </table>
            </form>
        </div>
        
        
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
    </body>
</html>


