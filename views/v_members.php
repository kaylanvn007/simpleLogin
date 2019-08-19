<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="views/style.css?v=<?php echo time();?>">
    <title>Home</title>
</head>
<body>
    <nav>
        <h1>Members page</h1>
        <a href="logout.php">Logout</a>
    </nav>
    <?php echo 'Welcome to the members page,' . $_SESSION['username'];?>
</body>
</html>