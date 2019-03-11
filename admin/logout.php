<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/shoppingHut/core/init.php';
unset($_SESSION['SBUser']);
header('Location: login.php');
?>