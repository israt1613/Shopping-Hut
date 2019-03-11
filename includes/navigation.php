	<!-- main navigation.php -->
	<?php
	$sql = "SELECT * FROM categories WHERE parent = 0";
	$pquery = $db->query($sql);
	?>




	<nav class="navbar navbar-default">
	  <div class="container-fluid">
	    <!-- Brand and toggle get grouped for better mobile display -->
	    <div class="navbar-header">
	      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
	        <span class="sr-only">Toggle navigation</span>
	        <span class="icon-bar"></span>
	        <span class="icon-bar"></span>
	        <span class="icon-bar"></span>
	      </button>
	      <a class="navbar-brand" href="/shoppingHut/index.php">Shopping Hut</a>
	    </div>

	    <!-- Collect the nav links, forms, and other content for toggling -->
	    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">

				<ul class="nav navbar-nav">

	        <!-- <li class="active"><a href="index.php">Home <span class="sr-only">(current)</span></a></li> -->

					<?php while ($parent = mysqli_fetch_assoc($pquery)) : ?>
					<?php
						$parent_id = $parent['id'];
						$sql2 = "SELECT * FROM categories WHERE parent = '$parent_id'";
						$cquery = $db->query($sql2);
					?>



					<li class="dropdown">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
							<?php echo $parent['category']; ?>
							<span class="caret"></span>
						</a>
						<ul class="dropdown-menu" role="menu">

							<?php while ($child = mysqli_fetch_assoc($cquery)) : ?>
							<li><a href="category.php?cat=<?=$child['id'];?>"><?php echo $child['category']; ?></a></li>
							<?php endWhile; ?>
						</ul>
					</li>

					<?php endWhile; ?>
					<li><a href="cart.php"><span class="glyphicon glyphicon-shopping-cart"></span> My Cart</a></li>

	      </ul>

	    </div><!-- /.navbar-collapse -->
	  </div><!-- /.container-fluid -->
	</nav>
