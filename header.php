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
        <header class="container header_area fix" >
			<div id="sticker">
				<div class="head">
					<a href="#"><div class="logo fix">
						<img src="img/BAUST.jpg" alt="" />
					</div></a>
					<div class="uniname fix">
						<h2>BAUST Student Management System</h2>
					</div>
				</div>
				<div class="menu fix">
					<div class="dateshow fix"><p><?php echo "Date : ".date("d M Y"); ?></p></div>

				</div>
			</div>
		</header>
		<div class="maincontent container fix">
			<div id="stickerside">
				<div class="sidebar fix" >
						<ul>
							<li><span class="spcl"><i class="fa fa-server" aria-hidden="true"></i> Administrator</span></li>
								<ul>
									<li><a href="index.php"><i class="fa fa-sign-in" aria-hidden="true"></i> Login</a></li>
								</ul>

							<li><span class="spcl"><i class="fa fa-graduation-cap" aria-hidden="true"></i> Student Area</span></li>
								<ul>
									<li><a href="st_login.php"><i class="fa fa-sign-in" aria-hidden="true"></i> Login</a></li>
									<li><a href="st_reg.php"><i class="fa fa-user-plus" aria-hidden="true"></i> Register</a></li>
									
								</ul>
						</ul>
					
					</div>
				</div>
				<div class="content fix">