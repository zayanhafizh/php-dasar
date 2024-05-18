<?php 
if(isset($_POST["submit"])) {
    if ($_POST["username"] == "admin" && $_POST["password"] == "rahasia") { 
        header("Location:latihan4.php");
        exit;
    } else {
        $error = true;
    }
} ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>POST</title>
</head>
<body>
    <?php if(isset($error)) : ?>
        <p>Username dan password salah</p>
    <?php endif ?>

    <form method="post" action="">
        <li>
            <label for="username">Username</label>
            <input type="text" name="username">
        </li>
        <li>
            <label for="password">Password</label>
            <input type="password" name="password">
        </li>
        <li>
            <button type="submit" name="submit">Kirim</button>
        </li> 
    </form>
</body>
</html>