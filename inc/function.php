<?php

/**
PROJECT:  AUTOMATED ADMISSION SYSTEM
AUTHOR: BENART IDUWE 
DATE: SEPTEMBER 2018
VERSION: 1.0


**/

function ago( $ptime )
{
$estimate_time = time () -
$ptime ;
if ( $estimate_time < 1 )
{
return 'a moment ago' ;
}
$condition = array (
12 * 30 * 24 *
60 * 60 => 'year' ,
30 * 24 * 60 *
60 => 'month' ,
24 * 60 * 60
=> 'day' ,
60 * 60
=> 'hour' ,
60
=> 'minute' ,
1
=> 'second'
);
foreach ( $condition as $secs
=> $str )
{
$d = $estimate_time /
$secs ;
if ( $d >= 1 )
{
$r = round ( $d );
return $r
. ' ' . $str . ( $r > 1 ? 's' :
'' ) . ' ago' ;
}
}
}

function cleaninput($string)
{
global $dbcon;
$clean=mysqli_real_escape_string($dbcon, $string);
$clean=strip_tags($string);
return $clean;
}	



?>