<?php

	

/************************************* Picking Correct Timeslot ******************in bookingForm.php ********************************/	

	function findDayType($date){
		$dateType=array();
		//$B=array();
		$conncontacts = new mysqli('localhost', 'root', '', 'thedencontacts');
		$sql = ('SELECT tt_sch, tt_type FROM timetable WHERE tt_date=?');
		$stmt = mysqli_stmt_init($conncontacts);

		if (!mysqli_stmt_prepare($stmt, $sql)){
			header('Location: ../forms/bookingForm.php?error=stmtfailedcode=707:readconfirmtimetable');
			exit();
		}
		if(!mysqli_stmt_bind_param($stmt, 's', $date)){
			header('Location: ../forms/bookingForm.php?error=stmtfailedcode=707:bindsearchtimetable');
			exit();
		}
		mysqli_stmt_execute($stmt);
		$resultData = mysqli_stmt_get_result($stmt);
		while($row=mysqli_fetch_assoc($resultData)){
			//echo ''.var_dump($dateType);
			array_push($dateType, $row);			
			//array_push($booked, $record);
		} 
		//echo 'Timetable:$date_type:  '.var_dump($dateType);
		return $dateType;
	 	mysqli_stmt_close();
	}


	function findRoundNames($date_type, $len){
		$sch = array();
		$set0= $date_type[0]['tt_sch'];
		$set1= $date_type[1]['tt_sch'];
		$set2= $date_type[2]['tt_sch'];
		//echo 'sch: eof findRoundNames  '.$set0.' sch1: '.$set1.' sch2: '.$set2;
		array_push($sch,$set0,$set1,$set2);
		return $sch;
	}
	
	function findTypeRounds($date_type, $len){
		$set = array();
		$one = array();
		$two=array();
		$three= array();
		
		if($len == 1){
			$tt_type = $date_type['tt_type'];
			array_push($rnds,$tt_type);
			//echo '$1 mid findTimeSlots'.var_dump($one);		

		}	
		elseif($len == 2){
			$set0= $date_type[0]['tt_type'];
			$set1= $date_type[1]['tt_type'];
			//echo 'set0: '.$set0.' set1: '.$set1.' set2: '.$set2;
			if($set0 == $set1){
				array_push($one,$set0);
			}
			else{
				array_push($two,$set0,$set1);
			}
			//echo '$1&2 mid findTimeSlots'.var_dump($one).var_dump($two);		

		}
		elseif($len == 3){
			$set0= $date_type[0]['tt_type'];
			$set1= $date_type[1]['tt_type'];
			$set2= $date_type[2]['tt_type'];
			//echo 'set0: '.$set0.' set1: '.$set1.' set2: '.$set2;
			if($set0 == $set1){
				if($set0 == $set2){
					array_push($one,$set0);
					//echo 'midifstmt  $one'.var_dump($one);
				}
				else{
					array_push($two,$set0,$set2);	
					//echo 'midifstmt  $two'.var_dump($two);
				}
			}
			elseif($set0 == $set2){
				array_push($two,$set0,$set1);	
				//echo 'midifstmt  $two'.var_dump($two);
			}
			else{
				array_push($three,$set0,$set1,$set2);
				//echo '3 midifstmt '.var_dump($three);
			}				
		}
		//echo var_dump($two).' TWO  '.var_dump($three).' THREE  '.var_dump($one).' ONE  ';
				
		if(count($three) != 0){
			$set = $three;
		}
		elseif(count($two) != 0){
			$set = $two;
		}
		else{
			$set = $one;
		}
		//echo var_dump($set).' $set: eof findRoundTypes  ';
		return $set;
	}
	
	
	function findTimeSlotArray($set, $setCount, $date){
		$duration_1 = 60;
		$cleanup_1 = 0;
		$start_1 = "07:00";
		$end_1 = "21:00";
		$duration_2 = 30;
		$cleanup_2 = 0;
		$start_2 = "09:00";
		$end_2 = "14:00";
		$duration_3 = 30;
		$cleanup_3 = 0;
		$start_3 = "18:00";
		$end_3 = "21:00";
		$duration_4 = 140;
		$cleanup_4 = 10;
		$start_4 = "19:00";
		$end_4 = "21:30";
		$duration_5 = 30;
		$cleanup_5 = 0;
		$start_5 = "18:00";
		$end_5 = "19:30";
		$denSlots1=array("7-8am","8-9am","9-10am","10-11am","11-12pm","12-1pm","1-2pm","2-3pm","3-4pm","4-5pm","5-6pm","6-7pm","7-8pm","8-9pm");
		$denSlots2=array("9-9:30am","9:30-10am","10-10:30am","10:30-11am","11-11:30am","11:30-12pm","12-12:30am","12:30-1pm","1-11:30pm","1:30-2pm");
		$denSlots3=array("6-6:30pm","6:30-7pm","7-7:30pm","7:30-8pm","8-8:30pm","8:30-9pm");
		$denSlots4=array("7-9:30pm");
		$denSlots5=array("6-6:30pm","6:30-7pm","7-7:30pm");
		$denTermTimeSlots = array("7-9am","8-9am","3-4pm","3-5pm","3-6pm");		
		$denHolidaySlots = array("7am-12","7am-6pm","1-6pm");
		//$denDTSlots["6-6:30 pm","6:30-7 pm","7-7:30 pm","7:30-8 pm","8-8:30 pm","8:30-9 pm"];
		//$denWCSlots["6-6:30 pm","6:30-7 pm","7-7:30 pm","7:30-9:30 pm"];
		//$denDWSlots["9-9:30am","9:30-10am","10-10:30am",]
		$denClosed= array("none");
		$timeslot = array();
		$ts= array();	
		
			for($i=0;$i<$setCount;$i++){
				$tt_type = $set[$i];
				//echo $tt_type.' :tt_type ';
								
				if($tt_type == 'H'|| $tt_type == 'TD'){
					$ts = $denHolidaySlots;
					//echo var_dump($ts).' :H/TD ';
				}
				elseif($tt_type == 'FT'){
					$ts = $denSlots5;
					//echo '$ts:  '.var_dump($ts).' :FT ';
				}	
				elseif($tt_type == 'DT'){
					$ts = $denSlots3;
					//echo '$ts:  '.var_dump($ts).' :DT';
				}	
				elseif($tt_type == 'WC'){
					$ts = $denSlots4;
					//echo '$ts:  '.var_dump($ts).' :WC ';
				}					
				elseif($tt_type == 'TT'){
					$ts = $denTermTimeSlots;
					//echo var_dump($ts).' :TT ';
				}
				elseif($tt_type == 'DW'){
					$ts = $denSlots2;
					//echo var_dump($ts).' :DW ';
				}
				elseif($tt_type == 'DC' || $tt_type == 'BH' || $tt_type == 'WK'){
					$ts = $denClosed;
					//echo var_dump($ts).' :DC/BH/WK ';
				}
				else{
					$ts=$denSlots1;
					//echo var_dump($ts).' :hourly ';
				}
				array_push($timeslot,$ts);

				
			}
			//echo var_dump($ts).'$ts: '.var_dump($timeslot).' timeslot: ';
			return $timeslot;
	}

