<?php
require_once 'Connection.php';
require_once 'PropertyTableGateway.php';

$id = session_id();
if ($id == "") {
    session_start();
}

require 'ensureUserLoggedIn.php';

$connection = Connection::getInstance();
$gateway = new PropertyTableGateway($connection);

$id = $_GET['id'];

$id = $gateway->deleteProperty($id);

$message = "Property deleted successfully";

header('Location: home.php');
