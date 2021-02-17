<?php 
	require_once('php/User.php');
	if(!$user->checkAuth()){
		header("Location: login.php?error=You must login to continue");
	}
?>
<!Doctype html>
<head>
	<title>Welcome</title>
</head>
<?php require_once('pages/nav.php'); ?>

<body>
	<h4>Name: <?php echo $user->getUserInfo()['name'] ?></h4>
	<h4>Email: <?php echo $user->getUserInfo()['email'] ?></h4>
</body>


