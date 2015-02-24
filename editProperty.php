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

echo '<pre>';
print_r($_POST);
echo '</pre>';

$address = filter_input(INPUT_POST, 'Property_Address', FILTER_SANITIZE_STRING);
$description = filter_input(INPUT_POST, 'Property_Description', FILTER_SANITIZE_STRING);;
$rent = filter_input(INPUT_POST, 'Property_Rent', FILTER_SANITIZE_INT);
$bedrooms = filter_input(INPUT_POST, 'Property_NoOfRooms', FILTER_SANITIZE_INT);
$id = filter_input(INPUT_POST, 'Property_ID', FILTER_SANITIZE_INT); 


$gateway->updateProperty($id, $address, $description, $rent, $bedrooms);

$message = "Property updated successfully";

header('Location: home.php');