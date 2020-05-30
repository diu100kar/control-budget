<!--Getting the header-->
<?php require "../../partials/header.php" ?>
        
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
                    <div class="panel-heading">
                        <h3 class="text-center">Create New Plan</h3>
                    </div>
                    <div class="panel-body">
                        <form method="POST" action="../plan_details/plan_details.php">
                            <div class="form-group">
                                <label for="Budget">Initial Budget</label>
                                <input type="number" class="form-control" id="Budget" name="Budget" required placeholder="Initial Budet (Ex. 4000)">
                            </div>
                            <div class="form-group">
                                <label for="People">How many people you want to add in your group?</label>
                                <input type="number" class="form-control" id="People" name="People" required placeholder="No. of people">
                            </div>
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