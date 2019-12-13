<ul class="menu-advanced">
	<li><a href="profile.php"><i class="fa fa-user"></i> My Profile</a></li>
	<li><a href="edit_profile.php"><i class="fa fa-user"></i> Edit Profile</a></li>
	<?php if(isset($_SESSION['is_seller'])){ ?>
		<li><a href="my_products.php"><i class="fa fa-envelope"></i> My Products</a></li>
	<?php } ?>
	<li><a href="#"><i class="fa fa-cart-plus"></i> Wishlist</a></li>
	<li><a href="#"><i class="fa fa-cart-plus"></i> Basket</a></li>
	<li><a href="#"><i class="fa fa-envelope"></i> Message</a></li>
	<!-- <li><a href="#"><i class="fa fa-key"></i> Change Password</a></li> -->
	<li><a href="#"><i class="fa fa-sign-out"></i> Logout</a></li>
</ul>