/************************************* Creating Timeslot ***********************workings for findTimeSlotArray() **********************/

	function createTimeSlots($duration, $cleanup, $start, $end, $date){
    $start = new DateTime($start);
    $end = new DateTime($end);
    $interval = new DateInterval("PT".$duration."M");
    $cleanupInterval = new DateInterval("PT".$cleanup."M");
    $slots = array();
    
		for($intStart = $start; $intStart<$end; $intStart->add($interval)->add($cleanupInterval)){
			$endPeriod = clone $intStart;
			$endPeriod->add($interval);
			if($endPeriod>$end){
				break;
			}			
			$slots[] = $intStart->format("h:i")."-". $endPeriod->format("h:ia");
		}
		return $slots;
	}
	
	function findSlotNumber($ts){
	
		$conncontacts = new mysqli('localhost', 'root', '', 'thedencontacts');
		$sql = ('SELECT ss_sessiontext, ss_sessionid FROM session_settings WHERE ss_sessiontext=?');
		$stmt = mysqli_stmt_init($conncontacts);

		if (!mysqli_stmt_prepare($stmt, $sql)){
			header('Location: ../forms/bookingForm.php?error=stmtfailedcode=705:readsessnumber');
			exit();
		}
		if(!mysqli_stmt_bind_param($stmt, 's', $ts)){
			header('Location: ../forms/bookingForm.php?error=stmtfailedcode=705:bindsesnumber');
			exit();
		}
		mysqli_stmt_execute($stmt);
		$resultData = mysqli_stmt_get_result($stmt);
		while($row=mysqli_fetch_assoc($resultData)){		
			//array_push($ses, $row);
			$slot = $row['ss_sessionid'];
			
			//array_push($booked, $record);
		} 
			
		
echo $slot;
		return $slot;
	 	mysqli_stmt_close();
	}


