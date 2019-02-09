<!DOCTYPE html>
<html>
<head>
	<title>Welcome</title>
	<link rel="stylesheet" type="text/css" href="main.css">
	<link rel="stylesheet" type="text/css" href="../../bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="../../fontawesome-free-5.6.3-web\css/all.min.css">
	<script src="../../jquery.min.js"></script>

	<?php

		$uid=$_GET['uid'];
		$pass=$_GET['pass'];

		$con = mysqli_connect('localhost','root','');
		mysqli_select_db($con,'hack3');

		$qre = "select pid, pname, pdetails,pprice,ppic,products.id, name,email,mob,addr from products, users where products.id=users.id";

		$uss = "select * from users where '$uid' = id";

		$res = mysqli_query($con,$qre);
		$user = mysqli_query($con,$uss);
		$me = mysqli_fetch_assoc($user);

		$meid = $me['id'];

		$mefind ="select orders.pid,pname,pprice from orders,users,products where buyer= '$meid' and orders.pid=products.pid and users.id='$meid'";

		$pro = mysqli_query($con,$mefind);





	?>





</head>
<body>

<div class="ext">

	<header class="header">
		<div class="container">
			<h2>NITCAOLX <small>get what you want</small></h2>
			<div class="usr">
				<i class="fa fa-plus fa-lg"></i>

				<div class="dropdown" style="display:inline-block;">
					<i class="fa fa-shopping-cart fa-lg dropdown-toggle" type="button" area-haspopup="true" aria-expanded="false" data-toggle="dropdown" id="dropdownMenuButton" > </i>

					<div class="dropdown-menu" aria-labelledby="dropdownMenuButton" >
						
						<?php while($prod=mysqli_fetch_assoc($pro)) { ?>
						<div class="dropdown-item" style="padding: 20px; width: 300px;"><?php echo $prod['pname']."   ".$prod['pprice']; ?> </div>

						<?php } ?>
					

					</div>
				</div>

				<span> <?php echo $me['name'] ?> </span>
				<span class="dp"></span>

			</div>
		</div>


	</header>

	<div class="container cont">
		
		<h1>Products Available <small> to buy</small></h1>
	

		<div class="item-box">
			
		<!-- 	<div class="item">
				<div class="details">
					<h4>Sony SRS 10</h4>
					<p>Bluetooth speakers</p>
					<div class="price">&#8377; 2000</div>
				</div>
				<i class="fa fa-cart-plus fa-2x"></i>
			</div>
 -->

			<?php
				if(mysqli_num_rows($res)==0)
				{
			?>

				<blockquote><h1>Nothing Here</h1></blockquote>

			<?php }  else { 

				while($row = mysqli_fetch_assoc($res))
				{

				?>

				<div class="item" style="background:url(./pics/<?php echo $row['ppic']?>); background-size: cover;">
				<div class="details">
					<h4> <?php echo $row['pname'] ?> </h4>
					<p> <?php echo $row['pdetails'] ?> </p>
					<div class="price">&#8377; <?php echo $row['pprice'] ?> </div>

					<i class="fa fa-cart-plus fa-2x"></i>

					<div class="contacth">
					<h4>Please Contact <small>#<?php echo $row['pid'] ?></small></h4>
					<span> <?php echo $row['name'] ?> </span><br>
					<span> <?php echo $row['email'] ?> </span><br>
					<span> <?php echo $row['mob'] ?> </span><br>
					<span> <?php echo $row['addr'] ?> </span><button class="btn btn-success" style="margin: 5px 3px 5px 30px;"> Buy</button>
				</div>
				</div>
				

			</div>


			<?php }  }?>




			

		</div>
	</div>

	<footer>
		<div class="container">
			

		</div>

		
		

	</footer>

</div>


<script type="text/javascript">
		$(function(){

			$(".fa-cart-plus").click(function(){

				$(this).next().toggleClass("contacts");
			});


			$("#dropdownMenuButton").click(function(){
				if($(".dropdown-menu").css("display")=="none")
				{
					$(".dropdown-menu").css("display","block");	
				}

				else
				{
					$(".dropdown-menu").css("display","none");
				}
			});


		});


</script>




</body>
</html>