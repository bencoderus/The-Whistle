<?php
if(isset($_SESSION['admin']))
{

}
else
{
    $msg="Hey bro, you need to login first!";
    header("location: index?infomsg=$msg");
}

?>