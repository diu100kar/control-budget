<!--Connecting to the database.-->
<?php 
require "../../resources/connect.php";
session_start();
?>

<?php
$var_title = $_POST["Title"];
$var_from = $_POST["From"];
$var_to = $_POST["To"];
$var_budget = $_POST["Budget"];
$var_people_number = $_POST["People"];
$var_people_name = $_POST["Person"];

$var_query = "INSERT INTO `plans`(`user_id`, `budget`, `people`, `title`, `from`, `to`) VALUES (".$_SESSION['USER_ID'].",".$var_budget.",".$var_people_number.",'".$var_title."','".$var_from."','".$var_to."');";
mysqli_query($var_con, $var_query);

if (mysqli_errno($var_con)){
    echo "<script>alert('Error no :". mysqli_errno($var_con)."Try Again.')</script>";
    echo "<script>location.href='../new_plan/new_plan.php'</script>";
}else{
    echo "<script>location.href='../home/home.php'</script>";
};

$var_query = "SELECT `plan_id` FROM `plans` WHERE `plan_id`=(SELECT max(`plan_id`) FROM `plans`)";
$var_returned = mysqli_query($var_con, $var_query);
$var_row = mysqli_fetch_array($var_returned);
$var_plan_id = $var_row[0];
        
for ($i=0; $i<$var_people_number; $i++){
    $var_query = "INSERT INTO `people`(`plan_id`, `person_name`) VALUES (".$var_plan_id.",'".$var_people_name[$i]."')";
    mysqli_query($var_con, $var_query);
}
?>