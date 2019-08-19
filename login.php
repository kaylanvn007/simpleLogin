<?php

//login members

//start session/load config.
session_start();
include("includes/config.php");
include("includes/db.php");

//form defaults
$error['pass'] = '';
$error['user'] = '';
$error['alert'] = '';
$input['user'] = '';
$input['pass'] = '';

if(isset($_POST['submit']))
{
    //process the form
    if($_POST['username'] == '' || $_POST['password'] == '')
    {
        if($_POST['username'] == ''){$error['user'] = "required";}
        if($_POST['password'] == ''){$error['pass'] = "required";}
        $error['alert'] = "Please fill in all fields.";

        $input['user'] = $_POST['username'];
        $input['pass'] = $_POST['password'];

        include("views/v_login.php");
    }
    else
    {
        $input['user'] = htmlentities($_POST['username'], ENT_QUOTES);
        $input['pass'] = htmlentities($_POST['password'], ENT_QUOTES);

        //creating query
        if($stmt = $mysqli->prepare("SELECT * FROM members WHERE username=? AND password=?"))
        {
            $temp = md5($input['pass']. $config['salt']);

            $stmt->bind_param('ss', $input['user'], $temp);
            $stmt->execute();
            $stmt->store_result();

            if($stmt->num_rows > 0)
            {
                $_SESSION['username'] = $input['user'];
                header("Location: member.php");
            }
            else
            {
                //username or password is incorret
                $error['alert'] = "Username or Password is incorrect!";
                include("views/v_login.php");
            }
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
    include("views/v_login.php");
}

$mysqli->close();

?>