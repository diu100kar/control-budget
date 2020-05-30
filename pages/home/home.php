<!--Connecting to the database.-->
<?php require "../../resources/connect.php"; ?>

<!--Getting the header-->
<?php require "../../partials/header.php" ?>

        <!--Specified CSS-->
        <link rel="stylesheet" type="text/css" href="home.css">
        
        <title>Home</title>
        
    </head>
    
    <body>
        
        <header>
            <!--Getting the Navbar.-->
            <?php require "../../partials/navbar.php" ?>
        </header>
        
        <main>
            <div class="container-fluid">
                <?php 
                $var_query = "SELECT * FROM `plans` WHERE `user_id`=".$_SESSION['USER_ID'].";";
                $var_returned = mysqli_query($var_con, $var_query);
                $var_plan_count = mysqli_num_rows($var_returned);
                
                
                if ($var_plan_count==0){
                ?>
                <div class="container">
                    <h1>You don't have any active plans</h1>
                </div>
                <div class="col-lg-2 col-lg-offset-5 col-sm-4 col-sm-offset-4 col-xs-6 col-xs-offset-3">
                    <div class="panel panel-default">
                        <a href="../new_plan/new_plan.php" id="link">
                            <div class="panel-body text-center" id="no_plan">
                                <span class="glyphicon glyphicon-plus-sign"></span> Create a New Plan
                            </div>
                        </a>
                    </div>
                </div>
                
                
                <?php }else{ ?>
                <div class="container">
                    <h1>Your Plans</h1>
                </div>
                <div class="container m_bottom_80">
                <?php
                for($i=0; $i<$var_plan_count; $i++){
                    $var_row = mysqli_fetch_array($var_returned);
                ?>
                    <div class="container col-sm-6 col-md-4 col-lg-3">
                        <div class="panel panel-success p_0 panel_margin">
                            <div class="panel-heading text-center"><?php echo $var_row["title"] ?><span class="float_right"><span class="glyphicon glyphicon-user"></span> <?php echo $var_row["people"] ?></span></div>
                            <div class="panel-body">
                                <p><strong>Budget</strong><span class="float_right">₹ <?php echo $var_row["budget"] ?></span></p>
                                <p><strong>Date</strong><span class="float_right"><?php echo $var_row["from"] ?> - <?php echo $var_row["to"] ?></span></p>
                                <form method="POST" action="../view_plan/view_plan.php">
                                    <button type="submit" class="btn btn-success btn-block" name="Plan_id" value="<?php echo $var_row["plan_id"] ?>">View Plan</button>
                                </form>
                            </div>
                        </div>
                    </div>
                
                <?php }}; ?>
                </div>
            </div>
            <div id="add_wrap" class="navbar-fixed-bottom">
                <a id="add" href="../new_plan/new_plan.php"><span class="glyphicon glyphicon-plus-sign text-success background_white"></span></a>
            </div>
        </main>
        
        <footer>
            <!--Getting the Footer.-->
           <?php require "../../partials/footer.php" ?>
        </footer>
        
    </body>
</html>