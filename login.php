<?php 
	error_reporting(0);
	require_once('php/User.php');
	require_once('php/Message.php');

	if(isset($_POST['login'])){
		$login = $user->login($_POST['email'], $_POST['password']);
	}
?>
<!Doctype html>
<head>
	<title>Login</title>
</head>

<?php require_once('pages/nav.php'); ?>

<h4>Login to Account</h4>
<?php echo $message->message();?>
<form action="login.php" method="POST">
	<input type="email" required name="email" placeholder="email"><br><br>
	<input type="password" required name="password" placeholder="password"><br><br>
	<button name="login">Login to Account</button>
</form>


