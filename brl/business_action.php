<?php
include_once 'database.php';
include_once 'business.php';

$database = new Database();
$db = $database->getConnection();

$business = new Business($db);

if(!empty($_POST['action']) && $_POST['action'] == 'listBook') {
	$business->listBook();
}

if(!empty($_POST['action']) && $_POST['action'] == 'getBookDetails') {
	$business->bookid = $_POST["bookid"];
	$business->getBookDetails();
}

if(!empty($_POST['action']) && $_POST['action'] == 'addBook') {
	$business->BusinessName = $_POST["BusinessName"];
	$business->BusinessID = $_POST["BusinessID"];
    $business->category = $_POST["category"];
	$business->Email = $_POST["Email"];
    $business->RegisteredDate = $_POST["RegisteredDate"];
	$business->Address = $_POST["Address"];
	$business->NoOfEmployees = $_POST["NoOfEmployees"];
	$business->status = $_POST["status"];	
	$->insert();
}

if(!empty($_POST['action']) && $_POST['action'] == 'updateBook') {
	$business->bookid = $_POST["bookid"];
	$business->BusinessName = $_POST["BusinessName"];
	$business->BusinessID = $_POST["BusinessID"];
    $business->category = $_POST["category"];
	$business->Email = $_POST["Email"];
    $business->RegisteredDate = $_POST["RegisteredDate"];
	$business->Address = $_POST["Address"];
	$business->NoOfEmployees = $_POST["NoOfEmployees"];
	$business->status = $_POST["status"];
	$business->update();
}

if(!empty($_POST['action']) && $_POST['action'] == 'deleteBook') {
	$business->bookid = $_POST["bookid"];
	$business->delete();
}

?>