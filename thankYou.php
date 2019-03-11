<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<!-- thankYou.php -->
<?php
require_once 'core/init.php';


////get the rest of the post data
$full_name = sanitize($_POST['full_name']);
$email = sanitize($_POST['email']);
$street = sanitize($_POST['street']);
$street2 = sanitize($_POST['street2']);
$city = sanitize($_POST['city']);
$state = sanitize($_POST['state']);
$zip_code = sanitize($_POST['zip_code']);
$country = sanitize($_POST['country']);

$grand_total = " ";
$meta_data = array(
    "cart_id" => $cart_id,
    "grand_total" => $grand_total,
    );
    




    include 'includes/head.php';
    include 'includes/navigation.php';
    include 'includes/headerpartial.php';
    

    
    ?>
    <h1 class="text-center text-success"> Thank You! </h1>
    <p> Your card has been successfully charged <?=$grand_total;?>. You have been emailed a receipt. Please check your spam folder if it is not in your inbox. Additionally you can print this page as a receipt.</p>
    <p>Your receipt number is: <strong><?=$cart_id;?></strong></p >
    <p>Your order will be shipped to the address below.</p>
    <address>
        <?=$full_name;?><br>
        <?=$street;?><br>
        <?=(($street2 != '')?$street2.'<br>':'');?>
        <?=$city. ', '.$state.''.$zip_code;?><br>
        <?=$country;?><br>
    
    </address>
    <?php
    include 'includes/footer.php';

?>