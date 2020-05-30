<!--Getting the header-->
<?php require "../../partials/header.php" ?>

        <!--Specified CSS-->
        <!--<link rel="stylesheet" type="text/css" href="view_plan.css">-->
        
        <title>View Plan</title>
        
    </head>
    
    <body>
        
        <header>
            <!--Getting the Navbar.-->
            <?php require "../../partials/navbar.php" ?>
        </header>
        
        <!--Connecting to the database.-->
        <?php require "../../resources/connect.php"; ?>

        <?php
        $var_plan_id = $_POST["Plan_id"];
        
        $var_query = "SELECT * FROM `plans` WHERE `plan_id`=".$var_plan_id.";";
        $var_returned = mysqli_query($var_con, $var_query);
        $var_plan_row = mysqli_fetch_array($var_returned);
        $var_people_count = $var_plan_row["people"];
        
        $var_people_cum = array_fill(0, $var_people_count, "0");
        
        $var_query = "SELECT * FROM `people` WHERE `plan_id`=".$var_plan_id.";";
        $var_returned = mysqli_query($var_con, $var_query);
        for ($i=0; $i<$var_people_count; $i++){
            $var_people_row = mysqli_fetch_array($var_returned);
            $var_people_name[$i] = $var_people_row["person_name"];
            
            $var_query = "SELECT SUM(`amount`) FROM `expenses` WHERE `plan_id`=".$var_plan_id." AND `transactor`='".$var_people_name[$i]."';";
            $var_returned_2 = mysqli_query($var_con, $var_query);
            $var_per_person = mysqli_fetch_array($var_returned_2)[0];
            if ($var_per_person){
                $var_people_cum[$i] = $var_per_person;
            };
        }
            
        $var_total_spent = array_sum($var_people_cum);
        $var_remaining = $var_plan_row["budget"]-$var_total_spent;
        $var_individual = $var_total_spent/$var_people_count;
        ?>
        
        <main>
            <div class="container-fluid">
                <div class="col-lg-6 col-lg-offset-3 m_top_50">
                    <div class="panel panel-success">
                        <div class="panel-heading text-center"><?php echo $var_plan_row["title"] ?><span class="float_right"><span class="glyphicon glyphicon-user"></span> <?php echo $var_plan_row["people"] ?></span></div>
                        <div class="panel-body">
                            <p><strong>Initial Budget</strong><span class="float_right">₹ <?php echo $var_plan_row["budget"] ?></span></p>
                            <?php for ($i=0; $i<$var_people_count; $i++){ ?>
                            <p><strong><?php echo $var_people_name[$i] ?></strong><span class="float_right">₹ <?php echo $var_people_cum[$i] ?></span></p>
                            <?php } ?>
                            <p><strong>Total amount spent</strong><span class="float_right">₹ <?php echo $var_total_spent ?></span></p>
                            <p><strong>Remaining Amount</strong><span class="float_right <?php if($var_remaining<0){echo "text-danger";};if($var_remaining>0){echo "text-success";}; ?>">₹ <?php echo $var_remaining ?></span></p>
                            <p><strong>Individual Shares</strong><span class="float_right">₹ <?php echo $var_individual ?></span></p>
                            <?php for ($i=0; $i<$var_people_count; $i++){ $var_account = $var_people_cum[$i]-$var_individual?>
                            <p><strong><?php echo $var_people_name[$i] ?></strong><span class="float_right <?php if($var_account<0){echo "text-danger";};if($var_account>0){echo "text-success";}; ?>">₹ <?php if ($var_account==0){echo "All Setteled up.";}else if($var_account<0){echo "Owes ₹".abs($var_account);};if($var_account>0){echo "Gets back ₹".$var_account;};; ?></span></p>
                            <?php } ?>
                            <div class="col-md-4 col-md-offset-4 col-sm-6 col-sm-offset-3 col-xs-8 col-xs-offset-2 ">
                                <form method="POST" action="../view_plan/view_plan.php">
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-success btn-block" name="Plan_id" value="<?php echo $_POST["Plan_id"] ?>"><span class="glyphicon glyphicon-arrow-left"></span> Go Back</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
        
        
        <footer>
            <!--Getting the Footer.-->
           <?php require "../../partials/footer.php" ?>
        </footer>
        
    </body>
</html>