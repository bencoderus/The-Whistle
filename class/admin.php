<?php
include('../inc/connect.php');
class Admin{

    public $user, $pass, $email, $date;

function __construct($u, $p, $e){
$hp=sha1($p);
$this->user=$u;
$this->pass=$hp;
$this->email=$e;
$this->date=time();
}
function save()
{
global $dbcon;
$sql="INSERT INTO admin(username, password, email, date) VALUES(?, ?, ?, ?)";
$stmt=$dbcon->prepare($sql);
$stmt->bind_param("sssi", $this->user, $this->pass, $this->email, $this->date);
$result=$stmt->execute();
return $result;
}


static function login($user, $pass)
{
global $dbcon;
$query=$dbcon->query("SELECT * FROM admin WHERE username='$user' AND password='$pass'");
$count=$query->num_rows;
return $count;
}



}



?>