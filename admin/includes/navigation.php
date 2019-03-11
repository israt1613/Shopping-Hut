<nav class="navbar navbar-default ">
		<div class="container-fluid">
		 <!-- Brand and toggle get grouped for better mobile display -->	
			<div class="navbar-header">		
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a class="navbar-brand" href="/shoppingHut/admin/index.php" >Shopping Hut Admin</a>
			</div>
		 <!-- Collect the nav links, forms, and other content for toggling -->
			<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
			
			
				<ul class="nav navbar-nav">
				<!-- <li class="active"><a href="/shoppingHut/admin/index.php">Admin Home <span class="sr-only">(current)</span></a></li> -->
					<!--Menu items-->
					<li><a href="brands.php">Brands</a></li>
					<li><a href="categories.php">Categories</a></li>
					<li><a href="products.php">Products</a></li>
					<li><a href="archived.php">Archived</a></li>
					<?php if(has_permission('admin')): ?>
					<li><a href="users.php">Users</a></li>
					<?php endif; ?>
					<li class="dropdown">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Hello <?=$user_data['first'];?>!
						<span class="caret"></span>
						</a>
						<ul class ="dropdown-menu" role="menu">
							<li><a href="change_password.php">Change Password</a></li>
							<li><a href="logout.php">Log Out</a></li>
						</ul>
					</li>
				</ul>
			</div>
		</div>
	</nav>


