<!--Connecting to the database.-->
<?php require "../../resources/connect.php"; ?>

<?php
$var_name = $_POST["Name"];
$var_email = $_POST["Email"];
$var_password = $_POST["Password"];
$var_contact = $_POST["Contact"];

$var_query = "INSERT INTO `users`(`name`, `email`, `password`, `phone`) VALUES ('$var_name','$var_email','$var_password','$var_contact');";
mysqli_query($var_con, $var_query);
if (mysqli_error($var_con)){
    if (mysqli_errno($var_con)==1062){
        echo "<script>alert('The user already exists. Try logging in instead.')</script>";
        echo "<script>location.href='../login/login.php'</script>";
    }else{
        echo "<script>alert('Error no: ".mysqli_errno($var_con).". Please retry.')</script>";
        echo "<script>location.href='../signup/signup.php'</script>";
    };
}else{
    echo "<script>alert('Registration Successful.')</script>";
    session_start();
    $var_query = "SELECT `name`, `user_id` FROM `users` WHERE `email`='$var_email';";
    $var_returned = mysqli_query($var_con, $var_query);
    $var_row = mysqli_fetch_array($var_returned);
    $_SESSION["NAME"] = $var_row["name"];
    $_SESSION["USER_ID"] = $var_row["user_id"];
    echo "<script>location.href='../index/index.php'</script>";
};
?>