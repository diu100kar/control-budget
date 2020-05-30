<!--Getting the header-->
<?php require "../../partials/header.php" ?>

        <!--Specified CSS-->
        <link rel="stylesheet" type="text/css" href="view_plan.css">
        
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
        $var_query = "SELECT * FROM `plans` WHERE `plan_id`=".$_POST["Plan_id"].";";
        $var_returned = mysqli_query($var_con, $var_query);
        $var_plan_row = mysqli_fetch_array($var_returned);
        
        $var_query = "SELECT * FROM `expenses` WHERE `plan_id`=".$_POST["Plan_id"].";";
        $var_returned = mysqli_query($var_con, $var_query);
        $var_expenses_count = mysqli_num_rows($var_returned);
        ?>
        
        <main>
            <div class="container-fluid">
                <div class="container m_top_50">
                    <div class="col-md-6">
                        <div class="panel panel-success">
                            <div class="panel-heading text-center"><?php echo $var_plan_row["title"] ?><span class="float_right"><span class=" glyphicon glyphicon-user"></span> <?php echo $var_plan_row["people"] ?></span></div>
                            <div class="panel-body">
                                <p><strong>Budget</strong><span class="float_right">₹ <?php echo $var_plan_row["budget"] ?></span></p>
                                <p><strong>Remaining Amount</strong><span class="float_right">₹ <?php echo $var_plan_row["budget"] ?></span></p>
                                <p><strong>Date</strong><span class="float_right">₹ <?php echo $var_plan_row["from"] ?> to <?php echo $var_plan_row["to"] ?></span></p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6" id="expense_button">
                        <div class="col-md-6 col-md-offset-3">
                            <form method="POST" action="../expense_distribution/expense_distribution.php">
                                <button type="submit" class="btn btn-success btn-block" name="Plan_id" value="<?php echo $var_plan_row["plan_id"] ?>">Expense Distribution</button>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="container m_top_50">
                    <div class="col-lg-8 col-md-7 col-sm-6">
                        <?php for($i=0; $i<$var_expenses_count; $i++){
                            $var_expenses_row = mysqli_fetch_array($var_returned); ?>
                        <div class="col-lg-4 col-md-6">
                            <div class="panel panel-success">
                                <div class="panel-heading text-center"><?php echo $var_expenses_row["title"] ?></div>
                                <div class="panel-body">
                                    <p><strong>Amount</strong><span class="float_right">₹ <?php echo $var_expenses_row["amount"] ?></span></p>
                                    <p><strong>Paid by</strong><span class="float_right"><?php echo $var_expenses_row["transactor"] ?></span></p>
                                    <p><strong>Paid on</strong><span class="float_right">₹ <?php echo $var_expenses_row["date"] ?></span></p>
                                </div>
                                <div class="panel-footer text-center">
                                    <a>Bill Space</a>
                                </div>
                            </div>
                        </div>
                        <?php } ?>
                    </div>
                    <div class="col-lg-4 col-md-5 col-sm-6 new_expense">
                        <div class="panel panel-success">
                            <div class="panel-heading text-center">Add New Expense</div>
                            <div class="panel-body">
                                <form method="POST" action="view_plan_backend.php">
                                    <div class="form-group">
                                        <label for="Title">Title</label>
                                        <input type="text" class="form-control" id="Title" name="Title" required placeholder="Expense Name">
                                    </div>
                                    <div class="form-group">
                                        <label for="Date">Date</label>
                                        <input type="date" class="form-control" id="Date" name="Date" required placeholder="dd/mm/yyyy" min="<?php echo $var_plan_row["from"] ?>" max="<?php echo $var_plan_row["to"] ?>">
                                    </div>
                                    <div class="form-group">
                                        <label for="Amount">Amount Spent</label>
                                        <input type="number" class="form-control" id="Amount" name="Amount" required placeholder="Amount Spent">
                                    </div>
                                    <div class="form-group">
                                        <label for="Transactor">Transactor</label>
                                        <select name="Transactor" class="form-control" name="Transactor">
                                            <?php 
                                            $var_query = "SELECT `person_name` FROM `people` WHERE `plan_id`=".$_POST["Plan_id"].";";
                                            $var_returned = mysqli_query($var_con, $var_query);
                                            $var_people_number = mysqli_affected_rows($var_con);
                                            for ($i=0; $i<$var_people_number; $i++){
                                                $var_plan_row = mysqli_fetch_array($var_returned);
                                            ?>
                                            <option value="<?php echo $var_plan_row["person_name"] ?>"><?php echo $var_plan_row["person_name"] ?></option>    
                                            <?php } ?>
                                            
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="Document">Upload Bill</label>
                                        <input type="file" class="form-control" id="Document" name="Document">
                                    </div>
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-success btn-block" name="Plan_id" value="<?php echo $_POST["Plan_id"] ?>">Add</button>
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