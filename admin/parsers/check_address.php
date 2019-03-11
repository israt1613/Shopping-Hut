<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<!-- check_address.php -->
<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/shoppingHut/core/init.php';
$name = sanitize($_POST['full_name']);
$email = sanitize($_POST['email']);
$street = sanitize($_POST['street']);
$street2 = sanitize($_POST['street2']);
$city = sanitize($_POST['city']);
$state = sanitize($_POST['state']);
$zip_code = sanitize($_POST['zip_code']);
$country = sanitize($_POST['country']);
$errors=array();
$required=array(
	'full_name' => 'full Name',
	'email'     => 'Email',
	'street'    => 'Street Address',
	'city'      => 'City',
	'state'     => 'State',
	'zip_code'  => 'Zip Code',
	'country'   => 'Country',
);

//check if all required fiels are filled out
foreach ($required as $f => $d) {
	if(empty($_POST[$f]) || $_POST[$f] == ''){
		$errors[]=$d.' is required.';
	}
}

//check if valid email address
if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
	$errors[] = 'Please enter a valid email.';
}

if(!empty($errors)){
	echo display_errors($errors);
} else{
	echo 'passed';
}
?>