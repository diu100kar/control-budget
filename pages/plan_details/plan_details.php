<!--Getting the header-->
<?php require "../../partials/header.php" ?>

        <!--Specified CSS-->
        <link rel="stylesheet" type="text/css" href="plan_details.css">

        <title>New Plan</title>
        
    </head>
    
    <body>
        
        <header>
            <!--Getting the Navbar.-->
            <?php require "../../partials/navbar.php" ?>
        </header>
        
        <main>
            <div class="container">
                <div class="panel panel-success col-lg-4 col-lg-offset-4 col-sm-6 col-sm-offset-3 col-xs-8 col-xs-offset-2 p_0 m_top_50">
                    <div class="panel-body">
                        <form method="POST" action="../plan_details/plan_details_backend.php">
                            <div class="form-group">
                                <label for="Budget">Title</label>
                                <input type="text" class="form-control" id="Budget" name="Title" required placeholder="Enter Title (Ex. Trip to Goa)">
                            </div>
                            <div class="col-sm-6 p_r">
                                <div class="form-group">
                                    <label for="From">From</label>
                                    <input type="date" class="form-control" id="From" name="From" required placeholder="dd/mm/yyyy">
                                </div>
                            </div>
                            <div class="col-sm-6 p_l">
                                <div class="form-group">
                                    <label for="To">To</label>
                                    <input type="date" class="form-control" id="To" name="To" required placeholder="dd/mm/yyyy">
                                </div>
                            </div> 
                            <div class="col-sm-8 p_r">
                                <div class="form-group">
                                    <label for="Budget">Initial Budget</label>
                                    <input type="number" class="form-control" id="Budget" name="Budget" value="<?php echo $_POST["Budget"] ?>" readonly>
                                </div>
                            </div>
                            <div class="col-sm-4 p_l">
                                <div class="form-group">
                                    <label for="People">No. of people</label>
                                    <input type="number" class="form-control" id="People" name="People" value="<?php echo $_POST["People"] ?>" readonly>
                                </div>
                            </div> 
                            <?php for($i=0; $i<$_POST["People"]; $i++){ ?>
                                <div class="form-group">
                                    <label for="Person_<?php echo $i+1 ?>">Person <?php echo $i+1 ?></label>
                                    <input type="text" class="form-control" id="Person_<?php echo $i+1 ?>" name="Person[<?php echo $i ?>]" required placeholder="Person <?php echo $i+1 ?> Name">
                                </div>
                            <?php } ?>
                            <div class="form-group">
                                <button type="submit" class="btn btn-success btn-block">Next</button>
                            </div>
                        </form>
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