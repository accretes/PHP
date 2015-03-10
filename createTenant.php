<?php
require_once 'tenant.php';
require_once 'Connection.php';
require_once 'TenantTableGateway.php';

$id = session_id();
if ($id == "") {
    session_start();
}

require 'ensureUserLoggedIn.php';

$connection = Connection::getInstance();
$gateway = new TenantTableGateway($connection);

$errorMessage = array();

$fName = $_POST['Tenant_fName'];
$lName = $_POST['Tenant_lName'];
$age = $_POST['Tenant_Age'];
$gender = $_POST['Tenant_Gender'];
$email = $_POST['Tenant_Email'];
$phone = $_POST['Tenant_Phone'];
$property = $_POST['Property_ID'];
$lease = $_POST['Lease_ID'];



if ($fName === FALSE || $fName  === '') {
    $errorMessage['Tenant_fName'] = 'First Name must not be blank<br/>';
}

if ($lName === FALSE || $lName  === '') {
    $errorMessage['Tenant_lName'] = 'First Name must not be blank<br/>';
}

if ($age === FALSE || $age === '') {
    $errorMessage['Tenant_Age'] = 'Age must not be blank<br/>';
}

if ($gender === FALSE || $gender === '') {
    $errorMessage['Tenant_Gender'] = 'Gender must not be blank<br/>';
}

if ($email === FALSE || $email === '') {
    $errorMessage['Tenant_Email'] = 'Email must not be blank<br/>';
}

if ($phone === FALSE || $phone === '') {
    $errorMessage['Tenant_Phone'] = 'Phone must not be blank<br/>';
}

if ($property === FALSE || $property === '') {
    $errorMessage['Property_ID'] = 'Property must not be blank<br/>';
}

if ($lease === FALSE || $lease === '') {
    $errorMessage['Lease_ID'] = 'Lease must not be blank<br/>';
}

if (empty($errorMessage)) {
    $id = $gateway->insertTenant($fName, $lName, $age, $gender, $email, $phone, $property, $lease);
    
    $message = "Tenant created successfully";

    header('Location: home.php');
}
else {
    require 'createTenantForm.php';
}