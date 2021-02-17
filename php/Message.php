<?php
class Message{
	public function message(){
		if($_GET['error']){
			return $_GET['error'];
		}

		if($_GET['success']){
			return $_GET['success'];
		}
	}
}

$message = new Message();