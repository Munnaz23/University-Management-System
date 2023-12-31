<?php
	session_start();
	require "php/config.php";
	require_once "php/functions.php";
	$user = new login_registration_class();
	$admin_id = $_SESSION['admin_id'];
	$admin_name = $_SESSION['admin_name'];
	if(isset($_REQUEST['id'])){
		$st_id = $_REQUEST['id'];
	}else{
		header('Location: admin.php');
		exit();
	}
	
	if(!$user->get_admin_session()){
		header('Location: index.php');
		exit();
	}
?>
<?php 
$pageTitle = "Student Details";
include "php/headertop_admin.php";
?>
<div class="profile">
	
		<table class="tab_one">
			<?php
				$getuser = $user->getuserbyid($st_id);
				while($row = $getuser->fetch_assoc()){
			?>

			<tr>
				<td>Student ID: </td>
				<td><?php echo $row['st_id']; ?></td>
			</tr>
			<tr>
				<td>Name: </td>
				<td><?php echo $row['name']; ?></td>
			</tr>
			<tr>
				<td>E-mail: </td>
				<td><?php echo $row['email']; ?></td>
			</tr>
			<tr>
				<td>Birthday: </td>
				<td><?php echo $row['bday']; ?></td>
			</tr>
			<tr>
				<td>Program: </td>
				<td><?php echo $row['program']; ?></td>
			</tr>
			<tr>
				<td>Contact: </td>
				<td><?php echo $row['contact']; ?></td>
			</tr>
			<tr>
				<td>Gender: </td>
				<td><?php echo $row['gender']; ?></td>
			</tr>
			<tr>
				<td>Address: </td>
				<td><?php echo $row['address']; ?></td>
			</tr>
			<tr>
				<td>Update Profile: </td>
				<td><a href="admin_single_student_update.php?id=<?php echo $row['st_id'];?>"><button class="editbtn">Edit Profile</button></a></td>
			</tr>
			<?php  } ?>
		</table>
		<div class="back fix">
			<p style="text-align:center"><a href="admin_all_student.php"><button class="editbtn">Back to student list</button></a></p>
		</div>

</div>

