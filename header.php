<?php
if( empty(session_id()) && !headers_sent()){
    session_start();}
?>

<!DOCTYPE html>
<html lang="en">
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width,initial-scale=1">
<link rel="stylesheet" href="styles/styles.css">



<div class="container">
  <!--Menu Section-->
  <header>
  <!--Business Logo-->
  	<img class="logo" src="images/JMLogo.png">
		<nav> 
			<ul class="nav_links">
				<li><a href="index.php"> Home</a></li>
				<li><a href="products.php">Products</a></li>
				<li><a href="about.php">About Us</a></li>
				<?php
					if (isset($_SESSION["id"])) {
						echo "<li><a href='profile.php'>Profile</a></li>";
						echo "<li><a href='includes/logout.inc.php'>Logout</a></li>";
					}
					else {
						echo "<li><a href='login.php'>Login</a></li>";
					}
				?>
			</ul>
		</nav>
		<a class="cob" href="checkout.php"><button>Cart</button></a>
  </header>
</div>