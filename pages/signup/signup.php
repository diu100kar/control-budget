<!--Getting the header-->
<?php require "../../partials/header.php" ?>
        
        <title>Sign Up</title>
        
    </head>
    
    <body>
        
        <header>
            <!--Getting the Navbar.-->
            <?php require "../../partials/navbar.php" ?>
        </header>
        
        <main>
            <div class="container">
                <div class="panel panel-default col-lg-4 col-lg-offset-4 col-sm-6 col-sm-offset-3 col-xs-8 col-xs-offset-2 p_0 m_top_50">
                    <div class="panel-heading">
                        <h3 class="text-center">Sign Up</h3>
                    </div>
                    <div class="panel-body">
                        <form method="POST" action="signup_backend.php">
                            <div class="form-group">
                                <label for="Name">Name:</label>
                                <input type="text" class="form-control" id="Name" name="Name" required placeholder="Name">
                            </div>
                            <div class="form-group">
                                <label for="Email">Email:</label>
                                <input type="email" class="form-control" id="Email" name="Email" required placeholder="Enter Valid Email">
                            </div>
                            <div class="form-group">
                                <label for="Password">Password:</label>
                                <input type="password" class="form-control" id="Password" name="Password" required placeholder="Password(Min. 6 characters)" minlength="6">
                            </div>
                            <div class="form-group">
                                <label for="Contact">Phone Number:</label>
                                <input type="tel" class="form-control" id="Contact" name="Contact" required placeholder="Enter Valid Phone Number (Ex: 8448444853)">
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-success btn-block">Sign Up</button>
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