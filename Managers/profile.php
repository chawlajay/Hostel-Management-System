<?php
	require 'session.php';
?>


<!DOCTYPE HTML>
<html>
	<?php include('templates/header.php'); ?>

	<h2 class="center grey-text">Profile</h2>

	<div class="z-depth-0 center profile-details">
		<ul class="collection with-header">
			<li class="collection-item"><h4><?php echo htmlspecialchars($manager['first_name']);echo(" ");echo htmlspecialchars($manager['last_name']);?></h4></li>
			<li class="collection-item"><h5><?php echo htmlspecialchars($manager['date_of_birth'])?></h5></li>
			<li class="collection-item"><h5><?php echo htmlspecialchars($manager['mobile'])?></h5></li>
			<li class="collection-item"><h5><?php echo htmlspecialchars($manager['email'])?></h5></li>
		</ul>	
	</div>
	<div class="center">
		<a href="edit.php"><button name="edit" class="btn brand z-depth-0">Edit Profile</button></a>
		<a href="../logout.php"><button type="submit" name="logout" class="btn brand z-depth-0">Log Out</button></a>
	</div>

	<?php include('templates/footer.php'); ?>
</html>