/*************************************  Booking  Form Data Processing ********************in bookingForm.php ***********************/

	
	function returnBookings($date){
		$booked=array();
		$conncontacts = new mysqli('localhost', 'root', '', 'thedencontacts');
		$sql = ('SELECT bk_group, bk_timeslot, bk_confirmed, bk_subject, bk_date, bk_name, cu_id FROM book WHERE bk_date=?');
		$stmt = mysqli_stmt_init($conncontacts);

		if (!mysqli_stmt_prepare($stmt, $sql)){
			header('Location: ../forms/bookingForm.php?error=stmtfailedcode=705:readconfirmbooking');
			exit();
		}
		if(!mysqli_stmt_bind_param($stmt, 's', $date)){
			header('Location: ../forms/bookingForm.php?error=stmtfailedcode=705:bindsearchbooking');
			exit();
		}
		mysqli_stmt_execute($stmt);
		$resultData = mysqli_stmt_get_result($stmt);
		while($row=mysqli_fetch_assoc($resultData)){		
			array_push($booked, $row);
			
			//array_push($booked, $record);
		} 
			
		$bookedCount= bkdCnts($booked);	
		$bookedAmend = bkdAmend($booked, $bookedCount);
//echo 'Booked slots: '.var_dump($bookedAmend);
		return $bookedAmend;
	 	mysqli_stmt_close();
		
	}
	
	function bkdCnts($booked){
		$lts=0;
		$cnt = array();
		$counter = array();
		$count = 0;
		
		$slot = array_column($booked, 'bk_timeslot');
		$uslot = array_unique($slot);
//echo var_dump($uslot);
		foreach($uslot as $sl){
//echo $sl.' $sl';
			
			foreach($booked as $book){
				$sla = $book['bk_timeslot'];
				if($sl == $sla){
					$lts++ ;
//echo $sl.' sl '.$sla.' sla '.$lts.' lts ';
				}
			}
			array_push($cnt, $sl, $lts);
			array_push($counter, $cnt);
			$lts=0;
			$cnt=[];
		}
//echo var_dump($counter).' counter ';
					return $counter;
	}

	function  bkdAmend($booked, $bookedCount){
		$bookedA = array();
		foreach($booked as $book){
			$sla = $book['bk_timeslot'];
			foreach($bookedCount as $cnt){
				$sl = $cnt[0];
				$slb = $cnt[1];
				if($sl == $sla){
					//echo $sl.' $sl '.$sla.' sla '.$slb.' slb';
					array_push($book, $slb);
					array_push($bookedA, $book);
					$book = [];
				}
			}
			
		}
//echo var_dump($booked).' booked '.var_dump($bookedA).' bookedA ';
		return $bookedA;
	}
	
	
	function indBookings($date, $booked){
//echo var_dump($booked).'   BKD in IndBookings  ';
		
		$inds=array();
		$in=array();
		//foreach($booked as $bkd){
			foreach($booked as $r){
				if($r['bk_group'] =='Ind'){
					$day = $r['bk_date'];
					$ind = $r['bk_timeslot'];
					$subject = $r['bk_subject'];
					$conf= $r['bk_confirmed'];	
					array_push($in, $day, $ind, $subject, $conf);					
				}
				if(count($in)>=1 ){
					array_push($inds,$in);
					$in = [];
				}
			}
		//}
//echo var_dump($inds).'indBookings Results:array:<- ' ;
		return $inds;
	}


	function grpBookings($date, $booked){
		//echo var_dump($booked);
		$groups=array();
		$grp=array();
		//foreach($booked as $bkd){
			foreach($booked as $r){	
				if($r['bk_group'] =='Grp'){
					$day = $r['bk_date'];
					$ts = $r['bk_timeslot'];
					$subject = $r['bk_subject'];
					$conf= $r['bk_confirmed'];	
					/****count of same record in $booked ***eg. 4 for childcare 2 for Chem on 23rd June******
							send out to function to compare and count ****/
					
					
					$cnt =  grpCount($ts, $booked);
//echo $cnt;
					
					array_push($grp, $day, $ts, $subject, $cnt, $conf);
					
				}
				if(count($grp) >= 1 ){
					array_push($groups,$grp);
					$grp = [];
				}
			}
//echo var_dump($groups);
		//}
//echo var_dump($groups).'grpBookings Results:array:<- ' ;
		return $groups;
	}
	
	
	function grpCount($ts, $booked){
		$count = 0;
//echo $ts.'  $ts -- > ';
		/****************** count the number of $r's in $booked on three variables bk_date, bk_timeslot and bk_subject *********/
//echo var_dump($booked);
		$len= count($booked);
//echo $len.' len of $booked ';
			for($i=0;$i<$len; $i++){
				$tsbk = $booked[$i]['bk_timeslot'];
//echo $tsbk.'  $tsbk: ';
				if($tsbk == $ts){
				 $count++;
				}
				
//echo $count.'  $cnt in loop';
					
			}
		
		
		//echo $count.'  $cnt ';
		return $count;
	}
	
	function checkTimeSlot($ts,$booked){
		$slotStatus = '';
//echo var_dump($groups).' groups ';
		foreach ($booked as $book){ 
			$type = $book['bk_group'];	
			$tsa = $book['bk_timeslot'];
		
			
//echo $type.' Type '.$tsa.' timeslot '.$ts.' ts';
			if($tsa == null){
				$slotStatus = 'open';
			}


			//prebooking found
			elseif($ts == $tsa){						
		
				if($type == 'Ind'){				
					$slotStatus = 'booked';
//echo $slotStatus;	
				}	
				elseif($type = 'Grp') {						

					$sub = $book['bk_subject'];				
					$count = $book['0'];							
					$sub = $book['bk_subject'];
					$slotStatus = 'group: '.$sub.' ('.$count.')';
//echo $slotStatus;	
				}
				else{
					$slotStatus = 'open';
				}
				
				
			}
		}
		return $slotStatus ;
	}
	
	
	function subject($ts, $booked){		
		$subject = '';
//echo var_dump($booked);
		foreach ($booked as $r){
			$tsr = $r['bk_timeslot'];
			$subr = $r['bk_subject'];	
//echo $dater.$tsr.$subr;
			if($ts == $tsr ){
				$subject = $subr ;
//echo $subject;
			}
		}
//echo var_dump($subject).'subjects Results:string:<- ';
		return $subject;
	}

	function createBooking($conncontacts, $date, $timeslot, $slot, $group, $session,$name,$email,$subject,$notes){
				
			$sql = ("INSERT INTO book (bk_date, bk_timeslot, bk_slot, bk_group, bk_session, bk_name, bk_email, bk_subject, bk_notes) VALUES (?,?,?,?,?,?,?,?,?)");
			$stmt= mysqli_stmt_init($conncontacts);
			if (!mysqli_stmt_prepare($stmt, $sql)){
				header('Location: ../forms/bookingsCalendar.php?error=stmtfailedcode1=703:createbooking&date='.$date);
				exit();
			}
			//echo ($date.$timeslot.$slot.$group.$session.$name.$email.$subject.$notes); 		
			if(!mysqli_stmt_bind_param($stmt, 'ssisissss', $date, $timeslot, $slot, $group, $session,$name,$email,$subject,$notes)){
				header('Location: ../forms/bookingForm.php?error=stmtfailedcode2=703:bindparbooking&date='.$date);
				exit();
			}
			
			if(! mysqli_stmt_execute($stmt)){
				header('Location: ../forms/bookingForm.php?error=stmtfailedcode3=703:executebooking&date='.$date);
				exit();
			}
			
			$msg ="<div class='alert alert-success'>Booking Successful</div>";
			mysqli_stmt_close($stmt);
			$dt= date_create($date);
			$month = date_format($dt,"m");
			$year = date_format($dt,"Y");
			header('Location: ../forms/bookingsCalendar.php?error=successBookAgain&othyear='.$year.'&othmonth'.$month);
			exit();
	}
	
	
