<?php

function preDay($date){ 
	$dateArray = explode("-",$date);
	$year = $dateArray[0];
	$month = $dateArray[1];
	$day = $dateArray[2];
	
	//echo $year,"	",$month,"	",$day,"<br>";
	
	if($day == 1){
		if($month == 1){
			//echo "Pre year";
			$year -= 1;
			$month = 12;
			$day = 31;
			
		}else{
			//echo 'Pre month';
			$month -= 1;
			if($month==1 || $month==3 || $month==5 || $month==7 || $month==8 || $month==10 || $month==12){
				$day = 31;
			}
			elseif($month==4 || $month==6 || $month==9 || $month==11){
				$day = 30;
			}
			elseif($year % 4 == 0){
				$day = 29;
			}elseif($year % 4 != 0){
				$day = 28;
			}
		}
	}else{
		//echo "normal";
		$day -= 1;
	}
	
	$dayPlus = $day + 1;
	//echo ($dayPlus);
	//echo $year,"	",$month,"	",$day,"<br>";
	
	$prevoiusDay = $year."-".$month."-".$day;
	return $prevoiusDay;

}//preDay function end

$d1 = '2017-1-1';
//echo preDay($d1);
//echo preDay('1994-12-01');

function aftDay($date){ 
	$dateArray = explode("-",$date);
	$year = $dateArray[0];
	$month = $dateArray[1];
	$day = $dateArray[2];
	
	//echo $year,"	",$month,"	",$day,"<br>";
	if($month == 12 && $day ==31){
		//echo "Next year";
		$year += 1;
		$month = 1;
		$day = 1;
		
	}
	elseif( $day==31 && ($month==1 || $month==3 || $month==5 || $month==7 || $month==8 || $month==10) ){
		//echo "Next month 31";
		$month += 1;
		$day = 1;
	}
	elseif( $day==30 && ($month==4 || $month==6 || $month==9 || $month==11)){
		//echo "Next month 30";
		$month += 1;
		$day = 1;
	}
	elseif($day==29 && $month==2 && ($year % 4 == 0)){
		//echo "Next month 29 adhika";
		$month += 1;
		$day = 1;
	}
	elseif($day==28 && $month==2 && ($year % 4 != 0)){
		//echo "Next month 28 normal";
		$month += 1;
		$day = 1;
	}
	else{
		//echo "Normal";
		$day += 1;
	}
	
	//echo "<br>",$year,"	",$month,"	",$day,"<br>","<br>";
	$atferDay = $year."-".$month."-".$day;
	return $atferDay;
}
	
	
	
	
	//echo aftDay('2015-2-28');
//preDay function end


?>
