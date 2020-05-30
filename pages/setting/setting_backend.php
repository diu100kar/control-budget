<!--Connecting to the database.-->
<?php 
require "../../resources/connect.php"; 
session_start();
?>

<?php
$var_password_old = $_POST["Password_Old"];
$var_password_new_1 = $_POST["Password_New_1"];
$var_password_new_2 = $_POST["Password_New_2"];

$var_query = "SELECT `password` FROM `users` WHERE `user_id`=".$_SESSION["USER_ID"].";";
$var_returned = mysqli_query($var_con, $var_query);
$var_row = mysqli_fetch_array($var_returned);

$var_password_server = $var_row["password"];

if ($var_password_server==$var_password_old){
    if ($var_password_new_1==$var_password_new_2){
        $var_query = "UPDATE `users` SET `password`='".$var_password_new_1."' WHERE `user_id`=".$_SESSION["USER_ID"].";";
        mysqli_query($var_con, $var_query);
        if (mysqli_error($var_con)){
            echo "<script>alert('Error no: ".mysqli_errno($var_con).". Please try again.')</script>";
            echo "<script>location.href='../setting/setting.php'</script>";
        }else{
            echo "<script>alert('Password updated successfully.')</script>";
            echo "<script>location.href='../index/index.php'</script>";
        };
    }else{
        echo "<script>alert('New Passwords do not match. Try again.')</script>";
        echo "<script>location.href='../setting/setting.php'</script>";
    };
}else{
    echo "<script>alert('Password do not match. Try again.')</script>";
    echo "<script>location.href='../setting/setting.php'</script>";
};
?>