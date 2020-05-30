<!--Connecting to the database.-->
<?php 
require "../../resources/connect.php";
session_start();
?>

<?php
$var_title = $_POST["Title"];
$var_date = $_POST["Date"];
$var_amount = $_POST["Amount"];
$var_transactor = $_POST["Transactor"];
$var_document = $_POST["Document"];

$var_query = "INSERT INTO `expenses`(`plan_id`, `transactor`, `amount`, `title`, `date`) VALUES (".$_POST["Plan_id"].",'".$var_transactor."',".$var_amount.",'".$var_title."','".$var_date."');";
mysqli_query($var_con, $var_query);
if (mysqli_error($var_con)){
    echo "<script>alert('Error no :". mysqli_errno($var_con)."Try Again.')</script>";
};
?>

<form method="POST" action="view_plan.php" id="myForm">
    <input name="Plan_id" value="<?php echo $_POST["Plan_id"] ?>">
    <button type="submit" ></button>
</form>

<script type="text/javascript">
    document.getElementById("myForm").submit();
</script>