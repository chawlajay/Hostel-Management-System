<?php 

	require 'session.php';

	$display=array();

	if($conn)
	{
		
		$sql_q1="SELECT * FROM students ORDER BY hostel_id";
		$sql_q2="SELECT * FROM hostels";

		$result1=mysqli_query($conn,$sql_q1);
		$result2=mysqli_query($conn,$sql_q2);

		$students=mysqli_fetch_all($result1,MYSQLI_ASSOC);
		$hostels=mysqli_fetch_all($result2,MYSQLI_ASSOC);
		if(!empty($students))
		{
				foreach($hostels as $hostel)
				{
					if(isset($_POST[$hostel['hostel_id']]))
					{
						foreach($students as $student)
						{
							if($student['hostel_id']==$hostel['hostel_id'])
							{
								$to_push=array("name"=>$student['first_name'].' '.$student['last_name'],"hostel_name"=>$hostel['hostel_name'],"email"=>$student['email'],"mobile"=>$student['mobile'],"dob"=>$student['date_of_birth']);

								$display[]=$to_push;
							}
						}
						break;
					}
				}
		}
else
$display[]=array("name"=>'None',"hostel_name"=>'None',"email"=>'None',"mobile"=>'None',"dob"=>'None');
	}

	mysqli_close($conn);

?>

<!DOCTYPE html>

    <?php include('templates/header.php'); ?>

	<h3 class="center grey-text">Students</h3>

	<form action="students.php" class="center" method="post">

		<?php foreach($hostels as $hostel){ ?>

			<div class="waves-effect btn brand">
			<h6>
				<input type="submit" value="<?php echo htmlspecialchars($hostel['hostel_name']); ?>" 
				name="<?php echo htmlspecialchars($hostel['hostel_id']); ?>"> 
			</h6>
			</div>
			

		<?php } ?>

	</form>
	<div style="text-align: center;">

		<?php if(count($display)>0){ ?>
			<table class="tabstu">
				<tr rowspan=2 class="tabstu">
					<td class="tabstu"><b>Name</b></td>
					<td class="tabstu"><b>Email</b></td>
					<td class="tabstu"><b>Phone</b></td>
					<td class="tabstu"><b>Date Of Birth</b></td>
				</tr>


				<?php foreach($display as $student) {?>

						<tr class="tabstu">
							<td class="tabstu"><?php echo $student['name']; ?></td>
							<td class="tabstu"><?php echo $student['email']; ?></td>
							<td class="tabstu"><?php echo $student['mobile']; ?></td>
							<td class="tabstu"><?php echo $student['dob']; ?></td>
						</tr>

				<?php } ?>
			</table>
		<?php } ?>
	</div>

	<?php require('templates/footer.php'); ?>
	
</html>
