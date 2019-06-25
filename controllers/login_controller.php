<?php
class login_controller extends main_controller
{
	public function index() 
	{
		$this->display();
	}

	public function login()
	{

		if($_SERVER["REQUEST_METHOD"] == "POST") {

			$username = $_POST['username'];
			$password = $_POST['password'];

			$user = new user_model();
			$record = $user->getAllRecords('*', ['conditions' => "(username ="."'$username'"." and password ="."'$password') or (email="."'$username'"."and password="."'$password')"]);
	
			$count = 0;
			while($row = mysqli_fetch_array($record))
			{
				$userId = $row['id'];
				$userRole = $row['role'];
				$userName = $row['username'];
				$count++;
			}
			
			if($count == 1) {
				
				$_SESSION['userName'] = $userName;
				$_SESSION['userRole'] = $userRole;
				$_SESSION['userId'] = $userId;
				header("location: index.php");
			}else {
				$error = "Your Login Name or Password is invalid";
				header("location: index.php?ctl=login");
			}
		}
	}

	public function logout()
	{
		// remove all session variables
		session_unset(); 

		// destroy the session 
		session_destroy(); 
		header("location: index.php");
	}
}
?>
