<?php
require_once 'property.php';
require_once 'Connection.php';
require_once 'PropertyTableGateway.php';

$id = session_id();
if ($id == "") {
    session_start();
}

require 'ensureUserLoggedIn.php';

$connection = Connection::getInstance();
$gateway = new PropertyTableGateway($connection);

$errorMessage = array();

echo pre;
print_r($_POST);
echo pre;


if ($address === FALSE || $address === '') {
    $errorMessage['Property_Address'] = 'Property Address must not be blank<br/>';
}

if ($rent === FALSE || $rent === '') {
    $errorMessage['Property_Rent'] = 'Property Rent must not be blank<br/>';
}

if ($bedrooms === FALSE || $bedrooms === '') {
    $errorMessage['Property_NoOfRooms'] = 'Number of rooms must not be blank<br/>';
}

if (empty($errorMessage)) {
    $address = $_POST['Property_Address'];
    $description = $_POST['Property_Description'];
    $rent = $_POST['Property_Rent'];
    $bedrooms = $_POST['Property_NoOfRooms'];
    
    $id = $gateway->insertProperty($address, $description, $rent, $bedrooms);
    
    $message = "Property created successfully";

    header('Location: home.php');
}
else {
    require 'createPropertyForm.php';
}





//$address = $_POST['Property_Address'];
//$description = $_POST['Property_Description'];
//$rent = $_POST['Property_Rent'];
//$bedrooms = $_POST['Property_NoOfRooms'];

//$id = $gateway->insertProperty($address, $description, $rent, $bedrooms);

//$message = "Property created successfully";
//
//header('Location: home.php');



