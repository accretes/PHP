<?php
require_once 'Connection.php';
require_once 'TenantTableGateway.php';

$id = session_id();
if ($id == "") {
    session_start();
} 

require 'ensureUserLoggedIn.php';

$connection = Connection::getInstance();
$gateway = new TenantTableGateway($connection);

echo '<pre>';
print_r($_POST);
echo '</pre>';

$fName = $_POST['Tenant_fName'];
$lName = $_POST['Tenant_lName'];
$age = $_POST['Tenant_Age'];
$gender = $_POST['Tenant_Gender'];
$email = $_POST['Tenant_Email'];
$phone = $_POST['Tenant_Phone'];
$property = $_POST['Property_ID'];
$lease = $_POST['Lease_ID'];
$id = $_POST['Tenant_ID'];


$gateway->updateTenant($id, $fName, $lName, $age, $gender, $email, $phone, $property, $lease);

$message = "Tenant updated successfully";

header('Location: home.php');