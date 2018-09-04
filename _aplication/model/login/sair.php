<?php
if(session_start()){
session_destroy();

$redirect = "../../../_aplication/controller/login/login.php";
header("location:$redirect");
 

}