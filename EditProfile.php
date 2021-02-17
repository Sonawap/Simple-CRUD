<?php 
	error_reporting(0);
	require_once('php/User.php');
	require_once('php/Message.php');
	if(!$user->checkAuth()){
		header("Location: login.php?error=You must login to continue");
	}

	if (isset($_POST['update'])) {
		$update = $user->update($_POST['email'], $_POST['name']);
		if($update){
			header("Location: EditProfile.php?success=Account updated");
			
		}else{
			header("Location: EditProfile.php?error=Unable to update Account");
		}	
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
	<form action="EditProfile.php" method="POST">
		<input type="text" name="name" required placeholder="name" value="<?php echo $user->getUserInfo()['name']  ?>"><br><br>
		<input type="email" required name="email" placeholder="email" value="<?php echo $user->getUserInfo()['email'] ?>"><br><br>
		<button name="update">UPDATE ACCOUNT</button>
	</form>

</body>


