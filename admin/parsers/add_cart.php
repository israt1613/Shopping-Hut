<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/shoppingHut/core/init.php';

$product_id = sanitize($_POST['product_id']);
$size = sanitize($_POST['size']);
$available = sanitize($_POST['available']);
$quantity = sanitize($_POST['quantity']);
$items = array();
$items[] = array(
    'id'       => $product_id,
    'size'     => $size,
    'quantity' => $quantity,
);

$domain = ($_SERVER['HTTP_HOST'] != 'localhost')?'.'.$_SERVER['HTTP_HOST']:false;
$query = $db->query("SELECT * FROM products WHERE id = '{$product_id}'");
$product = mysqli_fetch_assoc($query);
$_SESSION['success_flash'] = $product['title']. ' added to your product into cart';

    //check to see if the cart cookie exists
    if($cart_id != ''){
        $cartQ = $db->query("SELECT * FROM cart WHERE id='{$cart_id}'");
        $cart = mysqli_fetch_assoc($cartQ);
        $previous_items = json_decode($cart['items'], true);
        $items_match = 0;
        $new_items = array();
        foreach ($previous_items as $pitems){
            if ($items[0]['id'] == $pitems['id'] && $items[0]['size'] == $pitems['size']){
                $pitems['quantity'] = $pitems['quantity'] + $items[0]['quantity'];
                if ($pitems['quantity'] > $available){
                    $pitems['quantity'] = $available;
                }
                $items_match = 1;
                
            }
            $new_items[] = $pitems;
        }
        if ($items_match != 1){
            $new_items = array_merge($items,$previous_items);
        }
        $items_json = json_encode($new_items);
        $cart_expire = date("Y-m-d H:i:s",  strtotime("+30 days"));
        $db->query("UPDATE cart SET items = '{$items_json}', expire_date='{$cart_expire}' WHERE id='{$cart_id}'");
        setcookie(CART_COOKIE,'',1,"/",$domain,false);
        setcookie(CART_COOKIE,$cart_id,CART_COOKIE_EXPIRE,'/',$domain,false);

    }else{
        //add the cart to database and set cookie
        $items_json = json_encode($items);
        $cart_expire = date("Y-m-d H:i:s",  strtotime("+30 days"));
        $db->query("INSERT INTO cart(items,expire_date) VALUES('{$items_json}','{$cart_expire}')");
        $cart_id = $db->insert_id;
        setcookie(CART_COOKIE,$cart_id,CART_COOKIE_EXPIRE,'/',$domain,false);
}
?>