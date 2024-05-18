<?php 

require 'functions.php';

// Cek tombol login sudah ditekan belum
if (isset($_POST['login'])) {

    $username = $_POST['username'];
    $password = $_POST['password'];

    // cek username ada atau tidak
    $result = mysqli_query($conn,"SELECT * FROM user WHERE username = '$username'");

    if (mysqli_num_rows($result) === 1) { 

        $row = mysqli_fetch_array($result);

        // cek password
        if(password_verify($password, $row["password"])) {
            // password verify mencocokan password yang sudah dihash dengan pasword yg diinput user
            header("Location:index.php");
            exit;
        }
        
    }

    $error = true;


}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php if (isset($error)) :?>
        <p>Username/password salah</p>
    <?php endif ?>
    <form action="" method="post">
        <ul>
            <li>
                <label for="username">username</label>
                <input type="text" name="username" id="username">
            </li>
            <li>
                <label for="password">password</label>
                <input type="password" name="password" id="password">
            </li> 
            <li>
                <button type="submit" name="login">login</button>
            </li>
        </ul>
    </form>
</body>
</html>