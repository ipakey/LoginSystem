<?php 
session_start();



?>


<!DOCTYPE html>
<html lang='en'>
<head>
	<meta name='viewport' content='width=device-width initial-scale=1.0'>
	<link rel="shortcut icon" type="image/png" href="favicon.png"/>
	<base href='http://localhost/TheDen/'>
	<link rel='Stylesheet' href='css/styles.css'>

</head>
<body>

<header class="header">

<div class='headerLeft'> 
	<div class='headerText' style='display: inline-block'>The Den Kettering
	</div>
</div>

<div class='headerMid1'> 
	<img class='denLogo' src='assets/branding/logo_trans.png' style='width: 130px; height: 120px' ></a>
	</div>
	

<div class='headerMid'> 
	<div class='mottoTextItalic' style='font-size: 30px'>SAFE . ACTIVE . FUN </div>
	<div class='headerText'>Wraparound Childcare for School Aged Children</div>
	<div class='subHeaderText'>
		<marquee behavior="alternate" scrollamount='5'>****** Now Taking Summer Holiday Bookings ****** </marquee>
	</div>
</div>

	<div class='headerRight'>
		
			<?php 
				if(isset($_SESSION['userId'])){
					echo "<form class='initalLogIn' action='includes/logOut.inc.php' method ='post'>
						<p class='logInText'>Welcome ".$_SESSION['userKwas']."  You are logged in!</p></br></br>
						<button class='formButton' type='submit' name='logout-submit'>Log Out</button></br>
						<p class='logInText'></p>
						</form>";
					
				}
				else{
					echo "<form class='initalLogIn' action='includes/logIn.inc.php' method ='post'>
						<p class='logInText' style='margin-left: 8px'>You are logged out!</p></br>
						<input class='formContent' type='text' name='nameKwnas' placeholder='Name'>
						<input class='formContent' type='password' name='password'  placeholder='Password'></br>
						<button style='float: left; margin-left: 10px' class='formButton' type='submit' name='login-submit'>Log In</button>
						</form>";
				}
			?>

		  
	</div>
</header>
</nav>
	<?php 
		
		if(empty($_SESSION['userId'])){

			include_once 'LO_dropDownMenu.php';
		}
		else{
			
			include_once 'LI_dropDownMenu.php';
		}
		
	?>
</nav>	

</body>

</html>
