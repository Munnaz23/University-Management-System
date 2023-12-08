<?php
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
	if(isset($_REQUEST['vr'])){
		$stid = $_REQUEST['vr'];
		$name = $_REQUEST['vn'];
	}
?>	
<?php 
$pageTitle = "Student Result";
include "php/headertop_admin.php";
?>
<div class="all_student fix">


	<!--Infomation of student-->
		<div>
	<p style="text-align:center;color:#fff;background:purple;margin:0;padding:8px;"><?php echo "Name: ".$name."<br>Student ID: " . $stid; ?></p>
	</div>	

	
	<form action="" method="post" style="width:23%;margin:0 auto;padding-bottom:5px;">
		<select name="seme" id="">
			<option value="1st">1st semester</option>
		</select>
		<input type="submit" value="view Result" />

	</form>
	<?php
	//select semester
			if($_SERVER['REQUEST_METHOD'] == 'POST'){
				$semester = $_POST['seme'];
			

			
				//$get_result = $user->show_marks();
				
				$get_result = $user->show_marks($stid,$semester);
				if($get_result){
			?>
				<p><?php echo "<p style='text-align:center;background:#ddd;color:#01C3AA;padding:5px;width:84%;margin:0 auto'>".$semester." Semester Result"?></p>
				<table class="tab_two" style="text-align:center;width:85%;margin:0 auto">
					<th>Subject</th>
					<th>Marks</th>
					<th>Grade</th>
		 <?php		
				while($rows = $get_result->fetch_assoc()){

		?> 
			<tr>
				<td><?php echo $rows['sub'];?></td>
				<td><?php echo $rows['marks'];?></td>
				<td>
				<?php 
				//set grade for individual subject
				
					$mark = $rows['marks'];
					if($mark<40 && $mark>0){echo "F";}
					elseif($mark>=40 && $mark<50){echo "D";}
					elseif($mark>=50 && $mark<60){echo "C";}
					elseif($mark>=60 && $mark<65){echo "B";}
					elseif($mark>=65 && $mark<70){echo "B+";}
					elseif($mark>=70 && $mark<75){echo "A-";}
					elseif($mark>=75 && $mark<=80){echo "A";}
					elseif($mark>=80 && $mark<=100){echo "A+";}
					else{echo "Invalid";}
					
				?>
				</td>
				
				
				
			</tr>
			<?php } ?>
		
		</table>
		
		<?php 
			}
			else{
				echo  "<p style='color:red;text-align:center'>Nothing Found</p>";
				}
		?>
					<p style="float:left; text-align:right;margin:20px 0;width:49%"><a href="st_result_update.php?ar=<?php echo $stid?>&seme=<?php echo $semester?>&vn=<?php echo $name?>"><button class="editbtn">Edit Result</button></a></p>

		<?php 
				}
		?>
		
			<p style="float:right;text-align:left;margin:20px 0;width:49%"><a href="st_result.php"><button class="editbtn">Back to list</button></a></p>

</div>

<?php ob_end_flush() ; ?>