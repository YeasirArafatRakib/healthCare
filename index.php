<?php

include('config.php');
$sql="SELECT * FROM hospitaldetails";
$res=mysqli_query($db,$sql);

?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Online Booking</title>
		<link rel="stylesheet" href="./assets/bootstrap.min.css">
	</head>
	<body>
<?php include('./templates/navbar.php') ?>

<?php include('./templates/header.php') ?>
		<div class="container mt-2">
			<div class="row">
			<?php while($row=mysqli_fetch_assoc($res)){?>
				<div class="col-sm-6">
					<div class="card">
						<div class="card-body">
							<h5 class="card-title"><?php echo $row['name']?></h5>
							<p class="card-text"><?php echo $row['address']?></p>
							<p class="card-text"><?php echo $row['phone']?></p>
							<p class="card-text"><?php echo $row['district']?></p>
							<a class="btn btn-primary" href="DoctorsForUser.php?id=<?php echo $row['id'];?>" >Doctor List</a>
						</div>
					</div>
				</div>
			<?php } ?>
			</div>
		</div>
		<script src="./assets/jquery.min.js"></script>
		<script src="./assets/popper.js"></script>
		<script src="./assets/bootstrap.min.js"></script>
	</body>
</html>