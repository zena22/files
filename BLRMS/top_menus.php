<link rel="stylesheet" href="css/styles.css" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
 <section class="home-section">
      <nav>
        <div class="sidebar-button">
          <i class="bx bx-menu sidebarBtn"></i>
          <span class="dashboard"  style="color:#0a2558;"><strong>Business License Registration Management System</strong></span>
		  
        </div>	  
	  <ul class="navbar-nav ml-auto">
		<?php if(!empty($_SESSION) && $_SESSION["userid"]) { ?>
			<li class="nav-item">
				<a class="nav-link"><?php echo ucfirst($_SESSION["name"]); ?> |</a>
			</li>		
			<li class="nav-item">
			  <a class="nav-link" href="logout.php">Logout</a>         
			</li>
		<?php } else { ?>
			<li class="nav-item">
				  <a class="nav-link" href="index.php">Login</a>         
			</li>
		<?php } ?>
      </ul>	  
    </div>
  </nav>