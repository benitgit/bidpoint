<?php 
function getdays($startDate,$endDate) {
    // do strtotime calculations just once
    $endDate = strtotime($endDate);
    $startDate = strtotime($startDate);
    $days = ($endDate - $startDate) / 86400;
  	// $days = strtotime($days);
  	$days = floor($days);
  	return $days;
}
?>