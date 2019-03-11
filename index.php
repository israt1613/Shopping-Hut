<!-- main index.php -->
<?php
  require_once 'core/init.php';
  include 'includes/head.php';
  include 'includes/navigation.php';
  include 'includes/headerfull.php';



  $sql = "SELECT * FROM products WHERE featured=1";
  $featured = $db->query($sql);
  ?>


	<div class="container-fluid">
		<div class="row">
			<!--including left side bar-->
		<?php
		 include 'includes/leftbar.php';
		 ?>
			<!--Main Content-->
				<div class="col-md-8">
				<div class="row">
					<h2 class="text-center"><strong>Featured Products</strong></h2>
					
						<?php while($product = mysqli_fetch_assoc($featured)) : ?>
						<div id="outer_div" class="col-sm-3 text-center">
							<h4><?= $product['title']; ?></h4>
							<img src="<?= $product['image']; ?>" alt="<?= $product['title']; ?>" class="img-thumb" /></image>
							<p class="list price text-danger">List Price: <s>$<?= $product['list_price']; ?></s></p>
							<p class="price">Our Price: $<?= $product['price']; ?></p>
							<button type="button" class="btn btn-sm btn-success" onclick="detailsmodal(<?= $product['id']; ?>)">Details</button>
						</div>
						<?php endWhile; ?>
					
				</div>
				</div>
	<!--including right side bar-->
	<?php
		include 'includes/rightbar.php';
		?>
	</div>
	</div>
<?php
  	include 'includes/footer.php';
 	 ?>
