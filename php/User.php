<?php
session_start();
class User{

	public function register($email, $name, $password){
		require('connect.php');
		$newPassword = md5($password);
		$query = "INSERT INTO users (email,name,password) value ('$email','$name','$newPassword')";
		$run = $sonawap->query($query) or die($sonawap->error.__LINE__);

		if ($run) {
			return true;
		}
	}

	public function update($email, $name){
		require('connect.php');
		$id = $this->getUserInfo()['id'];
		$query = "UPDATE users set email='$email', name='$name' where id= '$id'";
		$run = $sonawap->query($query) or die($sonawap->error.__LINE__);

		if ($run) {
			return true;
		}
	}

	public function changePassword($oldPassword, $newPassword){
	    require 'connect.php';
	    $user_id = $_SESSION['user_id'];
	    $query = "SELECT * FROM users where id = '$user_id' and password = '$oldPassword'  ";
	    $result = $sonawap->query($query) or die($sonawap->error.__LINE__);
	    $countpassword = $result->num_rows;
	    if ($countpassword > 0) {
	      	$query1 = "UPDATE users SET password = '$newPassword' where id = $user_id ";
	      	$sendMessage = $sonawap->query($query1) or die($sonawap->error.__LINE__);
	      	if ($sendMessage) {
	        	header("Location: profile.php?success=Password Changed Successfully");
	      	}else{
		        header("Location: changePassword.php?error=Sorry an error occur, try again");
	      	}
	    }else{
	      	header("Location: changePassword.php?error=Password Error");
	    }
    }

	public function login($email, $password){
		require('connect.php');
		$newPassword = md5($password);

		$query = "SELECT * FROM users where email='$email' and password='$newPassword'";
		$run = $sonawap->query($query) or die($sonawap->error.__LINE__);
		$getUser = $run->num_rows;
		if($getUser > 0){
			if($row=mysqli_fetch_array($run)){
	          $_SESSION['user_id']=$row["id"];
	          header("Location: index.php");
	        }		
	        else{
	          header("Location: login.php?error=Authentication failed");
	        } 
		}

	}

 	public function checkAuth(){
    	if ($_SESSION['user_id']) {
	      	return true;
	    }else{
	      	return false;
	    }
  	}

  	public function logout(){
		session_destroy();
		header("Location: index.php");
		exit();
  	}

  	public function getUserInfo(){
  		require 'connect.php';

  		$id = $_SESSION['user_id'];

  		$query = "SELECT * FROM users where id = '$id'";
		$run = $sonawap->query($query) or die($sonawap->error.__LINE__);
		$rows = mysqli_fetch_array($run);

		return $rows;

  	}

}

$user = new User();