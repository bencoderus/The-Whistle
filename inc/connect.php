<?php
require('setup.php');
$dbcon=new mysqli($dbhost, $dbuser, $dbpass, $dbname);
if($dbcon->connect_error)
{
    echo "Setup database first!";
    exit;
}
?>