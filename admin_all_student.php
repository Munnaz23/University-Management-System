<?php
	ob_start ();
	session_start();
	require "php/config.php";
	require_once "php/functions.php";
	$user = new login_registration_class();
	$admin_id = $_SESSION['admin_id'];
	$admin_name = $_SESSION['admin_name'];
	if(!$user->get_admin_session()){
		header('Location: index.php');
		exit();
	}
	
?>
<?php 
$pageTitle = "All student details";
include "php/headertop_admin.php";
?>
<div class="all_student">
	
		<?php
			if(isset($_REQUEST['res'])){
				if($_REQUEST['res']==1){
					echo "<h3 style='color:green;text-align:center;margin:0;padding:10px;'>Data deleted successfully</h3>";
				}
			}
			
		?>
		<table class="tab_one">
			<tr>
				<th>SL</th>
				<th>Name</th>
				<th>ID</th>
				<th>Show Profile</th>
				<th>Edit</th>
				<th>Delete</th>

			</tr>
			<?php 
			$i=0;
				$alluser = $user->get_all_student();
				
				while($rows = $alluser->fetch_assoc()){
				$i++;
			?>
			<tr>
				<td><?php echo $i; ?></td>
				<td><?php echo $rows['name'];?></td>
				<td><?php echo $rows['st_id'];?></td>
				<td><a href="admin_single_student.php?id=<?php echo $rows['st_id'];?>">View Details</a></td>
				<td><a href="admin_single_student_update.php?id=<?php echo $rows['st_id'];?>">Edit</a></td>
				<td><a href="admin_delete_student.php?id=<?php echo $rows['st_id'];?>">Delete</a></td>
	
			</tr>
			<?php } ?>
		</table>
</div>

<?php ob_end_flush() ; ?>