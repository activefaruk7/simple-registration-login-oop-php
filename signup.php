<?php

require_once ('init.php');

if( $_REQUEST== $_POST && isset($_REQUEST['signup']) && $_REQUEST['signup'] == 'signup'){
    $reg = new User();

    $reg = $reg->signup($_POST['username'], $_POST['password']);
}

?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>


<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">

    <input type="hidden" name="signup" value="signup">

    <input type="text" placeholder="Username" name="username"><br>
    <input type="password" placeholder="Password" name="password"><br>
    <input type="submit" value="submit" name="submit">

</form>


</body>
</html>