<?php
$db = new mysqli("localhost", "root", "", "user_register");
if (!$db) {
    echo "failed";
}
?>
<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]>      <html class="no-js"> <!--<![endif]-->
<html>

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <title>Register-Login</title>
    <meta name="description" content="" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel = "stylesheet" href = "style1.css"
</head>

<body>
    <!--[if lt IE 7]>
      <p class="browsehappy">
        You are using an <strong>outdated</strong> browser. Please
        <a href="#">upgrade your browser</a> to improve your experience.
      </p>
    <![endif]-->
    <div class="container">
        <div class="row">
            <div class="block">
                <form method="post">
                    <h2 text-align="center">Registration</h2>
                    <input type="text" name="name" class="form-control" required placeholder="Name" /><br>
                    <input type="email" name="email" class="form-control" required placeholder="Email Address" /><br>
                    <input type="password" name="password" class="form-control" placeholder="password" required /><br>
                    <button type="submit" name="register" class="">
                        register
                    </button>
                </form>
            </div>
            <div class="block1">
                <form method="post">
                    <h2 text-align="center">Login</h2>
                    <input type="email" name="email" class="form-control" required placeholder="Email Address" />
                    <input type="password" name="password" class="form-control" placeholder="password" required /><br>
                    <button type="submit" name="login" class="btn btn-info">
                        login
                    </button>
                </form>
            </div>
        </div>
    </div>

    <script src="" async defer></script>
</body>

</html>
<?php
if (isset($_POST['register'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $pass = $_POST['password'];
    $password = md5($pass);
    $q = mysqli_query($db, "INSERT INTO `register`( `name`, `email`, `password`) VALUES ('$name','$email','$password')");
    if ($q) {
        echo "<script>alert('registration successful')</script>";
        echo "<meta http-equiv='refresh' content='0'>";
    } else {
        echo "<script>alert('unable to register')</script>";
        echo "<meta http-equiv='refresh' content='0'>";
    }
}
if (isset($_POST['login'])) {
    $email = $_POST['email'];
    $password = md5($_POST['password']);
    $q = mysqli_query($db, "SELECT * FROM register WHERE email='$email' and password ='$password'");

    if ($q) {
        $row = mysqli_fetch_array($q);

        if ($row['email'] == $email && $row['password'] == $password) {
            echo "<script>alert('login successful')</script>";
            echo "<meta http-equiv='refresh' content='0'>";
        }
        else if ($row['email'] == $email || $row['password'] != $password)
         {
            echo "<script>alert('Incorrect credentials')</script>";
            echo "<meta http-equiv='refresh' content='0'>";
        }
        else {
            echo "<script>alert('record not found')</script>";
            echo "<meta http-equiv='refresh' content='0'>";
        }
    }
}
?>