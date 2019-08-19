<?php

//sign members up

//start session/load config.
session_start();
include("includes/config.php");
include("includes/db.php");

//form defaults
$error['pass'] = '';
$error['user'] = '';
$error['alert'] = '';
$error['con_pass'] = '';
$input['user'] = '';
$input['pass'] = '';
$input['con_pass'] = '';

if(isset($_POST['submit']))
{
    //process the form
    if($_POST['username'] == '' || $_POST['password'] == '' ||$_POST['con_password'] == '')
    {
        if($_POST['username'] == ''){$error['user'] = "required";}
        if($_POST['password'] == ''){$error['pass'] = "required";}
        if($_POST['con_password'] == ''){$error['con_pass'] = 'required';}
        $error['alert'] = "Please fill in all fields.";

        $input['user'] = $_POST['username'];
        $input['pass'] = $_POST['password'];
        $inpput['con_pass'] = $_POST['con_password'];

        include("views/v_register.php");
    }
    else if($_POST['password'] != $_POST['con_password'])
    {
        $error['alert'] = "Password does not match!";
        include('views/v_register.php');
    }
    else
    {
        $input['user'] = htmlentities($_POST['username'], ENT_QUOTES);
        $input['pass'] = htmlentities($_POST['password'], ENT_QUOTES);
        $input['con_pass'] = htmlentities($_POST['con_password'], ENT_QUOTES);
        $user = $input['user'];
        //creating query
        if($stmt = $mysqli->prepare("SELECT * FROM members WHERE username='$user'"))
        {
            $error['alert'] = 'That username already exists';
            include('views/v_register.php');
        }
        else if($stmt = $mysqli->prepare("INSERT INTO members (username,password) VALUES (?,?)"))
        {
            $temp = md5($input['pass']. $config['salt']);

            $stmt->bind_param('ss', $input['user'], $temp);
            $stmt->execute();
            $stmt->close();

            $_SESSION['user'] = $input['user'];
            header('Location: member.php');
        }
        else
        {
            echo "ERROR: could not prepare SQL statement.";
        }
    }
}
else
{
    //display form
    include("views/v_register.php");
}

$mysqli->close();

?>