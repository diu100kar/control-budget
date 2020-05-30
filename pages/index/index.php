<!--Getting the header-->
<?php require "../../partials/header.php" ?>

        <!--Specified CSS-->
        <link rel="stylesheet" type="text/css" href="index.css">
        
        <title>Index</title>
        
    </head>
    
    <body>
        
        <header>
            <!--Getting the Navbar.-->
            <?php require "../../partials/navbar.php" ?>
        </header>
        
        <main>
            <div class="background">
                <div class="gray_panel col-xs-offset-2 col-xs-8">
                    <h1>We help you control your budget</h1>
                    <a href="<?php if (isset($_SESSION["NAME"])){echo "../home/home.php";}else{echo "../login/login.php";}; ?>" class="btn btn-success  col-md-offset-5 col-md-2 col-sm-offset-4 col-sm-4 col-xs-offset-3 col-xs-6 text-center">Start Today</a>
                </div>
            </div>
        </main>
        
        <footer>
            <!--Getting the Footer.-->
           <?php require "../../partials/footer.php" ?>
        </footer>
        
    </body>
</html>