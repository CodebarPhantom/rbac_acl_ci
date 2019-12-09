<!DOCTYPE html>
<html lang="en">

	<head>	    
	    <?php include 'includes_top.php';?>
    </head> 
        
    
	<body class="navbar-top ">
        <!-- Start Main Navbar -->
        <?php include 'main_navbar.php';?>
        <!-- END Main Navbar -->

        <!-- Page content -->
		<div class="page-content">
            <?php include 'main_sidebar.php';?>            
            <div class="content-wrapper">
                <?php include $page_name . '.php'; ?>
                <?php include 'includes_bottom.php';?>
            </div>
        </div>
        <!-- END Page content -->
        <?php include 'js.php';?>
        
	</body>
</html>
