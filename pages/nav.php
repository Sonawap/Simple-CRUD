<?php 
error_reporting(0);
if($user->checkAuth()){
	echo '<p>Welcome '.$user->getUserInfo()['name'].'</p>';
	echo '<a href="index.php">Home</a><br>';
	echo '<a href="profile.php">Profile</a><br>';
	echo '<a href="EditProfile.php">Edit Profile</a><br>';
	echo '<a href="ChangePassword.php">Change Password</a><br>';
	echo '<a href="logout.php">Logout</a><br>';

}else{
	echo '<a href="login.php">Login</a><br>';
	echo '<a href="register.php">Register</a>';
}

?>