/*************************************Reporting Available  Timeslots Public Data *********************************************/

	function getStartAndEndDate($wk){
		$sNEDate = array();
		$sneDate = date('Y-m-d', strtotime( $wk . " +0 days"));
		array_push($sNEDate, $sneDate);
		$sneDate = date('Y-m-d', strtotime( $wk . " +1 days"));
		array_push($sNEDate, $sneDate);
		$sneDate = date('Y-m-d', strtotime( $wk . " +2 days"));
		array_push($sNEDate, $sneDate);
		$sneDate = date('Y-m-d', strtotime( $wk . " +3 days"));
		array_push($sNEDate, $sneDate);
		$sneDate = date('Y-m-d', strtotime( $wk . " +4 days"));
		array_push($sNEDate, $sneDate);
		$sneDate = date('Y-m-d', strtotime( $wk . " +5 days"));
		array_push($sNEDate, $sneDate);
		$sneDate = date('Y-m-d', strtotime( $wk . " +6 days"));
		array_push($sNEDate, $sneDate);

		echo var_dump($sNEDate).' $sNEDate at L506 ';
		return	 $sNEDate;
		
		
	}
	
	function getStartAndEndDateRpt($wk){
			$dateRange = array();
		$dateComponents=getdate();
		$month=$dateComponents['mon'];
		$year=$dateComponents['year'];
//echo $month.'  month '.$year.' year ';
		$sDate = mktime(0,0,0,$month,1,$year);
		$startDate = date('Y-m-d');
//echo $startDate.' startdate ';
		if($wk != 'all'){
			if($wk != 'mt'){
				$endDate = date('Y-m-d', strtotime($startDate . " +7 day"));
//echo $endDate.' endDate ';
			}
			else{
				$endDate = date('Y-m-d', strtotime($startDate . " +30 day"));
//echo $endDate.' endDate ';	
			}			
		}
		else{
			$endDate = date('Y-m-d', strtotime($startDate . " +365 day"));
//echo $endDate.' endDate ';
		}
		
		array_push($dateRange, $startDate, $endDate);
		echo var_dump($dateRange).' dateRange at line 537  ';
		return $dateRange;
		
	}
	
	function dlyBookings( $dt, $week, $year, $user){
		$rBkd = findBookings($week, $year, $user);
		//echo var_dump($rBkd);
		$dlyBookings=array();
		if($user > 9){
			$sBkd = returnBookSingle($dt, $user);
		}
		else{
			$sBkd =[];
		}
		//echo var_dump($rBkd. $sBkd);
		
		$lenA = count($rBkd);
		$lenB = count($sBkd);
		if($lenB !== 0){
			array_push($bkd, $rBkd, $sBkd);
		}
		elseif($lenA !=0){
			array_push($bkd, $rBkd);
		}
		//asort($dlyBookings);
		return $dlyBookings;	
	} 
	
	
	function checkTimeSlotString($date, $dt, $ts, $inds, $groups, $subject, $confirmed, $name){
//echo '-->date:  '.var_dump($date).'  -->ts:  '.var_dump($ts).'  -->groups: '.var_dump($groups).'  -->subject: '.var_dump($subject);
		if( !empty($groups)){
			$count = count($groups);
		}
		else{ 
			$count = 0;
		}

		if(!empty($inds)) {
			$slotStatus = 'booked';
		}
		elseif(!empty($groups)){
			$count = $arr[$ts];			
			$slotStatus = 'group ('.$count. '): '.$subject; 
//echo $slotStatus;
		}
		else{
			$slotStatus = "open";	
		}
//echo $slotStatus.'   slotStatus eof ';
		return $slotStatus;	
	}

	
