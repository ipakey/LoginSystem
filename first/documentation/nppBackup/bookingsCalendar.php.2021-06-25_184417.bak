<?php

	// Storing session data
		

		
	function build_calendar($month, $year){
		
		include_once '../includes/db_conn/dbh_ct.inc.php';
		//include_once 'includes/functions.php';
			
				
		//First create and array of the days in a week
		$daysOfWeek = array('Sunday','Monday','Tuesday','Wednesday','Thursday','Friday','Saturday');
		
		//make first day of the month 
		$firstDayOfMonth = mktime(0,0,0,$month,1,$year);

		// get number of days in month
		$numberDays= date('t',$firstDayOfMonth);
		
		//getting some information about the first day of this month
		
		$dateComponents=getdate($firstDayOfMonth);
		
		//getting the name of this month
		$monthName=$dateComponents['month'];
		
		//getting the index value 0-6 of the first day of this month
		$dayOfWeek=$dateComponents['wday'];
		
		//get currentdate
		$datetoday=date('Y-m-d');
		
		//Now create the HTML table
		$calendar="<table class='table table-bordered'>";
		$calendar.="<center><h4 class='spanTitleCenter'>$monthName $year</h4></center>";
		$calendar.="<p class='pageText' >Please select current month first available dates will be highlighted:</br></p>";
		$calendar.="<center><a class='bookingsHeaderButton' href='forms/bookingsCalendar.php?othmonth=".date('m',mktime(0,0,0,$month-1,1,$year))."&othyear=".date('Y',mktime(0,0,0,$month-1,1,$year))."'>Previous Month</a>";

		$calendar.="<a class='bookingsHeaderButton' href='forms/bookingsCalendar.php?othmonth=".date('m')."&othyear=".date('Y')."'>Current Month</a>";

		$calendar.="<a class='bookingsHeaderButton' href='forms/bookingsCalendar.php?othmonth=".date('m',mktime(0,0,0,$month+1,1,$year))."&othyear=".date('Y',mktime(0,0,0,$month+1,1,$year))."'>Next Month</a></center>";
		
		$calendar.="<tr>";
		
		//create calendar headers
		foreach($daysOfWeek as $day){
			$calendar.="<th>$day</th>";
		}
		
		$calendar.="</tr><tr>";
		
			//The variable $dayOfWeek will make sure that there must only be 7 columns on our table. 
			if($dayOfWeek>0){
				for($k=0;$k<$dayOfWeek;$k++){
					$calendar.="<td></td>";
				}
			}
		
			//initiating the daycounter
			$currentDay=1;
			
			//getting the month number
			$month = str_pad($month,2,"0",STR_PAD_LEFT);
			
			while($currentDay <= $numberDays){
				
				//if seventh column (saturday) reached , start a new row.
				if($dayOfWeek==7){
					$dayOfWeek=0;
					$calendar.="</tr><tr>";
				}
				
				$currentDayRel= str_pad($currentDay, 2,"0",STR_PAD_LEFT);
				$date = "$year-$month-$currentDayRel";
				
				$dayname=strtolower(date('l',strtotime($date)));
				$eventNum=0;
				$today=$date==date('Y-m-d')?".today":"";
				
				//grey out old dates and weekends
				if($date<date('Y-m-d')){
					$calendar.="<td class='yesterday'><h4>$currentDay</h4><a class='bookingsPastButton'>N/A</button>";
				}
				
				elseif($dayOfWeek == 0){
					$calendar.="<td class='yesterday'><h4>$currentDay</h4><a class='bookingsPastButton'>Closed</button>";
					
				}

				else{
					$calendar.="<td class='future'><h4>$currentDay</h4><a class='bookingsButton' href='forms/bookingForm.php?date=".$date."'>Book</button>";
				}

				$calendar.="</td>";
				
				//increment the counters
				$currentDay++;
				$dayOfWeek++;
			}
		
			//completing the row of the last week in the month,  if necessary
			if($dayOfWeek!=7){
				$remainingDays = 7-$dayOfWeek;
				for($i=0;$i<$remainingDays;$i++){
					$calendar.="<td></td>";
				}
			}
		
		$calendar.="</tr>";
		$calendar.="</table>";
		//echo $bookings;
		echo $calendar;		
		

	
	}




?>

<!DOCTYPE html>


<head>
	<meta name='viewport' content='width=device-width, initial-scale=1.0'>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
<script type="text/javascript" src="js/contact.js"></script>

	
	<link rel='Stylesheet' href='css/bootstrap.css'>
	<link rel='Stylesheet' href='css/styles.css'>
	<title>Bookings Form Test System - Calendar . The Den Kettering</title>
<base href='http://localhost/TheDen/'>
</head>

<body>
	<?php include_once '../partPages/header.php';?>
	
	<div class='spanTitleCenter'>Bookings Calendar</div>
	<div class='container'>
		<div class='row'>
			<div class='col-md-12'>
				<?php 
				
					$dateComponents=getdate();
					$month=$dateComponents['mon'];
					$year=$dateComponents['year'];
					$othmonth=$_GET['othmonth']  ?? null; 
					$othyear=$_GET['othyear']  ?? null; 
					//echo "1st: $month $year : $othmonth  $othyear eof ";	
					if($month!==$othmonth){
						$month=$othmonth ; 
						$year=$othyear ; 
						//echo "2nd : $month $year :  $othmonth $othyear eof ";
					}
					$_SESSION["month"] = $month;
					$_SESSION["year"] = $year;
					//echo $_SESSION["month"].$_SESSION["year"];
 
					echo build_calendar($month, $year);
				?>
			</div>
		<div>
	</div>


</body>


</html>