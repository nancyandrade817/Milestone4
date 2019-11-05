<?php require_once('utility.php') ?>
<!DOCTYPE html>
<html>
<head>
<meta charset="ISO-8859-1">
<title>Login Success</title>
</head>
<body>
	<h2>Login was successful: <?php echo " " . $userName ?></h2><br>
	<?php 
	$users = getAllUsers($dbName, $tableName);
// 	echo "<p>print_r() \$users";
// 	print_r($users);
// 	echo "</p>";
	include('_displayUsers.php')
	?>
	<ul>
	<li><a href="whoAmI.php">Who Am I</a></li>
	<li><a href="blogpost.html">Create a BlogPost</a></li>
	</ul>
</body>
</html>