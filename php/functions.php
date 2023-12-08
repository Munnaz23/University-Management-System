<?php
class login_registration_class{
	public function __construct(){
		$db = new databaseConnection();
	}
	
	//All function for Student
	
	//function for student registration
	public function st_registration($st_id,$st_name,$st_pass,$st_email,$bday,$st_dept,$st_contact,$st_gender,$st_add){
		global $conn;
		$query = $conn->query("select st_id from st_info where st_id='$st_id' or email ='$st_email' ");

		$num = $query->num_rows;
		$in_sql = "INSERT INTO st_info (st_id,name,password,email,bday,program,contact,gender,address) VALUES ('$st_id','$st_name','$st_pass','$st_email','$bday','$st_dept','$st_contact','$st_gender','$st_add') ";
		if($num == 0){
			$conn->query($in_sql);
			return true;
		}else{
			return false;
		}
	}
	
	//function for student login
	public function st_userlogin($st_id, $st_pass){
		global $conn;
		$sql = "SELECT st_id,name FROM st_info WHERE st_id='$st_id' and password='$st_pass'";
		$result = $conn->query($sql);
		$userdata = $result->fetch_assoc();
		$count = $result->num_rows;
		if($count == 1){
			session_start();
			$_SESSION['st_login'] = true; 
			$_SESSION['sid'] = $userdata['st_id']; 
			$_SESSION['sname'] = $userdata['name']; 
			return true;
		}else{
			return false;
		}
		
	} 
	
	//function for get student Name 
	public function getusername($sid){
		global $conn;
		$query = $conn->query("select name from st_info where st_id='$sid'");
		$result = $query->fetch_assoc();
		echo $result['name'];
	}
	// Get all info of a specific student by Student ID
	public function getuserbyid($st_id){
		global $conn;
		$query = $conn->query("select * from st_info where st_id='$st_id'");
		return $query;
	}
	//Update Student Profile
	public function updateprofile($sid,$st_name,$st_email,$st_dept,$st_gender,$st_contact,$st_add){
		global $conn;
		$query = $conn->query("update st_info set name='$st_name',email='$st_email',program='$st_dept',gender='$st_gender',contact='$st_contact', address='$st_add' where st_id='$sid'");
		return true;
	}
	
	//Change Student Password
	public function updatePassword($sid, $newpass, $oldpass){
		global $conn;
		$query = $conn->query("select st_id from st_info where st_id='$sid' and password='$oldpass' ");
		$count = $query->num_rows;
		if($count == 0){
			return print("<p style='color:red;text-align:center'>old password not exist.</p>");
		}else{
			$update = $conn->query("update st_info set password='$newpass' where st_id='$sid' ");
			return print("<p style='color:green;text-align:center'>Password changed successfully.</p>");
		}
	}
	//Session Unset for Student info //Log out option
	public function st_logout(){
		$_SESSION['st_login'] = false;
		unset($_SESSION['sid']); 
		unset($_SESSION['sname']);
		unset($_SESSION['st_login']);
		
		//session_destroy();
	}
	public function getsession(){
		return @$_SESSION['st_login'];
	}

	//Ends student releted function 
	
	
	/*
	**********************
	----------------------
	All functions for Admin 
	----------------------
	**********************
	*/
	
	//for getting All student infomation 
	public function get_all_student(){
		global $conn;
		$sql = "select * from st_info order by st_id ASC";
		$query = $conn->query($sql);
		return $query;
	}
	
	
	//Admin log in function 
	public function admin_userlogin($username, $password){
		global $conn;
		$sql  = "select id,username from admin where username='$username' and password='$password'";
		$result = $conn->query($sql);
		$admin_info = $result->fetch_assoc();
		$count = $result->num_rows;
		if($count == 1){
			session_start();
			$_SESSION['admin_login'] = true;
			$_SESSION['admin_id'] = $admin_info['id'];
			$_SESSION['admin_name'] = $admin_info['username'];
			return true;
		}else{
			return false;
		}
		
	}
	public function get_admin_session(){
		return @$_SESSION['admin_login'];
	}
	//admin logout 
	public function admin_logout(){
		$_SESSION['admin_login'] = false;
		unset($_SESSION['admin_id']);
		unset($_SESSION['admin_name']);
		unset($_SESSION['admin_login']);
	}
	//delete student
	public function delete_student($st_id){
		global $conn;
		$sql = "delete from st_info where st_id='$st_id' ";
		$result = $conn->query($sql);
		if($result){
			return true;
		}else{
			return false;
		}
	}
//add result
public function add_marks($stid,$subject,$semester,$marks){
	global $conn;
	$qry = "select * from result where st_id='$stid' and sub='$subject' and semester='$semester' ";
	$query = $conn->query($qry);
	$count = $query->num_rows;
	if($count>0){
		return false;
	}else{
	$sql = "insert into result(st_id,marks,sub,semester) values('$stid','$marks','$subject','$semester')";
	$result = $conn->query($sql);
	return $result;
	}
}
//view result
public function show_marks($stid,$semester){
	global $conn;
	$result = $conn->query("select * from result where st_id='$stid' and semester='$semester' ");
	$count = $result->num_rows;
	if($count>0){
		return $result;
	}else{
		return false;
	}
	
}

	//update student result
	public function update_result($stid,$subject = array(),$semester){
		global $conn;
		foreach($subject as $key =>$mark ){
			$sql = "update result set marks='$mark' where st_id='$stid' and semester='$semester' and sub='$key' ";
				$result = $conn->query($sql);	
		}
		if($result){
			return true;
		}else{
			return false;
		}
	}
	public function view_cgpa($stid){
		global $conn;
		$sql = "select * from result where st_id='$stid'";
		$result = $conn->query($sql);
		return $result;
	}

	
};



?>