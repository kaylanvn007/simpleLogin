<?php
//start session
session_start();
include('includes/config.php');

//check if user is logged in
if(!isset($_SESSION['username']))
{
    header('Location: login.php');
}

//display members page
include('views/v_members.php');
?>