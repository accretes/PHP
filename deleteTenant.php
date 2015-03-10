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

$id = $_GET['id'];

$id = $gateway->deleteTenant($id);

$message = "Tenant deleted successfully";

header('Location: home.php');
