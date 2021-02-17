<?php 
	error_reporting(0);
	require_once('php/User.php');
	require_once('php/Message.php');

	if(isset($_POST['register'])){
		$register = $user->register($_POST['email'], $_POST['name'], $_POST['password']);
		if($register){
			$login = $user->login($_POST['email'], $_POST['password']);
		}else{
			header("Location: register.php?error=Unable to create Account");
		}		
	}
?>
<!Doctype html>
<head>
	<title>Welcome</title>
</head>

<?php require_once('pages/nav.php'); ?>

<h4>Create Account</h4>
<?php echo $message->message();?>
<form action="register.php" method="POST">
	<input type="text" name="name" required placeholder="name"><br><br>
	<input type="email" required name="email" placeholder="email"><br><br>
	<input type="password" required name="password" placeholder="password"><br><br>
	<button name="register">Create Account</button>
</form>


