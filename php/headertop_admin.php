<!Doctype html>
<html>
    <head>
        <link rel="stylesheet" href="css/normalize.css">
        <link rel="stylesheet" href="font-awesome/css/font-awesome.min.css">
        <link rel="stylesheet" href="fonts/stylesheet.css">
        <link rel="stylesheet" href="css/main.css">

    </head>
    <body>

        <!-- Add your site or application content here -->
        <header class="container header_area" >
			<div id="sticker">
				<div class="head">
					<a href="#               "><div class="logo fix">
						<img src="img/BAUST.jpg" alt="" />
					</div></a>
					<div class="uniname fix">
					<h2>BAUST Student Management System</h2>
					</div>
				</div>
				<div class="menu ">
					<div class="dateshow fix"><p><?php echo "Date : ".date("d M Y"); ?></p></div>
					<ul>
						<?php if($user->get_admin_session()){ ?>
						<li><a href="admin_logout.php"><i class="fa fa-sign-out" aria-hidden="true"></i> Logout</a></li>
						<li><a href="admin.php"><i class="fa fa-user" aria-hidden="true"></i>
						<?php echo $admin_name; ?>
						</a></li>
						
						<?php } ?>
					</ul>

				</div>
			</div>
		</header>
		<div class="info container fix">
