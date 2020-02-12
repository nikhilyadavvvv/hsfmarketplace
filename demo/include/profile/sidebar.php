<ul class="menu-advanced">
	<li><a href="profile.php"><i class="fa fa-user"></i> My Profile</a></li>
	<?php if(isset($_SESSION['is_seller']) && $_SESSION['is_seller']){ ?>
		<li><a href="my_products.php"><i class="fa fa-envelope"></i> My Products</a></li>
	<?php } ?>
	<li><a href="wishlist.php"><i class="fa fa-heart"></i> Wishlist</a></li>
	<li><a href="basket.php"><i class="fa fa-cart-plus"></i> Basket</a></li>
	<li><a href="my_orders.php"><i class="fa fa-cart-plus"></i> My Orders</a></li>
	<li><a href="my_gifts.php"><i class="fa fa-gift"></i> My Gifts</a></li>
	<li><a href="message.php"><i class="fa fa-envelope"></i> Message</a></li>
	<!-- <li><a href="my_notifications.php"><i class="fa fa-bell"></i> Notifications</a></li> -->
	<li><a href="change_password.php"><i class="fa fa-key"></i> Change Password</a></li>
	<li><a href="logout.php"><i class="fa fa-sign-out"></i> Logout</a></li>
</ul>