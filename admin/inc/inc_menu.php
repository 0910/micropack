<?php
	// iniciamos session
	session_start();
?>
<div class="navbar navbar-inverse navbar-static-top" role="navigation">
	<div class="container">
		<div class="navbar-header">
  			<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
			    <span class="sr-only">Toggle navigation</span>
			    <span class="icon-bar"></span>
			    <span class="icon-bar"></span>
			    <span class="icon-bar"></span>
 			</button>
  			<a class="navbar-brand" href="<?php echo $rootpath.'admin/' ?>"><?php echo $admin_name ?> Admin</a>
		</div>
		<div class="navbar-collapse collapse">
	  		<ul class="nav navbar-nav navbar-right">
	  			<li><a href="<?php echo $rootpath.'admin/modules/products/' ?>">Productos</a></li>
			    <li><a href="<?php echo $rootpath.'admin/modules/news/' ?>">Novedades</a></li>
			    <li><a href="<?php echo $rootpath.'admin/modules/quotes/' ?>">Copetes</a></li>
			    <li><a href="<?php echo $rootpath.'admin/modules/offices/' ?>">Oficinas</a></li>
			    <li><a href="<?php echo $rootpath.'admin/modules/users/' ?>">Usuarios</a></li>
			    <li><p>Logued as: <?php echo $_SESSION['admin_user_name']; ?></p></li>
	  			<li><a href="<?php echo $rootpath.'admin/logout.php' ?>">Logout</a></li>
	  		</ul>
	  		<!--<form class="navbar-form navbar-right">
	    		<input type="text" class="form-control" placeholder="Search...">
	  		</form>!-->
		</div>
	</div>
</div>