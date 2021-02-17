<?php 
	error_reporting(0);
	require_once('php/User.php');
	require_once('php/Message.php');
	if(!$user->checkAuth()){
		header("Location: login.php?error=You must login to continue");
	}

	if (isset($_POST['change'])) {
		$update = $user->changePassword(md5($_POST['oldPassword']), md5($_POST['newPassword']));	
	}
?>
<!Doctype html>
<head>
	<title>Edit Profile</title>
</head>
<?php require_once('pages/nav.php'); ?>

<body>
	<h4>Update Account</h4>
	<?php echo $message->message();?>
	<form action="changePassword.php" method="POST">
		<input type="password" required name="oldPassword" placeholder="Old Password"><br><br>
		<input type="password" required name="newPassword" placeholder="New Password"><br><br>
		<button name="change">CHANGE PASSWORD</button>
	</form>

</body>


