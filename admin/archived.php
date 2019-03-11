<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<!-- archived.php -->
<?php 
require_once $_SERVER['DOCUMENT_ROOT'].'/shoppingHut/core/init.php';
if(!is_logged_in()){
    login_error_redirect();
}
include 'includes/head.php';
include 'includes/navigation.php';
?>

<?php
$archSql = "SELECT * FROM products WHERE deleted= 1";
$presults = $db->query($archSql);
if(isset($_GET['restore'])){
 $id = sanitize($_GET['restore']);
 $db->query("UPDATE products SET deleted = 0 WHERE id = '$id'");
 header('Location: archived.php');
}
?>

<h2 class="text-center">Archived products</h2><hr>

<table class="table table-bordered table-condensed table-striped">
<thead><th>Restore</th><th>Products</th><th>Price</th><th>Category</th><th>Sold</th></thead>
 <tbody>
 <?php while($products = mysqli_fetch_assoc($presults)): 
  $childID = $products['categories'];
  $catSql = "SELECT * FROM categories WHERE id = '$childID'";
  $result = $db->query($catSql);
  $child = mysqli_fetch_assoc($result);
  $parentID = $child['parent'];
  $cSql = "SELECT * FROM categories WHERE id = '$parentID'";
  $presult = $db->query($cSql);
  $parent = mysqli_fetch_assoc($presult);
  $category = $parent['category'].'~'.$child['category'];
 ?>
 <tr>
  <td><a href="archived.php?restore=<?=$products['id'];?>" class="btn btn-xs btn-default">
  <span class= "glyphicon glyphicon-refresh"></span></a></td>

  <td><?php echo $products['title']; ?></td>
  <td><?php echo $products['price']; ?></td>
  <td><?php echo $category;?></td>
  <td>0</td>
 </tr>
 <?php endwhile; ?>
 </tbody>
</table>


<?php include 'includes/footer.php';?>﻿