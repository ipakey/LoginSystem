<?php
	
	include_once '../includes/functions.php';
	include_once '../includes/functionsBooking.php';
	/*************** Get date information ***********/		
	$year = date('Y');
	$week = date('W');
	$month = date('mon');

?>

<!DOCTYPE html>
 <html lang="en">
  <head>
 
  <meta name ='bookingForm' content='Online booking form The Den Kettering'>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<base href='http://localhost/TheDen/'>
	

    <title>Sessions booked . The Den Kettering </title>

    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/styles.css">
  </head>

<body>

<?php 	include_once '../partPages/header.php';
		$user = $_SESSION['userId'];
		//echo $year.'  :  '.$week.'  :  '.$user;
		//$bkd = findBookingsReport($week, $year, $user);
	
		
	?>

<div class='spanTitleCenter'>Sessions Booked</div>

	<div class='flex-container'>

		<section class='rows'>
		<form method='post' action=''>
			<input class='pageText' type="radio" name="wk" value="wk">This Week</input>
			<input class='pageText'type="radio" name="wk" value="mt">One month Ahead</input>
			<input class='pageText'type="radio" name="wk" value="all">All Records</input>
			<button type ="submit" name="bookingsReptSubmit">Select</button>
		
	<?php
	if (isset($_POST['bookingsReptSubmit'])) {
		if(isset($_POST['wk']))
		{
		echo "You have selected : ".$_POST['wk'];  //  Displaying Selected Value
		$wk = $_POST['wk'];
		}
		$dateRange = getStartAndEndDateRpt($wk);
		$booked = findBookingsReport($dateRange, $user);
		
		$timeSlotRpt = displayTimeSlotReport($dateRange);
	}
	?>
		
			<div class='columns'>
				<p class='pageText'>
				<?php
//echo var_dump($timeSlotRpt);
				echo $timeSlotRpt;
				?>
				</p>
			</div>
		</section>
	</div>	



</body>
</html>