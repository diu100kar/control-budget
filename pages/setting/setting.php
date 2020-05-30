<!--Getting the header-->
<?php require "../../partials/header.php" ?>
        
        <title>Settings</title>
        
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
                        <h3 class="text-center">Change Password</h3>
                    </div>
                    <div class="panel-body">
                        <form method="POST" action="setting_backend.php">
                            <div class="form-group">
                                <label for="Password_Old">Old Password</label>
                                <input type="password" class="form-control" id="Password_Old" name="Password_Old" required placeholder="Old Password">
                            </div>
                            <div class="form-group">
                                <label for="Password_New_1">New Password</label>
                                <input type="password" class="form-control" id="Password_New_1" name="Password_New_1" required placeholder="New Password (Min. 6 characters)" minlength="6">
                            </div>
                            <div class="form-group">
                                <label for="Password_New_2">Confirm New Password</label>
                                <input type="password" class="form-control" id="Password_New_2" name="Password_New_2" required placeholder="Re-type New Password" minlength="6">
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-success btn-block">Update Password</button>
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