<?php
	require 'session.php';
?>


<!DOCTYPE HTML>
<html>
	<?php include('templates/header.php'); ?>

	<h3 class="center grey-text">Profile</h3>

	<div class="z-depth-0 center profile-details">
		<ul class="collection with-header">
			<li class="collection-header"><h6><?php echo '<img alt="no image" height="50%" width="100%" src="data:image;base64,'.$student['id_card'].'">' ?></h6></li>
			<li class="collection-item"><h5><?php echo htmlspecialchars($student['first_name']);echo(" ");echo htmlspecialchars($student['last_name']);?></h5></li>
			<li class="collection-item"><h6><?php echo htmlspecialchars($_SESSION['status']);?></h6></li>
			<li class="collection-item"><h6><?php echo htmlspecialchars($student['date_of_birth'])?></h6></li>
			<li class="collection-item"><h6><?php echo htmlspecialchars($student['mobile'])?></h6></li>
			<li class="collection-item"><h6><?php echo htmlspecialchars($student['email'])?></h6></li>
		</ul>
	</div>
	<div class="center">
		<a href="edit.php"><button name="edit" class="btn brand z-depth-0">Edit Profile</button></a>
		<a href="../logout.php"><button type="submit" name="logout" class="btn brand z-depth-0">Log Out</button></a>
	</div>

	<?php include('templates/footer.php'); ?>
</html>