/*************************************Find Bookings made reporting Private Data ********************************************/
	function findBookingsReport($dateRange, $user){
//echo $week.'  '.$year.'  '.$user.'  arriving in findBookings';
		$i=0;
	/*	if($wk != null){*/
		$startDate = $dateRange[0];
		$endDate = $dateRange[1];
		echo $startDate.$endDate;
		
		
		$bkd = retrieveBookings($startDate, $endDate); /*
		}
		elseif($mt_value != null){
		$sNEDate = getStartAndEndDateMth($year, $week);
		$bkd = retrieveBookings($sNEDate);
		}
		else{
		$sNEDate = "all";
		$bkd = retrieveBookings($sNEDate);	
		} */
		
//echo var_dump($sNEDate).' dates $sNDate in findBookings';
		
//echo var_dump($bkd).' rBkd --> ';
		//$inds = IndBookings($bkd);
		//$groups= GrpBookings($bkd);	
//echo 'After date grouping   '.var_dump($inds).'  Inds '.var_dump($groups).' Groups';
		//$subject =  subjects($bkd);
		//$sBkd = checkTimeSlotReport($bkd, $inds, $groups, $subject);
//echo var_dump($bkd).' $bkd at end of findBookings ';
		return $bkd;

	}
	
	function retrieveBookings($sNEDate){
		$bkd = array();
		$sBkd = array();
		$dBookings=array();
		echo var_dump($sNEDate).' $sNEDATE at line 615 ';
		foreach($sNEDate as $bookedDate){
//echo $bookedDate;
			$rBkd = returnBookings($bookedDate);			
			
			if(count($rBkd) >0 ){
				array_push($bkd, $rBkd);
			}
			
		}
		return $bkd;
	}
	
	function subjectsRpt($booked){
		$subject = array();
		$subj = array();
//echo var_dump($booked);
		foreach($booked as $bkd){	
			foreach ($bkd as $r){
				$date = $r['bk_date'];
				$ts = $r['bk_timeslot'];
				$sub = $r['bk_subject'];
				$name = $r['bk_name'];
				$conf= $r['bk_confirmed'];	
//echo $sub.$name.$conf;
				array_push($subj, $date, $ts, $sub, $name, $conf );
				
			}	
			array_push($subject, $subj);
			$subj = [];
		}
//echo var_dump($subject).'subjects Results:string:<- ';
		return $subject;
	}
	

	function checkGrpBooking($booked){
		$groups=array();
		$grp=array();
//echo var_dump($booked).' booked  ';
		foreach($booked as $bookings){
			foreach($bookings as $book){
				if($book['bk_group'] =='Grp'){
					$group= $book['bk_timeslot'];
					$dt = $book['bk_date'];
					$uid = $book['cu_id'];
					array_push($grp, $dt, $group, $uid);
					array_push($groups, $grp);	
					$grp = [];
					}	
			}
		}			
//echo var_dump($groups).'groups eof ';
		return $groups;
		
	}
	
	
	function indBookingsRpt($booked){
//echo var_dump($booked).'   BKD in IndBookings  ';
		
		$inds=array();
		$in=array();
		//foreach($booked as $bkd){
			foreach($booked as $r){
				if($r['bk_group'] =='Ind'){
					$day = $r['bk_date'];
					$ind = $r['bk_timeslot'];
					$subject = $r['bk_subject'];
					$name = $r['bk_name'];
					$conf= $r['bk_confirmed'];	
					array_push($in, $day, $ind, $subject, $name, $conf);					
				}
				if(count($in)>=1 ){
					array_push($inds,$in);
					$in = [];
				}
			}
		//}
//echo var_dump($inds).'indBookings Results:array:<- ' ;
		return $inds;
	}


	function grpBookingsRpt($booked){
//echo var_dump($booked);
		$groups=array();
		$grp=array();
		foreach($booked as $bkd){
			foreach($bkd as $r){
				if($r['bk_group'] =='Grp'){
					$day = $r['bk_date'];
					$ind = $r['bk_timeslot'];
					$subject = $r['bk_subject'];
					$name = $r['bk_name'];
					$conf= $r['bk_confirmed'];	
					array_push($grp, $day, $ind, $subject, $name, $conf);
					
				}
				if(count($grp) >= 1 ){
					array_push($groups,$grp);
					$grp = [];
				}
			}
		}
//echo var_dump($groups).'grpBookings Results:array:<- ' ;
		return $groups;
	}
	
		
	function displayTimeSlotReport($booked, $wk){
		$dateRange = getStartAndEndDate($wk);
		$bkd = selectIndBookings($booked, $wk);
//echo var_dump($bkd);
		$reportData = createReportDisplay($bkd);
		return $reportData;
	}
		
	function createReportDisplay($bkd){
				
				//First create and array of the days in a week
		$daysOfWeek = array('Sunday','Monday','Tuesday','Wednesday','Thursday','Friday','Saturday');
		

       $conncontacts = new mysqli('localhost', 'root', '', 'thedencontacts');// connect to your host
        //Check for connection error
        if(mysqli_connect_error()){
         die("Error in DB connection: ".mysqli_connect_errno()." - ".mysqli_connect_error());
        }
        $stmt = "SELECT * FROM book WHERE bk_date >=?;";
		
		
        echo "<table width='70%' >";
        $i = 0;
       $resultData = mysqli_stmt_get_result($stmt);
		while($row=mysqli_fetch_assoc($resultData)){
            if($i % 2 == 0){
                echo '<tr>';
            }
            echo '<td>'.$bookings.'</td>';
            if($i % 2 == 1){
                echo '</tr>';
            }
            $i++;
        }
        echo "</table>";
         

				//Now create the HTML table
		$report="<table class='table table-bordered'>";
		$report.="<center><h4 class='pageText'><td class='pageText'> Confirmed</td> <td class='pageText'>Timeslot</td>
		<td class='pageText'>Date</td>
		<td class='pageText'>Subject</td>
		<td class='pageText'>Name</td>
		<td class='pageText'>Session Type</td>
		<td class='pageText'>Customer Id</td>
		</h4></center></br></tr>";
		$report.="";
				//fill in day by day
			foreach($bkd as $data){;
//echo var_dump($data);
				$confirmed = $data['bk_confirmed'];
				$ts = $data['bk_timeslot'];
				$date = $data['bk_date'];
				$a = $data['bk_subject'];
				$b = $data['bk_name'];
				$c = $data['bk_group'];
				$d = $data['cu_id'];
	
		$report.="<p class='pageText'><td class='pageText'>$confirmed</td><td class='pageText'>$ts</td><td class='pageText'>$date</td><td class='pageText'>$a</td><td class='pageText'>$b</td><td class='pageText'>$c</td><td class='pageText'>$d</td></p>";	
		$report.="</tr><tr>";
			}
		$report.="</table>";
//echo var_dump($timeSlotRpt);
				echo $report;
	}
		
	function selectIndBookings($booked, $wk){
		$indData = array();

		if($_SESSION['userId'] > 10 ){
//echo $_SESSION['userId'];
			foreach ($booked as $bk){
				foreach($bk as $book){
//echo var_dump($book);
					$date = $book['bk_date'];
					$user = $book['cu_id'];
//echo $user. $date;
					if($_SESSION['userId'] == $user){
						array_push ($indData, $book);
					}
				}
			}
echo var_dump($indData);
			
		}
		else{
			foreach ($booked as $bk){
				foreach($bk as $book){
					array_push ($indData, $book);
				}
			}
		}
		return $indData;
	}
			
			
	function checkTimeSlotReport($booked){
		$slotStatus = '';

		foreach ($booked as $book){ 
			$type = $book['bk_group'];	
			$tsa = $book['bk_timeslot'];
			$date = $book['bk_date'];
			
			
			if($tsa == null){
				$slotStatus = 'open';
			}


			//prebooking found
			elseif($ts == $tsa){						
		
				if($type == 'Ind'){				
					$slotStatus = 'booked';
//echo $slotStatus;	
				}	
				elseif($type = 'Grp') {						

					$sub = $book['bk_subject'];				
					$count = $book['0'];							
					$sub = $book['bk_subject'];
					$slotStatus = 'group: '.$sub.' ('.$count.')';
//echo $slotStatus;	
				}
				else{
					$slotStatus = 'open';
				}
				
				
			}
		}
		return $slotStatus ;
	}


	
	function statusInd($r, $inds){
		if($leni > 0){	
			if(in_array($bkdate, $inds)== true && in_array($bkts, $inds)==true){
			$slotStatus = 'Booked';
			}
		}
		else{
			$slotStatus = '';
		}
		return $slotStatus;
	}
	
		function statusGrp($r, $groups){
		if($leng > 0){
			if(in_array($bkdate, $inds)== true && in_array($bkts, $inds)==true){
			$slotStatus = 'group ('.$count.') ';
			}
		}
		else{
			$slotStatus = '';
		}
		return $slotStatus;
	}

