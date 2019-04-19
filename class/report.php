<?php
include('../inc/connect.php');
class Report

{
static function star($id)
{
global $dbcon;
$sql="UPDATE report SET starred=1 WHERE id=$id";
$query=$dbcon->query($sql);
return $query;
}

static function getstatus($value)
{
if($value==0)
{
    $okay="Unread";
}
else
{
$okay="Read";
}
return $okay;
}
static function unstar($id)
{
global $dbcon;
$sql="UPDATE report SET starred=0 WHERE id=$id";
$query=$dbcon->query($sql);
return $query;
}


static function trash($id)
{
global $dbcon;
$sql="UPDATE report SET trash=1 WHERE id=$id";
$query=$dbcon->query($sql);
return $query;
}
static function untrash($id)
{
global $dbcon;
$sql="UPDATE report SET trash=0 WHERE id=$id";
$query=$dbcon->query($sql);
return $query;
}

}
?>