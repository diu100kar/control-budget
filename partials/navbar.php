<nav class="navbar navbar-inverse navbar-fixed-top no_border">
    <div class="container-fluid">
        <div class="container">
          <div class="navbar-header">
              <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                  <span class="sr-only">Toggle navigation</span>
                  <span class="icon-bar"></span>
                  <span class="icon-bar"></span>
                  <span class="icon-bar"></span>
              </button>
              <a class="navbar-brand" href="../index/index.php">Ct₹l Budget</a>
          </div>
            <?php session_start() ?>
          <!-- Collect the nav links, forms, and other content for toggling -->
          <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
              <?php if(isset($_SESSION["NAME"])){ ?>
              <ul class="nav navbar-nav">
                  <li><a href="../home/home.php"><?php echo $_SESSION["NAME"]; ?></a></li>
              </ul>
              <ul class="nav navbar-nav navbar-right">
                  <li><a href="../about/about.php"><span class="glyphicon glyphicon-info-sign"></span> About Us</a></li>
                  <li><a href="../setting/setting.php"><span class="glyphicon glyphicon-cog"></span> Change Password</a></li>
                  <li><a href="../logout/logout_backend.php"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
              </ul>
              <?php }else{ ?>
              <ul class="nav navbar-nav navbar-right">
                  <li><a href="../about/about.php"><span class="glyphicon glyphicon-info-sign"></span> About Us</a></li>
                  <li><a href="../signup/signup.php"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
                  <li><a href="../login/login.php"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
              </ul>
              <?php }; ?>
              
          </div><!-- /.navbar-collapse -->
      </div>
    </div><!-- /.container-fluid -->
</nav>