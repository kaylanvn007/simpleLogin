<?php 

//start session
session_start();

//destroy session
session_destroy();

//display view
include('views/v_logout.php');

?>