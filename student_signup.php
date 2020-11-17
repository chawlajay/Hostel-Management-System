<?php 
	session_start();

	require 'config/db_connect.php';

	$errors=array('fname'=>'','lname'=>'','RollNumber'=>'','id_card'=>'','password'=>'','cpassword'=>'','email'=>'','phone'=>'','dob'=>'');

	if(isset($_POST['signup']))
	{
		$fname=$_POST['fname'];
		$lname=$_POST['lname'];
		$rnumber=$_POST['RollNumber'];
		// $id_card=$_POST['id_card'];
		$dob=$_POST['DOB'];
		$email=$_POST["email"];
		$phone=$_POST["phone"];
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

		//Validate rollnumber//college_id

		if(strlen($rnumber)==0)
		{
			$valid=false;
			$errors['RollNumber']="*Roll Number can't be empty";
		}
		else
		{
			/*if(strlen($rnumber)!=8 or $rnumber[0]!='U' or !ctype_digit($rnumber[1]) or !ctype_digit($rnumber[2]) or !ctype_upper($rnumber[3]) or !ctype_upper($rnumber[4]) or !ctype_digit($rnumber[5]) or !ctype_digit($rnumber[6]) or !ctype_digit($rnumber[7]))*/
			if(strlen($rnumber)<6)
			{
				$errors['RollNumber']='*Enter a valid roll number';
				$valid=false;
			}
		}

		//Validate Student ID card

		// name of file with random number so two files do not get same name
		// $file_name=rand(1000,10000)."-".$_FILES['id_card']['name'];
		// // temporary file name to store file
		// $temp_file_name=$_FILES['id_card']['tmp_name'];
		// // upload directory path 
		// $upload_dir='./id_cards';
		// // to move the uploaded file to specific location
		// move_uploaded_file($temp_file_name,$upload_dir.'/'.$file_name);

		$temp_file_name=addslashes($_FILES['id_card']['tmp_name']);
		$file_name=addslashes($_FILES['id_card']['name']);
		$image=file_get_contents($temp_file_name);
		$image=base64_encode($image);
		//$valid=false;
		
		//Validate Email

		if(strlen($email)==0)
		{
			$errors['email']="*Email can't be empty";
			$valid=false;
		}
		else if(!filter_var($email,FILTER_VALIDATE_EMAIL)) 
		{
			$errors["email"]="*Invalid email format";
			$valid=false;
		}

		//Validate phone

		if(strlen($phone)==0)
		{
			$errors['phone']="*Phone number can't be empty";
			$valid=false;
		}
		else if(strlen($phone)!=10)
		{
			$errors['phone']="*Invalid phone number";
			$valid=false;
		}
		else
		{
			for($i=0;$i<strlen($phone);$i++)
			{
				if(!ctype_digit($phone[$i]))
				{
					$errors['phone']="*Invalid phone number";
					$valid=false;
					break;
				}
			}
		}


		//Validate password/confirm password

		if(strlen($password)==0)
		{
			$errors['password']="*Password can't be empty";
			$valid=false;
		}
		else
		{
			if($password!=$cpassword)
			{
				$errors['cpassword']='*Passwords do not match';
				$valid=false;
			}
		}

		//If everything is valid

		if($valid)
		{

			if($conn)
			{
				$sql="INSERT INTO students(first_name,last_name,date_of_birth,mobile,email,college_id,id_card,password) 
				VALUES('$fname','$lname','$dob','$phone','$email','$rnumber','$image','$password')";
				if(mysqli_query($conn,$sql)) 
				{
					echo 'Account Successfully Created';
					$_SESSION['username'] = $rnumber;
					setcookie("user_email",$email,time()+60*60*24,'/');
					header("location: Students/profile.php");
				} 
			}

			mysqli_close($conn);
		}
	}
?>

<!DOCTYPE html>
<html>
<?php include('templates/header.php'); ?>

	<section class="container grey-text">	
	<h4 class="center blue-text">Student SignUp Page</h4>
	<form class="white" action="student_signup.php" method="post"  enctype="multipart/form-data">
    
        <label><h5>First Name: </h5></label>
        <input type="text" name="fname" value="<?php echo isset($_POST["fname"]) ? $_POST["fname"] : ''; ?>">
        <div class="red-text"><?php echo $errors['fname']; ?></div>
      
        <label><h5>Last Name: </h5></label>
        <input type="text" name="lname" value="<?php echo isset($_POST["lname"]) ? $_POST["lname"] : ''; ?>">
        <div class="red-text"><?php echo $errors['lname']; ?></div>

        <label><h5>College Id: </h5></label>
        <input type="text" name="RollNumber" value="<?php echo isset($_POST["RollNumber"]) ? $_POST["RollNumber"] : ''; ?>"> 
        <div class="red-text"><?php echo $errors['RollNumber']; ?></div>

		<label><h5>ID Card: </h5></label>
        <input type="file" name="id_card" required> 
        <div class="red-text"><?php echo $errors['id_card']; ?></div><br>

      	<label><h5>Date of Birth: </h5></label>
        <input type="date" name="DOB" value="<?php echo isset($_POST["DOB"]) ? $_POST["DOB"] : ''; ?>">
	    <div class="red-text"><?php echo $errors['dob']; ?></div>

      	<label><h5>Email: </h5></label>
      	<input type="email" name="email" value="<?php echo isset($_POST["email"]) ? $_POST["email"]: ''; ?>">
        <div class="red-text"><?php echo $errors['email']; ?></div>

      	<label><h5>Phone: </h5></label>
      	<input type="text" name="phone" value="<?php echo isset($_POST["phone"]) ? $_POST["phone"]: '';?>">
        <div class="red-text"><?php echo $errors['phone']; ?></div>

        <label><h5>Password: </h5></label>
        <input type="password" name="password" value="<?php echo isset($_POST["password"]) ? $_POST["password"] : ''; ?>">
        <div class="red-text"><?php echo $errors['password']; ?></div>

      	<label><h5>Confirm Password: </h5></label>
      	<input type="password" name="cpassword" value="<?php echo isset($_POST["cpassword"]) ? $_POST["cpassword"] : ''; ?>">
        <div class="red-text"><?php echo $errors['cpassword']; ?></div>

      <div class="center">
        <input type="submit" name="signup" value="Create" class="btn brand z-depth-0">
      </div>

    </form>
</section>

<?php include('templates/footer.php'); ?>
</html>
