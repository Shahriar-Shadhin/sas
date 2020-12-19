<!DOCTYPE HTML>

<html>
<head>
	<title>Student Attendance System</title>
	<?php include('includes/header.php');
	
	
	?>
	<link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>

    <style>
    label{
        margin: 0px 0px 0px 0px;
    }
	.form-control small {
		/* visibility: hidden; */
		color: red;
		font-size: 12px;
		
	}
	
    </style>

</head>

<body class="is-preload">
	<!-- Header -->
	<header id="header">
		<a class="logo" href="index.php">Student Attendance System</a>
		<nav>
			<a href="#menu">Menu</a>
		</nav>
	</header>

	<!-- Nav -->
	<nav id="menu">
		<ul class="links">
			<li><a href="teacher.main.php">Home</a></li>
			<li><a href="index.php">Log Out</a></li>
			<!-- <li><a href="generic.html">Generic</a></li> -->
		</ul>
	</nav>

	<!-- Banner -->
	<section id="banner">
		<div class="inner">
			<h1>Change User Name <br> and <br>Password</h1>
		</div>

	</section>
	
	

	<!-- Highlights -->
	<section class="wrapper">
		<div class="inner">

        <div class="highlights">
				<section>
					<div class="content" style="padding: 20px;">
					<span><?php
					if($_GET){
						echo $_GET['msg'];
					}
					?></span>
						<form action="" method="get" id="form" style="margin: 0 0 10px;">
							<div class="form-control" style="display: grid;">
								<label for="old-password">Old Password:</label>
								<input type="password" name="old-password" id="old-password">
								
								
								
								<b><small id="oldpasstext"></small></b>
							</div>
							<div class="form-control">
								<label for="password">New Password:</label>
								<input type="password" name="password" id="password">
								
								<b><small id="newpasstext"></small></b>
							</div>
							<div class="form-control">
								<label for="confirm-password">Confirm New Password:</label>
								<input type="password" name="confirm-password" id="confirm-password">
								
								<b><small id="confirmpasstext"></small></b><small></small>
							</div>
							<input type="submit" value="Submit" name="submit" id="button" style="margin-top: 10px;">

	
						</form>

						<span style="font-size: 12px; color: green;">Password Must Be Between 8-15 Characters <br> Minimum One Number, One Special Character, One Lower Case and Upper Case Character!</span>

					</div>
					
				</section>
			</div>
		</div>
	</section>
	<script>
	const form = document.getElementById('form');
	const oldPass = document.getElementById('old-password');
	const password = document.getElementById('password');
	const confPassword = document.getElementById('confirm-password');
	const button = document.getElementById('button');


	form.addEventListener('submit', (e)=>{
		e.preventDefault();
		checkOldPass();
		checkNewPass();
		checkConfPass();
		validate();
		
	});

		function checkOldPass(){
			let oldPassValue = oldPass.value.trim();
			// const passwordValue = password.value.trim();
			// const conPassValue = confPassword.value.trim();

			if(oldPassValue == ''){
				document.querySelector('#oldpasstext').innerHTML = "Old Password Can't Be Empty!";
				return false;
			}else{
				document.querySelector('#oldpasstext').innerHTML = "";
				
			};
		}
		function checkNewPass(){
			let passwordValue = password.value.trim();
			if(passwordValue == ''){
				document.querySelector('#newpasstext').innerHTML = "New Password Can't Be Empty!";
				return false;
			}
			else if(passwordValue.length < 8){
				document.querySelector('#newpasstext').innerHTML = "Password Must Be Between 8-15 Characters, Minimum One Number, One Special Character, One Lower Case and Upper Case Character!";
				return false;
			}
			else if(passwordValue.length > 15){
				document.querySelector('#newpasstext').innerHTML = "Password Must Be Between 8-15 Characters, Minimum One Number, One Special Character, One Lower Case and Upper Case Character!";
				return false;
			}
			else if(!passwordValue.match(/[a-z]/g)){
				document.querySelector('#newpasstext').innerHTML = "Password Must Be Between 8-15 Characters, Minimum One Number, One Special Character, One Lower Case and Upper Case Character!";
				return false;
			}
			else if(!passwordValue.match(/[A-Z]/g)){
				document.querySelector('#newpasstext').innerHTML = "Password Must Be Between 8-15 Characters, Minimum One Number, One Special Character, One Lower Case and Upper Case Character!";
				return false;
			}
			else if(!passwordValue.match( /[0-9]/g)){
				document.querySelector('#newpasstext').innerHTML = "Password Must Be Between 8-15 Characters, Minimum One Number, One Special Character, One Lower Case and Upper Case Character!";
				return false;
			}
			else if(!passwordValue.match( /[^a-zA-Z\d]/g)){
				document.querySelector('#newpasstext').innerHTML = "Password Must Be Between 8-15 Characters, Minimum One Number, One Special Character, One Lower Case and Upper Case Character!";
				return false;
			}else{
				document.querySelector('#newpasstext').innerHTML = "";
			};
		}
		function checkConfPass(){
			let oldPassValue = oldPass.value.trim();
			let passwordValue = password.value.trim();
			let conPassValue = confPassword.value.trim();
			if(passwordValue != conPassValue){
				document.querySelector('#confirmpasstext').innerHTML = "Password Is Not Matching!";
				return false;
			}
			else{
				document.querySelector('#confirmpasstext').innerHTML = "";
				
			}
			
			
		};
		function validate(){
			let oldPassValue = oldPass.value.trim();
			let passwordValue = password.value.trim();
			let conPassValue = confPassword.value.trim();

			if(checkConfPass() != false && checkNewPass() != false && checkOldPass() != false){
				// alert('Successful');
				location.href = `signupdatateacher.php?oldPass=${oldPassValue}&newPass=${passwordValue}&conPass=${conPassValue}`;
			}
		}

	</script>
	<!-- Footer -->
	<?php include('includes/footer.php')?>

	</body>

</html>