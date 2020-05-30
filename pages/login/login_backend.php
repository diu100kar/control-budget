<!--Connecting to the database.-->
<?php require "../../resources/connect.php"; ?>

<?php
$var_email = $_POST["Email"];
$var_password = $_POST["Password"];

$var_query = "SELECT `password` FROM `users` WHERE `email`='$var_email';";
$var_returned = mysqli_query($var_con, $var_query);
$var_row = mysqli_fetch_array($var_returned);

if (is_null($var_row)){
    echo "<script>alert('No such user exists. Tru Signing up.')</script>";
    echo "<script>location.href='../signup/signup.php'</script>";
}else{
    if (mysqli_error($var_con)){
        echo "<script>alert('Error no: ".mysqli_errno($var_con).". Please retry.')</script>";
        echo "<script>location.href='../login/login.php'</script>";
    }else{
        $var_password_server = $var_row["password"];
        if ($var_password_server == $var_password){
            session_start();
            $var_query = "SELECT `name`, `user_id` FROM `users` WHERE `email`='$var_email';";
            $var_returned = mysqli_query($var_con, $var_query);
            $var_row = mysqli_fetch_array($var_returned);
            $_SESSION["NAME"] = $var_row["name"];
            $_SESSION["USER_ID"] = $var_row["user_id"];
            echo "<script>alert('Logged in successfully.')</script>";
            echo "<script>location.href='../index/index.php'</script>";
        }else{
            echo "<script>alert('Wrong Password. Try again.')</script>";
            echo "<script>location.href='../login/login.php'</script>";
        };
    };
};
?>