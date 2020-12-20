<?php
	require 'session.php';
	
	$errors=array('fname'=>'','lname'=>'','email'=>'', 'password'=>'','cpassword'=>'','mobile'=>'','dob'=>'');

	if(isset($_POST['edit']))
	{
		$admin_id=$admin['manager_id'];
		$fname=$_POST['fname'];
		$lname=$_POST['lname'];
		$dob=$_POST['DOB'];
		$mobile=$_POST["mobile"];
		$password=$_POST['password'];
		$cpassword=$_POST['cpassword'];


		$valid=true;

		//Validate first name

		if(strlen($fname)==0)
		{
			$errors['fname']="*First Name can't be empty";
			$valid=false;
		}
		else
		{
			for($i=0;$i<strlen($fname);$i++)
			{
				if(!ctype_alpha($fname[$i]))
				{
					$errors['fname']='*First Name can contain only alphabets';
					$valid=false;
					break;
				}
			}
		}

		//Validate last name

		if(strlen($lname)==0)
		{
			$errors['lname']="*Last Name can't be empty";
			$valid=false;
		}
		else
		{
			for($i=0;$i<strlen($lname);$i++) 
			{
				if(!ctype_alpha($lname[$i]))
				{
					$errors['lname']='*Last Name can contain only alphabets';
					$valid=false;
					break;
				}
			}
		}

		//Validate mobile

		if(strlen($mobile)==0)
		{
			$errors['mobile']="*mobile number can't be empty";
			$valid=false;
		}
		else if(strlen($mobile)!=10)
		{
			$errors['mobile']="*Invalid mobile number";
			$valid=false;
		}
		else
		{
			for($i=0;$i<strlen($mobile);$i++)
			{
				if(!ctype_digit($mobile[$i]))
				{
					$errors['mobile']="*Invalid mobile number";
					$valid=false;
					break;
				}
			}
		}


		//Validate password/confirm password

		if($password==''){
			$password=$admin['password'];
			$cpassword=$password;
		}
		if($password!=$cpassword)
		{
			$errors['cpassword']='*Passwords do not match';
			$valid=false;
		}

		//If everything is valid

		if($valid)
		{
			if($conn)
			{
				$sql="UPDATE managers SET first_name = '$fname', last_name = '$lname', date_of_birth = '$dob', mobile = '$mobile', password = '$password' WHERE manager_id = '$admin_id'";
			}
			//if(mysqli_query($conn,$sql)) 
			if(mysqli_query($conn,$sql)) 
			{
				echo 'Saved Changes Successfully';
				header("location: profile.php");
			} 
		}
	}
?>


<!DOCTYPE HTML>
<html>
	<?php include('templates/header.php'); ?>

	<section class="container grey-text">	
	<h4 class="center heading-text">Edit Admin Profile</h4>
	<form class="white" action="edit.php" method="post">
    
        <label><h5>First Name: </h5></label>
        <input type="text" name="fname" value="<?php echo $admin['first_name'] ?>">
        <div class="red-text"><?php echo $errors['fname']; ?></div>
      
        <label><h5>Last Name: </h5></label>
        <input type="text" name="lname" value="<?php echo $admin['last_name'] ?>">
        <div class="red-text"><?php echo $errors['lname']; ?></div>

      	<label><h5>Date of Birth: </h5></label>
        <input type="date" name="DOB" value="<?php echo $admin['date_of_birth'] ?>">
	    <div class="red-text"><?php echo $errors['dob']; ?></div>

      	<label><h5>Email: </h5></label>
      	<input type="email" name="email" value="<?php echo $admin['email'] ?>" disabled>
        <div class="red-text"><?php echo $errors['email']; ?></div>

      	<label><h5>Mobile: </h5></label>
      	<input type="text" name="mobile" value="<?php echo $admin['mobile'] ?>">
        <div class="red-text"><?php echo $errors['mobile']; ?></div>

        <label><h5>Change Password: </h5></label>
        <input type="password" name="password" value="">
        <div class="red-text"><?php echo $errors['password']; ?></div>

      	<label><h5>Confirm New Password: </h5></label>
      	<input type="password" name="cpassword" value="">
        <div class="red-text"><?php echo $errors['cpassword']; ?></div>

      <div class="center">
        <input type="submit" name="edit" value="Save Changes" class="btn brand z-depth-0">
      </div>

    </form>
	</section>

	<?php include('templates/footer.php'); ?>
</html>