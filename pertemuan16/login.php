<?php 
session_start();

require 'functions.php';

// cek cookie
if (isset($_COOKIE['id']) && $_COOKIE['key']) {
   $id = $_COOKIE['id'];
   $key = $_COOKIE['key'];

    // ambil username berdasarkan id
    $result = mysqli_query($conn,"SELECT username FROM user WHERE id = $id");
    $row = mysqli_fetch_array($result);

    // cocokan cookie dan username
    if ($key === hash('sha256',$row['username'])) {
        $_SESSION['login'] = true;
    }
}

// Cek session
if (isset($_SESSION["login"])) {
    header("Location: index.php");
    exit;
}


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

            // set session 
             $_SESSION["login"] = true;
          
            // cek remember me
            if (isset($_POST["remember"])) {
                // buat cookie
                setcookie('id', $row['id'], time()+60);
                setcookie('key', hash('sha256', $row['username']), time()+60);
            }

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
                <label for="remember">Remember me</label>
                <input type="checkbox" name="remember" id="remember">
            </li>
            <li>
                <button type="submit" name="login">login</button>
            </li>
        </ul>
    </form>
</body>
</html>