<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://fonts.googleapis.com/css?family=Roboto&display=swap" rel="stylesheet">
    <link href="views/style.css?v=<?php echo time(); ?>" rel="stylesheet" type="text/css" />
    <title>Sign Up</title>
</head>
<body>
    <form action="" method="post">
        <div class="login-form">
            <h2>Sign Up</h2>
            <?php if($error['alert'] != '')
            {
                echo "<div class='alert'>" . $error['alert'] ."</div>";
            }
            ?>
            <input class="input-form" type="text" name="username" placeholder="Username" value="<?php echo $input['user']; ?>">
            <div class="error"><?php echo $error['user']; ?></div>
            <input class="input-form" type="password" name="password" placeholder="Password" value="<?php echo $input['pass']; ?>">
            <div class="error"><?php echo $error['pass']; ?></div>
            <input class="input-form" type="password" name="con_password" placeholder="Confirm Password" value="<?php echo $input['con_pass']; ?>">
            <div class="error"><?php echo $error['con_pass']; ?></div>
            <input type="submit" name="submit" value="Sign Up" class="submit">
            <p>Alredy have an <a href="login.php">account?</a> </p>
        </div>
    </form>
</body>
</html>